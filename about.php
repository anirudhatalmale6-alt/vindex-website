<?php
// Generated from about.html by tools/build_sitetext.py.
// Wording comes from inc/sitetext-defaults.php plus any edits made in
// the members admin under "Website text". Edit layout here, text there.
require __DIR__ . '/inc/sitetext.php';
st_page('about');
?><!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= st_plain('about._title', 'en') ?></title>
<meta name="description" content="<?= st_plain('about._meta', 'en') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= st_asset('assets/styles.css') ?>">
<script>try{document.documentElement.setAttribute('data-theme',localStorage.getItem('vindex-theme')||'dark');}catch(e){document.documentElement.setAttribute('data-theme','dark');}</script>
</head>
<body>

<header>
  <nav class="wrap">
    <a class="brand" href="index.php"><span class="dot"></span>VINDEX</a>
    <ul class="nav-links">
      <li><a href="index.php" data-en="<?= st_attr('shared.home', 'en') ?>" data-da="<?= st_attr('shared.home', 'da') ?>"><?= st_html('shared.home', 'en') ?></a></li>
      <li><a href="cases.php" data-en="<?= st_attr('shared.cases', 'en') ?>" data-da="<?= st_attr('shared.cases', 'da') ?>"><?= st_html('shared.cases', 'en') ?></a></li>
      <li><a href="about.php" class="active" data-en="<?= st_attr('shared.about', 'en') ?>" data-da="<?= st_attr('shared.about', 'da') ?>"><?= st_html('shared.about', 'en') ?></a></li>
      <li><a href="platform.php" data-en="<?= st_attr('shared.platform', 'en') ?>" data-da="<?= st_attr('shared.platform', 'da') ?>"><?= st_html('shared.platform', 'en') ?></a></li>
      <li><a href="contact.php" data-en="<?= st_attr('shared.contact', 'en') ?>" data-da="<?= st_attr('shared.contact', 'da') ?>"><?= st_html('shared.contact', 'en') ?></a></li>
    </ul>
    <div class="nav-right">
      <div class="toggle" id="lang"><button data-lang="en" class="on">EN</button><button data-lang="da">DA</button></div>
      <button class="icon-btn" id="theme" aria-label="Toggle theme"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="theme-ic"></svg></button>
      <a class="btn btn-primary" href="members/login.php" data-en="<?= st_attr('shared.member-login', 'en') ?>" data-da="<?= st_attr('shared.member-login', 'da') ?>"><?= st_html('shared.member-login', 'en') ?></a>
      <button class="hamburger" id="burger" aria-label="Menu"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M3 12h18M3 18h18"/></svg></button>
    </div>
  </nav>
  <div class="mobile-menu" id="mobile-menu">
    <a href="index.php" data-en="<?= st_attr('shared.home', 'en') ?>" data-da="<?= st_attr('shared.home', 'da') ?>"><?= st_html('shared.home', 'en') ?></a>
    <a href="cases.php" data-en="<?= st_attr('shared.cases', 'en') ?>" data-da="<?= st_attr('shared.cases', 'da') ?>"><?= st_html('shared.cases', 'en') ?></a>
    <a href="about.php" data-en="<?= st_attr('shared.about', 'en') ?>" data-da="<?= st_attr('shared.about', 'da') ?>"><?= st_html('shared.about', 'en') ?></a>
    <a href="platform.php" data-en="<?= st_attr('shared.platform', 'en') ?>" data-da="<?= st_attr('shared.platform', 'da') ?>"><?= st_html('shared.platform', 'en') ?></a>
    <a href="contact.php" data-en="<?= st_attr('shared.contact', 'en') ?>" data-da="<?= st_attr('shared.contact', 'da') ?>"><?= st_html('shared.contact', 'en') ?></a>
    <a class="mm-login" href="members/login.php" data-en="<?= st_attr('shared.member-login', 'en') ?>" data-da="<?= st_attr('shared.member-login', 'da') ?>"><?= st_html('shared.member-login', 'en') ?></a>
  </div>
</header>

<section class="page-hero">
  <div class="wrap reveal">
    <div class="breadcrumb"><a href="index.php" data-en="<?= st_attr('about.home', 'en') ?>" data-da="<?= st_attr('about.home', 'da') ?>"><?= st_html('about.home', 'en') ?></a> / <span data-en="<?= st_attr('about.about', 'en') ?>" data-da="<?= st_attr('about.about', 'da') ?>"><?= st_html('about.about', 'en') ?></span></div>
    <span class="eyebrow" data-en="<?= st_attr('about.about-vindex', 'en') ?>" data-da="<?= st_attr('about.about-vindex', 'da') ?>"><?= st_html('about.about-vindex', 'en') ?></span>
    <div class="accent-rule"></div>
    <h1 data-en="<?= st_attr('about.we-keep-operations-teams-current-on', 'en') ?>" data-da="<?= st_attr('about.we-keep-operations-teams-current-on', 'da') ?>"><?= st_html('about.we-keep-operations-teams-current-on', 'en') ?></h1>
    <p data-en="<?= st_attr('about.vindex-exists-because-the-way-companies', 'en') ?>" data-da="<?= st_attr('about.vindex-exists-because-the-way-companies', 'da') ?>"><?= st_html('about.vindex-exists-because-the-way-companies', 'en') ?></p>
  </div>
