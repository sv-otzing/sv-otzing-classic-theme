<?php
function init(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'main_menu' => 'Hauptnavigation',
        'top-left-menu' => 'Top-Leiste links',
        'mobile_menu' => 'Mobiles Menü',
    ]);
    add_theme_support('custom-logo');
    register_post_type('vorstand', [
        'labels' => [
            'name' => 'Vorstand',
            'singular_name' => 'Vorstandsmitglied',
            'add_new_item' => 'Neues Vorstandsmitglied hinzufügen',
            'edit_item' => 'Vorstandsmitglied bearbeiten',
            'all_items' => 'Alle Mitglieder',
        ],
        'public' => true,
        'menu_icon' => 'dashicons-groups',
        'has_archive' => false,
        'rewrite' => ['slug' => 'vorstand'],
        'supports' => ['title', 'thumbnail'],
        'show_in_rest' => true, // Für Gutenberg
    ]);


}
add_action('after_setup_theme', 'init');


function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');
  

function add_categories_to_pages()
{
    register_taxonomy_for_object_type('category', 'page');
}
add_action('init', 'add_categories_to_pages');

function load_styles()
{
    $theme_dir = get_template_directory_uri();

    wp_enqueue_style('theme', $theme_dir . '/css/theme.css');
    wp_enqueue_script('theme-menu', $theme_dir . '/js/menu.js', [], null, true);
    wp_enqueue_style(
        'swiper-css',
        get_template_directory_uri() . '/assets/swiper/swiper-bundle.min.css',
        array(),
        '11.1.3'
    );

    wp_enqueue_script(
        'swiper-js',
        get_template_directory_uri() . '/assets/swiper/swiper-bundle.min.js',
        array(),
        '11.1.3',
        true
    );
    wp_enqueue_script('gallery-js', $theme_dir . '/js/gallery.js', [], null, true);


    if (is_front_page()) {
        wp_enqueue_style('front-page', $theme_dir . '/css/front-page.css');
    }


}
add_action('wp_enqueue_scripts', 'load_styles');


function svo_customize_register($wp_customize)
{
    $wp_customize->add_section('svo_social', [
        'title' => 'Social Media',
        'priority' => 30,
    ]);

    $wp_customize->add_setting('facebook_url');
    $wp_customize->add_control('facebook_url', [
        'label' => 'Facebook URL',
        'section' => 'svo_social',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('instagram_url');
    $wp_customize->add_control('instagram_url', [
        'label' => 'Instagram URL',
        'section' => 'svo_social',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('whatsapp_url');
    $wp_customize->add_control('whatsapp_url', [
        'label' => 'WhatsApp Kanal',
        'section' => 'svo_social',
        'type' => 'url',
    ]);
}
add_action('customize_register', 'svo_customize_register');



function feather_icon($name, $width = 24, $height = 24, $classes = 'feather')
{
    $template_url = get_template_directory_uri();
    $class_attr = $classes ? ' class="' . esc_attr($classes) . '"' : '';
    echo '<svg width="' . intval($width) . '" height="' . intval($height) . '" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"' . $class_attr . '>';
    echo '<use href="' . esc_url($template_url) . '/assets/feather/feather-sprite.svg#' . esc_attr($name) . '" />';
    echo '</svg>';
}

function feather_icon_svg($name, $width = 24, $height = 24, $classes = 'feather')
{
    $template_url = get_template_directory_uri();
    $class_attr = $classes ? ' class="' . esc_attr($classes) . '"' : '';
    $svg = '<svg width="' . intval($width) . '" height="' . intval($height) . '" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"' . $class_attr . '>';
    $svg .= '<use href="' . esc_url($template_url) . '/assets/feather/feather-sprite.svg#' . esc_attr($name) . '" />';
    $svg .= '</svg>';
    return $svg;
}

function svo_register_sponsor_post_type()
{
    $labels = array(
        'name' => 'Sponsoren',
        'singular_name' => 'Sponsor',
        'menu_name' => 'Sponsoren',
        'name_admin_bar' => 'Sponsor',
        'add_new' => 'Neu hinzufügen',
        'add_new_item' => 'Neuen Sponsor hinzufügen',
        'new_item' => 'Neuer Sponsor',
        'edit_item' => 'Sponsor bearbeiten',
        'view_item' => 'Sponsor ansehen',
        'all_items' => 'Alle Sponsoren',
        'search_items' => 'Sponsoren durchsuchen',
        'not_found' => 'Keine Sponsoren gefunden',
        'not_found_in_trash' => 'Keine Sponsoren im Papierkorb',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-megaphone', // optional
        'supports' => array('title', 'thumbnail'),
        'has_archive' => false,
        'show_in_rest' => true,
    );

    register_post_type('sponsor', $args);
}
add_action('init', 'svo_register_sponsor_post_type');