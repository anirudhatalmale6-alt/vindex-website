<?php
// Contact page. The form posts to contact-send.php.
require __DIR__ . '/inc/layout.php';
vdx_head('contact');
?>
<section class="page-hero">
  <div class="wrap reveal">
    <div class="breadcrumb"><a href="index.php" data-en="<?= st_attr('contact.home', 'en') ?>" data-da="<?= st_attr('contact.home', 'da') ?>"><?= st_html('contact.home', VDX_LANG) ?></a> / <span data-en="<?= st_attr('contact.contact', 'en') ?>" data-da="<?= st_attr('contact.contact', 'da') ?>"><?= st_html('contact.contact', VDX_LANG) ?></span></div>
    <span class="eyebrow" data-en="<?= st_attr('contact.contact-2', 'en') ?>" data-da="<?= st_attr('contact.contact-2', 'da') ?>"><?= st_html('contact.contact-2', VDX_LANG) ?></span>
    <div class="accent-rule"></div>
    <h1 data-en="<?= st_attr('contact.let-s-talk-about-your-operation', 'en') ?>" data-da="<?= st_attr('contact.let-s-talk-about-your-operation', 'da') ?>"><?= st_html('contact.let-s-talk-about-your-operation', VDX_LANG) ?></h1>
    <p data-en="<?= st_attr('contact.request-access-ask-a-question-or', 'en') ?>" data-da="<?= st_attr('contact.request-access-ask-a-question-or', 'da') ?>"><?= st_html('contact.request-access-ask-a-question-or', VDX_LANG) ?></p>
  </div>
</section>

