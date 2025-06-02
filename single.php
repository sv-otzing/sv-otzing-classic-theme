<?php get_header(); ?>

<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>

        <?php if (has_post_thumbnail()): ?>
            <div class="post-header-image">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>

        <main class="post-main container">
            <article <?php post_class('post-article'); ?>>

                <header class="post-header">
                    <h1><?php the_title(); ?></h1>
                    <div class="post-meta">
                        <span><?php echo get_the_date('d. F Y'); ?></span> |
                        <span class = "post-category"><?php the_category(', '); ?></span>
                        <?php if (get_the_author()): ?>
                            <span> | Von <?php the_author(); ?></span>
                        <?php endif; ?>

                    </div>

                </header>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>

            </article>
        </main>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>