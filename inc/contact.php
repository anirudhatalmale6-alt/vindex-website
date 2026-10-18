<?php
/**
 * Contact form: where enquiries go, and sending them.
 *
 * Used by contact-send.php (the public form) and by the members admin
 * ("Contact form" settings, including the "Send test email" button), so the
 * address and the email itself are defined in exactly one place.
 *
 * The address is looked for in order:
 *   1. the admin setting (table site_settings, key contact_email)
 *   2. contact_email in members/private/vindex-secrets.php (set at install)
 */
require_once __DIR__ . '/sitetext.php';   // st_db(): the members area's database connection

const CONTACT_SETTINGS_SQL = "CREATE TABLE IF NOT EXISTS site_settings (
    skey        VARCHAR(80)  NOT NULL PRIMARY KEY,
    value       TEXT         NOT NULL,
    updated_at  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

/** The address saved in the admin, or '' if none (or the database is unreachable). */
function vdx_contact_setting(?PDO $pdo = null): string {
    $pdo = $pdo ?? st_db();
    if (!$pdo) return '';
    try {
        $q = $pdo->prepare("SELECT value FROM site_settings WHERE skey = 'contact_email'");
        $q->execute();
        $v = (string)($q->fetchColumn() ?: '');
        return filter_var($v, FILTER_VALIDATE_EMAIL) ? $v : '';
    } catch (Throwable $e) {
        return '';                       // table not created yet: nothing saved in the admin
    }
}

/** The address given at install, or ''. */
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
    $pdo->exec(CONTACT_SETTINGS_SQL);
    if ($email === '') {
        $pdo->prepare("DELETE FROM site_settings WHERE skey = 'contact_email'")->execute();
    } else {
        $pdo->prepare("INSERT INTO site_settings (skey, value) VALUES ('contact_email', ?)
                       ON DUPLICATE KEY UPDATE value = VALUES(value)")->execute([$email]);
    }
    return true;
}

/**
 * Send one enquiry. $f has name, company, email, topic, message — already
 * trimmed and length-limited by the caller. Returns true only if PHP's mailer
 * accepted it; whether it then reaches the inbox is up to the mail server.
 */
function vdx_send_enquiry(string $to, array $f, bool $isTest = false): bool {
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

    // Nothing a visitor typed goes into a header except a validated address.
    $headers = ['From: Vindex website <noreply@' . $host . '>',
                'MIME-Version: 1.0',
                'Content-Type: text/plain; charset=UTF-8',
                'Content-Transfer-Encoding: 8bit',
                'X-Mailer: Vindex contact form'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) array_splice($headers, 1, 0, 'Reply-To: ' . $email);

    // RFC 2047: short encoded words of whole characters, so Danish letters survive.
    $encodedSubject = implode(' ', array_map(
        fn($chunk) => '=?UTF-8?B?' . base64_encode($chunk) . '?=',
        mb_str_split($subject, 12, 'UTF-8')));
    return @mail($to, $encodedSubject, $body, implode("\r\n", $headers));
}
