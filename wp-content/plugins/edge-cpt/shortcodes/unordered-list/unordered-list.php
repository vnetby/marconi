<?php
namespace BaristaEdge\Modules\Shortcodes\UnorderedList;

use BaristaEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class unordered List
 */
class UnorderedList implements ShortcodeInterface{

	private $base;

	function __construct() {
		$this->base='edgtf_unordered_list';
		
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**\
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Edge List - Unordered', 'edge-cpt'),
			'base' => $this->base,
			'icon' => 'icon-wpb-unordered-list extended-custom-icon',
			'category' => esc_html__('by EDGE', 'edge-cpt'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Style','edge-cpt'),
					'param_name' => 'style',
					'value' => array(
						esc_html__('Circle','edge-cpt') => 'circle',
						esc_html__('Square','edge-cpt') => 'square'
					),
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Animate List','edge-cpt'),
					'param_name' => 'animate',
					'value' => array(
						esc_html__('No','edge-cpt') => 'no',
						esc_html__('Yes','edge-cpt') => 'yes'
					),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Font size','edge-cpt'),
					'param_name' => 'font_size',
					'value' => ''
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Font Weight','edge-cpt'),
					'param_name' => 'font_weight',
					'value' => array(
						esc_html__('Default','edge-cpt') => '',
						esc_html__('Light','edge-cpt') => 'light',
						esc_html__('Normal','edge-cpt') => 'normal',
						esc_html__('Bold','edge-cpt') => 'bold'
					),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Padding left (px)','edge-cpt'),
					'param_name' => 'padding_left',
					'value' => ''
				),
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__('Content','edge-cpt'),
					'param_name' => 'content',
					'value' => '<ul><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ul>',
					'description' => ''
				)
			)
		) );
	}

	public function render($atts, $content = null) {
		$args = array(
            'style' => 'circle',
            'animate' => '',
            'font_size' => '',
            'font_weight' => '',
            'padding_left' => ''
        );
		$params = shortcode_atts($args, $atts);
		
		//Extract params for use in method
		extract($params);
		
		$list_item_classes = "";

        if ($style != '') {
			if($style == 'circle'){
				$list_item_classes .= ' edgtf-circle';
			}elseif ($style == 'square') {
				$list_item_classes .= ' edgtf-square';
			}
        }

		if ($animate == 'yes') {
			$list_item_classes .= ' edgtf-animate-list';
		}
		
		$list_style = '';
		if($padding_left != '') {
			$list_style .= 'padding-left: ' . $padding_left .'px;';
		}

		if(!empty($font_size)) {
			$list_style .= 'font-size: '.barista_edge_filter_px($font_size).'px';
		}

		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
        $html = '<div class="edgtf-unordered-list '.$list_item_classes.'" '.  barista_edge_get_inline_style($list_style).'>'.do_shortcode($content).'</div>';
        return $html;
	}
}