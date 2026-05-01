<?php
// megastack.sh — booking email proxy

header('Access-Control-Allow-Origin: https://megastack.sh');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(204); exit; }
if ($_SERVER['REQUEST_METHOD'] !== 'POST')    { http_response_code(405); echo json_encode(['error'=>'Method not allowed']); exit; }

$input = json_decode(file_get_contents('php://input'), true);
if (!$input) { http_response_code(400); echo json_encode(['error'=>'Invalid JSON']); exit; }

function s($v) { return htmlspecialchars(trim((string)($v ?? '')), ENT_QUOTES, 'UTF-8'); }

$name   = s($input['name']   ?? '');
$org    = s($input['org']    ?? '');
$email  = s($input['email']  ?? '');
$signal = s($input['signal'] ?? '');
$day    = s($input['day']    ?? '');
$plat   = s($input['plat']   ?? '');
$ctx    = s($input['ctx']    ?? '');
$ts     = date('D d M Y · H:i') . ' UTC';
$ip     = s($_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? '—');

if (!$name || !$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

$orgPart  = $org  ? " ({$org})"  : '';
$orgRow   = $org  ? "<tr><td class='lbl'>Organisation</td><td class='val'>{$org}</td></tr>" : '';
$sigRow   = $signal ? "<tr><td class='lbl'>Signal / Matrix</td><td class='val'><a href='#' style='color:#CC0008;text-decoration:none'>{$signal}</a></td></tr>" : '';
$ctxBlock = $ctx  ? "<div style='background:#f7f6f2;border-left:3px solid #CC0008;border-radius:0 4px 4px 0;padding:14px 18px;margin-top:8px;font-size:14px;color:#333;line-height:1.7'>{$ctx}</div>" : "<div style='color:#aaa;font-size:13px;font-style:italic'>No context provided</div>";

$htmlBody = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
  body{margin:0;padding:0;background:#f0ede8;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif}
  .wrap{max-width:580px;margin:32px auto;background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 2px 16px rgba(0,0,0,0.08)}
  .header{background:#000000;padding:28px 36px 24px}
  .header-logo{font-size:11px;font-weight:700;letter-spacing:0.16em;text-transform:uppercase;color:#CC0008;margin-bottom:10px;font-family:monospace}
  .header-title{font-size:22px;font-weight:700;color:#ffffff;letter-spacing:-0.02em;margin:0}
  .header-sub{font-size:12px;color:#555;margin-top:6px;font-family:monospace;letter-spacing:0.04em}
  .body{padding:28px 36px}
  .section-label{font-size:10px;font-weight:700;letter-spacing:0.18em;text-transform:uppercase;color:#CC0008;margin:0 0 12px;font-family:monospace}
  .detail-table{width:100%;border-collapse:collapse;margin-bottom:24px}
  .lbl{font-size:12px;font-weight:600;color:#999;padding:9px 16px 9px 0;vertical-align:top;white-space:nowrap;width:130px;font-family:monospace;letter-spacing:0.03em;text-transform:uppercase}
  .val{font-size:14px;color:#111;padding:9px 0;vertical-align:top;border-bottom:1px solid #f0ede8;line-height:1.5}
  .val strong{color:#111;font-weight:700}
  .val.accent{color:#CC0008;font-weight:700;font-size:15px}
  .pill{display:inline-block;background:#fff0f0;border:1px solid #ffd0d0;border-radius:4px;padding:3px 10px;font-size:12px;color:#CC0008;font-family:monospace;font-weight:600;letter-spacing:0.04em}
  .cta-row{background:#f7f6f2;border-radius:6px;padding:16px 20px;margin:8px 0 24px;display:flex;align-items:center;justify-content:space-between;gap:12px}
  .cta-row a{display:inline-block;background:#CC0008;color:#fff;text-decoration:none;font-size:13px;font-weight:700;padding:10px 20px;border-radius:4px;letter-spacing:0.02em}
  .footer{background:#f7f6f2;border-top:1px solid #e8e5e0;padding:16px 36px;font-size:11px;color:#aaa;font-family:monospace;letter-spacing:0.04em}
  .footer a{color:#CC0008;text-decoration:none}
  .divider{border:none;border-top:1px solid #f0ede8;margin:20px 0}
  @media(max-width:600px){.wrap{margin:0;border-radius:0}.header,.body{padding:20px 20px}.footer{padding:14px 20px}.lbl{width:100px}}
</style>
</head>
<body>
<div class="wrap">

  <!-- HEADER -->
  <div class="header">
    <div class="header-logo">&#9632; MEGASTACK.SH</div>
    <h1 class="header-title">New booking request</h1>
    <div class="header-sub">{$ts} &nbsp;&#183;&nbsp; {$ip}</div>
  </div>

  <!-- BODY -->
  <div class="body">

    <!-- Quick CTA -->
    <div class="cta-row">
      <div style="font-size:13px;color:#555;line-height:1.4"><strong style="color:#111">{$name}</strong> wants a secure assessment call<br><span style="font-size:12px">Preferred: <strong style="color:#CC0008">{$day}</strong> · afternoon GMT</span></div>
      <a href="mailto:{$email}">Reply now &rarr;</a>
    </div>

    <!-- Contact details -->
    <div class="section-label">Contact</div>
    <table class="detail-table">
      <tr><td class="lbl">Name</td><td class="val"><strong>{$name}</strong></td></tr>
      {$orgRow}
      <tr><td class="lbl">Email</td><td class="val"><a href="mailto:{$email}" style="color:#CC0008;text-decoration:none">{$email}</a></td></tr>
      {$sigRow}
    </table>

    <!-- Call details -->
    <div class="section-label">Call</div>
    <table class="detail-table">
      <tr><td class="lbl">Preferred day</td><td class="val accent">{$day}</td></tr>
      <tr><td class="lbl">Time</td><td class="val">Afternoon GMT &mdash; confirm exact time by message</td></tr>
      <tr><td class="lbl">Platform</td><td class="val"><span class="pill">{$plat}</span></td></tr>
    </table>

    <!-- Context -->
    <div class="section-label">What they need to protect</div>
    {$ctxBlock}

  </div>

  <!-- FOOTER -->
  <div class="footer">
    <strong style="color:#333">megastack.sh</strong> &nbsp;&#183;&nbsp;
    <a href="https://megastack.sh">megastack.sh</a> &nbsp;&#183;&nbsp;
    <a href="mailto:hi@megastack.sh">hi@megastack.sh</a>
    &nbsp;&#183;&nbsp; Sent via Resend
  </div>

</div>
</body>
</html>
HTML;

$textBody = "NEW MEGASTACK.SH BOOKING\n"
    . str_repeat('─', 40) . "\n\n"
    . "Name:          {$name}\n"
    . ($org    ? "Organisation:  {$org}\n"    : '')
    . "Email:         {$email}\n"
    . ($signal ? "Signal/Matrix: {$signal}\n" : '')
    . "\nPREFERRED CALL\n"
    . "Day:           {$day}\n"
    . "Time:          Afternoon GMT (exact TBC)\n"
    . "Platform:      {$plat}\n"
    . "\nCONTEXT\n"
    . ($ctx ?: '—') . "\n\n"
    . str_repeat('─', 40) . "\n"
    . "Received: {$ts}\n"
    . "megastack.sh\n";

$payload = json_encode([
    'from'     => 'lead@megastack.sh',
    'to'       => ['hello@paulfleury.com'],
    'reply_to' => $email,
    'subject'  => "\xF0\x9F\x93\xA1 New booking \xe2\x80\x94 {$name}{$orgPart} \xe2\x80\x94 {$day}",
    'html'     => $htmlBody,
    'text'     => $textBody,
]);

$ch = curl_init('https://api.resend.com/emails');
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $payload,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => [
        'Authorization: Bearer '.base64_decode('cmVfMTM3RHFMdDZfTW04MTVN').base64_decode('ZjhNVndCeFFvdERWaVVUdVpz'),
        'Content-Type: application/json',
    ],
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

http_response_code($httpCode);
echo $response;
