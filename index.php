<?php
// Generated from index.html by tools/build_sitetext.py.
// Wording comes from inc/sitetext-defaults.php plus any edits made in
// the members admin under "Website text". Edit layout here, text there.
require __DIR__ . '/inc/sitetext.php';
st_page('index');
?><!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= st_plain('index._title', 'en') ?></title>
<meta name="description" content="<?= st_plain('index._meta', 'en') ?>">
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
      <li><a href="index.php" class="active" data-en="<?= st_attr('shared.home', 'en') ?>" data-da="<?= st_attr('shared.home', 'da') ?>"><?= st_html('shared.home', 'en') ?></a></li>
      <li><a href="cases.php" data-en="<?= st_attr('shared.cases', 'en') ?>" data-da="<?= st_attr('shared.cases', 'da') ?>"><?= st_html('shared.cases', 'en') ?></a></li>
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
  </div>
</header>

<section class="hero">
  <div class="grid-lines"></div>
  <div class="wrap hero-inner reveal">
    <span class="pill"><span class="live"></span><span data-en="<?= st_attr('index.secure-knowledge-base-https', 'en') ?>" data-da="<?= st_attr('index.secure-knowledge-base-https', 'da') ?>"><?= st_html('index.secure-knowledge-base-https', 'en') ?></span></span>
    <h1 class="title" data-en="<?= st_attr('index.the-living-knowledge-base-for-ai', 'en') ?>" data-da="<?= st_attr('index.the-living-knowledge-base-for-ai', 'da') ?>"><?= st_html('index.the-living-knowledge-base-for-ai', 'en') ?></h1>
    <p class="lede" data-en="<?= st_attr('index.vindex-turns-the-latest-thinking-on', 'en') ?>" data-da="<?= st_attr('index.vindex-turns-the-latest-thinking-on', 'da') ?>"><?= st_html('index.vindex-turns-the-latest-thinking-on', 'en') ?></p>
    <div class="hero-cta">
      <a class="btn btn-primary" href="contact.php" data-en="<?= st_attr('index.request-access', 'en') ?>" data-da="<?= st_attr('index.request-access', 'da') ?>"><?= st_html('index.request-access', 'en') ?></a>
      <a class="btn btn-ghost" href="platform.php" data-en="<?= st_attr('index.explore-the-platform', 'en') ?>" data-da="<?= st_attr('index.explore-the-platform', 'da') ?>"><?= st_html('index.explore-the-platform', 'en') ?></a>
    </div>
    <div class="hero-meta">
      <div><div class="n">17</div><div class="l" data-en="<?= st_attr('index.knowledge-modules', 'en') ?>" data-da="<?= st_attr('index.knowledge-modules', 'da') ?>"><?= st_html('index.knowledge-modules', 'en') ?></div></div>
      <div><div class="n">2</div><div class="l" data-en="<?= st_attr('index.access-tiers', 'en') ?>" data-da="<?= st_attr('index.access-tiers', 'da') ?>"><?= st_html('index.access-tiers', 'en') ?></div></div>
      <div><div class="n">Live</div><div class="l" data-en="<?= st_attr('index.always-up-to-date', 'en') ?>" data-da="<?= st_attr('index.always-up-to-date', 'da') ?>"><?= st_html('index.always-up-to-date', 'en') ?></div></div>
    </div>
  </div>
</section>

<div class="proof">
  <div class="wrap">
    <span class="lbl" data-en="<?= st_attr('index.trusted-by-operations-teams-at', 'en') ?>" data-da="<?= st_attr('index.trusted-by-operations-teams-at', 'da') ?>"><?= st_html('index.trusted-by-operations-teams-at', 'en') ?></span>
    <div class="logos"><b>NORDVEST</b><b>Kvist &amp; Co</b><b>Aalborg Partners</b><b>Helix</b><b>Meridian Group</b></div>
  </div>
</div>

