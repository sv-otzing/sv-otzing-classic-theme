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
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri()
    );
    wp_enqueue_script('theme-menu', get_template_directory_uri() . '/js/menu.js', [], null, true);
    wp_enqueue_script('theme-menu', get_template_directory_uri() . '/js/gallery.js', [], null, true);
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


