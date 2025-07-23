<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <?php if (has_post_thumbnail()): ?>
      <div class="page-header-image">
        <?php the_post_thumbnail('large'); ?>
      </div>
    <?php endif; ?>

    <main class="page-main container">
      <article <?php post_class('page-article'); ?>>

        <header class="page-header">
          <h1 class="page-title"><?php the_title(); ?></h1>
          <div class="page-meta">
            <span><?php echo get_the_date('d. F Y'); ?></span>
          </div>

        </header>

        <div class="page-content">
          <?php the_content(); ?>
        </div>

      </article>
    </main>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>