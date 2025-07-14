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

function add_categories_to_pages()
{
    register_taxonomy_for_object_type('category', 'page');
}
add_action('init', 'add_categories_to_pages');

function load_styles()
{
    $theme_dir = get_template_directory_uri();

    // Basis-Styles, die immer gebraucht werden
    wp_enqueue_style('main', $theme_dir . '/css/main.css');
    wp_enqueue_style('header', $theme_dir . '/css/header.css');
    wp_enqueue_style('footer', $theme_dir . '/css/footer.css');

    wp_enqueue_script('theme-menu', $theme_dir . '/js/menu.js', [], null, true);

    if (is_front_page()) {
        wp_enqueue_style('front-page', $theme_dir . '/css/front-page.css');
        wp_enqueue_script('gallery-js', $theme_dir . '/js/gallery.js', [], null, true);
    }



    if (is_page_template('vorstand.php')) {
        wp_enqueue_style('vorstand', $theme_dir . '/css/vorstand.css');
    }

    if (is_single()) {
        wp_enqueue_style('single', $theme_dir . '/css/single.css');
    }

    if (is_page()) {
        wp_enqueue_style('page', $theme_dir . '/css/page.css');
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
}
add_action('customize_register', 'svo_customize_register');


