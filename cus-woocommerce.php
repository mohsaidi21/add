<?php


// اضافة الحاوية الي المحتوي 
function open_before_content()
{
    echo "<div class='container'>";
}
add_action('woocommerce_before_main_content', 'open_before_content', 5);
function close_after_content()
{
    echo "</div>";
}
add_action('woocommerce_after_main_content', 'close_after_content', 5);

//اخفاء عنوان الصفحة
//remove_action('woocommerce_shop_loop_header', 'woocommerce_product_taxonomy_archive_header', 10);
add_filter('woocommerce_show_page_title', '__return_false');

// هذا الكود يضيف المقنطفات الي المنتجات
//add_action("woocommerce_after_shop_loop_item_title", "the_excerpt");

//حذف مسار التنقل 
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

//حذف الشريط الجانبي
remove_action("woocommerce_sidebar", "woocommerce_get_sidebar");

//حذف القائمة التي تضهر عدد المنتجات
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

//طلب المنتجات من خلال كتالوج ووكومرس او قائمة الطلبات المنسدلة
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

//تغير كلمة sale
add_filter('woocommerce_sale_flash', 'change_sale_text', 10, 3);
function change_sale_text($html, $post, $product)
{
    return '<span class="onsale">HD</span>';
}
// تغير كلمة الموجود في الزر الشراء
add_filter('woocommerce_product_add_to_cart_text', 'custom_add_to_cart_text');
add_filter('woocommerce_product_single_add_to_cart_text', 'custom_add_to_cart_text');

function custom_add_to_cart_text()
{
    return 'أضف إلى السلة'; // استبدلها بالكلمة التي تريدها
}
