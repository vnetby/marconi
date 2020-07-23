<?php

if ( ! function_exists( 'barista_edge_register_widgets' ) ) {
	function barista_edge_register_widgets() {
		$widgets = array(
			'BaristaEdgeLatestPosts',
			'BaristaEdgeSearchOpener',
			'BaristaEdgeSideAreaOpener',
			'BaristaEdgeStickySidebar',
			'BaristaEdgeSocialIconWidget',
			'BaristaEdgeSeparatorWidget'
		);

		if ( function_exists( 'barista_edge_is_woocommerce_installed' ) ) {
			if ( barista_edge_is_woocommerce_installed() ) {
				$widgets[] = 'BaristaEdgeWoocommerceDropdownCart';
			}
		}

		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
}

add_action( 'widgets_init', 'barista_edge_register_widgets' );