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
  <script type='text/javascript' src="https://widget-prod.bfv.de/widget/widgetresource/widgetjs"></script>

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
            <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" target="_blank"> <i
                class="fa fa-facebook"></i> </a>
          <?php endif; ?>
          <?php if (get_theme_mod('instagram_url')): ?>
            <a href="<?php echo esc_url(get_theme_mod('instagram_url')); ?>" target="_blank"> <i
                class="fa fa-instagram"></i></a>
          <?php endif; ?>
        </div>
      </div>
    </nav>


    <!-- Main Navigation -->

    <!-- Mobile-Menü Toggle -->

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

    <div class="mobile-menu-wrapper">
      <input type="checkbox" id="menu-toggle" />
      <label for="menu-toggle" class="hamburger">☰</label>

      <div class="logo-mobile">
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <?php if (has_custom_logo()) {
            the_custom_logo();
          } else {
            bloginfo('name');
          } ?>
        </a>
      </div>

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
              'menu_class' => 'mobile-menu',
              'fallback_cb' => false,
              'walker' => new class extends Walker_Nav_Menu {
                public function start_lvl(&$output, $depth = 0, $args = null) {
                  $output .= "<ul class=\"submenu\">";
                  if ($depth === 0) {
                    $url = '#';
                    if (!empty($args->walker->last_item_url)) {
                      $url = esc_url($args->walker->last_item_url);
                    }
                    $output .= "<li class=\"menu-item menu-item--overview\"><a href=\"$url\"><i class=\"fa fa-th overview-icon\"></i> Übersicht</a></li>";
                  }
                }
                public $last_item_url = '#';
                public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                  $this->last_item_url = $item->url;
                  $classes = implode(' ', $item->classes);
                  $has_children = in_array('menu-item-has-children', $item->classes) ? ' has-children' : '';
                  $output .= "<li class=\"menu-item $classes$has_children\"><a href=\"" . esc_url($item->url) . "\">" . esc_html($item->title);
                  if ($has_children) {
                    $output .= " <i class='fa fa-chevron-down submenu-toggle-icon'></i>";
                  }
                  $output .= "</a>";
                }
                public function end_el(&$output, $item, $depth = 0, $args = null) {
                  $output .= "</li>";
                }
                public function end_lvl(&$output, $depth = 0, $args = null) {
                  $output .= "</ul>";
                }
              }
            ]);
            ?>
          </nav>
          <script>
            document.addEventListener('DOMContentLoaded', function () {
              document.querySelectorAll('.has-children > a').forEach(link => {
                link.addEventListener('click', function (e) {
                  e.preventDefault();
                  const submenu = this.nextElementSibling;
                  if (submenu) {
                    submenu.style.maxHeight = submenu.style.maxHeight ? null : submenu.scrollHeight + "px";
                    submenu.classList.toggle('open');
                  }
                });
              });
            });
          </script>
        </div>

        <!-- <div class="menu-footer">
        <div class="menu-footer">
          <div class="menu-secondary">
            <?php
            wp_nav_menu([
              'theme_location' => 'top-left-menu',
              'container' => false,
              'menu_class' => 'top-left-menu',
            ]);
            ?>
          </div>
          <div class="menu-icons">
            <?php if (get_theme_mod('facebook_url')): ?>
              <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
            <?php endif; ?>
            <?php if (get_theme_mod('instagram_url')): ?>
              <a href="<?php echo esc_url(get_theme_mod('instagram_url')); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
            <?php endif; ?>
          </div>
        </div>
       </div> -->
      </div>
    </div>

  </div>