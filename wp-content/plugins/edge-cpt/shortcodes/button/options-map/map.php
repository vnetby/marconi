<?php

if(!function_exists('barista_edge_button_map')) {
    function barista_edge_button_map() {
        $panel = barista_edge_add_admin_panel(array(
            'title' => esc_html__('Button','edge-cpt'),
            'name'  => 'panel_button',
            'page'  => '_elements_page'
        ));

        //Typography options
        barista_edge_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => esc_html__('Typography','edge-cpt'),
            'parent' => $panel
        ));

        $typography_group = barista_edge_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Typography','edge-cpt'),
            'description' => esc_html__('Setup typography for all button types','edge-cpt'),
            'parent' => $panel
        ));

        $typography_row = barista_edge_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $typography_group
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'fontsimple',
            'name'          => 'button_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family','edge-cpt'),
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform','edge-cpt'),
            'options'       => barista_edge_get_text_transform_array()
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style','edge-cpt'),
            'options'       => barista_edge_get_font_style_array()
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'button_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing','edge-cpt'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        $typography_row2 = barista_edge_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $typography_group
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'selectsimple',
            'name'          => 'button_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight','edge-cpt'),
            'options'       => barista_edge_get_font_weight_array()
        ));

        //Outline type options
        barista_edge_add_admin_section_title(array(
            'name' => 'type_section_title',
            'title' => esc_html__('Types','edge-cpt'),
            'parent' => $panel
        ));

        $outline_group = barista_edge_add_admin_group(array(
            'name' => 'outline_group',
            'title' => esc_html__('Outline Type','edge-cpt'),
            'description' => esc_html__('Setup outline button type','edge-cpt'),
            'parent' => $panel
        ));

        $outline_row = barista_edge_add_admin_row(array(
            'name' => 'outline_row',
            'next' => true,
            'parent' => $outline_group
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color','edge-cpt'),
            'description'   => ''
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color','edge-cpt'),
            'description'   => ''
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color','edge-cpt'),
            'description'   => ''
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color','edge-cpt'),
            'description'   => ''
        ));

        $outline_row2 = barista_edge_add_admin_row(array(
            'name' => 'outline_row2',
            'next' => true,
            'parent' => $outline_group
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $outline_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color','edge-cpt'),
            'description'   => ''
        ));

	    //Outline Light type options
	    $outline_light_group = barista_edge_add_admin_group(array(
		    'name' => 'outline_light_group',
		    'title' => esc_html__('Outline Light Type','edge-cpt'),
		    'description' => esc_html__('Setup outline light button type','edge-cpt'),
		    'parent' => $panel
	    ));

	    $outline_light_row = barista_edge_add_admin_row(array(
		    'name' => 'outline_light_row',
		    'next' => true,
		    'parent' => $outline_light_group
	    ));

	    barista_edge_add_admin_field(array(
		    'parent'        => $outline_light_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_outline_light_text_color',
		    'default_value' => '',
		    'label'         => esc_html__('Text Color','edge-cpt'),
		    'description'   => ''
	    ));

	    barista_edge_add_admin_field(array(
		    'parent'        => $outline_light_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_outline_light_hover_text_color',
		    'default_value' => '',
		    'label'         => esc_html__('Text Hover Color','edge-cpt'),
		    'description'   => ''
	    ));

	    barista_edge_add_admin_field(array(
		    'parent'        => $outline_light_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_outline_light_hover_bg_color',
		    'default_value' => '',
		    'label'         => esc_html__('Hover Background Color','edge-cpt'),
		    'description'   => ''
	    ));

	    barista_edge_add_admin_field(array(
		    'parent'        => $outline_light_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_outline_light_border_color',
		    'default_value' => '',
		    'label'         => esc_html__('Border Color','edge-cpt'),
		    'description'   => ''
	    ));

	    $outline_light_row2 = barista_edge_add_admin_row(array(
		    'name' => 'outline_light_row2',
		    'next' => true,
		    'parent' => $outline_light_group
	    ));

	    barista_edge_add_admin_field(array(
		    'parent'        => $outline_light_row2,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_outline_light_hover_border_color',
		    'default_value' => '',
		    'label'         => esc_html__('Hover Border Color','edge-cpt'),
		    'description'   => ''
	    ));

        //Solid type options
        $solid_group = barista_edge_add_admin_group(array(
            'name' => 'solid_group',
            'title' => esc_html__('Solid Type','edge-cpt'),
            'description' => esc_html__('Setup solid button type','edge-cpt'),
            'parent' => $panel
        ));

        $solid_row = barista_edge_add_admin_row(array(
            'name' => 'solid_row',
            'next' => true,
            'parent' => $solid_group
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color','edge-cpt'),
            'description'   => ''
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color','edge-cpt'),
            'description'   => ''
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color','edge-cpt'),
            'description'   => ''
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color','edge-cpt'),
            'description'   => ''
        ));

        $solid_row2 = barista_edge_add_admin_row(array(
            'name' => 'solid_row2',
            'next' => true,
            'parent' => $solid_group
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color','edge-cpt'),
            'description'   => ''
        ));

        barista_edge_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color','edge-cpt'),
            'description'   => ''
        ));

	    //Solid dark type options
	    $solid_dark_group = barista_edge_add_admin_group(array(
		    'name' => 'solid_dark_group',
		    'title' => esc_html__('Solid Dark Type','edge-cpt'),
		    'description' => esc_html__('Setup Solid Dark button type','edge-cpt'),
		    'parent' => $panel
	    ));

	    $solid_dark_row = barista_edge_add_admin_row(array(
		    'name' => 'solid_dark_row',
		    'next' => true,
		    'parent' => $solid_dark_group
	    ));

	    barista_edge_add_admin_field(array(
		    'parent'        => $solid_dark_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_solid_dark_text_color',
		    'default_value' => '',
		    'label'         => esc_html__('Text Color','edge-cpt'),
		    'description'   => ''
	    ));

	    barista_edge_add_admin_field(array(
		    'parent'        => $solid_dark_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_solid_dark_hover_text_color',
		    'default_value' => '',
		    'label'         => esc_html__('Text Hover Color','edge-cpt'),
		    'description'   => ''
	    ));

	    barista_edge_add_admin_field(array(
		    'parent'        => $solid_dark_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_solid_dark_bg_color',
		    'default_value' => '',
		    'label'         => esc_html__('Background Color','edge-cpt'),
		    'description'   => ''
	    ));

	    barista_edge_add_admin_field(array(
		    'parent'        => $solid_dark_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_solid_dark_hover_bg_color',
		    'default_value' => '',
		    'label'         => esc_html__('Hover Background Color','edge-cpt'),
		    'description'   => ''
	    ));

	    $solid_dark_row2 = barista_edge_add_admin_row(array(
		    'name' => 'solid_dark_row2',
		    'next' => true,
		    'parent' => $solid_dark_group
	    ));

	    barista_edge_add_admin_field(array(
		    'parent'        => $solid_dark_row2,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_solid_dark_border_color',
		    'default_value' => '',
		    'label'         => esc_html__('Border Color','edge-cpt'),
		    'description'   => ''
	    ));

	    barista_edge_add_admin_field(array(
		    'parent'        => $solid_dark_row2,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_solid_dark_hover_border_color',
		    'default_value' => '',
		    'label'         => esc_html__('Hover Border Color','edge-cpt'),
		    'description'   => ''
	    ));

	    //Transparent type options
	    $transparent_group = barista_edge_add_admin_group(array(
		    'name' => 'transparent_group',
		    'title' => esc_html__('Transparent Type','edge-cpt'),
		    'description' => esc_html__('Setup Transparent button type','edge-cpt'),
		    'parent' => $panel
	    ));

	    $transparent_row = barista_edge_add_admin_row(array(
		    'name' => 'transparent_row',
		    'next' => true,
		    'parent' => $transparent_group
	    ));

	    barista_edge_add_admin_field(array(
		    'parent'        => $transparent_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_transparent_text_color',
		    'default_value' => '',
		    'label'         => esc_html__('Text Color','edge-cpt'),
		    'description'   => ''
	    ));

	    barista_edge_add_admin_field(array(
		    'parent'        => $transparent_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_transparent_hover_text_color',
		    'default_value' => '',
		    'label'         => esc_html__('Text Hover Color','edge-cpt'),
		    'description'   => ''
	    ));
    }

    add_action('barista_edge_options_elements_map', 'barista_edge_button_map');
}

