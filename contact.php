<?php
/**
 * Contact form handler for the public site.
 *
 * Receives the form from contact.html and emails it to the address entered
 * during the members-area install (stored in members/private/vindex-secrets.php
 * as contact_email). Answers in JSON so the page can say honestly whether the
 * message went — it never shows "received" for a message that was not sent.
 */
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

function reply(bool $ok, string $code, int $status = 200): void {
    http_response_code($status);
    echo json_encode(['ok' => $ok, 'code' => $code]);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') reply(false, 'method', 405);

// Where messages go. Set by the members installer; nothing to edit here.
$to = '';
$secrets = __DIR__ . '/members/private/vindex-secrets.php';
if (is_file($secrets)) {
    $cfg = require $secrets;
    if (is_array($cfg) && !empty($cfg['contact_email'])
        && filter_var($cfg['contact_email'], FILTER_VALIDATE_EMAIL)) {
        $to = $cfg['contact_email'];
    }
}
if ($to === '') reply(false, 'not_configured', 503);

// Spam trap: a field people never see. Bots fill everything in. Pretend
// success so they learn nothing, but send nothing.
if (trim((string)($_POST['website'] ?? '')) !== '') reply(true, 'ok');

$field = function (string $k, int $max): string {
    $v = trim((string)($_POST[$k] ?? ''));
    $v = str_replace("\0", '', $v);
    return mb_substr($v, 0, $max);
};
// Single-line fields lose any line breaks, so nothing a visitor types can
// start a new line in the email that looks like a header or a separator.
$flat    = fn(string $s) => trim(preg_replace('/[\r\n\t]+/', ' ', $s));
$name    = $flat($field('name', 120));
$company = $flat($field('company', 160));
$email   = $flat($field('email', 200));
$topic   = $flat($field('topic', 80));
$message = $field('message', 5000);

if ($name === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    reply(false, 'invalid', 422);
}

// Nothing a visitor typed goes into a mail header except a validated address,
// and even that has line breaks stripped — no header injection.
$oneLine = fn(string $s) => preg_replace('/[\r\n]+/', ' ', $s);
$host = preg_replace('/^www\./i', '', preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? 'localhost'));
$host = preg_replace('/[^a-z0-9.\-]/i', '', $host) ?: 'localhost';

$subject = 'Website enquiry from ' . mb_substr($name, 0, 60) . ($company !== '' ? ' (' . mb_substr($company, 0, 60) . ')' : '');
$body = "New message from the contact form on {$host}\n"
      . str_repeat('-', 48) . "\n"
      . "Name:    {$name}\n"
      . "Company: " . ($company !== '' ? $company : '-') . "\n"
      . "Email:   {$email}\n"
      . "Topic:   " . ($topic !== '' ? $topic : '-') . "\n"
      . str_repeat('-', 48) . "\n\n"
      . $message . "\n\n"
      . str_repeat('-', 48) . "\n"
      . "Reply to this email to answer them directly.\n";

$headers = implode("\r\n", [
    'From: Vindex website <noreply@' . $host . '>',
    'Reply-To: ' . $oneLine($email),
    'MIME-Version: 1.0',
    'Content-Type: text/plain; charset=UTF-8',
    'Content-Transfer-Encoding: 8bit',
    'X-Mailer: Vindex contact form',
]);

// RFC 2047 caps each encoded word at 75 characters. Encode in short runs of
// whole characters (never splitting a Danish letter across two words) and
// join them with spaces, which mail readers glue back together.
$encodedSubject = implode(' ', array_map(
    fn($chunk) => '=?UTF-8?B?' . base64_encode($chunk) . '?=',
    mb_str_split($subject, 12, 'UTF-8')));
$sent = @mail($to, $encodedSubject, $body, $headers);

reply($sent, $sent ? 'ok' : 'send_failed', $sent ? 200 : 502);
