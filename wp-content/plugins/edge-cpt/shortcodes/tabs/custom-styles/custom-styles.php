<?php
if(!function_exists('barista_edge_tabs_typography_styles')){
	function barista_edge_tabs_typography_styles(){
		$selector = '.edgtf-tabs .edgtf-tabs-nav li a';
		$tabs_tipography_array = array();
		$font_family = barista_edge_options()->getOptionValue('tabs_font_family');
		
		if(barista_edge_is_font_option_valid($font_family)){
			$tabs_tipography_array['font-family'] = barista_edge_get_font_option_val($font_family);
		}
		
		$text_transform = barista_edge_options()->getOptionValue('tabs_text_transform');
        if(!empty($text_transform)) {
            $tabs_tipography_array['text-transform'] = $text_transform;
        }

        $font_style = barista_edge_options()->getOptionValue('tabs_font_style');
        if(!empty($font_style)) {
            $tabs_tipography_array['font-style'] = $font_style;
        }

        $letter_spacing = barista_edge_options()->getOptionValue('tabs_letter_spacing');
        if($letter_spacing !== '') {
            $tabs_tipography_array['letter-spacing'] = barista_edge_filter_px($letter_spacing).'px';
        }

        $font_weight = barista_edge_options()->getOptionValue('tabs_font_weight');
        if(!empty($font_weight)) {
            $tabs_tipography_array['font-weight'] = $font_weight;
        }

        echo barista_edge_dynamic_css($selector, $tabs_tipography_array);
	}
	add_action('barista_edge_style_dynamic', 'barista_edge_tabs_typography_styles');
}

if(!function_exists('barista_edge_tabs_inital_color_styles')){
	function barista_edge_tabs_inital_color_styles(){
		$selector = '.edgtf-tabs .edgtf-tabs-nav li a';
		$styles = array();
		
		if(barista_edge_options()->getOptionValue('tabs_color')) {
            $styles['color'] = barista_edge_options()->getOptionValue('tabs_color');
        }
		if(barista_edge_options()->getOptionValue('tabs_back_color')) {
            $styles['background-color'] = barista_edge_options()->getOptionValue('tabs_back_color');
        }
		if(barista_edge_options()->getOptionValue('tabs_border_color')) {
            $styles['border-color'] = barista_edge_options()->getOptionValue('tabs_border_color');
        }
		
		echo barista_edge_dynamic_css($selector, $styles);
	}
	add_action('barista_edge_style_dynamic', 'barista_edge_tabs_inital_color_styles');
}
if(!function_exists('barista_edge_tabs_active_color_styles')){
	function barista_edge_tabs_active_color_styles(){
		$selector = '.edgtf-tabs .edgtf-tabs-nav li.ui-state-active a, .edgtf-tabs .edgtf-tabs-nav li.ui-state-hover a';
		$styles = array();
		
		if(barista_edge_options()->getOptionValue('tabs_color_active')) {
            $styles['color'] = barista_edge_options()->getOptionValue('tabs_color_active');
        }
		if(barista_edge_options()->getOptionValue('tabs_back_color_active')) {
            $styles['background-color'] = barista_edge_options()->getOptionValue('tabs_back_color_active');
        }
		if(barista_edge_options()->getOptionValue('tabs_border_color_active')) {
            $styles['border-color'] = barista_edge_options()->getOptionValue('tabs_border_color_active');
        }
		
		echo barista_edge_dynamic_css($selector, $styles);
	}
	add_action('barista_edge_style_dynamic', 'barista_edge_tabs_active_color_styles');
}