<section class="blk" style="padding-top:40px">
  <div class="wrap contact-grid">
    <form class="form reveal" id="contact-form" action="contact-send.php" method="post" novalidate>
      <div class="form-ok" id="form-ok" role="status" data-en="<?= st_attr('contact.thanks-your-message-has-been-received', 'en') ?>" data-da="<?= st_attr('contact.thanks-your-message-has-been-received', 'da') ?>"><?= st_html('contact.thanks-your-message-has-been-received', VDX_LANG) ?></div>
      <div class="form-err" id="form-err" role="alert"></div>
      <!-- Spam trap: hidden from people, filled in by bots. Leave it empty. -->
      <div class="hp" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
      <div class="grid-2" style="gap:18px">
        <div class="field"><label data-en="<?= st_attr('contact.name', 'en') ?>" data-da="<?= st_attr('contact.name', 'da') ?>"><?= st_html('contact.name', VDX_LANG) ?></label><input type="text" name="name" required data-en-ph="<?= st_plain('contact.hint-your-name', 'en') ?>" data-da-ph="<?= st_plain('contact.hint-your-name', 'da') ?>" placeholder=\"<?= st_plain('contact.hint-your-name', VDX_LANG) ?>\"></div>
        <div class="field"><label data-en="<?= st_attr('contact.company', 'en') ?>" data-da="<?= st_attr('contact.company', 'da') ?>"><?= st_html('contact.company', VDX_LANG) ?></label><input type="text" name="company" data-en-ph="<?= st_plain('contact.hint-company-name', 'en') ?>" data-da-ph="<?= st_plain('contact.hint-company-name', 'da') ?>" placeholder=\"<?= st_plain('contact.hint-company-name', VDX_LANG) ?>\"></div>
      </div>
      <div class="field"><label data-en="<?= st_attr('contact.email', 'en') ?>" data-da="<?= st_attr('contact.email', 'da') ?>"><?= st_html('contact.email', VDX_LANG) ?></label><input type="email" name="email" required data-en-ph="<?= st_plain('contact.hint-you-company-com', 'en') ?>" data-da-ph="<?= st_plain('contact.hint-you-company-com', 'da') ?>" placeholder=\"<?= st_plain('contact.hint-you-company-com', VDX_LANG) ?>\"></div>
      <div class="field"><label data-en="<?= st_attr('contact.i-m-interested-in', 'en') ?>" data-da="<?= st_attr('contact.i-m-interested-in', 'da') ?>"><?= st_html('contact.i-m-interested-in', VDX_LANG) ?></label>
        <select name="topic">
          <option data-en="<?= st_attr('contact.requesting-platform-access', 'en') ?>" data-da="<?= st_attr('contact.requesting-platform-access', 'da') ?>"><?= st_html('contact.requesting-platform-access', VDX_LANG) ?></option>
          <option data-en="<?= st_attr('contact.a-demo-with-our-content', 'en') ?>" data-da="<?= st_attr('contact.a-demo-with-our-content', 'da') ?>"><?= st_html('contact.a-demo-with-our-content', VDX_LANG) ?></option>
          <option data-en="<?= st_attr('contact.pricing-milestones', 'en') ?>" data-da="<?= st_attr('contact.pricing-milestones', 'da') ?>"><?= st_html('contact.pricing-milestones', VDX_LANG) ?></option>
          <option data-en="<?= st_attr('contact.something-else', 'en') ?>" data-da="<?= st_attr('contact.something-else', 'da') ?>"><?= st_html('contact.something-else', VDX_LANG) ?></option>
        </select>
      </div>
      <div class="field"><label data-en="<?= st_attr('contact.message', 'en') ?>" data-da="<?= st_attr('contact.message', 'da') ?>"><?= st_html('contact.message', VDX_LANG) ?></label><textarea name="message" required data-en-ph="<?= st_plain('contact.hint-tell-us-a-little-about', 'en') ?>" data-da-ph="<?= st_plain('contact.hint-tell-us-a-little-about', 'da') ?>" placeholder=\"<?= st_plain('contact.hint-tell-us-a-little-about', VDX_LANG) ?>\"></textarea></div>
      <button type="submit" class="btn btn-primary" style="justify-content:center" data-en="<?= st_attr('contact.send-message', 'en') ?>" data-da="<?= st_attr('contact.send-message', 'da') ?>"><?= st_html('contact.send-message', VDX_LANG) ?></button>
      <p class="note" data-en="<?= st_attr('contact.by-sending-this-you-agree-we', 'en') ?>" data-da="<?= st_attr('contact.by-sending-this-you-agree-we', 'da') ?>"><?= st_html('contact.by-sending-this-you-agree-we', VDX_LANG) ?></p>
    </form>

    <aside class="contact-aside reveal">
      <div class="info">
        <h3 data-en="<?= st_attr('contact.what-happens-next', 'en') ?>" data-da="<?= st_attr('contact.what-happens-next', 'da') ?>"><?= st_html('contact.what-happens-next', VDX_LANG) ?></h3>
        <p data-en="<?= st_attr('contact.we-read-every-message-personally-reply', 'en') ?>" data-da="<?= st_attr('contact.we-read-every-message-personally-reply', 'da') ?>"><?= st_html('contact.we-read-every-message-personally-reply', VDX_LANG) ?></p>
      </div>
      <div class="info">
        <h3 data-en="<?= st_attr('contact.bilingual-by-design', 'en') ?>" data-da="<?= st_attr('contact.bilingual-by-design', 'da') ?>"><?= st_html('contact.bilingual-by-design', VDX_LANG) ?></h3>
        <p data-en="<?= st_attr('contact.prefer-danish-switch-the-language-toggle', 'en') ?>" data-da="<?= st_attr('contact.prefer-danish-switch-the-language-toggle', 'da') ?>"><?= st_html('contact.prefer-danish-switch-the-language-toggle', VDX_LANG) ?></p>
      </div>
      <div class="info">
        <h3 data-en="<?= st_attr('contact.secure-from-day-one', 'en') ?>" data-da="<?= st_attr('contact.secure-from-day-one', 'da') ?>"><?= st_html('contact.secure-from-day-one', VDX_LANG) ?></h3>
        <p data-en="<?= st_attr('contact.https-hashed-passwords-and-server-side', 'en') ?>" data-da="<?= st_attr('contact.https-hashed-passwords-and-server-side', 'da') ?>"><?= st_html('contact.https-hashed-passwords-and-server-side', VDX_LANG) ?></p>
      </div>
    </aside>
  </div>
</section>

<?php vdx_footer();
