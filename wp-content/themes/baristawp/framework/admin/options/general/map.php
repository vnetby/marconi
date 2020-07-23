<?php

if ( ! function_exists('barista_edge_general_options_map') ) {
    /**
     * General options page
     */
    function barista_edge_general_options_map() {

        barista_edge_add_admin_page(
            array(
                'slug'  => '',
                'title' => esc_html__('General', 'baristawp'),
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_design_style = barista_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => esc_html__('Design Style', 'baristawp')
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'baristawp'),
                'description'   => esc_html__('Choose a default Google font for your site (default is Montserrat)', 'baristawp'),
                'parent' => $panel_design_style
            )
        );

	    barista_edge_add_admin_field(
		    array(
			    'name'          => 'google_fonts_second',
			    'type'          => 'font',
			    'default_value' => '-1',
			    'label'         => esc_html__('Second Font Family', 'baristawp'),
			    'description'   => esc_html__('Choose a default Google font for your site (default is Open Sans)', 'baristawp'),
			    'parent' => $panel_design_style
		    )
	    );

        barista_edge_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Additional Google Fonts', 'baristawp'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = barista_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'additional_google_fonts_container',
                'hidden_property'   => 'additional_google_fonts',
                'hidden_value'      => 'no'
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'baristawp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'baristawp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'baristawp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'baristawp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'baristawp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'baristawp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'baristawp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'baristawp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'baristawp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'baristawp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'first_color',
                'type'          => 'color',
                'label'         => esc_html__('First Main Color', 'baristawp'),
                'description'   => esc_html__('Choose the most dominant theme color. Default color is #69c5d3', 'baristawp'),
                'parent'        => $panel_design_style
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'second_color',
                'type'          => 'color',
                'label'         => esc_html__('Second Main Color', 'baristawp'),
                'description'   => esc_html__('Choose the most dominant theme color. Default color is #cde422', 'baristawp'),
                'parent'        => $panel_design_style
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'page_background_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'baristawp'),
                'description'   => esc_html__('Choose the background color for page content. Default color is #ffffff', 'baristawp'),
                'parent'        => $panel_design_style
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'selection_color',
                'type'          => 'color',
                'label'         => esc_html__('Text Selection Color', 'baristawp'),
                'description'   => esc_html__('Choose the color users see when selecting text', 'baristawp'),
                'parent'        => $panel_design_style
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Boxed Layout', 'baristawp'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_boxed_container"
                )
            )
        );

        $boxed_container = barista_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'boxed_container',
                'hidden_property'   => 'boxed',
                'hidden_value'      => 'no'
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'page_background_color_in_box',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'baristawp'),
                'description'   => esc_html__('Choose the page background color outside box.', 'baristawp'),
                'parent'        => $boxed_container
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Background Image', 'baristawp'),
                'description'   => esc_html__('Choose an image to be displayed in background', 'baristawp'),
                'parent'        => $boxed_container
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image_repeating',
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

        barista_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
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
        barista_edge_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Initial Width of Content', 'baristawp'),
                'description'   => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to Default Template and rows set to In Grid)', 'baristawp'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    ""          => "1300px - default",
                    "grid-1300" => "1300px",
                    "grid-1200" => "1200px",
                    "grid-1000" => "1000px",
                    "grid-800"  => "800px"
                )
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'preload_pattern_image',
                'type'          => 'image',
                'label'         => esc_html__('Preload Pattern Image', 'baristawp'),
                'description'   => esc_html__('Choose preload pattern image to be displayed until images are loaded ', 'baristawp'),
                'parent'        => $panel_design_style
            )
        );

        barista_edge_add_admin_field(
            array(
                'name' => 'element_appear_amount',
                'type' => 'text',
                'label' => esc_html__('Element Appearance', 'baristawp'),
                'description' => esc_html__('For animated elements, set distance (related to browser bottom) to start the animation', 'baristawp'),
                'parent' => $panel_design_style,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        $panel_settings = barista_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => esc_html__('Settings', 'baristawp')
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'smooth_scroll',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Scroll', 'baristawp'),
                'description'   => esc_html__('Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'baristawp'),
                'parent'        => $panel_settings
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Page Transitions', 'baristawp'),
                'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links.', 'baristawp'),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_page_transitions_container #edgtf_smooth_pt_spinner_logo"
                )
            )
        );

        $page_transitions_container = barista_edge_add_admin_container(
            array(
                'parent'            => $panel_settings,
                'name'              => 'page_transitions_container',
                'hidden_property'   => 'smooth_page_transitions',
                'hidden_value'      => 'no'
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'smooth_pt_bgnd_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Loader Background Color', 'baristawp'),
                //'description'   => 'Enabling this option will perform a smooth transition between pages when clicking on links.',
                'parent'        => $page_transitions_container
            )
        );

        $group_pt_spinner_animation = barista_edge_add_admin_group(array(
            'name'          => 'group_pt_spinner_animation',
            'title'         => esc_html__('Loader Style', 'baristawp'),
            'description'   => esc_html__('Define styles for loader spinner animation', 'baristawp'),
            'parent'        => $page_transitions_container
        ));

        $logo_params_container = barista_edge_add_admin_container(
            array(
                'parent'            => $page_transitions_container,
                'name'              => 'logo_params_container',
                'hidden_property'   => 'smooth_pt_spinner_logo',
                'hidden_value'      => 'no'
            )
        );

        $row_pt_spinner_animation = barista_edge_add_admin_row(array(
            'name'      => 'row_pt_spinner_animation',
            'parent'    => $group_pt_spinner_animation
        ));

        barista_edge_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => 'pulse',
            'label'         => esc_html__('Spinner Type', 'baristawp'),
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                "3d_cube" => esc_html__("3D Cube", 'baristawp'),
                "nodes" => esc_html__("Nodes", 'baristawp'),
                "pulse" => esc_html__("Pulse", 'baristawp'),
                "double_pulse" => esc_html__("Double Pulse", 'baristawp'),
                "cube" => esc_html__("Cube", 'baristawp'),
                "rotating_cubes" => esc_html__("Rotating Cubes", 'baristawp'),
                "stripes" => esc_html__("Stripes", 'baristawp'),
                "wave" => esc_html__("Wave", 'baristawp'),
                "two_rotating_circles" => esc_html__("2 Rotating Circles", 'baristawp'),
                "five_rotating_circles" => esc_html__("5 Rotating Circles", 'baristawp'),
                "atom" => esc_html__("Atom", 'baristawp'),
                "clock" => esc_html__("Clock", 'baristawp'),
                "mitosis" => esc_html__("Mitosis", 'baristawp'),
                "lines" => esc_html__("Lines", 'baristawp'),
                "fussion" => esc_html__("Fussion", 'baristawp'),
                "wave_circles" => esc_html__("Wave Circles", 'baristawp'),
                "pulse_circles" => esc_html__("Pulse Circles", 'baristawp')
            ),
            'args'          => array(
                "dependence"             => true,
                'show'        => array(
                    "3d_cube"               => '#edgtf_color_spinner_container',
                    "nodes"                 => "",
                    "pulse"                 => "",
                    "double_pulse"          => "",
                    "cube"                  => "",
                    "rotating_cubes"        => "",
                    "stripes"               => "",
                    "wave"                  => "",
                    "two_rotating_circles"  => "",
                    "five_rotating_circles" => "",
                    "atom"                  => "",
                    "clock"                 => "",
                    "mitosis"               => "",
                    "lines"                 => "",
                    "fussion"               => "",
                    "wave_circles"          => "",
                    "pulse_circles"         => ""
                ),
                'hide'        => array(
                    ""                      => '',
                    "3d_cube"               => '',
                    "nodes"                 => "#edgtf_color_spinner_container",
                    "pulse"                 => "#edgtf_color_spinner_container",
                    "double_pulse"          => "#edgtf_color_spinner_container",
                    "cube"                  => "#edgtf_color_spinner_container",
                    "rotating_cubes"        => "#edgtf_color_spinner_container",
                    "stripes"               => "#edgtf_color_spinner_container",
                    "wave"                  => "#edgtf_color_spinner_container",
                    "two_rotating_circles"  => "#edgtf_color_spinner_container",
                    "five_rotating_circles" => "#edgtf_color_spinner_container",
                    "atom"                  => "#edgtf_color_spinner_container",
                    "clock"                 => "#edgtf_color_spinner_container",
                    "mitosis"               => "#edgtf_color_spinner_container",
                    "lines"                 => "#edgtf_color_spinner_container",
                    "fussion"               => "#edgtf_color_spinner_container",
                    "wave_circles"          => "#edgtf_color_spinner_container",
                    "pulse_circles"         => "#edgtf_color_spinner_container"
                )
            )
        ));

        barista_edge_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label'         => esc_html__('Spinner Color', 'baristawp'),
            'parent'        => $row_pt_spinner_animation
        ));

        $color_spinner_container = barista_edge_add_admin_container(
            array(
                'parent'          => $panel_settings,
                'name'            => 'color_spinner_container',
                'hidden_property' => 'smooth_pt_spinner_type',
                'hidden_value'    => '',
                'hidden_values'   =>array(
                    "nodes",
                    "pulse",
                    "double_pulse",
                    "cube",
                    "rotating_cubes",
                    "stripes",
                    "wave",
                    "two_rotating_circles",
                    "five_rotating_circles",
                    "atom",
                    "clock",
                    "mitosis",
                    "lines",
                    "fussion",
                    "wave_circles",
                    "pulse_circles"
                )
            )
        );

        $group_pt_spinner_additional_colors = barista_edge_add_admin_group(array(
            'name'          => 'group_pt_spinner_additional_colors',
            'title'         => esc_html__('Additional Colors', 'baristawp'),
            'description'   => esc_html__('Define additional colors for 3D Cube', 'baristawp'),
            'parent'        => $color_spinner_container
        ));

        $row_pt_spinner_additional_colors = barista_edge_add_admin_row(array(
            'name'      => 'row_pt_spinner_additional_colors',
            'parent'    => $group_pt_spinner_additional_colors
        ));

        barista_edge_add_admin_field(
            array(
                'type'          => 'colorsimple',
                'name'          => 'additional_color_1',
                'default_value' => '-1',
                'label'         => esc_html__('First Additional Color', 'baristawp'),
                'parent'        => $row_pt_spinner_additional_colors
            )
        );

        barista_edge_add_admin_field(
            array(
                'type'          => 'colorsimple',
                'name'          => 'additional_color_2',
                'default_value' => '-1',
                'label'         => esc_html__('Second Additional Color', 'baristawp'),
                'parent'        => $row_pt_spinner_additional_colors
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Show "Back To Top Button"', 'baristawp'),
                'description'   => esc_html__('Enabling this option will display a Back to Top button on every page', 'baristawp'),
                'parent'        => $panel_settings
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Responsiveness', 'baristawp'),
                'description'   => esc_html__('Enabling this option will make all pages responsive', 'baristawp'),
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = barista_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'baristawp')
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'custom_css',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom CSS', 'baristawp'),
                'description'   => esc_html__('Enter your custom CSS here', 'baristawp'),
                'parent'        => $panel_custom_code
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'custom_js',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom JS', 'baristawp'),
                'description'   => esc_html__('Enter your custom Javascript here', 'baristawp'),
                'parent'        => $panel_custom_code
            )
        );

        $panel_google_maps_api_key = barista_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'google_maps_api_key',
                'title' => esc_html__('Google Maps API key', 'baristawp')
            )
        );

        barista_edge_add_admin_field(
            array(
                'name'          => 'google_maps_api_key',
                'type'          => 'text',
                'label'         => esc_html__('Google Maps API key', 'baristawp'),
                'description'   => esc_html__('Enter your Google Maps API key here', 'baristawp'),
                'parent'        => $panel_google_maps_api_key
            )
        );

    }

    add_action( 'barista_edge_options_map', 'barista_edge_general_options_map', 1);

}