<?php
// megastack.sh — booking email proxy
// Receives POST from the booking modal, forwards to Resend API

header('Access-Control-Allow-Origin: https://megastack.sh');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
if (!$input) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON']);
    exit;
}

// Sanitise inputs
function s($v) { return htmlspecialchars(trim((string)($v ?? '')), ENT_QUOTES, 'UTF-8'); }

$name   = s($input['name']   ?? '');
$org    = s($input['org']    ?? '');
$email  = s($input['email']  ?? '');
$signal = s($input['signal'] ?? '');
$day    = s($input['day']    ?? '');
$plat   = s($input['plat']   ?? '');
$ctx    = s($input['ctx']    ?? '');

if (!$name || !$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

$htmlBody = "
<h2 style='color:#E5000A;font-family:sans-serif'>New megastack.sh booking</h2>
<table style='font-family:sans-serif;border-collapse:collapse;font-size:14px'>
  <tr><td style='padding:6px 20px 6px 0;color:#888;font-weight:600'>Name</td><td><strong>{$name}</strong></td></tr>
  <tr><td style='padding:6px 20px 6px 0;color:#888;font-weight:600'>Organisation</td><td>" . ($org ?: '—') . "</td></tr>
  <tr><td style='padding:6px 20px 6px 0;color:#888;font-weight:600'>Email</td><td>{$email}</td></tr>
  <tr><td style='padding:6px 20px 6px 0;color:#888;font-weight:600'>Signal / Matrix</td><td>" . ($signal ?: '—') . "</td></tr>
  <tr><td style='padding:6px 20px 6px 0;color:#888;font-weight:600'>Preferred day</td><td><strong style='color:#E5000A'>{$day}</strong></td></tr>
  <tr><td style='padding:6px 20px 6px 0;color:#888;font-weight:600'>Call platform</td><td>{$plat}</td></tr>
</table>
<h3 style='font-family:sans-serif;margin-top:20px'>Context</h3>
<p style='font-family:sans-serif;font-size:14px;color:#444'>" . ($ctx ?: '—') . "</p>
";

$textBody = "New megastack.sh booking\n\n"
    . "Name: {$name}\nOrg: " . ($org ?: '—') . "\nEmail: {$email}\n"
    . "Signal/Matrix: " . ($signal ?: '—') . "\nPreferred day: {$day}\n"
    . "Call platform: {$plat}\n\nContext:\n" . ($ctx ?: '—');

$orgPart = $org ? " ({$org})" : '';
$payload = json_encode([
    'from'     => 'lead@megastack.sh',
    'to'       => ['hello@paulfleury.com'],
    'reply_to' => $email,
    'subject'  => "[megastack.sh] New booking — {$name}{$orgPart} — {$day}",
    'html'     => $htmlBody,
    'text'     => $textBody,
]);

$ch = curl_init('https://api.resend.com/emails');
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $payload,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => [
        'Authorization: Bearer RESEND_KEY_REDACTED',
        'Content-Type: application/json',
    ],
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

http_response_code($httpCode);
echo $response;
