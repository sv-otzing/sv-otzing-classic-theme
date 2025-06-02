<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body <?php body_class(); ?>>
  <div class="desktop-nav-container">
    <nav class="top-nav">
      <div class="menu-container">
        <div class="top-nav-left">
          <?php
          wp_nav_menu([
            'theme_location' => 'top-left-menu',
            'container' => false,
            'menu_class' => 'top-left-menu',
          ]);
          ?>
        </div>
        <div class="top-nav-right">
          <?php if (get_theme_mod('facebook_url')): ?>
            <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" target="_blank">Facebook <i
                class="fa fa-facebook"></i> </a>
          <?php endif; ?>
          <?php if (get_theme_mod('instagram_url')): ?>
            <a href="<?php echo esc_url(get_theme_mod('instagram_url')); ?>" target="_blank">Instagram <i
                class="fa fa-instagram"></i></a>
          <?php endif; ?>
        </div>
      </div>
    </nav>


    <!-- Main Navigation -->

    <!-- Mobile-Menü Toggle -->
    <input type="checkbox" id="menu-toggle" />

    <!-- Desktop Menü -->
    <nav class="desktop">

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
        'menu_class' => 'desktop-menu',
        'fallback_cb' => false,
      ]);
      ?>
      <ul class="desktop-menu-right">
        <!-- <li><a href="#">LOGIN</a></li>
      <li><a href="#">FANSHOP</a></li> -->
      </ul>

    </nav>

    <label for="menu-toggle" class="hamburger">☰</label>

    <div class="overlay-menu">
      <div>
        <div class="overlay-top">
          <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
              <?php if (has_custom_logo()) {
                the_custom_logo();
              } else {
                bloginfo('name');
              } ?>
            </a>
          </div>
          <label for="menu-toggle" class="close-btn">✕</label>
        </div>
        <nav class="menu-main">
          <?php
          wp_nav_menu([
            'theme_location' => 'mobile_menu',
            'container' => false,
            'menu_class' => 'menu-main',
            'fallback_cb' => false,
            'depth' => 1,
          ]);
          ?>
        </nav>
        <div class="menu-secondary">
          <?php
          wp_nav_menu([
            'theme_location' => 'top-left-menu',
            'container' => false,
            'menu_class' => 'top-left-menu',
            'fallback_cb' => false,
          ]);
          ?>
        </div>
      </div>

      <div class="menu-footer">
        <?php if (get_theme_mod('facebook_url')): ?>
          <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" class="social-icon facebook"
            target="_blank">Facebook</a>
        <?php endif; ?>
        <?php if (get_theme_mod('instagram_url')): ?>
          <a href="<?php echo esc_url(get_theme_mod('instagram_url')); ?>" class="social-icon instagram"
            target="_blank">Instagram</a>
        <?php endif; ?>

      </div>
    </div>

  </div>