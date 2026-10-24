<?php
/**
 * The parts every public page shares: <head>, the top menu, the footer, the
 * video hero, and the font choice from "Website text".
 *
 * Pages are written in Danish first. Every piece of text carries both
 * languages (data-da / data-en) and the language buttons swap between them,
 * so the page is complete in Danish before any JavaScript runs.
 */
require_once __DIR__ . '/sitetext.php';

const VDX_LANG = 'da';   // the language a page is rendered in; the toggle offers the other

/** <tag attrs data-en=".." data-da="..">Danish text</tag> for one text key. */
function el(string $tag, string $key, string $attrs = ''): string {
    // Emptied in both languages = left out of the page entirely.
    if (st_value($key, 'en') === '' && st_value($key, 'da') === '') return '';
    return '<' . $tag . ($attrs !== '' ? ' ' . $attrs : '')
         . ' data-en="' . st_attr($key, 'en') . '" data-da="' . st_attr($key, 'da') . '">'
         . st_html($key, VDX_LANG) . '</' . $tag . '>';
}

function vdx_fonts(): array {
    static $f = null;
    if ($f === null) $f = require __DIR__ . '/fonts.php';
    return $f;
}

/** The chosen font for 'head' or 'body', always one that exists. */
function vdx_font(string $which): array {
    $fonts = vdx_fonts();
    $key   = $which === 'head' ? 'shared._font_head' : 'shared._font_body';
    $slug  = st_value($key);
    if (!isset($fonts[$slug])) $slug = st_defaults()[$key]['en'];
    return $fonts[$slug] + ['slug' => $slug];
}

/** CSS variables for the chosen fonts. Values come only from fonts.php, never from the database. */
function vdx_font_css(): string {
    $h = vdx_font('head'); $b = vdx_font('body');
    // Headings want a semi-bold. Fonts that only come in one weight use that
    // weight, rather than letting the browser smear a fake bold over it.
    $hw = in_array(600, $h['weights'], true) ? 600 : (in_array(700, $h['weights'], true) ? 700 : 400);
    $bw = in_array(600, $b['weights'], true) ? 600 : (in_array(700, $b['weights'], true) ? 700 : 400);
    return ":root{--font-head:'" . $h['family'] . "',sans-serif;--font-body:'" . $b['family'] . "',-apple-system,sans-serif;"
         . "--head-weight:$hw;--body-strong:$bw}";
}

/**
 * Text sizes chosen in "Website text" for this page, as CSS variables (plain
 * numbers, always inside the min/max the setting declares). The stylesheet
 * turns them into sizes that shrink on narrow screens.
 */
function vdx_size_css(string $page): string {
    $map = ['_size_hero_title' => '--sz-ht', '_size_hero_text' => '--sz-hb', '_size_text_title' => '--sz-tt', '_size_text_body' => '--sz-tb'];
    $out = '';
    foreach ($map as $suffix => $var) {
        if (isset(st_defaults()[$page . '.' . $suffix])) $out .= $var . ':' . st_setting($page . '.' . $suffix) . ';';
    }
    return $out !== '' ? ':root{' . $out . '}' : '';
}

