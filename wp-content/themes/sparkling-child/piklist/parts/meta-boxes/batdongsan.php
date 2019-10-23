<?php
/*
Title: Thông tin Bất Động Sản
Post Type: batdongsan
*/

/**
 * Tạo box nhập giá Bất Động Sản
 * https://piklist.com/learn/doc/text/
 */
piklist('field', array(
    'type' => 'text',
    'field' => 'batdongsan_price',
    'label' => 'Giá của Bất Động Sản',
    'description' => 'Nhập giá của Bất Động Sản',
    'help' => 'Nhập chữ hoặc số và giá trị này sẽ hiển thị ra bên ngoài website',
    'attributes' => array(
        'class' => 'batdongsan_price text'
    )
));

/**
 * Tạo box nhập link or API Googlemap
 * https://piklist.com/learn/doc/text/
 */
piklist('field', array(
    'type' => 'text',
    'field' => 'batdongsan_location',
    'label' => 'Địa điểm của Bất Động Sản',
    'description' => 'Nhập vị trí của Bất Động Sản',
    'help' => 'Nhập chữ hoặc số và giá trị này sẽ hiển thị ra bên ngoài website',
    'attributes' => array(
        'class' => 'batdongsan_location text'
    )
));

/**
 * Tạo box nhập link or API Googlemap
 * https://piklist.com/learn/doc/text/
 */
piklist('field', array(
    'type' => 'text',
    'field' => 'batdongsan_map',
    'label' => 'Link googlemap',
    'description' => 'Copy link google map tại vị trí của Bất Động Sản',
    'help' => 'Nhập chữ hoặc số và giá trị này sẽ kết nối API giúp hiển thị map',
    'attributes' => array(
        'class' => 'batdongsan_map text'
    )
));

/**
 * Tạo field nhập thuộc tính Bất Động Sản
 * đây là field kiểu `group`
 * /wp-content/plugins/piklist/add-ons/piklist-demos/parts/meta-boxes/field-add-more-single-level.php
 */
piklist('field', array(
    'type' => 'group',
    'label' => 'Thuộc tính Bất Động Sản',
    'add_more' => true,
    'field' => 'batdongsan_attributes',
    'fields' => array(
        array(
            'type' => 'text',
            'field' => 'batdongsan_att_name',
            'label' => 'Thuộc tính',
            'help' => 'Tên thuộc tính sản phẩm là một đoạn chữ miêu tả một thuộc tính đặc biệt của sản phẩm. Ví dụ: Hệ điều hành, Đời máy,...',
            'columns' => 6
        ),
        array(
            'type' => 'text',
            'field' => 'batdongsan_att_value',
            'label' => 'Giá trị thuộc tính',
            'help' => 'Hãy nhập giá trị thuộc tính tương ứng với tên thuộc tính tương ứng.',
            'columns' => 6
        )
    )
));