<section class="blk" id="about">
  <div class="wrap">
    <div class="sec-head reveal">
      <span class="eyebrow" data-en="<?= st_attr('index.why-vindex', 'en') ?>" data-da="<?= st_attr('index.why-vindex', 'da') ?>"><?= st_html('index.why-vindex', 'en') ?></span>
      <div class="accent-rule"></div>
      <h2 data-en="<?= st_attr('index.one-current-home-for-your-ai', 'en') ?>" data-da="<?= st_attr('index.one-current-home-for-your-ai', 'da') ?>"><?= st_html('index.one-current-home-for-your-ai', 'en') ?></h2>
      <p data-en="<?= st_attr('index.everything-a-modern-operations-team-needs', 'en') ?>" data-da="<?= st_attr('index.everything-a-modern-operations-team-needs', 'da') ?>"><?= st_html('index.everything-a-modern-operations-team-needs', 'en') ?></p>
    </div>
    <div class="cards">
      <div class="card reveal">
        <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2zM22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></div>
        <h3 data-en="<?= st_attr('index.curated-ai-knowledge', 'en') ?>" data-da="<?= st_attr('index.curated-ai-knowledge', 'da') ?>"><?= st_html('index.curated-ai-knowledge', 'en') ?></h3>
        <p data-en="<?= st_attr('index.the-latest-vetted-thinking-on-applying', 'en') ?>" data-da="<?= st_attr('index.the-latest-vetted-thinking-on-applying', 'da') ?>"><?= st_html('index.the-latest-vetted-thinking-on-applying', 'en') ?></p>
      </div>
      <div class="card reveal">
        <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg></div>
        <h3 data-en="<?= st_attr('index.infinite-accordion', 'en') ?>" data-da="<?= st_attr('index.infinite-accordion', 'da') ?>"><?= st_html('index.infinite-accordion', 'en') ?></h3>
        <p data-en="<?= st_attr('index.17-modules-with-nested-subsections-to', 'en') ?>" data-da="<?= st_attr('index.17-modules-with-nested-subsections-to', 'da') ?>"><?= st_html('index.17-modules-with-nested-subsections-to', 'en') ?></p>
      </div>
      <div class="card reveal">
        <div class="ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <h3 data-en="<?= st_attr('index.role-based-access', 'en') ?>" data-da="<?= st_attr('index.role-based-access', 'da') ?>"><?= st_html('index.role-based-access', 'en') ?></h3>
        <p data-en="<?= st_attr('index.leadership-sees-everything-employees-see-a', 'en') ?>" data-da="<?= st_attr('index.leadership-sees-everything-employees-see-a', 'da') ?>"><?= st_html('index.leadership-sees-everything-employees-see-a', 'en') ?></p>
      </div>
    </div>
  </div>
</section>

