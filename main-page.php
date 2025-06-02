<?php
/**
 * Template Name: Alle Unterseiten anzeigen
 */

get_header();
?>

<main class="page-main container">
  <header class="post-header">
    <h1 class="post-title"><?php the_title(); ?></h1>
    <div class="post-meta">
      <span><?php echo get_the_date('d. F Y'); ?></span>
    </div>

  </header>
  <div class="page-content">
    <?php
    while (have_posts()):
      the_post();
      the_content();
    endwhile;
    ?>
  </div>

  <div class="news-grid">
    <?php
    $subpages = get_pages([
      'child_of' => get_the_ID(),
      'sort_column' => 'menu_order',
    ]);

    if ($subpages) {
      foreach ($subpages as $page) {
        ?>
        <article class="news-item">
          <a href="<?php echo get_permalink($page->ID); ?>" class="news-link">
            <?php
            if (has_post_thumbnail($page->ID)) {
              echo get_the_post_thumbnail($page->ID, 'medium_large', array('class' => 'wp-post-image'));
            } else {
              echo '<img src="' . get_template_directory_uri() . '/assets/images/default-news.jpg" alt="' . esc_attr(get_the_title($page->ID)) . '">';
            }
            ?>
            <div class="news-overlay">
              <h3 class="news-title entry-title"><?php echo esc_html(get_the_title($page->ID)); ?></h3>
            </div>
          </a>
        </article>
        <?php
      }
    } else {
      echo '<p>Keine Unterseiten gefunden.</p>';
    }
    ?>
  </div>
</main>


<?php get_footer(); ?>