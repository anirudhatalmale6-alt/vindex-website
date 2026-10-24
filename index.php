<?php
// Landing page. Wording lives in inc/sitetext-defaults.php plus any edits made
// in the members admin under "Website text"; layout lives here.
require __DIR__ . '/inc/layout.php';
vdx_head('index');
vdx_hero_open('index', 'hero');
?>
  <div class="wrap"><div class="hero-inner reveal">
    <?= el('h1', 'index.hero-title', 'class="title"') ?>

    <?= el('p', 'index.hero-lede', 'class="lede"') ?>

    <div class="hero-cta">
      <?= el('a', 'index.request-access', 'class="btn btn-primary" href="contact.php"') ?>

      <?= el('a', 'index.explore-the-platform', 'class="btn btn-ghost" href="about.php"') ?>

    </div>
  </div></div>
</section>

<section class="blk value-sec">
  <div class="wrap">
    <div class="value-text reveal">
      <div class="accent-rule"></div>
      <?= el('h2', 'index.value-title') ?>

      <?= el('p', 'index.value-intro') ?>

      <ul class="value-list">
<?php for ($i = 1; $i <= 4; $i++): ?>
<?php   $li = el('b', "index.value-$i-title") . ' ' . el('span', "index.value-$i-text"); if (trim($li) === '') continue; ?>
        <li><?= $li ?></li>
<?php endfor; ?>
      </ul>
    </div>
  </div>
</section>

<?php vdx_footer();
