<?php
if (!function_exists('barista_edge_search_opener_icon_size')) {

	function barista_edge_search_opener_icon_size()
	{

		if (barista_edge_options()->getOptionValue('header_search_icon_size')) {
			echo barista_edge_dynamic_css('.edgtf-search-opener, .edgtf-header-standard .edgtf-search-opener', array(
				'font-size' => barista_edge_filter_px(barista_edge_options()->getOptionValue('header_search_icon_size')) . 'px'
			));
		}

	}

	add_action('barista_edge_style_dynamic', 'barista_edge_search_opener_icon_size');

}

if (!function_exists('barista_edge_search_opener_icon_colors')) {

	function barista_edge_search_opener_icon_colors()
	{

		if (barista_edge_options()->getOptionValue('header_search_icon_color') !== '') {
			echo barista_edge_dynamic_css('.edgtf-search-opener', array(
				'color' => barista_edge_options()->getOptionValue('header_search_icon_color')
			));
		}

		if (barista_edge_options()->getOptionValue('header_search_icon_hover_color') !== '') {
			echo barista_edge_dynamic_css('.edgtf-search-opener:hover', array(
				'color' => barista_edge_options()->getOptionValue('header_search_icon_hover_color')
			));
		}

		if (barista_edge_options()->getOptionValue('header_light_search_icon_color') !== '') {
			echo barista_edge_dynamic_css('.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener,
			.edgtf-light-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener,
			.edgtf-light-header .edgtf-top-bar .edgtf-search-opener', array(
				'color' => barista_edge_options()->getOptionValue('header_light_search_icon_color') . ' !important'
			));
		}

		if (barista_edge_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
			echo barista_edge_dynamic_css('.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener:hover,
			.edgtf-light-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener:hover,
			.edgtf-light-header .edgtf-top-bar .edgtf-search-opener:hover', array(
				'color' => barista_edge_options()->getOptionValue('header_light_search_icon_hover_color') . ' !important'
			));
		}

		if (barista_edge_options()->getOptionValue('header_dark_search_icon_color') !== '') {
			echo barista_edge_dynamic_css('.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener,
			.edgtf-dark-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener,
			.edgtf-dark-header .edgtf-top-bar .edgtf-search-opener', array(
				'color' => barista_edge_options()->getOptionValue('header_dark_search_icon_color') . ' !important'
			));
		}
		if (barista_edge_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
			echo barista_edge_dynamic_css('.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener:hover,
			.edgtf-dark-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener:hover,
			.edgtf-dark-header .edgtf-top-bar .edgtf-search-opener:hover', array(
				'color' => barista_edge_options()->getOptionValue('header_dark_search_icon_hover_color') . ' !important'
			));
		}

	}

	add_action('barista_edge_style_dynamic', 'barista_edge_search_opener_icon_colors');

}

if (!function_exists('barista_edge_search_opener_icon_background_colors')) {

	function barista_edge_search_opener_icon_background_colors()
	{

		if (barista_edge_options()->getOptionValue('search_icon_background_color') !== '') {
			echo barista_edge_dynamic_css('.edgtf-search-opener', array(
				'background-color' => barista_edge_options()->getOptionValue('search_icon_background_color')
			));
		}

		if (barista_edge_options()->getOptionValue('search_icon_background_hover_color') !== '') {
			echo barista_edge_dynamic_css('.edgtf-search-opener:hover', array(
				'background-color' => barista_edge_options()->getOptionValue('search_icon_background_hover_color')
			));
		}

	}

	add_action('barista_edge_style_dynamic', 'barista_edge_search_opener_icon_background_colors');
}

