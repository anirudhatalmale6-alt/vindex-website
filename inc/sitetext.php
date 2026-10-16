<?php
/**
 * Editable public-site text.
 *
 * Every page asks for its wording by key. The answer is whatever was saved in
 * the members admin under "Website text", or — if nothing was — the original
 * wording in sitetext-defaults.php. So the site is complete with an empty
 * table, and "Reset" in the admin simply deletes the saved edit.
 *
 * Text is written in a small, safe markup rather than HTML:
 *     **bold**      ==cyan highlight==      [link text](https://…)
 * Everything else is escaped. A blank line or line break becomes a line break.
 *
 * If the database cannot be reached the pages still render, with the original
 * wording — a public site should not go blank because MySQL had a bad minute.
 * The failure is written to the PHP error log so it does not pass silently.
 */

const ST_TABLE_SQL = "CREATE TABLE IF NOT EXISTS site_text (
    skey        VARCHAR(160) NOT NULL PRIMARY KEY,
    en          MEDIUMTEXT   NOT NULL,
    da          MEDIUMTEXT   NOT NULL,
    updated_at  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    updated_by  INT          NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

function st_defaults(): array {
    static $d = null;
    if ($d === null) $d = require __DIR__ . '/sitetext-defaults.php';
    return $d;
}

/** PDO from the members area, or null if it is not installed or not reachable. */
function st_db(): ?PDO {
    static $pdo = false;
    if ($pdo !== false) return $pdo;
    $pdo = null;
    $dbFile = __DIR__ . '/../members/lib/db.php';
    if (!is_file($dbFile)) return null;
    try {
        require_once $dbFile;
        if (defined('SECRETS_LOADED') && !SECRETS_LOADED) return null;   // members not installed yet
        $pdo = db();
    } catch (Throwable $e) {
        error_log('[vindex sitetext] database unavailable, showing original wording: ' . $e->getMessage());
        $pdo = null;
    }
    return $pdo;
}

/** Saved edits, keyed by text key. Loaded once per page view. */
function st_overrides(?string $page = null): array {
    static $cache = [];
    $ck = $page ?? '*';
    if (isset($cache[$ck])) return $cache[$ck];
    $out = [];
    $pdo = st_db();
    if ($pdo) {
        try {
            if ($page === null) {
                $rows = $pdo->query('SELECT skey, en, da FROM site_text')->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $q = $pdo->prepare('SELECT skey, en, da FROM site_text WHERE skey LIKE ? OR skey LIKE ?');
                $q->execute([$page . '.%', 'shared.%']);
                $rows = $q->fetchAll(PDO::FETCH_ASSOC);
            }
            foreach ($rows as $r) $out[$r['skey']] = $r;
        } catch (Throwable $e) {
            // Usually: the table does not exist yet because nothing has been
            // saved. That is the normal state of a fresh site, not an error.
            if (stripos($e->getMessage(), "doesn't exist") === false) {
                error_log('[vindex sitetext] could not read saved text: ' . $e->getMessage());
            }
        }
    }
    return $cache[$ck] = $out;
}

/** Called at the top of each page: preloads that page's saved edits. */
function st_page(string $page): void {
    $GLOBALS['__st_page'] = $page;
    st_overrides($page);
}

function st_value(string $key, string $lang = 'en'): string {
    $d = st_defaults();
    if (!isset($d[$key])) {
        error_log("[vindex sitetext] unknown text key: $key");
        return '';
    }
    if ($d[$key]['kind'] === 'seo') $lang = 'en';      // titles and descriptions are single-language
    $lang = $lang === 'da' ? 'da' : 'en';
    $o = st_overrides($GLOBALS['__st_page'] ?? null)[$key] ?? null;
    if ($o !== null && $o[$lang] !== '') return $o[$lang];
    return $d[$key][$lang] !== '' ? $d[$key][$lang] : $d[$key]['en'];
}