function vdx_head(string $page): void {
    st_page($page);
    $GLOBALS['__vdx_page'] = $page; ?>
<!DOCTYPE html>
<html lang="<?= VDX_LANG ?>" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= st_plain($page . '._title') ?></title>
<meta name="description" content="<?= st_plain($page . '._meta') ?>">
<link rel="stylesheet" href="<?= st_asset('assets/fonts/fonts.css') ?>">
<link rel="stylesheet" href="<?= st_asset('assets/styles.css') ?>">
<style><?= vdx_font_css() ?><?= vdx_size_css($page) ?></style>
<script>try{document.documentElement.setAttribute('data-theme',localStorage.getItem('vindex-theme')||'dark');}catch(e){document.documentElement.setAttribute('data-theme','dark');}</script>
</head>
<body>

<header>
  <nav class="wrap">
    <a class="brand" href="index.php"><span class="dot"></span>VINDEX</a>
    <ul class="nav-links">
<?php foreach (vdx_menu() as [$href, $key, $p]): ?>
      <li><?= el('a', $key, 'href="' . $href . '"' . ($p === $page ? ' class="active"' : '')) ?></li>
<?php endforeach; ?>
    </ul>
    <div class="nav-right">
      <div class="toggle" id="lang"><button data-lang="da" class="on">DA</button><button data-lang="en">EN</button></div>
      <button class="icon-btn" id="theme" aria-label="Toggle theme"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="theme-ic"></svg></button>
      <?= el('a', 'shared.member-login', 'class="btn btn-primary" href="members/login.php"') ?>

      <button class="hamburger" id="burger" aria-label="Menu"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M3 12h18M3 18h18"/></svg></button>
    </div>
  </nav>
  <div class="mobile-menu" id="mobile-menu">
<?php foreach (vdx_menu() as [$href, $key, $p]): ?>
    <?= el('a', $key, 'href="' . $href . '"') ?>

<?php endforeach; ?>
    <?= el('a', 'shared.member-login', 'class="mm-login" href="members/login.php"') ?>

  </div>
</header>
<?php
}

/** Pages in the menu: [link, text key, page]. Cases comes back here once there are real cases. */
function vdx_menu(): array {
    return [['index.php', 'shared.home', 'index'], ['about.php', 'shared.about', 'about'], ['contact.php', 'shared.contact', 'contact']];
}

function vdx_footer(): void { ?>
<footer>
  <div class="wrap">
    <div class="foot-grid">
      <div class="foot-brand"><a class="brand" href="index.php"><span class="dot"></span>VINDEX</a></div>
      <div class="foot-col"><?= el('h4', 'shared.site') ?>

<?php foreach (vdx_menu() as [$href, $key]): ?>
        <?= el('a', $key, 'href="' . $href . '"') ?>

<?php endforeach; ?>
      </div>
      <div class="foot-col"><?= el('h4', 'shared.platform') ?>

        <?= el('a', 'shared.member-login-2', 'href="members/login.php"') ?>

      </div>
    </div>
    <div class="foot-bot"><?= el('span', 'shared.copyright') ?></div>
  </div>
</footer>
<script src="<?= st_asset('assets/main.js') ?>"></script>
</body>
</html>
<?php
}

/**
 * Opens a full-screen hero with a video behind it, if assets/video/<name>.mp4
 * exists; otherwise a plain hero. Swap the video by replacing that file (and
 * <name>-end.jpg, its last frame, shown while it loads and to anyone who has
 * "reduce motion" on). The video plays once and rests on its last frame.
 */
function vdx_hero_open(string $page, string $name, string $extraClass = ''): void {
    $has  = is_file(__DIR__ . '/../assets/video/' . $name . '.mp4');
    $dark = st_number($page . '._video_dark', 0, 90) / 100;
    echo '<section class="hero' . ($has ? ' vhero' : '') . ($extraClass !== '' ? ' ' . $extraClass : '') . '">' . "\n";
    if ($has) {
        $poster = is_file(__DIR__ . '/../assets/video/' . $name . '-end.jpg')
            ? ' poster="' . st_asset('assets/video/' . $name . '-end.jpg') . '"' : '';
        echo '  <video class="vbg" id="hero-video" muted playsinline preload="auto" disablepictureinpicture aria-hidden="true" tabindex="-1"' . $poster . ">\n"
           . '    <source src="' . st_asset('assets/video/' . $name . '.mp4') . '" type="video/mp4">' . "\n  </video>\n"
           . '  <div class="vshade" style="--vdark:' . number_format($dark, 2, '.', '') . '"></div>' . "\n";
    } else {
        echo "  <div class=\"grid-lines\"></div>\n";
    }
}
