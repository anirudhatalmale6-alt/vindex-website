<?php
// About page: the whole story sits over the video, which plays once and stops.
require __DIR__ . '/inc/layout.php';
vdx_head('about');
vdx_hero_open('about', 'about', 'hero-about');
?>
  <div class="wrap"><div class="hero-inner about-inner reveal">
    <?= el('h1', 'about.hero-title', 'class="title"') ?>

    <?= el('p', 'about.hero-lede', 'class="lede"') ?>

    <?= el('p', 'about.story-1', 'class="lede"') ?>

    <?= el('p', 'about.story-2', 'class="lede"') ?>

    <?= el('p', 'about.story-3', 'class="lede"') ?>

  </div></div>
</section>

<?php vdx_footer();
