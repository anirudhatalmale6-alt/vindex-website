<?php
// Generated from platform.html by tools/build_sitetext.py.
// Wording comes from inc/sitetext-defaults.php plus any edits made in
// the members admin under "Website text". Edit layout here, text there.
require __DIR__ . '/inc/sitetext.php';
st_page('platform');
?><!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= st_plain('platform._title', 'en') ?></title>
<meta name="description" content="<?= st_plain('platform._meta', 'en') ?>">
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
      <li><a href="about.php" data-en="<?= st_attr('shared.about', 'en') ?>" data-da="<?= st_attr('shared.about', 'da') ?>"><?= st_html('shared.about', 'en') ?></a></li>
      <li><a href="platform.php" class="active" data-en="<?= st_attr('shared.platform', 'en') ?>" data-da="<?= st_attr('shared.platform', 'da') ?>"><?= st_html('shared.platform', 'en') ?></a></li>
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
  </div>
</header>

<section class="page-hero">
  <div class="wrap reveal">
    <div class="breadcrumb"><a href="index.php" data-en="<?= st_attr('platform.home', 'en') ?>" data-da="<?= st_attr('platform.home', 'da') ?>"><?= st_html('platform.home', 'en') ?></a> / <span data-en="<?= st_attr('platform.platform', 'en') ?>" data-da="<?= st_attr('platform.platform', 'da') ?>"><?= st_html('platform.platform', 'en') ?></span></div>
    <span class="eyebrow" data-en="<?= st_attr('platform.platform-details', 'en') ?>" data-da="<?= st_attr('platform.platform-details', 'da') ?>"><?= st_html('platform.platform-details', 'en') ?></span>
    <div class="accent-rule"></div>
    <h1 data-en="<?= st_attr('platform.a-members-platform-that-behaves-like', 'en') ?>" data-da="<?= st_attr('platform.a-members-platform-that-behaves-like', 'da') ?>"><?= st_html('platform.a-members-platform-that-behaves-like', 'en') ?></h1>
    <p data-en="<?= st_attr('platform.one-secure-login-one-admin-two', 'en') ?>" data-da="<?= st_attr('platform.one-secure-login-one-admin-two', 'da') ?>"><?= st_html('platform.one-secure-login-one-admin-two', 'en') ?></p>
  </div>
</section>

<section class="blk" style="padding-top:44px">
  <div class="wrap">
    <div class="sec-head reveal">
      <span class="eyebrow" data-en="<?= st_attr('platform.how-it-works', 'en') ?>" data-da="<?= st_attr('platform.how-it-works', 'da') ?>"><?= st_html('platform.how-it-works', 'en') ?></span>
      <div class="accent-rule"></div>
      <h2 data-en="<?= st_attr('platform.from-login-to-knowledge-in-three', 'en') ?>" data-da="<?= st_attr('platform.from-login-to-knowledge-in-three', 'da') ?>"><?= st_html('platform.from-login-to-knowledge-in-three', 'en') ?></h2>
    </div>
    <div class="steps">
      <div class="step reveal"><div class="num">1</div><h3 data-en="<?= st_attr('platform.admin-adds-users', 'en') ?>" data-da="<?= st_attr('platform.admin-adds-users', 'da') ?>"><?= st_html('platform.admin-adds-users', 'en') ?></h3><p data-en="<?= st_attr('platform.one-admin-account-creates-every-member', 'en') ?>" data-da="<?= st_attr('platform.one-admin-account-creates-every-member', 'da') ?>"><?= st_html('platform.one-admin-account-creates-every-member', 'en') ?></p></div>
      <div class="step reveal"><div class="num">2</div><h3 data-en="<?= st_attr('platform.members-log-in-securely', 'en') ?>" data-da="<?= st_attr('platform.members-log-in-securely', 'da') ?>"><?= st_html('platform.members-log-in-securely', 'en') ?></h3><p data-en="<?= st_attr('platform.each-member-signs-in-over-https', 'en') ?>" data-da="<?= st_attr('platform.each-member-signs-in-over-https', 'da') ?>"><?= st_html('platform.each-member-signs-in-over-https', 'en') ?></p></div>
      <div class="step reveal"><div class="num">3</div><h3 data-en="<?= st_attr('platform.knowledge-on-demand', 'en') ?>" data-da="<?= st_attr('platform.knowledge-on-demand', 'da') ?>"><?= st_html('platform.knowledge-on-demand', 'en') ?></h3><p data-en="<?= st_attr('platform.they-browse-the-accordion-knowledge-base', 'en') ?>" data-da="<?= st_attr('platform.they-browse-the-accordion-knowledge-base', 'da') ?>"><?= st_html('platform.they-browse-the-accordion-knowledge-base', 'en') ?></p></div>
    </div>
  </div>
