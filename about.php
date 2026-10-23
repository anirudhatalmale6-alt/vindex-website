<?php
// About page: video hero like the landing page, then the story.
require __DIR__ . '/inc/layout.php';
vdx_head('about');
vdx_hero_open('about', 'about', 'hero-about');
?>
  <div class="wrap"><div class="hero-inner reveal">
    <?= el('h1', 'about.hero-title', 'class="title"') ?>

    <?= el('p', 'about.hero-lede', 'class="lede"') ?>

  </div></div>
</section>

<section class="blk about-story">
  <div class="wrap">
    <div class="prose story reveal">
      <div class="accent-rule"></div>
      <?= el('p', 'about.story-1') ?>

      <?= el('p', 'about.story-2') ?>

      <?= el('p', 'about.story-3') ?>

    </div>
  </div>
</section>

<?php vdx_footer();
