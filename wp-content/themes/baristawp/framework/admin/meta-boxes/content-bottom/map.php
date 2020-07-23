<?php

if(!function_exists('barista_edge_map_content_bottom')) {
    function barista_edge_map_content_bottom()
    {

        $content_bottom_meta_box = barista_edge_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Content Bottom', 'baristawp'),
                'name' => 'content_bottom_meta'
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_enable_content_bottom_area_meta',
                'type' => 'selectblank',
                'default_value' => '',
                'label' => esc_html__('Enable Content Bottom Area', 'baristawp'),
                'description' => esc_html__('This option will enable Content Bottom area on pages', 'baristawp'),
                'parent' => $content_bottom_meta_box,
                'options' => array(
                    'no' => esc_html__('No', 'baristawp'),
                    'yes' => esc_html__('Yes', 'baristawp')
                ),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#edgtf_edgtf_show_content_bottom_meta_container',
                        'no' => '#edgtf_edgtf_show_content_bottom_meta_container'
                    ),
                    'show' => array(
                        'yes' => '#edgtf_edgtf_show_content_bottom_meta_container'
                    )
                )
            )
        );

        $show_content_bottom_meta_container = barista_edge_add_admin_container(
            array(
                'parent' => $content_bottom_meta_box,
                'name' => 'edgtf_show_content_bottom_meta_container',
                'hidden_property' => 'edgtf_enable_content_bottom_area_meta',
                'hidden_value' => '',
                'hidden_values' => array('', 'no')
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_content_bottom_sidebar_custom_display_meta',
                'type' => 'selectblank',
                'default_value' => '',
                'label' => esc_html__('Sidebar to Display', 'baristawp'),
                'description' => esc_html__('Choose a Content Bottom sidebar to display', 'baristawp'),
                'options' => barista_edge_get_custom_sidebars(),
                'parent' => $show_content_bottom_meta_container
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'type' => 'selectblank',
                'name' => 'edgtf_content_bottom_in_grid_meta',
                'default_value' => '',
                'label' => esc_html__('Display in Grid', 'baristawp'),
                'description' => esc_html__('Enabling this option will place Content Bottom in grid', 'baristawp'),
                'options' => array(
                    'no' => esc_html__('No', 'baristawp'),
                    'yes' => esc_html__('Yes', 'baristawp')
                ),
                'parent' => $show_content_bottom_meta_container
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'type' => 'color',
                'name' => 'edgtf_content_bottom_background_color_meta',
                'default_value' => '',
                'label' => esc_html__('Background Color', 'baristawp'),
                'description' => esc_html__('Choose a background color for Content Bottom area', 'baristawp'),
                'parent' => $show_content_bottom_meta_container
            )
        );
    }
    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_content_bottom');
}