<?php

if ( ! function_exists('barista_edge_reset_options_map') ) {
	/**
	 * Reset options panel
	 */
	function barista_edge_reset_options_map() {

		barista_edge_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__('Reset', 'baristawp'),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = barista_edge_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__('Reset', 'baristawp')
			)
		);

		barista_edge_add_admin_field(array(
			'type'	=> 'yesno',
			'name'	=> 'reset_to_defaults',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Reset to Defaults', 'baristawp'),
			'description'	=> esc_html__('This option will reset all Edge Options values to defaults', 'baristawp'),
			'parent'		=> $panel_reset
		));

	}

	add_action( 'barista_edge_options_map', 'barista_edge_reset_options_map', 21 );

}