<?php get_header(); ?>

<?php if (have_pages()):
    while (have_pages()):
        the_page(); ?>

        <?php if (has_page_thumbnail()): ?>
            <div class="page-header-image">
                <?php the_page_thumbnail('full'); ?>
            </div>
        <?php endif; ?>

        <main class="page-main container">
            <article <?php page_class('page-article'); ?>>

                <header class="page-header">
                    <h1><?php the_title(); ?></h1>
                    <div class="page-meta">
                        <span><?php echo get_the_date('d. F Y'); ?></span> |
                        <span class = "page-category"><?php the_category(', '); ?></span>
                        <?php if (get_the_author()): ?>
                            <span> | Von <?php the_author(); ?></span>
                        <?php endif; ?>

                    </div>

                </header>

                <div class="page-content">
                    <?php the_content(); ?>
                </div>

            </article>
        </main>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>