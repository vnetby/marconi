<?php

if ( ! function_exists( 'barista_edge_load_shortcode_interface' ) ) {
	function barista_edge_load_shortcode_interface() {
		include_once 'shortcode-interface.php';
	}

	add_action( 'barista_edge_before_options_map', 'barista_edge_load_shortcode_interface' );
}

if ( ! function_exists( 'barista_edge_load_shortcodes' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 * and loads load.php file in each. Hooks to barista_edge_after_options_map action
	 *
	 * @see http://php.net/manual/en/function.glob.php
	 */
	function barista_edge_load_shortcodes() {
		foreach ( glob( EDGE_CORE_ABS_PATH . '/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}

		do_action( 'barista_edge_shortcode_loader' );
	}

	add_action( 'barista_edge_before_options_map', 'barista_edge_load_shortcodes' );
}