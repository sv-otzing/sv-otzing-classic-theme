<?php
/**
 * Template Name: Vorstand
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


    <section class="vorstand-grid">

        <?php
        $query = new WP_Query([
            'post_type' => 'vorstand',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);

        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                $funktion = get_field('funktion');
                $email = get_field('e-mail');
                $telefon = get_field('telefon');
                ?>
                <div class="vorstand-card">
                    <?php if (has_post_thumbnail()): ?>
                        <img class="vorstand-img" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>

                    <h3 class="vorstand-name"><?php the_title(); ?></h3>
                    <p class="vorstand-role"><?= esc_html($funktion); ?></p>
                    <p class="vorstand-contact">
                        <?php if ($email): ?>
                            <a href="mailto:<?= esc_attr($email); ?>"><?= esc_html($email); ?></a><br>
                        <?php endif; ?>
                        <?php if ($telefon): ?>
                            <?= esc_html($telefon); ?>
                        <?php endif; ?>
                    </p>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else: ?>
            <p>Keine Vorstandsmitglieder gefunden.</p>
        <?php endif; ?>

    </section>
</main>

<?php get_footer(); ?>