<?php
// Landing page. Wording lives in inc/sitetext-defaults.php plus any edits made
// in the members admin under "Website text"; layout lives here.
require __DIR__ . '/inc/layout.php';
vdx_head('index');
vdx_hero_open('index', 'hero');
?>
  <div class="wrap hero-inner reveal">
    <?= el('h1', 'index.hero-title', 'class="title"') ?>

    <?= el('p', 'index.hero-lede', 'class="lede"') ?>

    <div class="hero-cta">
      <?= el('a', 'index.request-access', 'class="btn btn-primary" href="contact.php"') ?>

      <?= el('a', 'index.explore-the-platform', 'class="btn btn-ghost" href="about.php"') ?>

    </div>
    <div class="hero-meta">
      <div><div class="n">17</div><?= el('div', 'index.knowledge-modules', 'class="l"') ?></div>
      <div><div class="n">2</div><?= el('div', 'index.access-tiers', 'class="l"') ?></div>
      <div><div class="n">Live</div><?= el('div', 'index.always-up-to-date', 'class="l"') ?></div>
    </div>
  </div>
</section>

<section class="blk value-sec">
  <div class="wrap">
    <div class="sec-head reveal">
      <div class="accent-rule"></div>
      <?= el('h2', 'index.value-title') ?>

      <?= el('p', 'index.value-intro') ?>

    </div>
    <div class="grid-2 value-grid">
<?php for ($i = 1; $i <= 4; $i++): ?>
      <div class="card reveal">
        <span class="vnum">0<?= $i ?></span>
        <?= el('h3', "index.value-$i-title") ?>

        <?= el('p', "index.value-$i-text") ?>

      </div>
<?php endfor; ?>
    </div>
  </div>
</section>

<?php vdx_footer();
