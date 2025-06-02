<?php
/**
 * Template Name: Alle Unterseiten anzeigen
 */

get_header();
?>

<div class="container">
  <h1><?php the_title(); ?></h1>
  <div class="page-content">
    <?php
    while ( have_posts() ) : the_post();
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

    if ( $subpages ) {
      foreach ( $subpages as $page ) {
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
</div>

<style>
  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 2em;
  }

  .subpages-list {
    list-style-type: disc;
    padding-left: 1.5em;
  }

  .subpages-list li {
    margin: 0.5em 0;
  }
</style>

<?php get_footer(); ?>
