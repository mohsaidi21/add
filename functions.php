<?php include_once('car/customizer.php'); ?>

<?php
if (class_exists("woocommerce")) {
    include_once('car/cus-woocommerce.php');
}
?>
<?php
function theme_setup()
{
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width' => 200,
        'product_grid' => array(
            'default_rows'    => 10,
            'min_rows'        => 1,
            'max_rows'        => 3,
            'default_columns' => 10,
            'min_columns' => 2,
            'max_columns' => 3
        )
    ));
    add_theme_support('custom-background');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
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

// function exclude_pages_from_search($query)
// {
//     if ($query->is_search && !is_admin()) {
//         $query->set('post_type', 'post');
//     }
// }
// add_action('pre_get_posts', 'exclude_pages_from_search');

// function search_products_and_posts($query)
// {
//     if (!is_admin() && $query->is_main_query() && $query->is_search()) {
//         $query->set('post_type', array('post', 'product'));
//     }
// }
// add_action('pre_get_posts', 'search_products_and_posts');


/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;

    ob_start();

?>
    <span class="items-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
<?php
    $fragments['span.items-count'] = ob_get_clean();
    return $fragments;
}
