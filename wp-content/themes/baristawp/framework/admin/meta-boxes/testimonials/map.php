<?php

//Testimonials

if(!function_exists('barista_edge_map_testimonials')) {
    function barista_edge_map_testimonials()
    {

        $testimonial_meta_box = barista_edge_create_meta_box(
            array(
                'scope' => array('testimonials'),
                'title' => esc_html__('Testimonial', 'baristawp'),
                'name' => 'testimonial_meta'
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_testimonial_title',
                'type' => 'text',
                'label' => esc_html__('Title', 'baristawp'),
                'description' => esc_html__('Enter testimonial title', 'baristawp'),
                'parent' => $testimonial_meta_box,
            )
        );


        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_testimonial_author',
                'type' => 'text',
                'label' => esc_html__('Author', 'baristawp'),
                'description' => esc_html__('Enter author name', 'baristawp'),
                'parent' => $testimonial_meta_box,
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_testimonial_author_position',
                'type' => 'text',
                'label' => esc_html__('Job Position', 'baristawp'),
                'description' => esc_html__('Enter job position', 'baristawp'),
                'parent' => $testimonial_meta_box,
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_testimonial_text',
                'type' => 'text',
                'label' => esc_html__('Text', 'baristawp'),
                'description' => esc_html__('Enter testimonial text', 'baristawp'),
                'parent' => $testimonial_meta_box,
            )
        );
    }
    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_testimonials');
}