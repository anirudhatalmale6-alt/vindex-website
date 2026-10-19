<?php
// Generated from contact.html by tools/build_sitetext.py.
// Wording comes from inc/sitetext-defaults.php plus any edits made in
// the members admin under "Website text". Edit layout here, text there.
require __DIR__ . '/inc/sitetext.php';
st_page('contact');
?><!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= st_plain('contact._title', 'en') ?></title>
<meta name="description" content="<?= st_plain('contact._meta', 'en') ?>">
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
      <li><a href="platform.php" data-en="<?= st_attr('shared.platform', 'en') ?>" data-da="<?= st_attr('shared.platform', 'da') ?>"><?= st_html('shared.platform', 'en') ?></a></li>
      <li><a href="contact.php" class="active" data-en="<?= st_attr('shared.contact', 'en') ?>" data-da="<?= st_attr('shared.contact', 'da') ?>"><?= st_html('shared.contact', 'en') ?></a></li>
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
    <div class="breadcrumb"><a href="index.php" data-en="<?= st_attr('contact.home', 'en') ?>" data-da="<?= st_attr('contact.home', 'da') ?>"><?= st_html('contact.home', 'en') ?></a> / <span data-en="<?= st_attr('contact.contact', 'en') ?>" data-da="<?= st_attr('contact.contact', 'da') ?>"><?= st_html('contact.contact', 'en') ?></span></div>
    <span class="eyebrow" data-en="<?= st_attr('contact.contact-2', 'en') ?>" data-da="<?= st_attr('contact.contact-2', 'da') ?>"><?= st_html('contact.contact-2', 'en') ?></span>
    <div class="accent-rule"></div>
    <h1 data-en="<?= st_attr('contact.let-s-talk-about-your-operation', 'en') ?>" data-da="<?= st_attr('contact.let-s-talk-about-your-operation', 'da') ?>"><?= st_html('contact.let-s-talk-about-your-operation', 'en') ?></h1>
    <p data-en="<?= st_attr('contact.request-access-ask-a-question-or', 'en') ?>" data-da="<?= st_attr('contact.request-access-ask-a-question-or', 'da') ?>"><?= st_html('contact.request-access-ask-a-question-or', 'en') ?></p>
  </div>
</section>

