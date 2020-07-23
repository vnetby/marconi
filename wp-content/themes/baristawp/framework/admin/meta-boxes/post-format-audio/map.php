<?php

/*** Audio Post Format ***/

if(!function_exists('barista_edge_map_post_format_audio')) {
    function barista_edge_map_post_format_audio()
    {

        $audio_post_format_meta_box = barista_edge_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Audio Post Format', 'baristawp'),
                'name' => 'post_format_audio_meta'
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_audio_link_meta',
                'type' => 'text',
                'label' => esc_html__('Link', 'baristawp'),
                'description' => esc_html__('Enter audion link', 'baristawp'),
                'parent' => $audio_post_format_meta_box,

            )
        );
    }
    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_post_format_audio');
}
