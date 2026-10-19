<?php
// Generated from cases.html by tools/build_sitetext.py.
// Wording comes from inc/sitetext-defaults.php plus any edits made in
// the members admin under "Website text". Edit layout here, text there.
require __DIR__ . '/inc/sitetext.php';
st_page('cases');
?><!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= st_plain('cases._title', 'en') ?></title>
<meta name="description" content="<?= st_plain('cases._meta', 'en') ?>">
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
      <li><a href="cases.php" class="active" data-en="<?= st_attr('shared.cases', 'en') ?>" data-da="<?= st_attr('shared.cases', 'da') ?>"><?= st_html('shared.cases', 'en') ?></a></li>
      <li><a href="about.php" data-en="<?= st_attr('shared.about', 'en') ?>" data-da="<?= st_attr('shared.about', 'da') ?>"><?= st_html('shared.about', 'en') ?></a></li>
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
    <div class="breadcrumb"><a href="index.php" data-en="<?= st_attr('cases.home', 'en') ?>" data-da="<?= st_attr('cases.home', 'da') ?>"><?= st_html('cases.home', 'en') ?></a> / <span data-en="<?= st_attr('cases.cases', 'en') ?>" data-da="<?= st_attr('cases.cases', 'da') ?>"><?= st_html('cases.cases', 'en') ?></span></div>
    <span class="eyebrow" data-en="<?= st_attr('cases.client-examples', 'en') ?>" data-da="<?= st_attr('cases.client-examples', 'da') ?>"><?= st_html('cases.client-examples', 'en') ?></span>
    <div class="accent-rule"></div>
    <h1 data-en="<?= st_attr('cases.real-operations-teams-working-with-vindex', 'en') ?>" data-da="<?= st_attr('cases.real-operations-teams-working-with-vindex', 'da') ?>"><?= st_html('cases.real-operations-teams-working-with-vindex', 'en') ?></h1>
    <p data-en="<?= st_attr('cases.a-written-summary-for-every-engagement', 'en') ?>" data-da="<?= st_attr('cases.a-written-summary-for-every-engagement', 'da') ?>"><?= st_html('cases.a-written-summary-for-every-engagement', 'en') ?></p>
  </div>
</section>

