<?php get_header(); ?>

<main class="container archive-page">
    <h1 class="archive-title"><?php the_archive_title(); ?></h1>
    <p class="archive-description"><?php the_archive_description(); ?></p>

    <?php if (have_posts()) : ?>
        <div class="post-list">
            <?php while (have_posts()) : the_post(); ?>
                <article class="post-item">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="post-meta"><?php the_time('d.m.Y'); ?> | <?php the_category(', '); ?></p>
                    <p><?php the_excerpt(); ?></p>
                </article>
                <hr>
            <?php endwhile; ?>

            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        </div>
    <?php else : ?>
        <p>Keine Beiträge gefunden.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