</section>

<section class="platform blk">
  <div class="wrap split">
    <div class="reveal">
      <span class="eyebrow" data-en="<?= st_attr('platform.the-knowledge-base', 'en') ?>" data-da="<?= st_attr('platform.the-knowledge-base', 'da') ?>"><?= st_html('platform.the-knowledge-base', 'en') ?></span>
      <div class="accent-rule"></div>
      <h2 data-en="<?= st_attr('platform.17-modules-infinite-depth-zero-reloads', 'en') ?>" data-da="<?= st_attr('platform.17-modules-infinite-depth-zero-reloads', 'da') ?>"><?= st_html('platform.17-modules-infinite-depth-zero-reloads', 'en') ?></h2>
      <p style="color:var(--muted);font-size:16px;margin-top:12px" data-en="<?= st_attr('platform.every-module-is-a-collapsible-accordion', 'en') ?>" data-da="<?= st_attr('platform.every-module-is-a-collapsible-accordion', 'da') ?>"><?= st_html('platform.every-module-is-a-collapsible-accordion', 'en') ?></p>
      <div class="tiers">
        <div class="tier"><b data-en="<?= st_attr('platform.leadership', 'en') ?>" data-da="<?= st_attr('platform.leadership', 'da') ?>"><?= st_html('platform.leadership', 'en') ?></b><span data-en="<?= st_attr('platform.sees-all-17-modules-and-every', 'en') ?>" data-da="<?= st_attr('platform.sees-all-17-modules-and-every', 'da') ?>"><?= st_html('platform.sees-all-17-modules-and-every', 'en') ?></span></div>
        <div class="tier"><b data-en="<?= st_attr('platform.employee', 'en') ?>" data-da="<?= st_attr('platform.employee', 'da') ?>"><?= st_html('platform.employee', 'en') ?></b><span data-en="<?= st_attr('platform.sees-only-the-curated-employee-modules', 'en') ?>" data-da="<?= st_attr('platform.sees-only-the-curated-employee-modules', 'da') ?>"><?= st_html('platform.sees-only-the-curated-employee-modules', 'en') ?></span></div>
      </div>
    </div>
    <div class="acc reveal">
      <div class="acc-item open">
        <div class="acc-head"><span class="idx">01</span><span data-en="<?= st_attr('platform.ai-operating-principles', 'en') ?>" data-da="<?= st_attr('platform.ai-operating-principles', 'da') ?>"><?= st_html('platform.ai-operating-principles', 'en') ?></span><span class="lock" data-en="<?= st_attr('platform.all', 'en') ?>" data-da="<?= st_attr('platform.all', 'da') ?>"><?= st_html('platform.all', 'en') ?></span><svg class="chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg></div>
        <div class="acc-body"><div class="inner"><span data-en="<?= st_attr('platform.a-concise-overview-of-how-your', 'en') ?>" data-da="<?= st_attr('platform.a-concise-overview-of-how-your', 'da') ?>"><?= st_html('platform.a-concise-overview-of-how-your', 'en') ?></span>
          <div class="sub" data-en="<?= st_attr('platform.nested-1-1-data-handling-1', 'en') ?>" data-da="<?= st_attr('platform.nested-1-1-data-handling-1', 'da') ?>"><?= st_html('platform.nested-1-1-data-handling-1', 'en') ?></div></div></div>
      </div>
      <div class="acc-item">
        <div class="acc-head"><span class="idx">02</span><span data-en="<?= st_attr('platform.playbooks-frameworks', 'en') ?>" data-da="<?= st_attr('platform.playbooks-frameworks', 'da') ?>"><?= st_html('platform.playbooks-frameworks', 'en') ?></span><span class="lock" data-en="<?= st_attr('platform.all-2', 'en') ?>" data-da="<?= st_attr('platform.all-2', 'da') ?>"><?= st_html('platform.all-2', 'en') ?></span><svg class="chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg></div>
        <div class="acc-body"><div class="inner" data-en="<?= st_attr('platform.summaries-and-links-to-the-frameworks', 'en') ?>" data-da="<?= st_attr('platform.summaries-and-links-to-the-frameworks', 'da') ?>"><?= st_html('platform.summaries-and-links-to-the-frameworks', 'en') ?></div></div>
      </div>
      <div class="acc-item">
        <div class="acc-head"><span class="idx">03</span><span data-en="<?= st_attr('platform.team-onboarding', 'en') ?>" data-da="<?= st_attr('platform.team-onboarding', 'da') ?>"><?= st_html('platform.team-onboarding', 'en') ?></span><span class="lock" data-en="<?= st_attr('platform.employee-2', 'en') ?>" data-da="<?= st_attr('platform.employee-2', 'da') ?>"><?= st_html('platform.employee-2', 'en') ?></span><svg class="chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg></div>
        <div class="acc-body"><div class="inner" data-en="<?= st_attr('platform.day-to-day-guidance-curated-for', 'en') ?>" data-da="<?= st_attr('platform.day-to-day-guidance-curated-for', 'da') ?>"><?= st_html('platform.day-to-day-guidance-curated-for', 'en') ?></div></div>
      </div>
      <div class="acc-item">
        <div class="acc-head"><span class="idx">04</span><span data-en="<?= st_attr('platform.strategy-roadmap', 'en') ?>" data-da="<?= st_attr('platform.strategy-roadmap', 'da') ?>"><?= st_html('platform.strategy-roadmap', 'en') ?></span><span class="lock" data-en="<?= st_attr('platform.leadership-2', 'en') ?>" data-da="<?= st_attr('platform.leadership-2', 'da') ?>"><?= st_html('platform.leadership-2', 'en') ?></span><svg class="chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg></div>
        <div class="acc-body"><div class="inner" data-en="<?= st_attr('platform.confidential-strategy-visible-to-leadership-only', 'en') ?>" data-da="<?= st_attr('platform.confidential-strategy-visible-to-leadership-only', 'da') ?>"><?= st_html('platform.confidential-strategy-visible-to-leadership-only', 'en') ?></div></div>
      </div>
    </div>
  </div>
