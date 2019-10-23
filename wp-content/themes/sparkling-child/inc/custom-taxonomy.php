<?php
/**
 * Tạo <a href="https://thachpham.com/wordpress/wordpress-development/wordpress-custom-taxonomy-toan-tap.html" data-wpel-link="internal">custom taxonomy</a>
 * https://piklist.com/learn/doc/getting-started-taxonomies-piklist/
 */
function new_register_taxonomies( $taxonomies ) {
    $taxonomies['batdongsan_cat'] = array(
        'post_type' => 'batdongsan',
        'name' => 'batdongsan_cat',
        'show_admin_column' => true,
        'configuration' => array(
            'hierarchical' => true,
            'labels' => array(
                'name' => 'Danh mục bất động sản',
                'name_singular' => 'Danh mục bất động sản',
                'all_items' => 'Tất cả danh mục bất động sản',
                'edit_item' => 'Sửa danh mục bất động sản',
                'view_item' => 'Xem danh mục bất động sản',
                'add_new_item' => 'Thêm danh mục bất động sản'
            ),
            'show_ui' => true,
            'query_vars' => true,
            'rewrite' => array('slug'=>'batdongsan_cat')
        )
    );
 
    return $taxonomies;
}
add_filter('piklist_taxonomies', 'new_register_taxonomies');