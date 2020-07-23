<?php

if(!function_exists('barista_edge_map_general')) {
    function barista_edge_map_general()
    {
        $general_meta_box = barista_edge_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('General', 'baristawp'),
                'name' => 'general_meta'
            )
        );
        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_predefined_h_tags_style',
                'type' => 'selectblank',
                'label' => esc_html__('Predefined H tags styles', 'baristawp'),
                'description' => esc_html__('Choose predefined style', 'baristawp'),
                'parent' => $general_meta_box,
                'default_value' => '',
                'options' => array(
                    'edgtf-h-style-1' => esc_html__('Enable', 'baristawp')
                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_background_color_meta',
                'type' => 'color',
                'default_value' => '',
                'label' => esc_html__('Page Background Color', 'baristawp'),
                'description' => esc_html__('Choose background color for page content', 'baristawp'),
                'parent' => $general_meta_box
            )
        );

        $edgtf_content_padding_group = barista_edge_add_admin_group(array(
            'name' => 'content_padding_group',
            'title' => esc_html__('Content Style', 'baristawp'),
            'description' => esc_html__('Define styles for Content area', 'baristawp'),
            'parent' => $general_meta_box
        ));

        $edgtf_content_padding_row = barista_edge_add_admin_row(array(
            'name' => 'edgtf_content_padding_row',
            'next' => true,
            'parent' => $edgtf_content_padding_group
        ));

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_content_top_padding',
                'type' => 'textsimple',
                'default_value' => '',
                'label' => esc_html__('Content Top Padding', 'baristawp'),
                'parent' => $edgtf_content_padding_row,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );
        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_content_right_padding',
                'type' => 'textsimple',
                'default_value' => '',
                'label' => esc_html__('Content Right Padding', 'baristawp'),
                'parent' => $edgtf_content_padding_row,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );
        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_content_bottom_padding',
                'type' => 'textsimple',
                'default_value' => '',
                'label' => esc_html__('Content Bottom Padding', 'baristawp'),
                'parent' => $edgtf_content_padding_row,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );
        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_content_left_padding',
                'type' => 'textsimple',
                'default_value' => '',
                'label' => esc_html__('Content Left Padding', 'baristawp'),
                'parent' => $edgtf_content_padding_row,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        $edgtf_content_padding_row2 = barista_edge_add_admin_row(array(
            'name' => 'edgtf_content_padding_row2',
            'next' => true,
            'parent' => $edgtf_content_padding_group
        ));

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_content_top_padding_mobile',
                'type' => 'selectblanksimple',
                'label' => esc_html__('Set this top padding for mobile header', 'baristawp'),
                'parent' => $edgtf_content_padding_row2,
                'options' => array(
                    'yes' => esc_html__('Yes', 'baristawp'),
                    'no' => esc_html__('No', 'baristawp')
                )
            )
        );

        barista_edge_create_meta_box_field(array(
            'name' => 'edgtf_overlapping_content_enable_meta',
            'type' => 'yesno',
            'default_value' => 'no',
            'label' => esc_html__('Enable Overlapping Content', 'baristawp'),
            'description' => esc_html__('Enabling this option will make content overlap title area', 'baristawp'),
            'parent' => $general_meta_box
        ));

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_slider_meta',
                'type' => 'text',
                'default_value' => '',
                'label' => esc_html__('Slider Shortcode', 'baristawp'),
                'description' => esc_html__('Paste your slider shortcode here', 'baristawp'),
                'parent' => $general_meta_box
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_transition_type',
                'type' => 'selectblank',
                'label' => esc_html__('Page Transition', 'baristawp'),
                'description' => esc_html__('Choose the type of transition to this page', 'baristawp'),
                'parent' => $general_meta_box,
                'default_value' => '',
                'options' => array(
                    'no-animation' => esc_html__('No animation', 'baristawp'),
                    'fade' => esc_html__('Fade', 'baristawp')
                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_comments_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Show Comments', 'baristawp'),
                'description' => esc_html__('Enabling this option will show comments on your page', 'baristawp'),
                'parent' => $general_meta_box,
                'options' => array(
                    'yes' => esc_html__('Yes', 'baristawp'),
                    'no' => esc_html__('No', 'baristawp')
                )
            )
        );

        $boxed_option      = barista_edge_options()->getOptionValue('boxed');
        $boxed_default_dependency = array(
            '' => '#edgtf_boxed_container'
        );

        $boxed_show_array = array(
            'yes' => '#edgtf_boxed_container'
        );

        $boxed_hide_array = array(
            'no' => '#edgtf_boxed_container'
        );

        if($boxed_option === 'yes') {
            $boxed_show_array = array_merge($boxed_show_array, $boxed_default_dependency);
            $temp_boxed_no = array(
                'hidden_value' => 'no'
            );
        } else {
            $boxed_hide_array = array_merge($boxed_hide_array, $boxed_default_dependency);
            $temp_boxed_no = array(
                'hidden_values'   => array('','no')
            );
        }

        barista_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_boxed_meta',
                'type'          => 'select',
                'label'         => esc_html__('Boxed Layout', 'baristawp'),
                'description'   => '',
                'parent'        => $general_meta_box,
                'default_value' => '',
                'options'     => array(
                    ''      => esc_html__('Default', 'baristawp'),
                    'yes'   => esc_html__('Yes', 'baristawp'),
                    'no'    => esc_html__('No', 'baristawp')
                ),
                'args' => array(
                    "dependence" => true,
                    'show'       => $boxed_show_array,
                    'hide'       => $boxed_hide_array
                )
            )
        );

        $boxed_container = barista_edge_add_admin_container(
            array_merge(
                array(
                    'parent'            => $general_meta_box,
                    'name'              => 'boxed_container',
                    'hidden_property'   => 'edgtf_boxed_meta'
                ),
                $temp_boxed_no
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_page_background_color_in_box_meta',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'baristawp'),
                'description'   => esc_html__('Choose the page background color outside box.', 'baristawp'),
                'parent'        => $boxed_container
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_boxed_background_image_meta',
                'type'          => 'image',
                'label'         => esc_html__('Background Image', 'baristawp'),
                'description'   => esc_html__('Choose an image to be displayed in background', 'baristawp'),
                'parent'        => $boxed_container
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_boxed_background_image_repeating_meta',
                'type'          => 'select',
                'default_value' => 'no',
                'label'         => esc_html__('Use Background Image as Pattern', 'baristawp'),
                'description'   => esc_html__('Set this option to "yes" to use the background image as repeating pattern', 'baristawp'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'no'    =>  esc_html__('No', 'baristawp'),
                    'yes'   =>  esc_html__('Yes', 'baristawp')

                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_boxed_background_image_attachment_meta',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label'         => esc_html__('Background Image Behaviour', 'baristawp'),
                'description'   => esc_html__('Choose background image behaviour', 'baristawp'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed'     => esc_html__('Fixed', 'baristawp'),
                    'scroll'    => esc_html__('Scroll', 'baristawp')
                )
            )
        );

    }
    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_general');
}