</section>

<section class="blk" style="padding-top:40px">
  <div class="wrap split">
    <div class="reveal">
      <span class="eyebrow" data-en="<?= st_attr('about.our-mission', 'en') ?>" data-da="<?= st_attr('about.our-mission', 'da') ?>"><?= st_html('about.our-mission', 'en') ?></span>
      <div class="accent-rule"></div>
      <div class="prose">
        <p data-en="<?= st_attr('about.most-organisations-know-ai-matters-far', 'en') ?>" data-da="<?= st_attr('about.most-organisations-know-ai-matters-far', 'da') ?>"><?= st_html('about.most-organisations-know-ai-matters-far', 'en') ?></p>
        <p data-en="<?= st_attr('about.vindex-is-that-place-a-sterile', 'en') ?>" data-da="<?= st_attr('about.vindex-is-that-place-a-sterile', 'da') ?>"><?= st_html('about.vindex-is-that-place-a-sterile', 'en') ?></p>
      </div>
    </div>
    <div class="reveal">
      <div class="value-row"><div class="vic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div><div><h3 data-en="<?= st_attr('about.trust-first', 'en') ?>" data-da="<?= st_attr('about.trust-first', 'da') ?>"><?= st_html('about.trust-first', 'en') ?></h3><p data-en="<?= st_attr('about.security-and-clarity-before-features-the', 'en') ?>" data-da="<?= st_attr('about.security-and-clarity-before-features-the', 'da') ?>"><?= st_html('about.security-and-clarity-before-features-the', 'en') ?></p></div></div>
      <div class="value-row"><div class="vic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M2 12h20"/></svg></div><div><h3 data-en="<?= st_attr('about.always-current', 'en') ?>" data-da="<?= st_attr('about.always-current', 'da') ?>"><?= st_html('about.always-current', 'en') ?></h3><p data-en="<?= st_attr('about.knowledge-that-s-out-of-date', 'en') ?>" data-da="<?= st_attr('about.knowledge-that-s-out-of-date', 'da') ?>"><?= st_html('about.knowledge-that-s-out-of-date', 'en') ?></p></div></div>
      <div class="value-row"><div class="vic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h10M4 18h7"/></svg></div><div><h3 data-en="<?= st_attr('about.radically-simple', 'en') ?>" data-da="<?= st_attr('about.radically-simple', 'da') ?>"><?= st_html('about.radically-simple', 'en') ?></h3><p data-en="<?= st_attr('about.one-structure-two-tiers-no-clutter', 'en') ?>" data-da="<?= st_attr('about.one-structure-two-tiers-no-clutter', 'da') ?>"><?= st_html('about.one-structure-two-tiers-no-clutter', 'en') ?></p></div></div>
    </div>
  </div>
</section>

<section class="blk" style="padding-top:0">
  <div class="wrap reveal">
    <div class="stat-band">
      <div><div class="n">17</div><div class="l" data-en="<?= st_attr('about.knowledge-modules', 'en') ?>" data-da="<?= st_attr('about.knowledge-modules', 'da') ?>"><?= st_html('about.knowledge-modules', 'en') ?></div></div>
      <div><div class="n">2</div><div class="l" data-en="<?= st_attr('about.access-tiers', 'en') ?>" data-da="<?= st_attr('about.access-tiers', 'da') ?>"><?= st_html('about.access-tiers', 'en') ?></div></div>
      <div><div class="n">2</div><div class="l" data-en="<?= st_attr('about.languages-en-da', 'en') ?>" data-da="<?= st_attr('about.languages-en-da', 'da') ?>"><?= st_html('about.languages-en-da', 'en') ?></div></div>
      <div><div class="n">100%</div><div class="l" data-en="<?= st_attr('about.encrypted-in-transit', 'en') ?>" data-da="<?= st_attr('about.encrypted-in-transit', 'da') ?>"><?= st_html('about.encrypted-in-transit', 'en') ?></div></div>
    </div>
  </div>
</section>

