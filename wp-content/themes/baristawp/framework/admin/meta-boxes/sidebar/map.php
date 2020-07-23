<?php

if(!function_exists('barista_edge_map_sidebar')) {
    function barista_edge_map_sidebar()
    {

        $custom_sidebars = barista_edge_get_custom_sidebars();

        $sidebar_meta_box = barista_edge_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Sidebar', 'baristawp'),
                'name' => 'sidebar_meta'
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_sidebar_meta',
                'type' => 'select',
                'label' => esc_html__('Layout', 'baristawp'),
                'description' => esc_html__('Choose the sidebar layout', 'baristawp'),
                'parent' => $sidebar_meta_box,
                'options' => array(
                    '' => 'Default',
                    'no-sidebar' => esc_html__('No Sidebar', 'baristawp'),
                    'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'baristawp'),
                    'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'baristawp'),
                    'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'baristawp'),
                    'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'baristawp'),
                )
            )
        );

        if (count($custom_sidebars) > 0) {
            barista_edge_create_meta_box_field(array(
                'name' => 'edgtf_custom_sidebar_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Choose Widget Area in Sidebar', 'baristawp'),
                'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'baristawp'),
                'parent' => $sidebar_meta_box,
                'options' => $custom_sidebars
            ));
        }
    }
    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_sidebar');
}
