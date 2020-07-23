<?php

//Cafe Menu

if(!function_exists('barista_edge_map_cafe_menu')) {
    function barista_edge_map_cafe_menu()
    {

        $cafe_menu_meta_box = barista_edge_create_meta_box(
            array(
                'scope' => array('edgtf-cafe-menu-item'),
                'title' => esc_html__('Cafe Menu Item Settings', 'baristawp'),
                'name' => 'cafe_menu_item_meta'
            )
        );

        
        barista_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_cafe_menu_item_price',
                'type'          => 'text',
                'default_value' => '',
                'label'         => esc_html__('Cafe Menu Item Price', 'baristawp'),
                'description'   => esc_html__('Enter price for this cafe menu item', 'baristawp'),
                'parent'        => $cafe_menu_meta_box,
                'args'          => array(
                    'col_width' => '3'
                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_cafe_menu_item_description',
                'type'          => 'text',
                'default_value' => '',
                'label'         => esc_html__('Cafe Menu Item Description', 'baristawp'),
                'description'   => esc_html__('Enter description for this cafe menu item', 'baristawp'),
                'parent'        => $cafe_menu_meta_box,
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_cafe_menu_item_label',
                'type'          => 'text',
                'default_value' => '',
                'label'         => esc_html__('Cafe Menu Item Label', 'baristawp'),
                'description'   => esc_html__('Enter label for this cafe menu item', 'baristawp'),
                'parent'        => $cafe_menu_meta_box,
                'args'          => array(
                    'col_width' => '3'
                )
            )
        );

    }
    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_cafe_menu');
}