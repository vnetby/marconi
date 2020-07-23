<?php

if ( ! function_exists('barista_edge_search_options_map') ) {

	function barista_edge_search_options_map() {

		barista_edge_add_admin_page(
			array(
				'slug' => '_search_page',
				'title' => esc_html__('Search','baristawp'),
				'icon' => 'fa fa-search'
			)
		);

		$search_panel = barista_edge_add_admin_panel(
			array(
				'title' => esc_html__('Search','baristawp'),
				'name' => 'search',
				'page' => '_search_page'
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_type',
				'default_value'	=> 'search-covers-header',
				'label' 		=> esc_html__('Select Search Type','baristawp'),
				'description' 	=> esc_html__("Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with transparent header)",'baristawp'),
				'options' 		=> array(
					'search-covers-header' => esc_html__('Search Covers Header','baristawp'),
					'fullscreen-search' => esc_html__('Fullscreen Search','baristawp'),
				),
				'args'			=> array(
					'dependence'=> true,
					'hide'		=> array(
						'search-covers-header' => '#edgtf_search_height_container, #edgtf_search_animation_container',
						'fullscreen-search' => '#edgtf_search_height_container',
					),
					'show'		=> array(
						'search-covers-header' => '',
						'fullscreen-search' => '#edgtf_search_animation_container',
					)
				)
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_icon_pack',
				'default_value'	=> 'ico_moon',
				'label'			=> esc_html__('Search Icon Pack','baristawp'),
				'description'	=> esc_html__('Choose icon pack for search icon','baristawp'),
				'options'		=> barista_edge_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'simple_line_icons', 'dripicons'))
			)
		);

		$search_height_container = barista_edge_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'search_height_container',
				'hidden_property'	=> 'search_type',
				'hidden_value'		=> '',
				'hidden_values'		=> array(
					'search-covers-header',
					'fullscreen-search',
				)
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_height_container,
				'type'			=> 'text',
				'name'			=> 'search_height',
				'default_value'	=> '',
				'label'			=> esc_html__('Search bar height','baristawp'),
				'description'	=> esc_html__('Set search bar height','baristawp'),
				'args'			=> array(
					'col_width' => 3,
					'suffix'	=> 'px'
				)
			)
		);

		$search_animation_container = barista_edge_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'search_animation_container',
				'hidden_property'	=> 'search_type',
				'hidden_value'		=> '',
				'hidden_values'		=> array(
					'search-covers-header',
				)
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_animation_container,
				'type'			=> 'select',
				'name'			=> 'search_animation',
				'default_value'	=> 'search-fade',
				'label'			=> esc_html__('Fullscreen Search Overlay Animation','baristawp'),
				'description'	=> esc_html__('Choose animation for fullscreen search overlay','baristawp'),
				'options'		=> array(
					'search-fade'			=> esc_html__('Fade','baristawp'),
					'search-from-circle'	=> esc_html__('Circle appear','baristawp')
				)
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'search_in_grid',
				'default_value'	=> 'yes',
				'label'			=> esc_html__('Search area in grid','baristawp'),
				'description'	=> esc_html__('Set search area to be in grid','baristawp'),
			)
		);

		barista_edge_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'initial_header_icon_title',
				'title'		=> esc_html__('Initial Search Icon in Header','baristawp'),
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'text',
				'name'			=> 'header_search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size','baristawp'),
				'description'	=> esc_html__('Set size for icon','baristawp'),
				'args'			=> array(
					'col_width' => 3,
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_color_group = barista_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Colors','baristawp'),
				'description'	=> esc_html__('Define color style for icon','baristawp'),
				'name'		=> 'search_icon_color_group'
			)
		);

		$search_icon_color_row = barista_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row'
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'	=> $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_color',
				'label'		=> esc_html__('Color','baristawp'),
			)
		);
		barista_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_hover_color',
				'label'		=> esc_html__('Hover Color','baristawp'),
			)
		);
		barista_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_color',
				'label'		=> esc_html__('Light Header Icon Color','baristawp'),
			)
		);
		barista_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_hover_color',
				'label'		=> esc_html__('Light Header Icon Hover Color','baristawp'),
			)
		);

		$search_icon_color_row2 = barista_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row2',
				'next'		=> true
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_color',
				'label'		=> esc_html__('Dark Header Icon Color','baristawp'),
			)
		);
		barista_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_hover_color',
				'label'		=> esc_html__('Dark Header Icon Hover Color','baristawp'),
			)
		);


		$search_icon_background_group = barista_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Background Style','baristawp'),
				'description'	=> esc_html__('Define background style for icon','baristawp'),
				'name'		=> 'search_icon_background_group'
			)
		);

		$search_icon_background_row = barista_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_background_group,
				'name'		=> 'search_icon_background_row'
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Color','baristawp'),
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_hover_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Hover Color','baristawp'),
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'enable_search_icon_text',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Enable Search Icon Text','baristawp'),
				'description'	=> esc_html__("Enable this option to show 'Search' text next to search icon in header",'baristawp'),
				'args'			=> array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_enable_search_icon_text_container'
				)
			)
		);

		$enable_search_icon_text_container = barista_edge_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'enable_search_icon_text_container',
				'hidden_property'	=> 'enable_search_icon_text',
				'hidden_value'		=> 'no'
			)
		);

		$enable_search_icon_text_group = barista_edge_add_admin_group(
			array(
				'parent'	=> $enable_search_icon_text_container,
				'title'		=> esc_html__('Search Icon Text','baristawp'),
				'name'		=> 'enable_search_icon_text_group',
				'description'	=> esc_html__('Define Style for Search Icon Text','baristawp'),
			)
		);

		$enable_search_icon_text_row = barista_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row'
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color',
				'label'			=> esc_html__('Text Color','baristawp'),
				'default_value'	=> ''
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color_hover',
				'label'			=> esc_html__('Text Hover Color','baristawp'),
				'default_value'	=> ''
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_fontsize',
				'label'			=> esc_html__('Font Size','baristawp'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_lineheight',
				'label'			=> esc_html__('Line Height','baristawp'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$enable_search_icon_text_row2 = barista_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row2',
				'next'		=> true
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_texttransform',
				'label'			=> esc_html__('Text Transform','baristawp'),
				'default_value'	=> '',
				'options'		=> barista_edge_get_text_transform_array()
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_icon_text_google_fonts',
				'label'			=> esc_html__('Font Family','baristawp'),
				'default_value'	=> '-1',
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontstyle',
				'label'			=> esc_html__('Font Style','baristawp'),
				'default_value'	=> '',
				'options'		=> barista_edge_get_font_style_array(),
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontweight',
				'label'			=> esc_html__('Font Weight','baristawp'),
				'default_value'	=> '',
				'options'		=> barista_edge_get_font_weight_array(),
			)
		);

		$enable_search_icon_text_row3 = barista_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row3',
				'next'		=> true
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row3,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_letterspacing',
				'label'			=> esc_html__('Letter Spacing','baristawp'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_spacing_group = barista_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Spacing','baristawp'),
				'description'	=> esc_html__('Define padding and margins for Search icon','baristawp'),
				'name'		=> 'search_icon_spacing_group'
			)
		);

		$search_icon_spacing_row = barista_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_spacing_group,
				'name'		=> 'search_icon_spacing_row'
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Left','baristawp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Right','baristawp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Left','baristawp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Right','baristawp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		barista_edge_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'search_form_title',
				'title'		=> esc_html__('Search Bar','baristawp'),
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'color',
				'name'			=> 'search_background_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Color','baristawp'),
				'description'	=> esc_html__('Choose a background color for Select search bar','baristawp'),
			)
		);

		$search_input_text_group = barista_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Input Text','baristawp'),
				'description'	=> esc_html__('Define style for search text','baristawp'),
				'name'		=> 'search_input_text_group'
			)
		);

		$search_input_text_row = barista_edge_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row'
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_text_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Color','baristawp'),
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_fontsize',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Size','baristawp'),
				'args'			=> array(
					'suffix' => 'px'
				)
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_texttransform',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Transform','baristawp'),
				'options'		=> barista_edge_get_text_transform_array()
			)
		);

		$search_input_text_row2 = barista_edge_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row2'
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_text_google_fonts',
				'default_value'	=> '-1',
				'label'			=> esc_html__('Font Family','baristawp'),
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontstyle',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Style','baristawp'),
				'options'		=> barista_edge_get_font_style_array(),
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontweight',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Weight','baristawp'),
				'options'		=> barista_edge_get_font_weight_array()
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_letterspacing',
				'default_value'	=> '',
				'label'			=> esc_html__('Letter Spacing','baristawp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_label_text_group = barista_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Label Text','baristawp'),
				'description'	=> esc_html__('Define style for search label text (for fullscreen search type)','baristawp'),
				'name'		=> 'search_label_text_group'
			)
		);

		$search_label_text_row = barista_edge_add_admin_row(
			array(
				'parent'	=> $search_label_text_group,
				'name'		=> 'search_label_text_row'
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_label_text_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Color','baristawp'),
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_label_text_fontsize',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Size','baristawp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_texttransform',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Transform','baristawp'),
				'options'		=> barista_edge_get_text_transform_array()
			)
		);

		$search_label_text_row2 = barista_edge_add_admin_row(
			array(
				'parent'	=> $search_label_text_group,
				'name'		=> 'search_label_text_row2',
				'next'		=> true
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_label_text_google_fonts',
				'default_value'	=> '-1',
				'label'			=> esc_html__('Font Family','baristawp'),
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_fontstyle',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Style','baristawp'),
				'options'		=> barista_edge_get_font_style_array()
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_fontweight',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Weight','baristawp'),
				'options'		=> barista_edge_get_font_weight_array()
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'textsimple',
				'name'			=> 'search_label_text_letterspacing',
				'default_value'	=> '',
				'label'			=> esc_html__('Letter Spacing','baristawp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_group = barista_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Icon','baristawp'),
				'description'	=> esc_html__('Define style for search icon (fullscreen search type)','baristawp'),
				'name'		=> 'search_icon_group'
			)
		);

		$search_icon_row = barista_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Color','baristawp'),
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_hover_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Hover Color','baristawp'),
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size','baristawp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_close_icon_group = barista_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Close','baristawp'),
				'description'	=> esc_html__('Define style for search close icon','baristawp'),
				'name'		=> 'search_close_icon_group'
			)
		);

		$search_close_icon_row = barista_edge_add_admin_row(
			array(
				'parent'	=> $search_close_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_color',
				'label'			=> esc_html__('Icon Color','baristawp'),
				'default_value'	=> ''
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_hover_color',
				'label'			=> esc_html__('Icon Hover Color','baristawp'),
				'default_value'	=> ''
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_close_size',
				'label'			=> esc_html__('Icon Size','baristawp'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
	}

	add_action('barista_edge_options_map', 'barista_edge_search_options_map', 15);

}