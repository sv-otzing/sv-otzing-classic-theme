<?php get_header(); ?>

<?php if (has_post_thumbnail()): ?>
    <div class="page-header-image">
        <?php the_post_thumbnail('full'); ?>
    </div>
<?php endif; ?>



<main class="page-main container">
    <header class="page-header">
        <h1 class="page-title"><?php the_archive_title(); ?></h1>
        <h2 class="archive-description"><?php the_archive_description(); ?></h2>
    </header>



    <div class="news-grid">
        <?php if (have_posts()): ?>
            <?php while (have_posts()):
                the_post(); ?>
                <article class="news-item">
                    <a href="<?php the_permalink(); ?>" class="news-link">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('medium_large', array('class' => 'wp-post-image')); ?>
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-news.jpg"
                                alt="<?php the_title(); ?>">
                        <?php endif; ?>

                        <div class="news-overlay">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)):
                                ?>
                                <span class="news-category"><?php echo esc_html($categories[0]->name); ?></span>
                            <?php endif; ?>

                            <h3 class="news-title entry-title"><?php the_title(); ?></h3>

                            <div class="news-meta entry-meta">
                                <?php echo get_the_date('d.m.Y'); ?>
                            </div>
                        </div>
                    </a>
                </article>
            <?php endwhile; ?>
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else: ?>
            <p>Keine Beiträge gefunden.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>