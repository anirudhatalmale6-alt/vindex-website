<?php
/**
 * Contact form: where enquiries go, which mailbox sends them, and sending.
 *
 * Used by contact-send.php (the public form) and by the members admin
 * ("Contact form" card, including "Send test email"), so the address, the
 * sending method and the email itself are defined in exactly one place.
 *
 * WHY A MAILBOX: one.com (IONOS) refuses PHP mail() unless the sender is a
 * real mailbox on a domain in the hosting account. The reliable route is to
 * send through that mailbox over authenticated SMTP, exactly as an email app
 * does. The mailbox password is stored encrypted (AES-256-GCM with the site's
 * APP_KEY) in site_settings and is never shown again.
 *
 * Settings (table site_settings):
 *   contact_email  where enquiries are delivered
 *   smtp_user      the sending mailbox, e.g. info@yourdomain.dk
 *   smtp_pass      its password, encrypted
 * Server defaults to one.com: send.one.com, port 465, SSL. VDX_SMTP_HOST /
 * VDX_SMTP_PORT / VDX_SMTP_SECURE override them (server environment only).
 */
require_once __DIR__ . '/sitetext.php';   // st_db(): the members area's database connection

const CONTACT_SETTINGS_SQL = "CREATE TABLE IF NOT EXISTS site_settings (
    skey        VARCHAR(80)  NOT NULL PRIMARY KEY,
    value       TEXT         NOT NULL,
    updated_at  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

/* ------------------------------------------------------------ settings */

function vdx_setting(?PDO $pdo, string $key): string {
    $pdo = $pdo ?? st_db();
    if (!$pdo) return '';
    try {
        $q = $pdo->prepare('SELECT value FROM site_settings WHERE skey = ?');
        $q->execute([$key]);
        return (string)($q->fetchColumn() ?: '');
    } catch (Throwable $e) {
        return '';                       // table not created yet: nothing saved
    }
}

function vdx_setting_put(PDO $pdo, string $key, ?string $value): void {
    $pdo->exec(CONTACT_SETTINGS_SQL);
    if ($value === null || $value === '') {
        $pdo->prepare('DELETE FROM site_settings WHERE skey = ?')->execute([$key]);
    } else {
        $pdo->prepare('INSERT INTO site_settings (skey, value) VALUES (?, ?)
                       ON DUPLICATE KEY UPDATE value = VALUES(value)')->execute([$key, $value]);
    }
}

/** A strict address check: also what goes on the sendmail command line, so no shell characters. */
function vdx_plain_email(string $e): bool {
    return (bool)preg_match('/^[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}$/', $e);
}

/* ----------------------------------------------------------- recipient */

function vdx_contact_setting(?PDO $pdo = null): string {
    $v = vdx_setting($pdo, 'contact_email');
    return filter_var($v, FILTER_VALIDATE_EMAIL) ? $v : '';
}

function vdx_contact_from_install(): string {
    $f = __DIR__ . '/../members/private/vindex-secrets.php';
    if (!is_file($f)) return '';
    $cfg = require $f;
    $v = is_array($cfg) ? (string)($cfg['contact_email'] ?? '') : '';
    return filter_var($v, FILTER_VALIDATE_EMAIL) ? $v : '';
}

/** Where enquiries go right now, or '' if nowhere is set. */
function vdx_contact_recipient(?PDO $pdo = null): string {
    return vdx_contact_setting($pdo) ?: vdx_contact_from_install();
}

function vdx_contact_save(PDO $pdo, string $email): bool {
    $email = strtolower(trim($email));
    if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) return false;
    vdx_setting_put($pdo, 'contact_email', $email);
    return true;
}

/* ------------------------------------------------------ sending mailbox */

function vdx_crypto_ready(): bool {
    $f = __DIR__ . '/../members/lib/crypto.php';
    if (!is_file($f)) return false;
    require_once $f;
    // Refuse rather than encrypt with crypto.php's fallback key, which is
    // derived from the database name and so is guessable.
    return defined('APP_KEY') && strlen((string)APP_KEY) >= 32 && function_exists('encrypt_data');
}

/** ['user' => address, 'pass' => decrypted password or '', 'has_pass' => bool]. */
function vdx_mailbox(?PDO $pdo = null): array {
    $user = strtolower(vdx_setting($pdo, 'smtp_user'));
    $enc  = vdx_setting($pdo, 'smtp_pass');
    $pass = '';
    if ($enc !== '' && vdx_crypto_ready()) $pass = (string)(decrypt_data($enc) ?? '');
    return ['user' => vdx_plain_email($user) ? $user : '', 'pass' => $pass, 'has_pass' => $pass !== ''];
}

/**
 * Save the sending mailbox. $pass: a new password, '' to keep the saved one,
 * or null to remove it. Returns '' on success or a reason.
 */
function vdx_mailbox_save(PDO $pdo, string $user, ?string $pass): string {
    $user = strtolower(trim($user));
    if ($user !== '' && !vdx_plain_email($user)) return 'bad_user';
    vdx_setting_put($pdo, 'smtp_user', $user);
    if ($user === '' || $pass === null) { vdx_setting_put($pdo, 'smtp_pass', null); return ''; }
    if ($pass === '') return '';                                   // keep what is saved
    if (!vdx_crypto_ready()) return 'no_key';
    $enc = encrypt_data($pass);
    if ($enc === '') return 'no_key';
    vdx_setting_put($pdo, 'smtp_pass', $enc);
    return '';
}

/* --------------------------------------------------------------- send */

