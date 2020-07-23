<?php 

if(!function_exists('barista_edge_accordions_typography_styles')){
	function barista_edge_accordions_typography_styles(){
		$selector = '.edgtf-accordion-holder .edgtf-title-holder';
		$styles = array();
		
		$font_family = barista_edge_options()->getOptionValue('accordions_font_family');
		if(barista_edge_is_font_option_valid($font_family)){
			$styles['font-family'] = barista_edge_get_font_option_val($font_family);
		}
		
		$text_transform = barista_edge_options()->getOptionValue('accordions_text_transform');
       if(!empty($text_transform)) {
           $styles['text-transform'] = $text_transform;
       }

       $font_style = barista_edge_options()->getOptionValue('accordions_font_style');
       if(!empty($font_style)) {
           $styles['font-style'] = $font_style;
       }

       $letter_spacing = barista_edge_options()->getOptionValue('accordions_letter_spacing');
       if($letter_spacing !== '') {
           $styles['letter-spacing'] = barista_edge_filter_px($letter_spacing).'px';
       }

       $font_weight = barista_edge_options()->getOptionValue('accordions_font_weight');
       if(!empty($font_weight)) {
           $styles['font-weight'] = $font_weight;
       }

       echo barista_edge_dynamic_css($selector, $styles);
	}
	add_action('barista_edge_style_dynamic', 'barista_edge_accordions_typography_styles');
}

if(!function_exists('barista_edge_accordions_inital_title_color_styles')){
	function barista_edge_accordions_inital_title_color_styles(){
		$selector = '.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder';
		$styles = array();
		
		if(barista_edge_options()->getOptionValue('accordions_title_color')) {
           $styles['color'] = barista_edge_options()->getOptionValue('accordions_title_color');
       }
		echo barista_edge_dynamic_css($selector, $styles);
	}
	add_action('barista_edge_style_dynamic', 'barista_edge_accordions_inital_title_color_styles');
}

if(!function_exists('barista_edge_accordions_active_title_color_styles')){
	
	function barista_edge_accordions_active_title_color_styles(){
		$selector = array(
			'.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder.ui-state-active',
			'.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder.ui-state-hover'
		);
		$styles = array();
		
		if(barista_edge_options()->getOptionValue('accordions_title_color_active')) {
           $styles['color'] = barista_edge_options()->getOptionValue('accordions_title_color_active');
       }
		
		echo barista_edge_dynamic_css($selector, $styles);
	}
	add_action('barista_edge_style_dynamic', 'barista_edge_accordions_active_title_color_styles');
}
if(!function_exists('barista_edge_accordions_inital_icon_color_styles')){
	
	function barista_edge_accordions_inital_icon_color_styles(){
		$selector = '.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder .edgtf-accordion-mark';
		$styles = array();
		
		if(barista_edge_options()->getOptionValue('accordions_icon_color')) {
           $styles['color'] = barista_edge_options()->getOptionValue('accordions_icon_color');
       }
		echo barista_edge_dynamic_css($selector, $styles);
	}
	add_action('barista_edge_style_dynamic', 'barista_edge_accordions_inital_icon_color_styles');
}
if(!function_exists('barista_edge_accordions_active_icon_color_styles')){
	
	function barista_edge_accordions_active_icon_color_styles(){
		$selector = array(
			'.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder.ui-state-active  .edgtf-accordion-mark',
			'.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder.ui-state-hover  .edgtf-accordion-mark'
		);
		$styles = array();
		
		if(barista_edge_options()->getOptionValue('accordions_icon_color_active')) {
           $styles['color'] = barista_edge_options()->getOptionValue('accordions_icon_color_active');
       }
		echo barista_edge_dynamic_css($selector, $styles);
	}
	add_action('barista_edge_style_dynamic', 'barista_edge_accordions_active_icon_color_styles');
}