if (!function_exists('barista_edge_search_opener_text_styles')) {

	function barista_edge_search_opener_text_styles()
	{
		$text_styles = array();

		if (barista_edge_options()->getOptionValue('search_icon_text_color') !== '') {
			$text_styles['color'] = barista_edge_options()->getOptionValue('search_icon_text_color');
		}
		if (barista_edge_options()->getOptionValue('search_icon_text_fontsize') !== '') {
			$text_styles['font-size'] = barista_edge_filter_px(barista_edge_options()->getOptionValue('search_icon_text_fontsize')) . 'px';
		}
		if (barista_edge_options()->getOptionValue('search_icon_text_lineheight') !== '') {
			$text_styles['line-height'] = barista_edge_filter_px(barista_edge_options()->getOptionValue('search_icon_text_lineheight')) . 'px';
		}
		if (barista_edge_options()->getOptionValue('search_icon_text_texttransform') !== '') {
			$text_styles['text-transform'] = barista_edge_options()->getOptionValue('search_icon_text_texttransform');
		}
		if (barista_edge_options()->getOptionValue('search_icon_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = barista_edge_get_formatted_font_family(barista_edge_options()->getOptionValue('search_icon_text_google_fonts')) . ', sans-serif';
		}
		if (barista_edge_options()->getOptionValue('search_icon_text_fontstyle') !== '') {
			$text_styles['font-style'] = barista_edge_options()->getOptionValue('search_icon_text_fontstyle');
		}
		if (barista_edge_options()->getOptionValue('search_icon_text_fontweight') !== '') {
			$text_styles['font-weight'] = barista_edge_options()->getOptionValue('search_icon_text_fontweight');
		}

		if (!empty($text_styles)) {
			echo barista_edge_dynamic_css('.edgtf-search-icon-text', $text_styles);
		}
		if (barista_edge_options()->getOptionValue('search_icon_text_color_hover') !== '') {
			echo barista_edge_dynamic_css('.edgtf-search-opener:hover .edgtf-search-icon-text', array(
				'color' => barista_edge_options()->getOptionValue('search_icon_text_color_hover')
			));
		}

	}

	add_action('barista_edge_style_dynamic', 'barista_edge_search_opener_text_styles');
}

if (!function_exists('barista_edge_search_opener_spacing')) {

	function barista_edge_search_opener_spacing()
	{
		$spacing_styles = array();

		if (barista_edge_options()->getOptionValue('search_padding_left') !== '') {
			$spacing_styles['padding-left'] = barista_edge_filter_px(barista_edge_options()->getOptionValue('search_padding_left')) . 'px';
		}
		if (barista_edge_options()->getOptionValue('search_padding_right') !== '') {
			$spacing_styles['padding-right'] = barista_edge_filter_px(barista_edge_options()->getOptionValue('search_padding_right')) . 'px';
		}
		if (barista_edge_options()->getOptionValue('search_margin_left') !== '') {
			$spacing_styles['margin-left'] = barista_edge_filter_px(barista_edge_options()->getOptionValue('search_margin_left')) . 'px';
		}
		if (barista_edge_options()->getOptionValue('search_margin_right') !== '') {
			$spacing_styles['margin-right'] = barista_edge_filter_px(barista_edge_options()->getOptionValue('search_margin_right')) . 'px';
		}

		if (!empty($spacing_styles)) {
			echo barista_edge_dynamic_css('.edgtf-header-standard .edgtf-search-opener, .edgtf-search-opener', $spacing_styles);
		}

	}

	add_action('barista_edge_style_dynamic', 'barista_edge_search_opener_spacing');
}

if (!function_exists('barista_edge_search_bar_background')) {

	function barista_edge_search_bar_background()
	{

		if (barista_edge_options()->getOptionValue('search_background_color') !== '') {
			echo barista_edge_dynamic_css('.edgtf-search-cover, .edgtf-search-fade .edgtf-fullscreen-search-holder .edgtf-fullscreen-search-table, .edgtf-fullscreen-search-overlay', array(
				'background-color' => barista_edge_options()->getOptionValue('search_background_color')
			));
		}
	}

	add_action('barista_edge_style_dynamic', 'barista_edge_search_bar_background');
}

if (!function_exists('barista_edge_search_text_styles')) {

	function barista_edge_search_text_styles()
	{
		$text_styles = array();

		if (barista_edge_options()->getOptionValue('search_text_color') !== '') {
			$text_styles['color'] = barista_edge_options()->getOptionValue('search_text_color');
		}
		if (barista_edge_options()->getOptionValue('search_text_fontsize') !== '') {
			$text_styles['font-size'] = barista_edge_filter_px(barista_edge_options()->getOptionValue('search_text_fontsize')) . 'px';
		}
		if (barista_edge_options()->getOptionValue('search_text_texttransform') !== '') {
			$text_styles['text-transform'] = barista_edge_options()->getOptionValue('search_text_texttransform');
		}
		if (barista_edge_options()->getOptionValue('search_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = barista_edge_get_formatted_font_family(barista_edge_options()->getOptionValue('search_text_google_fonts')) . ', sans-serif';
		}
		if (barista_edge_options()->getOptionValue('search_text_fontstyle') !== '') {
			$text_styles['font-style'] = barista_edge_options()->getOptionValue('search_text_fontstyle');
		}
		if (barista_edge_options()->getOptionValue('search_text_fontweight') !== '') {
			$text_styles['font-weight'] = barista_edge_options()->getOptionValue('search_text_fontweight');
		}
		if (barista_edge_options()->getOptionValue('search_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = barista_edge_filter_px(barista_edge_options()->getOptionValue('search_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo barista_edge_dynamic_css('.edgtf-search-cover input[type="text"], .edgtf-fullscreen-search-holder .edgtf-form-holder .edgtf-search-field', $text_styles);
			echo barista_edge_dynamic_css('.edgtf-search-cover input[type="text"]::-webkit-input-placeholder', $text_styles);
			echo barista_edge_dynamic_css('.edgtf-search-cover input[type="text"]::-moz-input-placeholder', $text_styles);
		}
	}

	add_action('barista_edge_style_dynamic', 'barista_edge_search_text_styles');
}

if (!function_exists('barista_edge_search_label_styles')) {

	function barista_edge_search_label_styles()
	{
		$text_styles = array();

		if (barista_edge_options()->getOptionValue('search_label_text_color') !== '') {
			$text_styles['color'] = barista_edge_options()->getOptionValue('search_label_text_color');
		}
		if (barista_edge_options()->getOptionValue('search_label_text_fontsize') !== '') {
			$text_styles['font-size'] = barista_edge_filter_px(barista_edge_options()->getOptionValue('search_label_text_fontsize')) . 'px';
		}
		if (barista_edge_options()->getOptionValue('search_label_text_texttransform') !== '') {
			$text_styles['text-transform'] = barista_edge_options()->getOptionValue('search_label_text_texttransform');
		}
		if (barista_edge_options()->getOptionValue('search_label_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = barista_edge_get_formatted_font_family(barista_edge_options()->getOptionValue('search_label_text_google_fonts')) . ', sans-serif';
		}
		if (barista_edge_options()->getOptionValue('search_label_text_fontstyle') !== '') {
			$text_styles['font-style'] = barista_edge_options()->getOptionValue('search_label_text_fontstyle');
		}
		if (barista_edge_options()->getOptionValue('search_label_text_fontweight') !== '') {
			$text_styles['font-weight'] = barista_edge_options()->getOptionValue('search_label_text_fontweight');
		}
		if (barista_edge_options()->getOptionValue('search_label_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = barista_edge_filter_px(barista_edge_options()->getOptionValue('search_label_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo barista_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-search-label', $text_styles);
		}

	}

	add_action('barista_edge_style_dynamic', 'barista_edge_search_label_styles');
}

if (!function_exists('barista_edge_search_icon_styles')) {

	function barista_edge_search_icon_styles()
	{

		if (barista_edge_options()->getOptionValue('search_icon_color') !== '') {
			echo barista_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-search-submit', array(
				'color' => barista_edge_options()->getOptionValue('search_icon_color')
			));
		}
		if (barista_edge_options()->getOptionValue('search_icon_hover_color') !== '') {
			echo barista_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-search-submit:hover', array(
				'color' => barista_edge_options()->getOptionValue('search_icon_hover_color')
			));
		}
		if (barista_edge_options()->getOptionValue('search_icon_size') !== '') {
			echo barista_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-search-submit', array(
				'font-size' => barista_edge_filter_px(barista_edge_options()->getOptionValue('search_icon_size')) . 'px'
			));
		}

	}

	add_action('barista_edge_style_dynamic', 'barista_edge_search_icon_styles');
}

if (!function_exists('barista_edge_search_close_icon_styles')) {

	function barista_edge_search_close_icon_styles()
	{

		if (barista_edge_options()->getOptionValue('search_close_color') !== '') {
			echo barista_edge_dynamic_css('.edgtf-search-cover .edgtf-search-close i, .edgtf-fullscreen-search-close i', array(
				'color' => barista_edge_options()->getOptionValue('search_close_color')
			));
		}
		if (barista_edge_options()->getOptionValue('search_close_hover_color') !== '') {
			echo barista_edge_dynamic_css('.edgtf-search-cover .edgtf-search-close i:hover, .edgtf-fullscreen-search-close i:hover', array(
				'color' => barista_edge_options()->getOptionValue('search_close_hover_color')
			));
		}
		if (barista_edge_options()->getOptionValue('search_close_size') !== '') {
			echo barista_edge_dynamic_css('.edgtf-search-cover .edgtf-search-close i, .edgtf-fullscreen-search-close i', array(
				'font-size' => barista_edge_filter_px(barista_edge_options()->getOptionValue('search_close_size')) . 'px'
			));
		}

	}

	add_action('barista_edge_style_dynamic', 'barista_edge_search_close_icon_styles');
}

?>
