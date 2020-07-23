<?php

if(!function_exists('barista_edge_map_header')) {
    function barista_edge_map_header()
    {

        $header_meta_box = barista_edge_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Header', 'baristawp'),
                'name' => 'header_meta'
            )
        );
        $temp_holder_show = '';
        $temp_holder_hide = '';
        $temp_array_standard = array();
        $temp_array_vertical = array();
        $temp_array_full_screen = array();
        switch (barista_edge_options()->getOptionValue('header_type')) {

            case 'header-standard':
                $temp_holder_show = '#edgtf_edgtf_header_standard_type_meta_container';
                $temp_holder_hide = '#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container';

                $temp_array_standard = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-vertical', 'header-full-screen')
                );
                $temp_array_vertical = array(
                    'hidden_values' => array('', 'header-standard', 'header-full-screen')
                );
                $temp_array_full_screen = array(
                    'hidden_values' => array('', 'header-standard', 'header-vertical')
                );
                break;

            case 'header-vertical':
                $temp_holder_show = '#edgtf_edgtf_header_vertical_type_meta_container';
                $temp_holder_hide = '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container';

                $temp_array_standard = array(
                    'hidden_values' => array('', 'header-vertical', 'header-full-screen')
                );
                $temp_array_vertical = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-standard', 'header-full-screen')
                );
                $temp_array_full_screen = array(
                    'hidden_values' => array('', 'header-standard', 'header-vertical')
                );
                break;
            case 'header-full-screen':
                $temp_holder_show = '#edgtf_edgtf_header_full_screen_type_meta_container';
                $temp_holder_hide = '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_vertical_type_meta_container';
                $temp_array_standard = array(
                    'hidden_values' => array('', 'header-vertical', 'header-standard')
                );

                $temp_array_vertical = array(
                    'hidden_values' => array('', 'header-standard', 'header-full-screen')
                );

                $temp_array_full_screen = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-vertical', 'header-full-screen')
                );

                break;
        }

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_header_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Choose Header Type', 'baristawp'),
                'description' => esc_html__('Select header type layout', 'baristawp'),
                'parent' => $header_meta_box,
                'options' => array(
                    '' => 'Default',
                    'header-standard' => esc_html__('Standard Header Layout', 'baristawp'),
                    'header-vertical' => esc_html__('Vertical Header Layout', 'baristawp'),
                    'header-full-screen' => esc_html__('Full Screen Header Layout', 'baristawp')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => $temp_holder_hide,
                        'header-standard' => '#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container',
                        'header-vertical' => '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container',
                        'header-full-screen' => '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_vertical_type_meta_container'
                    ),
                    "show" => array(
                        "" => $temp_holder_show,
                        "header-standard" => '#edgtf_edgtf_header_standard_type_meta_container',
                        "header-vertical" => '#edgtf_edgtf_header_vertical_type_meta_container',
                        "header-full-screen" => '#edgtf_edgtf_header_full_screen_type_meta_container'
                    )
                )
            )
        );
        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_header_style_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Header Skin', 'baristawp'),
                'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'baristawp'),
                'parent' => $header_meta_box,
                'options' => array(
                    '' => '',
                    'light-header' => esc_html__('Light', 'baristawp'),
                    'dark-header' => esc_html__('Dark', 'baristawp')
                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'parent' => $header_meta_box,
                'type' => 'select',
                'name' => 'edgtf_enable_header_style_on_scroll_meta',
                'default_value' => '',
                'label' => esc_html__('Enable Header Style on Scroll', 'baristawp'),
                'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'baristawp'),
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'baristawp'),
                    'yes' => esc_html__('Yes', 'baristawp')
                )
            )
        );


        $header_standard_type_meta_container = barista_edge_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'edgtf_header_standard_type_meta_container',
                    'hidden_property' => 'edgtf_header_type_meta',

                ),
                $temp_array_standard
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_color_header_standard_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'baristawp'),
                'description' => esc_html__('Choose a background color for header area', 'baristawp'),
                'parent' => $header_standard_type_meta_container
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_transparency_header_standard_meta',
                'type' => 'text',
                'label' => esc_html__('Transparency', 'baristawp'),
                'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'baristawp'),
                'parent' => $header_standard_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_border_bottom_color_header_standard_meta',
                'type' => 'color',
                'label' => esc_html__('Border Bottom Color', 'baristawp'),
                'description' => esc_html__('Choose a border bottom color for header area', 'baristawp'),
                'parent' => $header_standard_type_meta_container
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_border_bottom_transparency_header_standard_meta',
                'type' => 'text',
                'label' => esc_html__('Transparency', 'baristawp'),
                'description' => esc_html__('Choose a transparency for the header border bottom color (0 = fully transparent, 1 = opaque)', 'baristawp'),
                'parent' => $header_standard_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'parent' => $header_standard_type_meta_container,
                'type' => 'select',
                'name' => 'edgtf_menu_area_in_grid_header_standard_meta',
                'default_value' => '',
                'label' => esc_html__('Header in grid', 'baristawp'),
                'description' => esc_html__('Set header content to be in grid', 'baristawp'),
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'baristawp'),
                    'yes' => esc_html__('Yes', 'baristawp')
                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_scroll_amount_for_sticky_meta',
                'type' => 'text',
                'label' => esc_html__('Scroll amount for sticky header appearance', 'baristawp'),
                'description' => esc_html__('Define scroll amount for sticky header appearance', 'baristawp'),
                'parent' => $header_standard_type_meta_container,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                ),
                'hidden_property' => 'edgtf_header_behaviour',
                'hidden_values' => array("sticky-header-on-scroll-up", "fixed-on-scroll")
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_sticky_header_in_grid_meta',
                'type' => 'select',
                'default_value' => '',
                'options' => array(
                    '' => esc_html__('Default', 'baristawp'),
                    'yes' => esc_html__('Yes', 'baristawp'),
                    'no' => esc_html__('No', 'baristawp')
                ),
                'label' => esc_html__('Sticky Header in grid','baristawp'),
                'description' => esc_html__('Set sticky header content to be in grid','baristawp'),
                'parent' => $header_standard_type_meta_container,
                'hidden_property' => 'edgtf_header_behaviour',
                'hidden_values' => array("sticky-header-on-scroll-up", "fixed-on-scroll")
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'parent' => $header_standard_type_meta_container,
                'type' => 'select',
                'name' => 'edgtf_always_put_content_below_header_meta',
                'default_value' => '',
                'options' => array(
                    '' => esc_html__('Default', 'baristawp'),
                    'yes' => esc_html__('Yes', 'baristawp'),
                    'no' => esc_html__('No', 'baristawp')
                ),
                'label' => esc_html__('Always put content below header','baristawp'),
            )
        );

        $header_vertical_type_meta_container = barista_edge_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'edgtf_header_vertical_type_meta_container',
                    'hidden_property' => 'edgtf_header_type_meta',
                    'hidden_values' => array('header-standard')
                ),
                $temp_array_vertical
            )
        );

        barista_edge_create_meta_box_field(array(
            'name' => 'edgtf_vertical_header_background_color_meta',
            'type' => 'color',
            'label' => esc_html__('Background Color', 'baristawp'),
            'description' => esc_html__('Set background color for vertical menu', 'baristawp'),
            'parent' => $header_vertical_type_meta_container
        ));

        barista_edge_create_meta_box_field(array(
            'name' => 'edgtf_vertical_header_transparency_meta',
            'type' => 'text',
            'label' => esc_html__('Transparency', 'baristawp'),
            'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'baristawp'),
            'parent' => $header_vertical_type_meta_container,
            'args' => array(
                'col_width' => 1
            )
        ));

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_vertical_header_background_image_meta',
                'type' => 'image',
                'default_value' => '',
                'label' => esc_html__('Background Image', 'baristawp'),
                'description' => esc_html__('Set background image for vertical menu', 'baristawp'),
                'parent' => $header_vertical_type_meta_container
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_disable_vertical_header_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Disable Background Image', 'baristawp'),
                'description' => esc_html__('Enabling this option will hide background image in Vertical Menu', 'baristawp'),
                'parent' => $header_vertical_type_meta_container
            )
        );

        $header_full_screen_type_meta_container = barista_edge_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'edgtf_header_full_screen_type_meta_container',
                    'hidden_property' => 'edgtf_header_type_meta',

                ),
                $temp_array_full_screen
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_color_header_full_screen_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'baristawp'),
                'description' => esc_html__('Choose a background color for Full Screen header area', 'baristawp'),
                'parent' => $header_full_screen_type_meta_container
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_transparency_header_full_screen_meta',
                'type' => 'text',
                'label' => esc_html__('Transparency', 'baristawp'),
                'description' => esc_html__('Choose a transparency for the Full Screen header background color (0 = fully transparent, 1 = opaque)', 'baristawp'),
                'parent' => $header_full_screen_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_border_bottom_color_header_full_screen_meta',
                'type' => 'color',
                'label' => esc_html__('Border Bottom Color', 'baristawp'),
                'description' => esc_html__('Choose a border bottom color for Full Screen header area', 'baristawp'),
                'parent' => $header_full_screen_type_meta_container
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_border_bottom_transparency_header_full_screen_meta',
                'type' => 'text',
                'label' => esc_html__('Transparency', 'baristawp'),
                'description' => esc_html__('Choose a transparency for the Full Screen header border bottom color (0 = fully transparent, 1 = opaque)', 'baristawp'),
                'parent' => $header_full_screen_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'parent' => $header_full_screen_type_meta_container,
                'type' => 'select',
                'name' => 'edgtf_menu_area_in_grid_header_full_screen_meta',
                'default_value' => '',
                'label' => esc_html__('Header in grid', 'baristawp'),
                'description' => esc_html__('Set header content to be in grid', 'baristawp'),
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'baristawp'),
                    'yes' => esc_html__('Yes', 'baristawp')
                )
            )
        );

        barista_edge_add_admin_section_title(array(
            'name' => 'top_bar_section_title',
            'parent' => $header_meta_box,
            'title' => esc_html__('Top Bar', 'baristawp')
        ));

        $top_bar_global_option = barista_edge_options()->getOptionValue('top_bar');
        $top_bar_default_dependency = array(
            '' => '#edgtf_top_bar_container_no_style'
        );

        $top_bar_show_array = array(
            'yes' => '#edgtf_top_bar_container_no_style'
        );

        $top_bar_hide_array = array(
            'no' => '#edgtf_top_bar_container_no_style'
        );

        if ($top_bar_global_option === 'yes') {
            $top_bar_show_array = array_merge($top_bar_show_array, $top_bar_default_dependency);
            $temp_top_no = array(
                'hidden_value' => 'no'
            );
        } else {
            $top_bar_hide_array = array_merge($top_bar_hide_array, $top_bar_default_dependency);
            $temp_top_no = array(
                'hidden_values' => array('', 'no')
            );
        }


        barista_edge_create_meta_box_field(array(
            'name' => 'edgtf_top_bar_meta',
            'type' => 'select',
            'label' => esc_html__('Enable Top Bar on This Page', 'baristawp'),
            'description' => esc_html__('Enabling this option will enable top bar on this page', 'baristawp'),
            'parent' => $header_meta_box,
            'default_value' => '',
            'options' => array(
                '' => esc_html__('Default', 'baristawp'),
                'yes' => esc_html__('Yes', 'baristawp'),
                'no' => esc_html__('No', 'baristawp')
            ),
            'args' => array(
                "dependence" => true,
                'show' => $top_bar_show_array,
                'hide' => $top_bar_hide_array
            )
        ));

        $top_bar_container = barista_edge_add_admin_container_no_style(array_merge(array(
            'name' => 'top_bar_container_no_style',
            'parent' => $header_meta_box,
            'hidden_property' => 'edgtf_top_bar_meta'
        ),
            $temp_top_no));

        barista_edge_create_meta_box_field(array(
            'name' => 'edgtf_top_bar_skin_meta',
            'type' => 'select',
            'label' => esc_html__('Top Bar Skin', 'baristawp'),
            'options' => array(
                '' => esc_html__('Default', 'baristawp'),
                'light' => esc_html__('Light', 'baristawp'),
                'dark' => esc_html__('Dark', 'baristawp')
            ),
            'parent' => $top_bar_container
        ));

        barista_edge_create_meta_box_field(array(
            'name' => 'edgtf_top_bar_background_color_meta',
            'type' => 'color',
            'label' => esc_html__('Top Bar Background Color', 'baristawp'),
            'parent' => $top_bar_container
        ));

        barista_edge_create_meta_box_field(array(
            'name' => 'edgtf_top_bar_background_transparency_meta',
            'type' => 'text',
            'label' => esc_html__('Top Bar Background Color Transparency', 'baristawp'),
            'description' => esc_html__('Set top bar background color transparenct. Value should be between 0 and 1', 'baristawp'),
            'parent' => $top_bar_container,
            'args' => array(
                'col_width' => 3
            )
        ));
    }
    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_header');
}