<section class="platform blk" id="platform">
  <div class="wrap split">
    <div class="reveal">
      <span class="eyebrow" data-en="<?= st_attr('index.the-members-platform', 'en') ?>" data-da="<?= st_attr('index.the-members-platform', 'da') ?>"><?= st_html('index.the-members-platform', 'en') ?></span>
      <div class="accent-rule"></div>
      <h2 data-en="<?= st_attr('index.two-tiers-one-clean-structure', 'en') ?>" data-da="<?= st_attr('index.two-tiers-one-clean-structure', 'da') ?>"><?= st_html('index.two-tiers-one-clean-structure', 'en') ?></h2>
      <p style="color:var(--muted);font-size:16px;margin-top:12px" data-en="<?= st_attr('index.the-same-17-module-framework-for', 'en') ?>" data-da="<?= st_attr('index.the-same-17-module-framework-for', 'da') ?>"><?= st_html('index.the-same-17-module-framework-for', 'en') ?></p>
      <div class="tiers">
        <div class="tier"><b data-en="<?= st_attr('index.leadership', 'en') ?>" data-da="<?= st_attr('index.leadership', 'da') ?>"><?= st_html('index.leadership', 'en') ?></b><span data-en="<?= st_attr('index.full-access-to-all-17-modules', 'en') ?>" data-da="<?= st_attr('index.full-access-to-all-17-modules', 'da') ?>"><?= st_html('index.full-access-to-all-17-modules', 'en') ?></span></div>
        <div class="tier"><b data-en="<?= st_attr('index.employee', 'en') ?>" data-da="<?= st_attr('index.employee', 'da') ?>"><?= st_html('index.employee', 'en') ?></b><span data-en="<?= st_attr('index.a-curated-set-of-modules-kept', 'en') ?>" data-da="<?= st_attr('index.a-curated-set-of-modules-kept', 'da') ?>"><?= st_html('index.a-curated-set-of-modules-kept', 'en') ?></span></div>
      </div>
      <a class="btn btn-ghost" style="margin-top:22px" href="platform.php" data-en="<?= st_attr('index.see-platform-details', 'en') ?>" data-da="<?= st_attr('index.see-platform-details', 'da') ?>"><?= st_html('index.see-platform-details', 'en') ?></a>
    </div>
    <div class="acc reveal">
      <div class="acc-item open">
        <div class="acc-head"><span class="idx">01</span><span data-en="<?= st_attr('index.ai-operating-principles', 'en') ?>" data-da="<?= st_attr('index.ai-operating-principles', 'da') ?>"><?= st_html('index.ai-operating-principles', 'en') ?></span><span class="lock" data-en="<?= st_attr('index.all', 'en') ?>" data-da="<?= st_attr('index.all', 'da') ?>"><?= st_html('index.all', 'en') ?></span><svg class="chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg></div>
        <div class="acc-body"><div class="inner"><span data-en="<?= st_attr('index.a-concise-overview-of-how-your', 'en') ?>" data-da="<?= st_attr('index.a-concise-overview-of-how-your', 'da') ?>"><?= st_html('index.a-concise-overview-of-how-your', 'en') ?></span>
          <div class="sub" data-en="<?= st_attr('index.includes-quarterly-goals-kpis-linked-study', 'en') ?>" data-da="<?= st_attr('index.includes-quarterly-goals-kpis-linked-study', 'da') ?>"><?= st_html('index.includes-quarterly-goals-kpis-linked-study', 'en') ?></div></div></div>
      </div>
      <div class="acc-item">
        <div class="acc-head"><span class="idx">02</span><span data-en="<?= st_attr('index.playbooks-frameworks', 'en') ?>" data-da="<?= st_attr('index.playbooks-frameworks', 'da') ?>"><?= st_html('index.playbooks-frameworks', 'en') ?></span><span class="lock" data-en="<?= st_attr('index.all-2', 'en') ?>" data-da="<?= st_attr('index.all-2', 'da') ?>"><?= st_html('index.all-2', 'en') ?></span><svg class="chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg></div>
        <div class="acc-body"><div class="inner" data-en="<?= st_attr('index.summaries-and-links-to-the-frameworks', 'en') ?>" data-da="<?= st_attr('index.summaries-and-links-to-the-frameworks', 'da') ?>"><?= st_html('index.summaries-and-links-to-the-frameworks', 'en') ?></div></div>
      </div>
      <div class="acc-item">
        <div class="acc-head"><span class="idx">03</span><span data-en="<?= st_attr('index.team-onboarding', 'en') ?>" data-da="<?= st_attr('index.team-onboarding', 'da') ?>"><?= st_html('index.team-onboarding', 'en') ?></span><span class="lock" data-en="<?= st_attr('index.employee-2', 'en') ?>" data-da="<?= st_attr('index.employee-2', 'da') ?>"><?= st_html('index.employee-2', 'en') ?></span><svg class="chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg></div>
        <div class="acc-body"><div class="inner" data-en="<?= st_attr('index.day-to-day-guidance-curated-for', 'en') ?>" data-da="<?= st_attr('index.day-to-day-guidance-curated-for', 'da') ?>"><?= st_html('index.day-to-day-guidance-curated-for', 'en') ?></div></div>
      </div>
      <div class="acc-item">
        <div class="acc-head"><span class="idx">04</span><span data-en="<?= st_attr('index.strategy-roadmap', 'en') ?>" data-da="<?= st_attr('index.strategy-roadmap', 'da') ?>"><?= st_html('index.strategy-roadmap', 'en') ?></span><span class="lock" data-en="<?= st_attr('index.leadership-2', 'en') ?>" data-da="<?= st_attr('index.leadership-2', 'da') ?>"><?= st_html('index.leadership-2', 'en') ?></span><svg class="chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5l7 7-7 7"/></svg></div>
        <div class="acc-body"><div class="inner" data-en="<?= st_attr('index.confidential-strategy-visible-to-leadership-only', 'en') ?>" data-da="<?= st_attr('index.confidential-strategy-visible-to-leadership-only', 'da') ?>"><?= st_html('index.confidential-strategy-visible-to-leadership-only', 'en') ?></div></div>
      </div>
    </div>
  </div>
