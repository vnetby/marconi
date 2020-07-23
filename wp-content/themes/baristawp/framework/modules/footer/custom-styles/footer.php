<?php

if(!function_exists('barista_edge_footer_top_styles')) {
	/**
	 * Generates styles for footer top
	 */
	function barista_edge_footer_top_styles() {

		$background_image = barista_edge_options()->getOptionValue('footer_top_background_image');
		$footer_top_styles = array();
		if($background_image !== '') {
			$footer_top_styles['background-image'] = 'url(' .$background_image . ')';
		}

		echo barista_edge_dynamic_css('.edgtf-footer-top-holder', $footer_top_styles);
	}

	add_action('barista_edge_style_dynamic', 'barista_edge_footer_top_styles');
}