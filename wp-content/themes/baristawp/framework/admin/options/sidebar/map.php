<?php

if ( ! function_exists('barista_edge_sidebar_options_map') ) {

	function barista_edge_sidebar_options_map() {

		barista_edge_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__('Sidebar', 'baristawp'),
				'icon'  => 'fa fa-indent'
			)
		);

		$panel_widgets = barista_edge_add_admin_panel(
			array(
				'page'  => '_sidebar_page',
				'name'  => 'panel_widgets',
				'title' => esc_html__('Widgets', 'baristawp')
			)
		);

		/**
		 * Navigation style
		 */
		barista_edge_add_admin_field(array(
			'type'			=> 'color',
			'name'			=> 'sidebar_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Sidebar Background Color', 'baristawp'),
			'description'	=> esc_html__('Choose background color for sidebar', 'baristawp'),
			'parent'		=> $panel_widgets
		));

		$group_sidebar_padding = barista_edge_add_admin_group(array(
			'name'		=> 'group_sidebar_padding',
			'title'		=> esc_html__('Padding', 'baristawp'),
			'parent'	=> $panel_widgets
		));

		$row_sidebar_padding = barista_edge_add_admin_row(array(
			'name'		=> 'row_sidebar_padding',
			'parent'	=> $group_sidebar_padding
		));

		barista_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Top Padding', 'baristawp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		barista_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_right',
			'default_value'	=> '',
			'label'			=> esc_html__('Right Padding', 'baristawp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		barista_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Bottom Padding', 'baristawp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		barista_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_left',
			'default_value'	=> '',
			'label'			=> esc_html__('Left Padding', 'baristawp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		barista_edge_add_admin_field(array(
			'type'			=> 'select',
			'name'			=> 'sidebar_alignment',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Alignment', 'baristawp'),
			'description'	=> esc_html__('Choose text aligment', 'baristawp'),
			'options'		=> array(
				'left' => esc_html__('Left', 'baristawp'),
				'center' => esc_html__('Center', 'baristawp'),
				'right' => esc_html__('Right', 'baristawp')
			),
			'parent'		=> $panel_widgets
		));

	}

	add_action( 'barista_edge_options_map', 'barista_edge_sidebar_options_map', 9);

}