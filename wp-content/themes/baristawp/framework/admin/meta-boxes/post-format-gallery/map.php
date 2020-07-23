<?php

/*** Gallery Post Format ***/

if(!function_exists('barista_edge_map_post_format_gallery')) {
    function barista_edge_map_post_format_gallery()
    {

        $gallery_post_format_meta_box = barista_edge_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Gallery Post Format', 'baristawp'),
                'name' => 'post_format_gallery_meta'
            )
        );

        barista_edge_add_multiple_images_field(
            array(
                'name' => 'edgtf_post_gallery_images_meta',
                'label' => esc_html__('Gallery Images', 'baristawp'),
                'description' => esc_html__('Choose your gallery images', 'baristawp'),
                'parent' => $gallery_post_format_meta_box,
            )
        );
    }
    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_post_format_gallery');
}
