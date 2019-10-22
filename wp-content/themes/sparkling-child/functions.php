<?php
/**
 * Nhúng tập tin /inc/init.php vào để load một số chức năng trong website
 */
require dirname( __FILE__ ) . '/inc/init.php';
/**
 * Các thiết lập liên quan đến theme
 */
function sparkling_child_theme_setup() {
    add_image_size( 'sanpham_thumb', 370, 300, false );
}
add_action('init', 'sparkling_child_theme_setup', 10);
/**
 * Xóa style.css của child-theme.
 */
function remove_default_styles() {
    wp_dequeue_style( 'sparkling-style' );
}
add_action('wp_print_styles', 'remove_default_styles', 10 );
/**
 * Đăng ký handle cho style.css của theme mẹ
 * Và sử dụng như một thành phần phụ thuộc của style.css theme con
 */
function sparkling_child_load_theme_style() {
    wp_enqueue_style('parent-styles', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-styles', get_stylesheet_directory_uri() . '/style.css', array('parent-styles'));
}
add_action('wp_enqueue_scripts', 'sparkling_child_load_theme_style', 15 );