<section class="blk" style="padding-top:36px">
  <div class="wrap">
    <div class="case-grid">
      <div class="case reveal"><div class="media"><span class="tag" data-en="<?= st_attr('cases.video-ready', 'en') ?>" data-da="<?= st_attr('cases.video-ready', 'da') ?>"><?= st_html('cases.video-ready', 'en') ?></span><span class="play"><svg width="18" height="18" viewBox="0 0 24 24" fill="#fff"><path d="M8 5v14l11-7z"/></svg></span></div><div class="body"><h3>Nordvest Group</h3><p data-en="<?= st_attr('cases.rolled-out-an-ai-operations-knowledge', 'en') ?>" data-da="<?= st_attr('cases.rolled-out-an-ai-operations-knowledge', 'da') ?>"><?= st_html('cases.rolled-out-an-ai-operations-knowledge', 'en') ?></p><div class="meta" data-en="<?= st_attr('cases.manufacturing-120-employees', 'en') ?>" data-da="<?= st_attr('cases.manufacturing-120-employees', 'da') ?>"><?= st_html('cases.manufacturing-120-employees', 'en') ?></div></div></div>
      <div class="case reveal"><div class="media"><span class="tag" data-en="<?= st_attr('cases.video-ready-2', 'en') ?>" data-da="<?= st_attr('cases.video-ready-2', 'da') ?>"><?= st_html('cases.video-ready-2', 'en') ?></span><span class="play"><svg width="18" height="18" viewBox="0 0 24 24" fill="#fff"><path d="M8 5v14l11-7z"/></svg></span></div><div class="body"><h3>Kvist &amp; Co</h3><p data-en="<?= st_attr('cases.gave-40-employees-a-focused-curated', 'en') ?>" data-da="<?= st_attr('cases.gave-40-employees-a-focused-curated', 'da') ?>"><?= st_html('cases.gave-40-employees-a-focused-curated', 'en') ?></p><div class="meta" data-en="<?= st_attr('cases.logistics-40-employees', 'en') ?>" data-da="<?= st_attr('cases.logistics-40-employees', 'da') ?>"><?= st_html('cases.logistics-40-employees', 'en') ?></div></div></div>
      <div class="case reveal"><div class="media"><span class="tag" data-en="<?= st_attr('cases.video-ready-3', 'en') ?>" data-da="<?= st_attr('cases.video-ready-3', 'da') ?>"><?= st_html('cases.video-ready-3', 'en') ?></span><span class="play"><svg width="18" height="18" viewBox="0 0 24 24" fill="#fff"><path d="M8 5v14l11-7z"/></svg></span></div><div class="body"><h3>Aalborg Partners</h3><p data-en="<?= st_attr('cases.a-bilingual-en-da-rollout-across', 'en') ?>" data-da="<?= st_attr('cases.a-bilingual-en-da-rollout-across', 'da') ?>"><?= st_html('cases.a-bilingual-en-da-rollout-across', 'en') ?></p><div class="meta" data-en="<?= st_attr('cases.advisory-25-employees', 'en') ?>" data-da="<?= st_attr('cases.advisory-25-employees', 'da') ?>"><?= st_html('cases.advisory-25-employees', 'en') ?></div></div></div>
      <div class="case reveal"><div class="media"><span class="tag" data-en="<?= st_attr('cases.video-ready-4', 'en') ?>" data-da="<?= st_attr('cases.video-ready-4', 'da') ?>"><?= st_html('cases.video-ready-4', 'en') ?></span><span class="play"><svg width="18" height="18" viewBox="0 0 24 24" fill="#fff"><path d="M8 5v14l11-7z"/></svg></span></div><div class="body"><h3>Helix Operations</h3><p data-en="<?= st_attr('cases.consolidated-onboarding-into-curated-employee-modules', 'en') ?>" data-da="<?= st_attr('cases.consolidated-onboarding-into-curated-employee-modules', 'da') ?>"><?= st_html('cases.consolidated-onboarding-into-curated-employee-modules', 'en') ?></p><div class="meta" data-en="<?= st_attr('cases.services-80-employees', 'en') ?>" data-da="<?= st_attr('cases.services-80-employees', 'da') ?>"><?= st_html('cases.services-80-employees', 'en') ?></div></div></div>
      <div class="case reveal"><div class="media"><span class="tag" data-en="<?= st_attr('cases.video-ready-5', 'en') ?>" data-da="<?= st_attr('cases.video-ready-5', 'da') ?>"><?= st_html('cases.video-ready-5', 'en') ?></span><span class="play"><svg width="18" height="18" viewBox="0 0 24 24" fill="#fff"><path d="M8 5v14l11-7z"/></svg></span></div><div class="body"><h3>Meridian Group</h3><p data-en="<?= st_attr('cases.adopted-the-17-module-framework-unchanged', 'en') ?>" data-da="<?= st_attr('cases.adopted-the-17-module-framework-unchanged', 'da') ?>"><?= st_html('cases.adopted-the-17-module-framework-unchanged', 'en') ?></p><div class="meta" data-en="<?= st_attr('cases.consulting-60-employees', 'en') ?>" data-da="<?= st_attr('cases.consulting-60-employees', 'da') ?>"><?= st_html('cases.consulting-60-employees', 'en') ?></div></div></div>
      <div class="case reveal"><div class="media"><span class="tag" style="background:rgba(142,160,178,.2);border-color:rgba(142,160,178,.3);color:#cdd8e2" data-en="<?= st_attr('cases.coming-soon', 'en') ?>" data-da="<?= st_attr('cases.coming-soon', 'da') ?>"><?= st_html('cases.coming-soon', 'en') ?></span></div><div class="body"><h3 data-en="<?= st_attr('cases.your-team-here', 'en') ?>" data-da="<?= st_attr('cases.your-team-here', 'da') ?>"><?= st_html('cases.your-team-here', 'en') ?></h3><p data-en="<?= st_attr('cases.this-is-where-your-own-case', 'en') ?>" data-da="<?= st_attr('cases.this-is-where-your-own-case', 'da') ?>"><?= st_html('cases.this-is-where-your-own-case', 'en') ?></p><div class="meta"><a href="contact.php" data-en="<?= st_attr('cases.get-in-touch', 'en') ?>" data-da="<?= st_attr('cases.get-in-touch', 'da') ?>"><?= st_html('cases.get-in-touch', 'en') ?></a></div></div></div>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="wrap"><div class="cta-box reveal">
    <h2 data-en="<?= st_attr('cases.want-your-engagement-featured-here', 'en') ?>" data-da="<?= st_attr('cases.want-your-engagement-featured-here', 'da') ?>"><?= st_html('cases.want-your-engagement-featured-here', 'en') ?></h2>
    <p data-en="<?= st_attr('cases.we-ll-capture-the-summary-now', 'en') ?>" data-da="<?= st_attr('cases.we-ll-capture-the-summary-now', 'da') ?>"><?= st_html('cases.we-ll-capture-the-summary-now', 'en') ?></p>
    <a class="btn btn-white" href="contact.php" data-en="<?= st_attr('cases.talk-to-us', 'en') ?>" data-da="<?= st_attr('cases.talk-to-us', 'da') ?>"><?= st_html('cases.talk-to-us', 'en') ?></a>
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
