<?php
// Contact page. The form posts to contact-send.php.
require __DIR__ . '/inc/layout.php';
vdx_head('contact');
?>
<section class="page-hero">
  <div class="wrap reveal">
<?php $bc1 = el('a', 'contact.home', 'href="index.php"'); $bc2 = el('span', 'contact.contact');
      if ($bc1 !== '' || $bc2 !== ''): ?>
    <div class="breadcrumb"><?= $bc1 ?><?= $bc1 !== '' && $bc2 !== '' ? '<span class="sep"> / </span>' : '' ?><?= $bc2 ?></div>
<?php endif; ?>
    <span class="eyebrow" data-en="<?= st_attr('contact.contact-2', 'en') ?>" data-da="<?= st_attr('contact.contact-2', 'da') ?>"><?= st_html('contact.contact-2', VDX_LANG) ?></span>
    <div class="accent-rule"></div>
  </div>
</section>

<section class="blk" style="padding-top:40px">
  <div class="wrap contact-solo">
    <form class="form reveal" id="contact-form" action="contact-send.php" method="post" novalidate>
      <div class="form-ok" id="form-ok" role="status" data-en="<?= st_attr('contact.thanks-your-message-has-been-received', 'en') ?>" data-da="<?= st_attr('contact.thanks-your-message-has-been-received', 'da') ?>"><?= st_html('contact.thanks-your-message-has-been-received', VDX_LANG) ?></div>
      <div class="form-err" id="form-err" role="alert"></div>
      <!-- Spam trap: hidden from people, filled in by bots. Leave it empty. -->
      <div class="hp" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
      <div class="grid-2" style="gap:18px">
        <div class="field"><label data-en="<?= st_attr('contact.name', 'en') ?>" data-da="<?= st_attr('contact.name', 'da') ?>"><?= st_html('contact.name', VDX_LANG) ?></label><input type="text" name="name" required data-en-ph="<?= st_plain('contact.hint-your-name', 'en') ?>" data-da-ph="<?= st_plain('contact.hint-your-name', 'da') ?>" placeholder="<?= st_plain('contact.hint-your-name', VDX_LANG) ?>"></div>
        <div class="field"><label data-en="<?= st_attr('contact.company', 'en') ?>" data-da="<?= st_attr('contact.company', 'da') ?>"><?= st_html('contact.company', VDX_LANG) ?></label><input type="text" name="company" data-en-ph="<?= st_plain('contact.hint-company-name', 'en') ?>" data-da-ph="<?= st_plain('contact.hint-company-name', 'da') ?>" placeholder="<?= st_plain('contact.hint-company-name', VDX_LANG) ?>"></div>
      </div>
      <div class="field"><label data-en="<?= st_attr('contact.email', 'en') ?>" data-da="<?= st_attr('contact.email', 'da') ?>"><?= st_html('contact.email', VDX_LANG) ?></label><input type="email" name="email" required data-en-ph="<?= st_plain('contact.hint-you-company-com', 'en') ?>" data-da-ph="<?= st_plain('contact.hint-you-company-com', 'da') ?>" placeholder="<?= st_plain('contact.hint-you-company-com', VDX_LANG) ?>"></div>
      <div class="field"><label data-en="<?= st_attr('contact.message', 'en') ?>" data-da="<?= st_attr('contact.message', 'da') ?>"><?= st_html('contact.message', VDX_LANG) ?></label><textarea name="message" required></textarea></div>
      <button type="submit" class="btn btn-primary" style="justify-content:center" data-en="<?= st_attr('contact.send-message', 'en') ?>" data-da="<?= st_attr('contact.send-message', 'da') ?>"><?= st_html('contact.send-message', VDX_LANG) ?></button>
    </form>
  </div>
</section>

<?php vdx_footer();