</section>

<section class="blk">
  <div class="wrap split">
    <div class="reveal">
      <span class="eyebrow" data-en="<?= st_attr('platform.security', 'en') ?>" data-da="<?= st_attr('platform.security', 'da') ?>"><?= st_html('platform.security', 'en') ?></span>
      <div class="accent-rule"></div>
      <h2 data-en="<?= st_attr('platform.bank-grade-by-default', 'en') ?>" data-da="<?= st_attr('platform.bank-grade-by-default', 'da') ?>"><?= st_html('platform.bank-grade-by-default', 'en') ?></h2>
      <p style="color:var(--muted);font-size:16px;margin-top:12px" data-en="<?= st_attr('platform.access-rules-aren-t-just-hidden', 'en') ?>" data-da="<?= st_attr('platform.access-rules-aren-t-just-hidden', 'da') ?>"><?= st_html('platform.access-rules-aren-t-just-hidden', 'en') ?></p>
    </div>
    <ul class="feat-list reveal">
      <li><span class="chk"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg></span><span><b data-en="<?= st_attr('platform.https-everywhere', 'en') ?>" data-da="<?= st_attr('platform.https-everywhere', 'da') ?>"><?= st_html('platform.https-everywhere', 'en') ?></b> <span data-en="<?= st_attr('platform.every-page-encrypted-in-transit-on', 'en') ?>" data-da="<?= st_attr('platform.every-page-encrypted-in-transit-on', 'da') ?>"><?= st_html('platform.every-page-encrypted-in-transit-on', 'en') ?></span></span></li>
      <li><span class="chk"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg></span><span><b data-en="<?= st_attr('platform.hashed-passwords', 'en') ?>" data-da="<?= st_attr('platform.hashed-passwords', 'da') ?>"><?= st_html('platform.hashed-passwords', 'en') ?></b> <span data-en="<?= st_attr('platform.strong-password-rules-nothing-stored-in', 'en') ?>" data-da="<?= st_attr('platform.strong-password-rules-nothing-stored-in', 'da') ?>"><?= st_html('platform.strong-password-rules-nothing-stored-in', 'en') ?></span></span></li>
      <li><span class="chk"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg></span><span><b data-en="<?= st_attr('platform.server-side-access-control', 'en') ?>" data-da="<?= st_attr('platform.server-side-access-control', 'da') ?>"><?= st_html('platform.server-side-access-control', 'en') ?></b> <span data-en="<?= st_attr('platform.tier-checks-run-on-the-backend', 'en') ?>" data-da="<?= st_attr('platform.tier-checks-run-on-the-backend', 'da') ?>"><?= st_html('platform.tier-checks-run-on-the-backend', 'en') ?></span></span></li>
      <li><span class="chk"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg></span><span><b data-en="<?= st_attr('platform.protected-sessions', 'en') ?>" data-da="<?= st_attr('platform.protected-sessions', 'da') ?>"><?= st_html('platform.protected-sessions', 'en') ?></b> <span data-en="<?= st_attr('platform.sessions-expire-and-are-guarded-against', 'en') ?>" data-da="<?= st_attr('platform.sessions-expire-and-are-guarded-against', 'da') ?>"><?= st_html('platform.sessions-expire-and-are-guarded-against', 'en') ?></span></span></li>
      <li><span class="chk"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg></span><span><b data-en="<?= st_attr('platform.one-admin-full-oversight', 'en') ?>" data-da="<?= st_attr('platform.one-admin-full-oversight', 'da') ?>"><?= st_html('platform.one-admin-full-oversight', 'en') ?></b> <span data-en="<?= st_attr('platform.add-remove-and-re-tier-users', 'en') ?>" data-da="<?= st_attr('platform.add-remove-and-re-tier-users', 'da') ?>"><?= st_html('platform.add-remove-and-re-tier-users', 'en') ?></span></span></li>
    </ul>
  </div>
</section>

<section class="cta-band">
  <div class="wrap"><div class="cta-box reveal">
    <h2 data-en="<?= st_attr('platform.see-it-running-with-your-modules', 'en') ?>" data-da="<?= st_attr('platform.see-it-running-with-your-modules', 'da') ?>"><?= st_html('platform.see-it-running-with-your-modules', 'en') ?></h2>
    <p data-en="<?= st_attr('platform.send-your-17-sections-and-we', 'en') ?>" data-da="<?= st_attr('platform.send-your-17-sections-and-we', 'da') ?>"><?= st_html('platform.send-your-17-sections-and-we', 'en') ?></p>
    <a class="btn btn-white" href="contact.php" data-en="<?= st_attr('platform.request-access', 'en') ?>" data-da="<?= st_attr('platform.request-access', 'da') ?>"><?= st_html('platform.request-access', 'en') ?></a>
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