<section class="platform blk">
  <div class="wrap center" style="max-width:720px;margin:0 auto">
    <span class="eyebrow" data-en="<?= st_attr('about.how-we-work', 'en') ?>" data-da="<?= st_attr('about.how-we-work', 'da') ?>"><?= st_html('about.how-we-work', 'en') ?></span>
    <div class="accent-rule" style="margin-left:auto;margin-right:auto"></div>
    <h2 data-en="<?= st_attr('about.built-quietly-delivered-reliably', 'en') ?>" data-da="<?= st_attr('about.built-quietly-delivered-reliably', 'da') ?>"><?= st_html('about.built-quietly-delivered-reliably', 'en') ?></h2>
    <p style="color:var(--muted);font-size:17px;margin-top:14px" data-en="<?= st_attr('about.we-keep-the-surface-calm-and', 'en') ?>" data-da="<?= st_attr('about.we-keep-the-surface-calm-and', 'da') ?>"><?= st_html('about.we-keep-the-surface-calm-and', 'en') ?></p>
  </div>
</section>

<section class="cta-band">
  <div class="wrap"><div class="cta-box reveal">
    <h2 data-en="<?= st_attr('about.let-s-build-your-knowledge-base', 'en') ?>" data-da="<?= st_attr('about.let-s-build-your-knowledge-base', 'da') ?>"><?= st_html('about.let-s-build-your-knowledge-base', 'en') ?></h2>
    <p data-en="<?= st_attr('about.tell-us-about-your-operation-and', 'en') ?>" data-da="<?= st_attr('about.tell-us-about-your-operation-and', 'da') ?>"><?= st_html('about.tell-us-about-your-operation-and', 'en') ?></p>
    <a class="btn btn-white" href="contact.php" data-en="<?= st_attr('about.get-in-touch', 'en') ?>" data-da="<?= st_attr('about.get-in-touch', 'da') ?>"><?= st_html('about.get-in-touch', 'en') ?></a>
  </div></div>
</section>

<footer>
  <div class="wrap">
    <div class="foot-grid">
      <div class="foot-brand"><a class="brand" href="index.php"><span class="dot"></span>VINDEX</a>
        <p data-en="<?= st_attr('shared.a-living-secure-knowledge-base-for', 'en') ?>" data-da="<?= st_attr('shared.a-living-secure-knowledge-base-for', 'da') ?>"><?= st_html('shared.a-living-secure-knowledge-base-for', 'en') ?></p></div>
      <div class="foot-col"><h4 data-en="<?= st_attr('shared.site', 'en') ?>" data-da="<?= st_attr('shared.site', 'da') ?>"><?= st_html('shared.site', 'en') ?></h4>
        <a href="index.php" data-en="<?= st_attr('shared.home', 'en') ?>" data-da="<?= st_attr('shared.home', 'da') ?>"><?= st_html('shared.home', 'en') ?></a><a href="cases.php" data-en="<?= st_attr('shared.cases', 'en') ?>" data-da="<?= st_attr('shared.cases', 'da') ?>"><?= st_html('shared.cases', 'en') ?></a><a href="about.php" data-en="<?= st_attr('shared.about', 'en') ?>" data-da="<?= st_attr('shared.about', 'da') ?>"><?= st_html('shared.about', 'en') ?></a><a href="platform.php" data-en="<?= st_attr('shared.platform', 'en') ?>" data-da="<?= st_attr('shared.platform', 'da') ?>"><?= st_html('shared.platform', 'en') ?></a></div>
      <div class="foot-col"><h4 data-en="<?= st_attr('shared.platform', 'en') ?>" data-da="<?= st_attr('shared.platform', 'da') ?>"><?= st_html('shared.platform', 'en') ?></h4>
        <a href="members/login.php" data-en="<?= st_attr('shared.member-login-2', 'en') ?>" data-da="<?= st_attr('shared.member-login-2', 'da') ?>"><?= st_html('shared.member-login-2', 'en') ?></a><a href="platform.php" data-en="<?= st_attr('shared.leadership-access', 'en') ?>" data-da="<?= st_attr('shared.leadership-access', 'da') ?>"><?= st_html('shared.leadership-access', 'en') ?></a><a href="platform.php" data-en="<?= st_attr('shared.employee-access', 'en') ?>" data-da="<?= st_attr('shared.employee-access', 'da') ?>"><?= st_html('shared.employee-access', 'en') ?></a><a href="contact.php" data-en="<?= st_attr('shared.contact', 'en') ?>" data-da="<?= st_attr('shared.contact', 'da') ?>"><?= st_html('shared.contact', 'en') ?></a></div>
    </div>
    <div class="foot-bot">
      <span class="domains" data-en="<?= st_attr('shared.2026-vindex-live-on-vindex-dk', 'en') ?>" data-da="<?= st_attr('shared.2026-vindex-live-on-vindex-dk', 'da') ?>"><?= st_html('shared.2026-vindex-live-on-vindex-dk', 'en') ?></span>
      <span data-en="<?= st_attr('shared.https-encrypted-gdpr-ready', 'en') ?>" data-da="<?= st_attr('shared.https-encrypted-gdpr-ready', 'da') ?>"><?= st_html('shared.https-encrypted-gdpr-ready', 'en') ?></span>
    </div>
  </div>
</footer>
<script src="<?= st_asset('assets/main.js') ?>"></script>
</body>
</html>
