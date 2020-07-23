<?php

/*** Video Post Format ***/

if(!function_exists('barista_edge_map_post_format_video')) {
    function barista_edge_map_post_format_video()
    {

        $video_post_format_meta_box = barista_edge_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Video Post Format', 'baristawp'),
                'name' => 'post_format_video_meta'
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_video_type_meta',
                'type' => 'select',
                'label' => esc_html__('Video Type', 'baristawp'),
                'description' => esc_html__('Choose video type', 'baristawp'),
                'parent' => $video_post_format_meta_box,
                'default_value' => 'youtube',
                'options' => array(
                    'youtube' => esc_html__('Youtube', 'baristawp'),
                    'vimeo' => esc_html__('Vimeo', 'baristawp'),
                    'self' => esc_html__('Self Hosted', 'baristawp')
                ),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        'youtube' => '#edgtf_edgtf_video_self_hosted_container',
                        'vimeo' => '#edgtf_edgtf_video_self_hosted_container',
                        'self' => '#edgtf_edgtf_video_embedded_container'
                    ),
                    'show' => array(
                        'youtube' => '#edgtf_edgtf_video_embedded_container',
                        'vimeo' => '#edgtf_edgtf_video_embedded_container',
                        'self' => '#edgtf_edgtf_video_self_hosted_container')
                )
            )
        );

        $edgtf_video_embedded_container = barista_edge_add_admin_container(
            array(
                'parent' => $video_post_format_meta_box,
                'name' => 'edgtf_video_embedded_container',
                'hidden_property' => 'edgtf_video_type_meta',
                'hidden_value' => 'self'
            )
        );

        $edgtf_video_self_hosted_container = barista_edge_add_admin_container(
            array(
                'parent' => $video_post_format_meta_box,
                'name' => 'edgtf_video_self_hosted_container',
                'hidden_property' => 'edgtf_video_type_meta',
                'hidden_values' => array('youtube', 'vimeo')
            )
        );


        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_video_id_meta',
                'type' => 'text',
                'label' => esc_html__('Video ID', 'baristawp'),
                'description' => esc_html__('Enter Video ID', 'baristawp'),
                'parent' => $edgtf_video_embedded_container,

            )
        );


        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_video_image_meta',
                'type' => 'image',
                'label' => esc_html__('Video Image', 'baristawp'),
                'description' => esc_html__('Upload video image', 'baristawp'),
                'parent' => $edgtf_video_self_hosted_container,

            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_video_webm_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video WEBM', 'baristawp'),
                'description' => esc_html__('Enter video URL for WEBM format', 'baristawp'),
                'parent' => $edgtf_video_self_hosted_container,

            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_video_mp4_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video MP4', 'baristawp'),
                'description' => esc_html__('Enter video URL for MP4 format', 'baristawp'),
                'parent' => $edgtf_video_self_hosted_container,

            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_video_ogv_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video OGV', 'baristawp'),
                'description' => esc_html__('Enter video URL for OGV format', 'baristawp'),
                'parent' => $edgtf_video_self_hosted_container,

            )
        );
    }
    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_post_format_video');
}