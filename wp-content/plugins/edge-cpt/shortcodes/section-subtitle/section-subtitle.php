<?php
namespace BaristaEdge\Modules\Shortcodes\SectionSubtitle;

use BaristaEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class SectionSubtitle
 */
class SectionSubtitle implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_section_subtitle';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
				'name' => esc_html__('Section Subtitle', 'edge-cpt'),
				'base' => $this->getBase(),
				'category' => esc_html__('by EDGE', 'edge-cpt'),
				'icon' => 'icon-wpb-section-subtitle extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Subtitle Text', 'edge-cpt'),
						'param_name'	=> 'subtitle_text',
						'value'			=> '',
						'admin_label'	=> true
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Text Align', 'edge-cpt'),
						'param_name'	=> 'text_align',
						'value'			=> array(
							''			=> '',
							esc_html__('Left', 'edge-cpt')		=> 'left',
							esc_html__('Center', 'edge-cpt')	=> 'center',
							esc_html__('Right', 'edge-cpt')	=> 'right',
							esc_html__('Justify', 'edge-cpt')	=> 'justify'
						)
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Text Color', 'edge-cpt'),
						'param_name'  => 'text_color',
						'admin_label' => true
					),
				)
		) );
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'subtitle_text' => '',
			'text_align'	=> '',
			'text_color'	=> ''
		);

		$params = shortcode_atts($args, $atts);

		$params['subtitle_style'] = array();
		if($params['text_align'] != '') {
			$params['subtitle_style'][] = 'text-align:' . $params['text_align'];
		}
		if($params['text_color'] != '') {
			$params['subtitle_style'][] = 'color:' . $params['text_color'];
		}
		//Get HTML from template
		$html = edge_core_get_shortcode_template_part('templates/section-subtitle-template', 'section-subtitle', '', $params);

		return $html;

	}


}