/**
 * Send one enquiry. $f has name, company, email, topic, message — already
 * trimmed and length-limited by the caller.
 *
 * Returns ['ok' => bool, 'via' => 'smtp'|'mail', 'error' => plain-English reason].
 * ok means the mail server ACCEPTED it; reaching the inbox is then up to mail.
 */
function vdx_send_enquiry(string $to, array $f, bool $isTest = false, ?PDO $pdo = null): array {
    $flat = fn(string $s) => trim(preg_replace('/[\r\n\t]+/', ' ', $s));
    $name    = $flat((string)($f['name'] ?? ''));
    $company = $flat((string)($f['company'] ?? ''));
    $email   = $flat((string)($f['email'] ?? ''));
    $topic   = $flat((string)($f['topic'] ?? ''));
    $message = (string)($f['message'] ?? '');

    $host = preg_replace('/^www\./i', '', preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? 'localhost'));
    $host = preg_replace('/[^a-z0-9.\-]/i', '', $host) ?: 'localhost';

    $subject = ($isTest ? 'TEST — ' : '') . 'Website enquiry from ' . mb_substr($name, 0, 60)
             . ($company !== '' ? ' (' . mb_substr($company, 0, 60) . ')' : '');
    $body = ($isTest ? "This is a test sent from your Vindex admin. If you can read it, the contact form works.\n\n" : '')
          . "New message from the contact form on {$host}\n"
          . str_repeat('-', 48) . "\n"
          . "Name:    {$name}\n"
          . "Company: " . ($company !== '' ? $company : '-') . "\n"
          . "Email:   {$email}\n"
          . "Topic:   " . ($topic !== '' ? $topic : '-') . "\n"
          . str_repeat('-', 48) . "\n\n"
          . $message . "\n\n"
          . str_repeat('-', 48) . "\n"
          . "Reply to this email to answer them directly.\n";
    $replyTo = filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : '';

    $box = vdx_mailbox($pdo);
    if ($box['user'] !== '' && $box['has_pass']) {
        return vdx_send_smtp($box['user'], $box['pass'], $to, $replyTo, $subject, $body);
    }
    return vdx_send_phpmail($box['user'] ?: 'noreply@' . $host, $to, $replyTo, $subject, $body);
}

function vdx_send_smtp(string $user, string $pass, string $to, string $replyTo, string $subject, string $body): array {
    require_once __DIR__ . '/phpmailer/Exception.php';
    require_once __DIR__ . '/phpmailer/PHPMailer.php';
    require_once __DIR__ . '/phpmailer/SMTP.php';
    $m = new PHPMailer\PHPMailer\PHPMailer(true);
    try {
        $m->isSMTP();
        $m->Host       = getenv('VDX_SMTP_HOST') ?: 'send.one.com';
        $m->Port       = (int)(getenv('VDX_SMTP_PORT') ?: 465);
        $m->SMTPSecure = (getenv('VDX_SMTP_SECURE') ?: 'ssl') === 'tls'
                         ? PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS
                         : PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
        $m->SMTPAuth   = true;
        $m->Username   = $user;
        $m->Password   = $pass;
        $m->Timeout    = 15;
        $m->CharSet    = 'UTF-8';
        if (getenv('VDX_SMTP_INSECURE') === '1') {    // local tests against a self-signed server only
            $m->SMTPOptions = ['ssl' => ['verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true]];
        }
        $m->setFrom($user, 'Vindex website');
        $m->addAddress($to);
        if ($replyTo !== '') $m->addReplyTo($replyTo);
        $m->isHTML(false);
        $m->Subject = $subject;
        $m->Body    = $body;
        $m->send();
        return ['ok' => true, 'via' => 'smtp', 'error' => ''];
    } catch (Throwable $e) {
        $raw = $m->ErrorInfo ?: $e->getMessage();
        error_log('[vindex contact] SMTP send failed: ' . $raw);
        $r = strtolower($raw);
        if (str_contains($r, 'authenticate'))        $why = 'the mail server did not accept the mailbox address or password';
        elseif (str_contains($r, 'connect'))         $why = 'the website could not reach the mail server';
        elseif (str_contains($r, 'recipient'))       $why = 'the mail server refused the address messages are sent to';
        else                                         $why = 'the mail server refused the message';
        return ['ok' => false, 'via' => 'smtp', 'error' => $why];
    }
}

function vdx_send_phpmail(string $from, string $to, string $replyTo, string $subject, string $body): array {
    $headers = ['From: Vindex website <' . $from . '>',
                'MIME-Version: 1.0',
                'Content-Type: text/plain; charset=UTF-8',
                'Content-Transfer-Encoding: 8bit',
                'X-Mailer: Vindex contact form'];
    if ($replyTo !== '') array_splice($headers, 1, 0, 'Reply-To: ' . $replyTo);
    // RFC 2047: short encoded words of whole characters, so Danish letters survive.
    $encodedSubject = implode(' ', array_map(
        fn($chunk) => '=?UTF-8?B?' . base64_encode($chunk) . '?=',
        mb_str_split($subject, 12, 'UTF-8')));
    // -f sets the envelope sender too; IONOS hosting checks it. $from passed
    // vdx_plain_email, so it carries no shell characters.
    $extra = vdx_plain_email($from) ? '-f' . $from : '';
    $ok = @mail($to, $encodedSubject, $body, implode("\r\n", $headers), $extra);
    if (!$ok) error_log('[vindex contact] PHP mail() refused, sender ' . $from);
    return ['ok' => $ok, 'via' => 'mail',
            'error' => $ok ? '' : 'the hosting refused to send it — on one.com a website must send through a real mailbox on its own domain'];
}
