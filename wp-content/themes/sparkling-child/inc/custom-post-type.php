<?php
/**
 * Tạo custom post type
 * https://piklist.com/learn/doc/piklist_post_types/
 */
function new_register_post_types( $post_types ) {
 
    // Tạo post type tên 'batdongsan'
    $post_types['batdongsan'] = array(
        'labels' => array(
            'name' => 'Bất động sản',
            'singular_name' => 'Bất động sản',
            'add_new' => 'Thêm bất động sản',
            'add_new_item' => 'Thêm bất động sản mới',
            'all_items' => 'Tất cả bất động sản',
            'edit_item' => 'Sửa bất động sản',
            'featured_image' => 'Ảnh đại diện bất động sản',
            'filter_item_list' => 'Lọc danh sách bất động sản',
            'item_list' => 'Danh sách bất động sản',
            'set_featured_image' => 'Thiết lập ảnh đại diện'
        ),
        'title' => 'Nhập tên bất động sản',
        'public' => true,
        'supports' => array('title', 'thumbnail', 'editor', 'comment'),
        'rewrite' => array('slug' => 'batdongsan'),
        'hide_meta_box' => array('author'),
        'has_archive' => true
    );
 
    return $post_types;
}
add_filter('piklist_post_types', 'new_register_post_types');
 
?>