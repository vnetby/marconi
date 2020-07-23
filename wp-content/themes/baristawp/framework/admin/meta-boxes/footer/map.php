<?php

if(!function_exists('barista_edge_map_footer')) {
    function barista_edge_map_footer()
    {
        $footer_meta_box = barista_edge_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Footer', 'baristawp'),
                'name' => 'footer_meta'
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_disable_footer_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Disable Footer for this Page', 'baristawp'),
                'description' => esc_html__('Enabling this option will hide footer on this page', 'baristawp'),
                'parent' => $footer_meta_box,
            )
        );
    }
    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_footer');
}