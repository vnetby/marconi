<?php 
if(!function_exists('barista_edge_accordions_map')) {
    /**
     * Add Accordion options to elements panel
     */
   function barista_edge_accordions_map() {
		
       $panel = barista_edge_add_admin_panel(array(
           'title' => esc_html__('Accordions', 'edge-cpt' ),
           'name'  => 'panel_accordions',
           'page'  => '_elements_page'
       ));

       //Typography options
       barista_edge_add_admin_section_title(array(
           'name' => 'typography_section_title',
           'title' => esc_html__('Typography', 'edge-cpt' ),
           'parent' => $panel
       ));

       $typography_group = barista_edge_add_admin_group(array(
           'name' => 'typography_group',
           'title' => esc_html__('Typography', 'edge-cpt' ),
			'description' => esc_html__('Setup typography for accordions navigation', 'edge-cpt' ),
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
           'name'          => 'accordions_font_family',
           'default_value' => '',
           'label'         => esc_html__('Font Family', 'edge-cpt' ),
       ));

       barista_edge_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_text_transform',
           'default_value' => '',
           'label'         => esc_html__('Text Transform', 'edge-cpt' ),
           'options'       => barista_edge_get_text_transform_array()
       ));

       barista_edge_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_font_style',
           'default_value' => '',
           'label'         => esc_html__('Font Style', 'edge-cpt' ),
           'options'       => barista_edge_get_font_style_array()
       ));

       barista_edge_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'textsimple',
           'name'          => 'accordions_letter_spacing',
           'default_value' => '',
           'label'         => esc_html__('Letter Spacing', 'edge-cpt' ),
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
           'name'          => 'accordions_font_weight',
           'default_value' => '',
           'label'         => esc_html__('Font Weight', 'edge-cpt' ),
           'options'       => barista_edge_get_font_weight_array()
       ));
		
		//Initial Accordion Color Styles
		
		barista_edge_add_admin_section_title(array(
           'name' => 'accordion_color_section_title',
           'title' => esc_html__('Basic Accordions Color Styles', 'edge-cpt' ),
           'parent' => $panel
       ));
		
		$accordions_color_group = barista_edge_add_admin_group(array(
           'name' => 'accordions_color_group',
           'title' => esc_html__('Accordion Color Styles', 'edge-cpt' ),
			'description' => esc_html__('Set color styles for accordion title', 'edge-cpt' ),
           'parent' => $panel
       ));
		$accordions_color_row = barista_edge_add_admin_row(array(
           'name' => 'accordions_color_row',
           'next' => true,
           'parent' => $accordions_color_group
       ));
		barista_edge_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color',
           'default_value' => '',
           'label'         => esc_html__('Title Color', 'edge-cpt' )
       ));
		barista_edge_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_color',
           'default_value' => '',
           'label'         => esc_html__('Icon Color', 'edge-cpt' )
       ));
		
		$active_accordions_color_group = barista_edge_add_admin_group(array(
           'name' => 'active_accordions_color_group',
           'title' => esc_html__('Active and Hover Accordion Color Styles', 'edge-cpt' ),
			'description' => esc_html__('Set color styles for active and hover accordions', 'edge-cpt' ),
           'parent' => $panel
       ));
		$active_accordions_color_row = barista_edge_add_admin_row(array(
           'name' => 'active_accordions_color_row',
           'next' => true,
           'parent' => $active_accordions_color_group
       ));
		barista_edge_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color_active',
           'default_value' => '',
           'label'         => esc_html__('Title Color', 'edge-cpt' )
       ));
		barista_edge_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_color_active',
           'default_value' => '',
           'label'         => esc_html__('Icon Color', 'edge-cpt' )
       ));
   }
   add_action('barista_edge_options_elements_map', 'barista_edge_accordions_map');
}