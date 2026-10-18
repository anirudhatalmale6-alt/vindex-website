<?php
/**
 * Contact form handler for the public site.
 *
 * Sends the form from contact.php to the address set in the members admin
 * (Website text → Contact form), or failing that the one given at install.
 * Answers in JSON so the page can say honestly whether the message went — it
 * never shows "received" for a message that was not sent.
 */
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

function reply(bool $ok, string $code, int $status = 200): void {
    http_response_code($status);
    echo json_encode(['ok' => $ok, 'code' => $code]);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') reply(false, 'method', 405);

require __DIR__ . '/inc/contact.php';

$to = vdx_contact_recipient();
if ($to === '') reply(false, 'not_configured', 503);

// Spam trap: a field people never see. Bots fill everything in. Pretend
// success so they learn nothing, but send nothing.
if (trim((string)($_POST['website'] ?? '')) !== '') reply(true, 'ok');

$field = function (string $k, int $max): string {
    $v = trim((string)($_POST[$k] ?? ''));
    $v = str_replace("\0", '', $v);
    return mb_substr($v, 0, $max);
};
$f = [
    'name'    => $field('name', 120),
    'company' => $field('company', 160),
    'email'   => $field('email', 200),
    'topic'   => $field('topic', 80),
    'message' => $field('message', 5000),
];

if ($f['name'] === '' || $f['message'] === '' || !filter_var($f['email'], FILTER_VALIDATE_EMAIL)) {
    reply(false, 'invalid', 422);
}

$sent = vdx_send_enquiry($to, $f);
reply($sent, $sent ? 'ok' : 'send_failed', $sent ? 200 : 502);