<section class="blk" style="padding-top:40px">
  <div class="wrap contact-grid">
    <form class="form reveal" id="contact-form" action="contact-send.php" method="post" novalidate>
      <div class="form-ok" id="form-ok" role="status" data-en="<?= st_attr('contact.thanks-your-message-has-been-received', 'en') ?>" data-da="<?= st_attr('contact.thanks-your-message-has-been-received', 'da') ?>"><?= st_html('contact.thanks-your-message-has-been-received', 'en') ?></div>
      <div class="form-err" id="form-err" role="alert"></div>
      <!-- Spam trap: hidden from people, filled in by bots. Leave it empty. -->
      <div class="hp" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
      <div class="grid-2" style="gap:18px">
        <div class="field"><label data-en="<?= st_attr('contact.name', 'en') ?>" data-da="<?= st_attr('contact.name', 'da') ?>"><?= st_html('contact.name', 'en') ?></label><input type="text" name="name" required data-en-ph="<?= st_plain('contact.hint-your-name', 'en') ?>" data-da-ph="<?= st_plain('contact.hint-your-name', 'da') ?>" placeholder="<?= st_plain('contact.hint-your-name', 'en') ?>"></div>
        <div class="field"><label data-en="<?= st_attr('contact.company', 'en') ?>" data-da="<?= st_attr('contact.company', 'da') ?>"><?= st_html('contact.company', 'en') ?></label><input type="text" name="company" data-en-ph="<?= st_plain('contact.hint-company-name', 'en') ?>" data-da-ph="<?= st_plain('contact.hint-company-name', 'da') ?>" placeholder="<?= st_plain('contact.hint-company-name', 'en') ?>"></div>
      </div>
      <div class="field"><label data-en="<?= st_attr('contact.email', 'en') ?>" data-da="<?= st_attr('contact.email', 'da') ?>"><?= st_html('contact.email', 'en') ?></label><input type="email" name="email" required data-en-ph="<?= st_plain('contact.hint-you-company-com', 'en') ?>" data-da-ph="<?= st_plain('contact.hint-you-company-com', 'da') ?>" placeholder="<?= st_plain('contact.hint-you-company-com', 'en') ?>"></div>
      <div class="field"><label data-en="<?= st_attr('contact.i-m-interested-in', 'en') ?>" data-da="<?= st_attr('contact.i-m-interested-in', 'da') ?>"><?= st_html('contact.i-m-interested-in', 'en') ?></label>
        <select name="topic">
          <option data-en="<?= st_attr('contact.requesting-platform-access', 'en') ?>" data-da="<?= st_attr('contact.requesting-platform-access', 'da') ?>"><?= st_html('contact.requesting-platform-access', 'en') ?></option>
          <option data-en="<?= st_attr('contact.a-demo-with-our-content', 'en') ?>" data-da="<?= st_attr('contact.a-demo-with-our-content', 'da') ?>"><?= st_html('contact.a-demo-with-our-content', 'en') ?></option>
          <option data-en="<?= st_attr('contact.pricing-milestones', 'en') ?>" data-da="<?= st_attr('contact.pricing-milestones', 'da') ?>"><?= st_html('contact.pricing-milestones', 'en') ?></option>
          <option data-en="<?= st_attr('contact.something-else', 'en') ?>" data-da="<?= st_attr('contact.something-else', 'da') ?>"><?= st_html('contact.something-else', 'en') ?></option>
        </select>
      </div>
      <div class="field"><label data-en="<?= st_attr('contact.message', 'en') ?>" data-da="<?= st_attr('contact.message', 'da') ?>"><?= st_html('contact.message', 'en') ?></label><textarea name="message" required data-en-ph="<?= st_plain('contact.hint-tell-us-a-little-about', 'en') ?>" data-da-ph="<?= st_plain('contact.hint-tell-us-a-little-about', 'da') ?>" placeholder="<?= st_plain('contact.hint-tell-us-a-little-about', 'en') ?>"></textarea></div>
      <button type="submit" class="btn btn-primary" style="justify-content:center" data-en="<?= st_attr('contact.send-message', 'en') ?>" data-da="<?= st_attr('contact.send-message', 'da') ?>"><?= st_html('contact.send-message', 'en') ?></button>
      <p class="note" data-en="<?= st_attr('contact.by-sending-this-you-agree-we', 'en') ?>" data-da="<?= st_attr('contact.by-sending-this-you-agree-we', 'da') ?>"><?= st_html('contact.by-sending-this-you-agree-we', 'en') ?></p>
    </form>

    <aside class="contact-aside reveal">
      <div class="info">
        <h3 data-en="<?= st_attr('contact.what-happens-next', 'en') ?>" data-da="<?= st_attr('contact.what-happens-next', 'da') ?>"><?= st_html('contact.what-happens-next', 'en') ?></h3>
        <p data-en="<?= st_attr('contact.we-read-every-message-personally-reply', 'en') ?>" data-da="<?= st_attr('contact.we-read-every-message-personally-reply', 'da') ?>"><?= st_html('contact.we-read-every-message-personally-reply', 'en') ?></p>
      </div>
      <div class="info">
        <h3 data-en="<?= st_attr('contact.bilingual-by-design', 'en') ?>" data-da="<?= st_attr('contact.bilingual-by-design', 'da') ?>"><?= st_html('contact.bilingual-by-design', 'en') ?></h3>
        <p data-en="<?= st_attr('contact.prefer-danish-switch-the-language-toggle', 'en') ?>" data-da="<?= st_attr('contact.prefer-danish-switch-the-language-toggle', 'da') ?>"><?= st_html('contact.prefer-danish-switch-the-language-toggle', 'en') ?></p>
      </div>
      <div class="info">
        <h3 data-en="<?= st_attr('contact.secure-from-day-one', 'en') ?>" data-da="<?= st_attr('contact.secure-from-day-one', 'da') ?>"><?= st_html('contact.secure-from-day-one', 'en') ?></h3>
        <p data-en="<?= st_attr('contact.https-hashed-passwords-and-server-side', 'en') ?>" data-da="<?= st_attr('contact.https-hashed-passwords-and-server-side', 'da') ?>"><?= st_html('contact.https-hashed-passwords-and-server-side', 'en') ?></p>
      </div>
    </aside>
  </div>
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
