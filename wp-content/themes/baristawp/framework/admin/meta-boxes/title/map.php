<?php


if(!function_exists('barista_edge_map_title')) {
    function barista_edge_map_title()
    {
        $title_meta_box = barista_edge_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Title', 'baristawp'),
                'name' => 'title_meta'
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_show_title_area_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'baristawp'),
                'description' => esc_html__('Disabling this option will turn off page title area', 'baristawp'),
                'parent' => $title_meta_box,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'baristawp'),
                    'yes' => esc_html__('Yes', 'baristawp')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "#edgtf_edgtf_show_title_area_meta_container",
                        "yes" => ""
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_show_title_area_meta_container",
                        "no" => "",
                        "yes" => "#edgtf_edgtf_show_title_area_meta_container"
                    )
                )
            )
        );

        $show_title_area_meta_container = barista_edge_add_admin_container(
            array(
                'parent' => $title_meta_box,
                'name' => 'edgtf_show_title_area_meta_container',
                'hidden_property' => 'edgtf_show_title_area_meta',
                'hidden_value' => 'no'
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Area Type', 'baristawp'),
                'description' => esc_html__('Choose title type', 'baristawp'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'standard' => esc_html__('Standard', 'baristawp'),
                    'breadcrumb' => esc_html__('Breadcrumb', 'baristawp')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "standard" => "",
                        "breadcrumb" => "#edgtf_edgtf_title_area_type_meta_container"
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_title_area_type_meta_container",
                        "standard" => "#edgtf_edgtf_title_area_type_meta_container",
                        "breadcrumb" => ""
                    )
                )
            )
        );

        $title_area_type_meta_container = barista_edge_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'edgtf_title_area_type_meta_container',
                'hidden_property' => 'edgtf_title_area_type_meta',
                'hidden_value' => '',
                'hidden_values' => array('breadcrumb'),
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_enable_breadcrumbs_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Breadcrumbs', 'baristawp'),
                'description' => esc_html__('This option will display Breadcrumbs in Title Area', 'baristawp'),
                'parent' => $title_area_type_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'baristawp'),
                    'yes' => esc_html__('Yes', 'baristawp')
                ),
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_enable_separator_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Separator', 'baristawp'),
                'description' => esc_html__('This option will display Separator in Title Area', 'baristawp'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'baristawp'),
                    'yes' => esc_html__('Yes', 'baristawp')
                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_animation_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Animations', 'baristawp'),
                'description' => esc_html__('Choose an animation for Title Area', 'baristawp'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No Animation', 'baristawp'),
                    'right-left' => esc_html__('Text right to left', 'baristawp'),
                    'left-right' => esc_html__('Text left to right', 'baristawp')
                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_vertial_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Vertical Alignment', 'baristawp'),
                'description' => esc_html__('Specify title vertical alignment', 'baristawp'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'header_bottom' => esc_html__('From Bottom of Header', 'baristawp'),
                    'window_top' => esc_html__('From Window Top', 'baristawp')
                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_content_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Horizontal Alignment', 'baristawp'),
                'description' => esc_html__('Specify title horizontal alignment', 'baristawp'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'left' => esc_html__('Left', 'baristawp'),
                    'center' => esc_html__('Center', 'baristawp'),
                    'right' => esc_html__('Right', 'baristawp')
                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_text_size_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Text Size', 'baristawp'),
                'description' => esc_html__('Choose a default Title size', 'baristawp'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'large' => esc_html__('Large', 'baristawp'),
                    'medium' => esc_html__('Medium', 'baristawp'),
                    'small' => esc_html__('Small', 'baristawp')
                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_text_color_meta',
                'type' => 'color',
                'label' => esc_html__('Title Color', 'baristawp'),
                'description' => esc_html__('Choose a color for title text', 'baristawp'),
                'parent' => $show_title_area_meta_container
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_breadcrumb_color_meta',
                'type' => 'color',
                'label' => esc_html__('Breadcrumb Color', 'baristawp'),
                'description' => esc_html__('Choose a color for breadcrumb text', 'baristawp'),
                'parent' => $show_title_area_meta_container
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'baristawp'),
                'description' => esc_html__('Choose a background color for Title Area', 'baristawp'),
                'parent' => $show_title_area_meta_container
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_hide_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Hide Background Image', 'baristawp'),
                'description' => esc_html__('Enable this option to hide background image in Title Area', 'baristawp'),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#edgtf_edgtf_hide_background_image_meta_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_background_image_meta_container = barista_edge_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'edgtf_hide_background_image_meta_container',
                'hidden_property' => 'edgtf_hide_background_image_meta',
                'hidden_value' => 'yes'
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_meta',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'baristawp'),
                'description' => esc_html__('Choose an Image for Title Area', 'baristawp'),
                'parent' => $hide_background_image_meta_container
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_responsive_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Responsive Image', 'baristawp'),
                'description' => esc_html__('Enabling this option will make Title background image responsive', 'baristawp'),
                'parent' => $hide_background_image_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'baristawp'),
                    'yes' => esc_html__('Yes', 'baristawp')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "",
                        "yes" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta"
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta",
                        "no" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta",
                        "yes" => ""
                    )
                )
            )
        );

        $title_area_background_image_responsive_meta_container = barista_edge_add_admin_container(
            array(
                'parent' => $hide_background_image_meta_container,
                'name' => 'edgtf_title_area_background_image_responsive_meta_container',
                'hidden_property' => 'edgtf_title_area_background_image_responsive_meta',
                'hidden_value' => 'yes'
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_parallax_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Image in Parallax', 'baristawp'),
                'description' => esc_html__('Enabling this option will make Title background image parallax', 'baristawp'),
                'parent' => $title_area_background_image_responsive_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'baristawp'),
                    'yes' => esc_html__('Yes', 'baristawp'),
                    'yes_zoom' => esc_html__('Yes, with zoom out', 'baristawp')
                )
            )
        );

        barista_edge_create_meta_box_field(array(
            'name' => 'edgtf_title_area_height_meta',
            'type' => 'text',
            'label' => esc_html__('Height', 'baristawp'),
            'description' => esc_html__('Set a height for Title Area', 'baristawp'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_border_bottom_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Border Bottom', 'baristawp'),
                'description' => esc_html__('This option will display Border Bottom in Title Area', 'baristawp'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'baristawp'),
                    'yes' => esc_html__('Yes', 'baristawp')
                )
            )
        );

        barista_edge_create_meta_box_field(array(
            'name' => 'edgtf_title_area_subtitle_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => esc_html__('Subtitle Text', 'baristawp'),
            'description' => esc_html__('Enter your subtitle text', 'baristawp'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 6
            )
        ));

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_subtitle_color_meta',
                'type' => 'color',
                'label' => esc_html__('Subtitle Color', 'baristawp'),
                'description' => esc_html__('Choose a color for subtitle text', 'baristawp'),
                'parent' => $show_title_area_meta_container
            )
        );
    }
    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_title');
}