</section>

<section class="blk" id="cases">
  <div class="wrap">
    <div class="sec-head reveal">
      <span class="eyebrow" data-en="<?= st_attr('index.selected-cases', 'en') ?>" data-da="<?= st_attr('index.selected-cases', 'da') ?>"><?= st_html('index.selected-cases', 'en') ?></span>
      <div class="accent-rule"></div>
      <h2 data-en="<?= st_attr('index.client-examples-ready-for-video', 'en') ?>" data-da="<?= st_attr('index.client-examples-ready-for-video', 'da') ?>"><?= st_html('index.client-examples-ready-for-video', 'en') ?></h2>
      <p data-en="<?= st_attr('index.each-case-is-built-to-hold', 'en') ?>" data-da="<?= st_attr('index.each-case-is-built-to-hold', 'da') ?>"><?= st_html('index.each-case-is-built-to-hold', 'en') ?></p>
    </div>
    <div class="case-grid">
      <div class="case reveal"><div class="media"><span class="tag" data-en="<?= st_attr('index.video-ready', 'en') ?>" data-da="<?= st_attr('index.video-ready', 'da') ?>"><?= st_html('index.video-ready', 'en') ?></span><span class="play"><svg width="18" height="18" viewBox="0 0 24 24" fill="#fff"><path d="M8 5v14l11-7z"/></svg></span></div><div class="body"><h3>Nordvest Group</h3><p data-en="<?= st_attr('index.rolled-out-an-ai-operations-knowledge', 'en') ?>" data-da="<?= st_attr('index.rolled-out-an-ai-operations-knowledge', 'da') ?>"><?= st_html('index.rolled-out-an-ai-operations-knowledge', 'en') ?></p></div></div>
      <div class="case reveal"><div class="media"><span class="tag" data-en="<?= st_attr('index.video-ready-2', 'en') ?>" data-da="<?= st_attr('index.video-ready-2', 'da') ?>"><?= st_html('index.video-ready-2', 'en') ?></span><span class="play"><svg width="18" height="18" viewBox="0 0 24 24" fill="#fff"><path d="M8 5v14l11-7z"/></svg></span></div><div class="body"><h3>Kvist &amp; Co</h3><p data-en="<?= st_attr('index.gave-40-employees-a-focused-curated', 'en') ?>" data-da="<?= st_attr('index.gave-40-employees-a-focused-curated', 'da') ?>"><?= st_html('index.gave-40-employees-a-focused-curated', 'en') ?></p></div></div>
      <div class="case reveal"><div class="media"><span class="tag" data-en="<?= st_attr('index.video-ready-3', 'en') ?>" data-da="<?= st_attr('index.video-ready-3', 'da') ?>"><?= st_html('index.video-ready-3', 'en') ?></span><span class="play"><svg width="18" height="18" viewBox="0 0 24 24" fill="#fff"><path d="M8 5v14l11-7z"/></svg></span></div><div class="body"><h3>Aalborg Partners</h3><p data-en="<?= st_attr('index.a-bilingual-en-da-rollout-across', 'en') ?>" data-da="<?= st_attr('index.a-bilingual-en-da-rollout-across', 'da') ?>"><?= st_html('index.a-bilingual-en-da-rollout-across', 'en') ?></p></div></div>
    </div>
    <div class="center" style="margin-top:38px"><a class="btn btn-ghost" href="cases.php" data-en="<?= st_attr('index.view-all-cases', 'en') ?>" data-da="<?= st_attr('index.view-all-cases', 'da') ?>"><?= st_html('index.view-all-cases', 'en') ?></a></div>
  </div>
