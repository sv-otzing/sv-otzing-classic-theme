<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
    
    <!-- Top Navigation Bar -->
    <nav class="top-nav">
        <div class="container">
            <div class="top-nav-left">
                <?php
                wp_nav_menu([
                    'theme_location' => 'top_menu',
                    'container' => false,
                    'menu_class' => 'top-menu',
                ]);
                ?>
            </div>
            <div class="top-nav-right">
                <?php if (get_theme_mod('facebook_url')) : ?>
                    <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" class="social-icon facebook" target="_blank">Facebook</a>
                <?php endif; ?>
                <?php if (get_theme_mod('instagram_url')) : ?>
                    <a href="<?php echo esc_url(get_theme_mod('instagram_url')); ?>" class="social-icon instagram" target="_blank">Instagram</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Main Navigation -->
    <nav class="main-nav">
        <div class="container">
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        bloginfo('name');
                    } ?>
                </a>
            </div>
            <?php
            wp_nav_menu([
                'theme_location' => 'main_menu',
                'container' => false,
                'menu_class' => 'nav-links',
            ]);
            ?>
        </div>
    </nav>
