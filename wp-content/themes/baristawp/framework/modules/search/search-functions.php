<?php

if( !function_exists('barista_edge_search_body_class') ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function barista_edge_search_body_class($classes) {

		if ( is_active_widget( false, false, 'edgt_search_opener' ) ) {

			$classes[] = 'edgtf-' . barista_edge_options()->getOptionValue('search_type');

			if ( barista_edge_options()->getOptionValue('search_type') == 'fullscreen-search' ) {

				$classes[] = 'edgtf-' . barista_edge_options()->getOptionValue('search_animation');

			}

		}
		return $classes;

	}

	add_filter('body_class', 'barista_edge_search_body_class');
}

if ( ! function_exists('barista_edge_get_search') ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function barista_edge_get_search() {

		if ( barista_edge_active_widget( false, false, 'edgt_search_opener' ) ) {

			$search_type = barista_edge_options()->getOptionValue('search_type');

			if ($search_type == 'search-covers-header') {
				barista_edge_set_position_for_covering_search();
				return;
			}

			barista_edge_load_search_template();

		}
	}

}

if ( ! function_exists('barista_edge_set_position_for_covering_search') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function barista_edge_set_position_for_covering_search() {

		$containing_sidebar = barista_edge_active_widget( false, false, 'edgt_search_opener' );

		foreach ($containing_sidebar as $sidebar) {

			if ( strpos( $sidebar, 'top-bar' ) !== false ) {
				add_action( 'barista_edge_after_header_top_html_open', 'barista_edge_load_search_template');
			} else if ( strpos( $sidebar, 'main-menu' ) !== false ) {
				add_action( 'barista_edge_after_header_menu_area_html_open', 'barista_edge_load_search_template');
			} else if ( strpos( $sidebar, 'mobile-logo' ) !== false ) {
				add_action( 'barista_edge_after_mobile_header_html_open', 'barista_edge_load_search_template');
			} else if ( strpos( $sidebar, 'logo' ) !== false ) {
				add_action( 'barista_edge_after_header_logo_area_html_open', 'barista_edge_load_search_template');
			} else if ( strpos( $sidebar, 'sticky' ) !== false ) {
				add_action( 'barista_edge_after_sticky_menu_html_open', 'barista_edge_load_search_template');
			}

		}

	}

}

if ( ! function_exists('barista_edge_load_search_template') ) {
	/**
	 * Loads HTML template with parameters
	 */
	function barista_edge_load_search_template() {
		global $barista_edge_IconCollections;

		$search_type = barista_edge_options()->getOptionValue('search_type');

		$search_icon = '';
		if ( barista_edge_options()->getOptionValue('search_icon_pack') !== '' ) {
			$search_icon = $barista_edge_IconCollections->getSearchIcon( barista_edge_options()->getOptionValue('search_icon_pack'), true );
		}

		$parameters = array(
			'search_in_grid'		=> barista_edge_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
			'search_icon'			=> $search_icon
		);

		barista_edge_get_module_template_part( 'templates/types/'.$search_type, 'search', '', $parameters );

	}

}