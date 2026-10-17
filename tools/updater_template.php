<?php
/**
 * Vindex one-time updater — version %%VERSION%%
 *
 * Upload this file into your MAIN website folder (the one that contains the
 * "members" folder), then open it in your browser. It shows exactly what it
 * will change. Nothing happens until you press "Apply update". Afterwards it
 * deletes itself.
 *
 * What it never touches: members/private/ (your database settings, encryption
 * key and install lock). On an installed site it never brings back
 * members/install.php.
 */
declare(strict_types=1);
header('X-Robots-Tag: noindex, nofollow');
header('Cache-Control: no-store, private');
header('Content-Type: text/html; charset=utf-8');

const UPD_TOKEN    = '%%TOKEN%%';
const UPD_VERSION  = '%%VERSION%%';
const MAX_AGE_DAYS = 3;
const STRAY_DIRS   = ['vindex-upload', 'vindex-upload-v2', 'vindex-upload-v3'];
const OLD_HTML     = ['index.html', 'about.html', 'cases.html', 'platform.html', 'contact.html'];

$FILES = [
%%PAYLOAD%%
];

$ROOT = __DIR__;
function h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

/** Delete a folder and everything in it — only ever inside this site, never through a link. */
function upd_rrmdir(string $dir, string $root): bool {
    $real = realpath($dir); $rroot = realpath($root);
    if ($real === false || $rroot === false || !str_starts_with($real, $rroot . DIRECTORY_SEPARATOR)) return false;
    $it = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($real, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($it as $f) {
        $p = $f->getPathname();
        if ($f->isLink() || !$f->isDir()) { if (!@unlink($p)) return false; }
        elseif (!@rmdir($p)) return false;
    }
    return @rmdir($real);
}

function upd_is_empty_dir(string $d): bool {
    foreach (new FilesystemIterator($d) as $_) return false;
    return true;
}

/* -------------------------------------------------------------- safety */
$stop = '';
if (filemtime(__FILE__) < time() - MAX_AGE_DAYS * 86400) {
    @unlink(__FILE__);
    $stop = 'This updater is more than ' . MAX_AGE_DAYS . ' days old, so it has deleted itself without changing anything. Ask for a fresh one.';
} elseif (preg_match('~[/\\\\]vindex-upload[^/\\\\]*$~', $ROOT)) {
    $stop = 'This file is inside the "' . basename($ROOT) . '" folder. Move it to your MAIN website folder — the one that contains the "members" folder — and open it again.';
} elseif (!is_dir($ROOT . '/members')) {
    $stop = 'There is no "members" folder next to this file. Upload it to your MAIN website folder — the one that contains the "members" folder — and open it again.';
} elseif (!is_writable($ROOT)) {
    $stop = 'This folder cannot be written to, so nothing can be updated. Nothing has been changed.';
}

$installed = is_file($ROOT . '/members/private/vindex-secrets.php');

/* ---------------------------------------------------------------- plan */
$plan = [];
foreach ($FILES as $path => $b64) {
    if (str_starts_with($path, 'members/private/')) continue;
    if ($path === 'members/install.php' && $installed) continue;   // already installed: not needed, not wanted
    $data = base64_decode($b64, true);
    $target = $ROOT . '/' . $path;
    $state = !is_file($target) ? 'new' : (sha1_file($target) === sha1($data) ? 'same' : 'update');
    $plan[$path] = ['data' => $data, 'state' => $state];
}

$cleanup = [];
foreach (OLD_HTML as $f) {
    if (is_file($ROOT . '/' . $f)) $cleanup[] = ['kind' => 'file', 'name' => $f, 'ok' => true,
        'why' => 'old page, replaced by ' . substr($f, 0, -5) . '.php'];
}
foreach (STRAY_DIRS as $d) {
    $p = $ROOT . '/' . $d;
    if (!is_dir($p) || is_link($p)) continue;
    $installedCopy = is_file($p . '/members/private/vindex-secrets.php');
    $looksOurs = is_dir($p . '/members') || is_file($p . '/index.php') || is_dir($p . '/assets') || is_file($p . '/index.html');
    if ($installedCopy) {
        $cleanup[] = ['kind' => 'dir', 'name' => $d . '/', 'ok' => false,
            'why' => 'KEPT — it contains an installed members area with its own settings. Ask Ani before removing it.'];
    } elseif ($looksOurs || upd_is_empty_dir($p)) {
        $cleanup[] = ['kind' => 'dir', 'name' => $d . '/', 'ok' => true,
            'why' => 'extra copy left by File Manager (never installed)'];
    } else {
        $cleanup[] = ['kind' => 'dir', 'name' => $d . '/', 'ok' => false,
            'why' => 'KEPT — it contains files this updater does not recognise.'];
    }
}

/* --------------------------------------------------------------- apply */
$done = null;
if ($stop === '' && ($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    if (!hash_equals(UPD_TOKEN, (string)($_POST['token'] ?? ''))) {
        $stop = 'That request did not come from this page. Nothing has been changed.';
    } else {
        $done = ['written' => 0, 'same' => 0, 'failed' => [], 'removed' => [], 'kept' => []];
        foreach ($plan as $path => $f) {
            if ($f['state'] === 'same') { $done['same']++; continue; }
            $target = $ROOT . '/' . $path;
            $dir = dirname($target);
            if (!is_dir($dir) && !@mkdir($dir, 0755, true)) { $done['failed'][] = $path; continue; }
            $tmp = $target . '.upd-' . bin2hex(random_bytes(4));
            if (@file_put_contents($tmp, $f['data']) === false || !@rename($tmp, $target)) {
                @unlink($tmp); $done['failed'][] = $path; continue;
            }
            // Drop PHP's cached compiled copy so old and new files are never
            // mixed: a new page calling a function its cached old helper lacks
            // is a fatal error until the cache next re-checks the file.
            if (function_exists('opcache_invalidate') && str_ends_with($path, '.php')) @opcache_invalidate($target, true);
            $done['written']++;
        }
        if (function_exists('opcache_reset')) @opcache_reset();
        // Only tidy up once every file is safely in place.
        if (!$done['failed']) {
            foreach ($cleanup as $c) {
                if (!$c['ok']) { $done['kept'][] = $c['name']; continue; }
                $p = $ROOT . '/' . rtrim($c['name'], '/');
                $ok = $c['kind'] === 'dir' ? upd_rrmdir($p, $ROOT) : @unlink($p);
                if ($ok) $done['removed'][] = $c['name']; else $done['kept'][] = $c['name'] . ' (could not be deleted)';
            }
        }
        $done['self_deleted'] = !$done['failed'] && @unlink(__FILE__);
    }
}

$counts = array_count_values(array_map(fn($f) => $f['state'], $plan));
?><!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex,nofollow"><title>Vindex — update</title>
<style>
:root{--bg:#080c12;--card:#0f151e;--line:#1e2a38;--ink:#e9f0f7;--muted:#8ea0b2;--acc:#22d3ee;--bad:#f87171;--ok:#34d399}
*{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--ink);font:15px/1.6 system-ui,-apple-system,Segoe UI,sans-serif}
.wrap{max-width:760px;margin:0 auto;padding:32px 18px}h1{font-size:26px;margin:0 0 6px}.muted{color:var(--muted)}
.card{background:var(--card);border:1px solid var(--line);border-radius:14px;padding:18px 20px;margin:16px 0}
.card h2{font-size:15px;margin:0 0 10px;color:var(--acc);text-transform:uppercase;letter-spacing:.06em}
ul{margin:0;padding-left:20px}li{margin:3px 0}code{background:#131b26;border:1px solid var(--line);border-radius:6px;padding:0 6px;font-size:13px}
.btn{display:inline-block;background:var(--acc);color:#04121a;border:0;border-radius:10px;padding:12px 22px;font-weight:700;font-size:15px;cursor:pointer;text-decoration:none}
.bad{color:var(--bad)}.ok{color:var(--ok)}.pill{display:inline-block;border:1px solid var(--line);border-radius:999px;padding:1px 9px;font-size:12px;color:var(--muted);margin-left:6px}
details summary{cursor:pointer;color:var(--muted)}
</style></head><body><div class="wrap">
<h1>Vindex update</h1><div class="muted">Version <?= h(UPD_VERSION) ?></div>

<?php if ($stop !== ''): ?>
  <div class="card"><h2 class="bad">Stopped</h2><p><?= h($stop) ?></p></div>

<?php elseif ($done !== null): ?>
  <?php if ($done['failed']): ?>
    <div class="card"><h2 class="bad">Some files could not be written</h2>
      <p>Nothing has been tidied up, and this updater has <b>not</b> deleted itself, so you can try again. Send Ani a screenshot of this page.</p>
      <ul><?php foreach ($done['failed'] as $f): ?><li><code><?= h($f) ?></code></li><?php endforeach; ?></ul></div>
  <?php else: ?>
    <div class="card"><h2 class="ok">Done</h2>
      <p><b><?= $done['written'] ?></b> files written, <?= $done['same'] ?> were already up to date.</p>
      <?php if ($done['removed']): ?><p>Removed:</p><ul><?php foreach ($done['removed'] as $r): ?><li><code><?= h($r) ?></code></li><?php endforeach; ?></ul><?php endif; ?>
      <?php if ($done['kept']): ?><p>Left in place:</p><ul><?php foreach ($done['kept'] as $r): ?><li><code><?= h($r) ?></code></li><?php endforeach; ?></ul><?php endif; ?>
      <p><?= $done['self_deleted'] ? 'This updater has deleted itself.' : '<b class="bad">This updater could not delete itself — please delete it in File Manager.</b>' ?></p>
      <?php if (!$installed): ?><p><b>Next:</b> open <a href="members/install.php" style="color:var(--acc)">members/install.php</a> to set up the members area.</p><?php endif; ?>
      <p><a class="btn" href="./">Open your website</a></p></div>
  <?php endif; ?>

<?php else: ?>
  <p class="muted">Nothing has been changed yet. Here is exactly what pressing the button will do.</p>

  <div class="card"><h2>Your settings</h2>
    <?php if ($installed): ?>
      <p class="ok">✓ Members area is installed. Your database settings, encryption key and install lock in <code>members/private/</code> will not be touched, and the installer will not be brought back.</p>
    <?php else: ?>
      <p>The members area is not installed yet. The installer will be included, and you will open it afterwards.</p>
    <?php endif; ?>
  </div>

  <div class="card"><h2>Files</h2>
    <p><?= (int)($counts['new'] ?? 0) ?> new · <?= (int)($counts['update'] ?? 0) ?> updated · <?= (int)($counts['same'] ?? 0) ?> already up to date</p>
    <details><summary>Show the list</summary><ul>
      <?php foreach ($plan as $p => $f): if ($f['state'] === 'same') continue; ?>
        <li><code><?= h($p) ?></code><span class="pill"><?= h($f['state']) ?></span></li>
      <?php endforeach; ?></ul></details>
  </div>

  <div class="card"><h2>Tidy up</h2>
    <?php if (!$cleanup): ?><p class="muted">Nothing to tidy up.</p>
    <?php else: ?><ul>
      <?php foreach ($cleanup as $c): ?>
        <li><code><?= h($c['name']) ?></code> — <?= $c['ok'] ? 'will be deleted: ' : '' ?><?= h($c['why']) ?></li>
      <?php endforeach; ?></ul>
      <p class="muted">Tidying only happens after every file above has been written successfully.</p>
    <?php endif; ?>
  </div>

  <form method="post"><input type="hidden" name="token" value="<?= h(UPD_TOKEN) ?>">
    <button class="btn">Apply update</button></form>
<?php endif; ?>
</div></body></html>
