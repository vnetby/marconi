<?php

if ( ! function_exists( 'barista_edge_load_widget_class' ) ) {
	/**
	 * Loades widget class file.
	 *
	 */
	function barista_edge_load_widget_class() {
		include_once 'widget-class.php';
	}

	add_action( 'barista_edge_before_options_map', 'barista_edge_load_widget_class' );
}

if ( ! function_exists( 'barista_edge_load_widgets' ) ) {
	/**
	 * Loades all widgets by going through all folders that are placed directly in widgets folder
	 * and loads load.php file in each. Hooks to barista_edge_after_options_map action
	 */
	function barista_edge_load_widgets() {
		foreach ( glob( EDGE_FRAMEWORK_ROOT_DIR . '/modules/widgets/*/load.php' ) as $widget_load ) {
			include_once $widget_load;
		}

		include_once 'widget-loader.php';
	}

	add_action( 'barista_edge_before_options_map', 'barista_edge_load_widgets' );
}