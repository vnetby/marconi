<?php

if ( ! function_exists('barista_edge_footer_options_map') ) {
	/**
	 * Add footer options
	 */
	function barista_edge_footer_options_map() {

		barista_edge_add_admin_page(
			array(
				'slug' => '_footer_page',
				'title' => esc_html__('Footer','baristawp'),
				'icon' => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = barista_edge_add_admin_panel(
			array(
				'title' => esc_html__('Footer','baristawp'),
				'name' => 'footer',
				'page' => '_footer_page'
			)
		);

		barista_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'uncovering_footer',
				'default_value' => 'no',
				'label' => esc_html__('Uncovering Footer','baristawp'),
				'description' => esc_html__('Enabling this option will make Footer gradually appear on scroll','baristawp'),
				'parent' => $footer_panel,
			)
		);

		barista_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'footer_in_grid',
				'default_value' => 'yes',
				'label' => esc_html__('Footer in Grid','baristawp'),
				'description' => esc_html__('Enabling this option will place Footer content in grid','baristawp'),
				'parent' => $footer_panel,
			)
		);

		barista_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Top','baristawp'),
				'description' => esc_html__('Enabling this option will show Footer Top area','baristawp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_show_footer_top_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_top_container = barista_edge_add_admin_container(
			array(
				'name' => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		barista_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns',
				'default_value' => '4',
				'label' => esc_html__('Footer Top Columns','baristawp'),
				'description' => esc_html__('Choose number of columns for Footer Top area','baristawp'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'5' => '3(25%+25%+50%)',
					'6' => '3(50%+25%+25%)',
					'4' => '4'
				),
				'parent' => $show_footer_top_container,
			)
		);

		barista_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns_alignment',
				'default_value' => '',
				'label' => esc_html__('Footer Top Columns Alignment','baristawp'),
				'description' => esc_html__('Text Alignment in Footer Columns','baristawp'),
				'options' => array(
					'left' => esc_html__('Left','baristawp'),
					'center' => esc_html__('Center','baristawp'),
					'right' => esc_html__('Right','baristawp'),
				),
				'parent' => $show_footer_top_container,
			)
		);

		barista_edge_add_admin_field(
			array(
				'name'          => 'footer_top_background_image',
				'type'          => 'image',
				'label'         => esc_html__('Background Image','baristawp'),
				'description'   => esc_html__('Choose an image to be displayed in background','baristawp'),
				'parent'        => $show_footer_top_container
			)
		);

		barista_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_bottom',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Bottom','baristawp'),
				'description' => esc_html__('Enabling this option will show Footer Bottom area','baristawp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_show_footer_bottom_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_bottom_container = barista_edge_add_admin_container(
			array(
				'name' => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);


		barista_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_bottom_columns',
				'default_value' => '3',
				'label' => esc_html__('Footer Bottom Columns','baristawp'),
				'description' => esc_html__('Choose number of columns for Footer Bottom area','baristawp'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent' => $show_footer_bottom_container,
			)
		);

	}

	add_action( 'barista_edge_options_map', 'barista_edge_footer_options_map', 10);

}