<?php
namespace BaristaEdge\Modules\Shortcodes\Banner;

use BaristaEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class Banner implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'edgtf_banner';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Edge Banner', 'edge-cpt'),
					'base' => $this->base,
					'category' => esc_html__('by EDGE', 'edge-cpt'),
					'icon' => 'icon-wpb-banner extended-custom-icon',
					'params' => array(
						array(
							'type' => 'attach_image',
							'class' => '',
							'heading' => esc_html__('Image', 'edge-cpt'),
							'param_name' => 'image',
							'value' => '',
							'description' => ''
						),
						array(
							'type' => 'textfield',
							'admin_label' => true,
							'heading' => esc_html__('Title', 'edge-cpt'),
							'param_name' => 'title',
							'value' => '',
							'description' => ''
						),
						array(
							'type'        => 'dropdown',
							'admin_label' => true,
							'heading' => esc_html__('Title Tag', 'edge-cpt'),
							'param_name' => 'title_tag',
							'value'       => array(
								esc_html__('Default', 'edge-cpt')  => '',
								esc_html__('Heading 1', 'edge-cpt')  => 'h1',
								esc_html__('Heading 2', 'edge-cpt')  => 'h2',
								esc_html__('Heading 3', 'edge-cpt')  => 'h3',
								esc_html__('Heading 4', 'edge-cpt')  => 'h4',
								esc_html__('Heading 5', 'edge-cpt')  => 'h5',
								esc_html__('Heading 6', 'edge-cpt') => 'h6'
							),
							'description' => ''
						),
						array(
							'type' => 'textfield',
							'admin_label' => true,
							'heading' => esc_html__('Title Font Size', 'edge-cpt'),
							'param_name' => 'title_font_size',
							'value' => '',
							'description' => ''
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__('Title Color', 'edge-cpt'),
							'param_name' => 'title_color',
							'description' => '',
							'admin_label' => true
						),
						array(
							'type' => 'textfield',
							'admin_label' => true,
							'heading' => esc_html__('Subtitle', 'edge-cpt'),
							'param_name' => 'subtitle',
							'value' => '',
							'description' => ''
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__('Subtitle Color', 'edge-cpt'),
							'param_name' => 'subtitle_color',
							'description' => '',
							'admin_label' => true
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Link', 'edge-cpt'),
							'param_name' => 'link',
							'value' => '',
							'description' => ''
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Link Target', 'edge-cpt'),
							'param_name'  => 'target',
							'value'       => array(
								esc_html__('Self', 'edge-cpt')  => '_self',
								esc_html__('Blank', 'edge-cpt') => '_blank'
							),
							'dependency'  => array('element' => 'link', 'not_empty' => true)
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__('Link Color', 'edge-cpt'),
							'param_name' => 'link_color',
							'description' => '',
							'admin_label' => true
						),
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'image'     		=> '',
			'title'     		=> '',
			'title_tag' 		=> 'h1',
			'subtitle'  		=> '',
			'title_color'  		=> '',
			'subtitle_color'	=> '',
			'link'     			=> '',
			'target'    		=> '_self',
			'title_font_size'	=> '',
			'link_color'		=> ''
		);
		
		$params = 	shortcode_atts($args, $atts);
		extract($params);

		$params['image']= wp_get_attachment_url($params['image']);
		$params['title_font_style'] =  $this->getTitleFontStyle($params);
		$params['subtitle_font_style'] =  $this->getSubtitleFontStyle($params);
		$params['link_style'] =  $this->getLinkStyle($params);

		$html = edge_core_get_shortcode_template_part('templates/banner-template', 'banner', '', $params);

		return $html;
	}

	private function getTitleFontStyle($params){
		$titleStylesArray = array();

		if(!empty($params['title_color'])) {
			$titleStylesArray[] = 'color:' . $params['title_color'];
		}

		if(!empty($params['title_font_size'])) {
			$titleStylesArray[] = 'font-size:' . $params['title_font_size'];
		}

		return implode(';', $titleStylesArray);
	}

	private function getSubtitleFontStyle($params){
		$subtitleStylesArray = array();
		
		if(!empty($params['subtitle_color'])) {
			$subtitleStylesArray[] = 'color:' . $params['subtitle_color'];
		}

		return implode(';', $subtitleStylesArray);
	}

	private function getLinkStyle($params){
		$linkStylesArray = array();
		
		if(!empty($params['link_color'])) {
			$linkStylesArray[] = 'color:' . $params['link_color'];
		}

		return implode(';', $linkStylesArray);
	}

}
