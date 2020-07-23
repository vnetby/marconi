<?php
namespace BaristaEdge\Modules\Shortcodes\ElementsHolder;

use BaristaEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolder implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_elements_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Edge Elements Holder', 'edge-cpt'),
			'base' => $this->base,
			'icon' => 'icon-wpb-elements-holder extended-custom-icon',
			'category' => esc_html__('by EDGE', 'edge-cpt'),
			'as_parent' => array('only' => 'edgtf_elements_holder_item'),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'colorpicker',
					'class' => '',
					'heading' => esc_html__('Background Color', 'edge-cpt'),
					'param_name' => 'background_color',
					'value' => '',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'heading' => esc_html__('Columns', 'edge-cpt'),
					'admin_label' => true,
					'param_name' => 'number_of_columns',
					'value' => array(
						esc_html__('1 Column', 'edge-cpt')      => 'one-column',
						esc_html__('2 Columns', 'edge-cpt')    	=> 'two-columns',
						esc_html__('3 Columns', 'edge-cpt')     => 'three-columns',
						esc_html__('4 Columns', 'edge-cpt')     => 'four-columns',
						esc_html__('5 Columns', 'edge-cpt')     => 'five-columns',
						esc_html__('6 Columns', 'edge-cpt')     => 'six-columns'
					),
					'description' => ''
				),
				array(
					'type' => 'checkbox',
					'class' => '',
					'heading' => esc_html__('Items Float Left', 'edge-cpt'),
					'param_name' => 'items_float_left',
					'value' => array(esc_html__('Make Items Float Left?', 'edge-cpt') => 'yes'),
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'group' => esc_html__('Width & Responsiveness', 'edge-cpt'),
					'heading' => esc_html__('Switch to One Column', 'edge-cpt'),
					'param_name' => 'switch_to_one_column',
					'value' => array(
						esc_html__('Default', 'edge-cpt')    		=> '',
						esc_html__('Below 1280px', 'edge-cpt') 	=> '1280',
						esc_html__('Below 1024px', 'edge-cpt')    	=> '1024',
						esc_html__('Below 768px', 'edge-cpt')     	=> '768',
						esc_html__('Below 600px', 'edge-cpt')    	=> '600',
						esc_html__('Below 480px', 'edge-cpt')    	=> '480',
						esc_html__('Never', 'edge-cpt')    		=> 'never'
					),
					'description' => esc_html__('Choose on which stage item will be in one column', 'edge-cpt')
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'group' => esc_html__('Width & Responsiveness', 'edge-cpt'),
					'heading' => esc_html__('Choose Alignment In Responsive Mode', 'edge-cpt'),
					'param_name' => 'alignment_one_column',
					'value' => array(
						esc_html__('Default', 'edge-cpt')    	=> '',
						esc_html__('Left', 'edge-cpt') 			=> 'left',
						esc_html__('Center', 'edge-cpt')    	=> 'center',
						esc_html__('Right', 'edge-cpt')     	=> 'right'
					),
					'description' => esc_html__('Alignment When Items are in One Column', 'edge-cpt')
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'number_of_columns' 		=> '',
			'switch_to_one_column'		=> '',
			'alignment_one_column' 		=> '',
			'items_float_left' 			=> '',
			'background_color' 			=> ''
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html						= '';

		$elements_holder_classes = array();
		$elements_holder_classes[] = 'edgtf-elements-holder';
		$elements_holder_style = '';

		if($number_of_columns != ''){
			$elements_holder_classes[] .= 'edgtf-'.$number_of_columns ;
		}

		if($switch_to_one_column != ''){
			$elements_holder_classes[] = 'edgtf-responsive-mode-' . $switch_to_one_column ;
		} else {
			$elements_holder_classes[] = 'edgtf-responsive-mode-768' ;
		}

		if($alignment_one_column != ''){
			$elements_holder_classes[] = 'edgtf-one-column-alignment-' . $alignment_one_column ;
		}

		if($items_float_left !== ''){
			$elements_holder_classes[] = 'edgtf-elements-items-float';
		}

		if($background_color != ''){
			$elements_holder_style .= 'background-color:'. $background_color . ';';
		}

		$elements_holder_class = implode(' ', $elements_holder_classes);

		$html .= '<div ' . barista_edge_get_class_attribute($elements_holder_class) . ' ' . barista_edge_get_inline_attr($elements_holder_style, 'style'). '>';
			$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;

	}
}
