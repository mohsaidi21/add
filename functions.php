<?php include_once('car/customizer.php') ?>
<?php
function theme_setup()
{
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form'));
}
add_action('after_setup_theme', 'theme_setup');

function enqueue_scripts()
{
    wp_enqueue_style('sty', get_stylesheet_uri());
    wp_enqueue_style(
        'fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css',
        array(),
        '7.0.1'
    );
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

function register_menu()
{
    register_nav_menus(
        array(
            'header_menu' => __('Header Menu'),
            'footer_menu' => __('Footer Menu')
        )
    );
}
add_action('init', 'register_menu');

function exclude_pages_from_search($query)
{
    if ($query->is_search && !is_admin()) {
        $query->set('post_type', 'post');
    }
}
add_action('pre_get_posts', 'exclude_pages_from_search');
