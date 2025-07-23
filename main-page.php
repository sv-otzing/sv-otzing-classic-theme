<?php
/**
 * Template Name: Alle Unterseiten anzeigen
 */

get_header();
?>

<?php if (has_post_thumbnail()): ?>
  <div class="page-header-image">
    <?php the_post_thumbnail('full'); ?>
  </div>
<?php endif; ?>

<main class="page-main container">
  <header class="page-header">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="page-meta">
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

  <?php
  // Alle direkten Unterseiten holen
  $all_subpages = get_pages([
    'child_of' => get_the_ID(),
    'sort_column' => 'menu_order',
    'sort_order' => 'ASC',
  ]);

  // Arrays vorbereiten
  $uncategorized_pages = [];
  $categorized_pages = [];

  foreach ($all_subpages as $page) {
    $cats = get_the_category($page->ID);
    if (empty($cats)) {
      $uncategorized_pages[] = $page;
    } else {
      foreach ($cats as $cat) {
        $categorized_pages[$cat->term_id]['category'] = $cat;
        $categorized_pages[$cat->term_id]['pages'][] = $page;
      }
    }
  }
  ?>

<?php if (!empty($uncategorized_pages)): ?>
  <div class="news-grid">
    <?php foreach ($uncategorized_pages as $page): ?>
      <article class="news-item">
        <a href="<?php echo get_permalink($page->ID); ?>" class="news-link">
            <?php
            if (has_post_thumbnail($page->ID)) {
              echo get_the_post_thumbnail($page->ID, 'medium', ['class' => 'wp-post-image']);
            } else {
              echo '<img src="' . get_template_directory_uri() . '/assets/images/default-news.jpg" alt="' . esc_attr(get_the_title($page->ID)) . '" class="wp-post-image">';
            }
            ?>
            <div class="news-overlay">
              <div class="news-overlay-content">
                <h3 class="news-title entry-title"><?php echo esc_html(get_the_title($page->ID)); ?></h3>
              </div>
            </div>
        </a>
      </article>
    <?php endforeach; ?>
  </div>
<?php endif; ?>


  <?php
  // Gruppiert nach Kategorie ausgeben
  foreach ($categorized_pages as $cat_group):
    $cat = $cat_group['category'];
    $pages = $cat_group['pages'];
    ?>
    <h2 class="section-title"><?php echo esc_html($cat->name); ?></h2>
    <div class="news-grid">
      <?php foreach ($pages as $page): ?>
        <article class="news-item">
          <a href="<?php echo get_permalink($page->ID); ?>" class="news-link">
            <?php
            if (has_post_thumbnail($page->ID)) {
              echo get_the_post_thumbnail($page->ID, 'medium_large', ['class' => 'wp-post-image']);
            } else {
              echo '<img src="' . get_template_directory_uri() . '/assets/images/default-news.jpg" alt="' . esc_attr(get_the_title($page->ID)) . '">';
            }
            ?>
            <div class="news-overlay">
              <h3 class="news-title entry-title"><?php echo esc_html(get_the_title($page->ID)); ?></h3>
            </div>
          </a>
        </article>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>

</main>

<?php get_footer(); ?>