/** Is a link target safe to put in href? No javascript:, data:, etc. */
function st_safe_url(string $url): bool {
    if ($url === '' || $url[0] === '#' || $url[0] === '/') return true;
    if (preg_match('~^(https?:|mailto:|tel:)~i', $url)) return true;
    return (bool)preg_match('~^[a-z0-9_\-./]+(\?[^\s]*)?(#[^\s]*)?$~i', $url) && strpos($url, ':') === false;
}

/** The editor's markup -> safe HTML. */
function st_render(string $s): string {
    $h = htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
    $h = preg_replace_callback('/\[([^\]\n]+)\]\(([^)\s]+)\)/', function ($m) {
        $url = html_entity_decode($m[2], ENT_QUOTES, 'UTF-8');
        if (!st_safe_url($url)) return $m[0];
        return '<a href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '">' . $m[1] . '</a>';
    }, $h);
    $h = preg_replace('/\*\*(.+?)\*\*/s', '<b>$1</b>', $h);
    $h = preg_replace('/==(.+?)==/s', '<span class="grad">$1</span>', $h);
    $h = str_replace(["\r\n", "\r", "\n"], '<br>', trim($h));
    return $h;
}

function st_html(string $key, string $lang = 'en'): string  { return st_render(st_value($key, $lang)); }
function st_attr(string $key, string $lang = 'en'): string  { return htmlspecialchars(st_html($key, $lang), ENT_QUOTES, 'UTF-8'); }
function st_plain(string $key, string $lang = 'en'): string { return htmlspecialchars(st_value($key, $lang), ENT_QUOTES, 'UTF-8'); }

/* ------------------------------------------------------------------ admin */

function st_ensure_table(PDO $pdo): void { $pdo->exec(ST_TABLE_SQL); }

/**
 * Save one field. Saving the original wording removes the edit instead, so
 * the table only ever holds real changes and "is this edited?" stays honest.
 */
function st_save(PDO $pdo, string $key, string $en, string $da, ?int $userId): string {
    $d = st_defaults();
    if (!isset($d[$key])) return 'unknown';
    $clean = fn($s) => mb_substr(str_replace("\0", '', preg_replace('/\r\n?/', "\n", trim($s))), 0, 4000);
    $en = $clean($en); $da = $clean($da);
    if ($d[$key]['kind'] === 'seo') $da = '';
    if ($en === '') $en = $d[$key]['en'];                 // an emptied box means "back to original"
    if ($d[$key]['kind'] !== 'seo' && $da === '') $da = $d[$key]['da'];
    if ($en === $d[$key]['en'] && $da === $d[$key]['da']) {
        $pdo->prepare('DELETE FROM site_text WHERE skey = ?')->execute([$key]);
        return 'original';
    }
    $pdo->prepare('INSERT INTO site_text (skey, en, da, updated_by) VALUES (?,?,?,?)
                   ON DUPLICATE KEY UPDATE en = VALUES(en), da = VALUES(da), updated_by = VALUES(updated_by)')
        ->execute([$key, $en, $da, $userId]);
    return 'saved';
}

function st_reset(PDO $pdo, string $key): void {
    $pdo->prepare('DELETE FROM site_text WHERE skey = ?')->execute([$key]);
}

/** Admin's view of one page: defaults in order, each with its saved edit if any. */
function st_admin_fields(PDO $pdo, string $page): array {
    st_ensure_table($pdo);
    $saved = [];
    foreach ($pdo->query('SELECT skey, en, da, updated_at FROM site_text')->fetchAll(PDO::FETCH_ASSOC) as $r) $saved[$r['skey']] = $r;
    $fields = [];
    foreach (st_defaults() as $k => $d) {
        if ($d['page'] !== $page) continue;
        $fields[$k] = $d + ['saved' => $saved[$k] ?? null];
    }
    uasort($fields, fn($a, $b) => $a['order'] <=> $b['order']);
    return $fields;
}

function st_pages(): array {
    return ['index' => 'Landing page', 'about' => 'About', 'cases' => 'Cases',
            'platform' => 'Platform', 'contact' => 'Contact', 'shared' => 'Menu & footer'];
}
