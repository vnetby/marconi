<?php

/*** Quote Post Format ***/
if(!function_exists('barista_edge_map_post_format_quote')) {
    function barista_edge_map_post_format_quote()
    {

        $quote_post_format_meta_box = barista_edge_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Quote Post Format', 'baristawp'),
                'name' => 'post_format_quote_meta'
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_quote_text_meta',
                'type' => 'text',
                'label' => esc_html__('Quote Text', 'baristawp'),
                'description' => esc_html__('Enter Quote text', 'baristawp'),
                'parent' => $quote_post_format_meta_box,

            )
        );
    }
    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_post_format_quote');
}