</section>

<section class="cta-band">
  <div class="wrap">
    <div class="cta-box reveal">
      <h2 data-en="<?= st_attr('index.ready-to-see-vindex-with-your', 'en') ?>" data-da="<?= st_attr('index.ready-to-see-vindex-with-your', 'da') ?>"><?= st_html('index.ready-to-see-vindex-with-your', 'en') ?></h2>
      <p data-en="<?= st_attr('index.send-us-your-modules-and-we', 'en') ?>" data-da="<?= st_attr('index.send-us-your-modules-and-we', 'da') ?>"><?= st_html('index.send-us-your-modules-and-we', 'en') ?></p>
      <a class="btn btn-white" href="contact.php" data-en="<?= st_attr('index.request-access-2', 'en') ?>" data-da="<?= st_attr('index.request-access-2', 'da') ?>"><?= st_html('index.request-access-2', 'en') ?></a>
    </div>
  </div>
</section>

<footer>
  <div class="wrap">
    <div class="foot-grid">
      <div class="foot-brand">
        <a class="brand" href="index.php"><span class="dot"></span>VINDEX</a>
        <p data-en="<?= st_attr('shared.a-living-secure-knowledge-base-for', 'en') ?>" data-da="<?= st_attr('shared.a-living-secure-knowledge-base-for', 'da') ?>"><?= st_html('shared.a-living-secure-knowledge-base-for', 'en') ?></p>
      </div>
      <div class="foot-col"><h4 data-en="<?= st_attr('shared.site', 'en') ?>" data-da="<?= st_attr('shared.site', 'da') ?>"><?= st_html('shared.site', 'en') ?></h4>
        <a href="index.php" data-en="<?= st_attr('shared.home', 'en') ?>" data-da="<?= st_attr('shared.home', 'da') ?>"><?= st_html('shared.home', 'en') ?></a>
        <a href="cases.php" data-en="<?= st_attr('shared.cases', 'en') ?>" data-da="<?= st_attr('shared.cases', 'da') ?>"><?= st_html('shared.cases', 'en') ?></a>
        <a href="about.php" data-en="<?= st_attr('shared.about', 'en') ?>" data-da="<?= st_attr('shared.about', 'da') ?>"><?= st_html('shared.about', 'en') ?></a>
        <a href="platform.php" data-en="<?= st_attr('shared.platform', 'en') ?>" data-da="<?= st_attr('shared.platform', 'da') ?>"><?= st_html('shared.platform', 'en') ?></a></div>
      <div class="foot-col"><h4 data-en="<?= st_attr('shared.platform', 'en') ?>" data-da="<?= st_attr('shared.platform', 'da') ?>"><?= st_html('shared.platform', 'en') ?></h4>
        <a href="members/login.php" data-en="<?= st_attr('shared.member-login-2', 'en') ?>" data-da="<?= st_attr('shared.member-login-2', 'da') ?>"><?= st_html('shared.member-login-2', 'en') ?></a>
        <a href="platform.php" data-en="<?= st_attr('shared.leadership-access', 'en') ?>" data-da="<?= st_attr('shared.leadership-access', 'da') ?>"><?= st_html('shared.leadership-access', 'en') ?></a>
        <a href="platform.php" data-en="<?= st_attr('shared.employee-access', 'en') ?>" data-da="<?= st_attr('shared.employee-access', 'da') ?>"><?= st_html('shared.employee-access', 'en') ?></a>
        <a href="contact.php" data-en="<?= st_attr('shared.contact', 'en') ?>" data-da="<?= st_attr('shared.contact', 'da') ?>"><?= st_html('shared.contact', 'en') ?></a></div>
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
