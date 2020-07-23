<?php
namespace BaristaEdge\Modules\Shortcodes\ProgressBar;

use BaristaEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProgressBar implements ShortcodeInterface{
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_progress_bar';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Edge Progress Bar', 'edge-cpt'),
			'base' => $this->base,
			'icon' => 'icon-wpb-progress-bar extended-custom-icon',
			'category' => esc_html__('by EDGE', 'edge-cpt'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Title','edge-cpt'),
					'param_name' => 'title',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Title Tag','edge-cpt'),
					'param_name' => 'title_tag',
					'value' => array(
						''   => '',
						'h2' => 'h2',
						'h3' => 'h3',
						'h4' => 'h4',	
						'h5' => 'h5',	
						'h6' => 'h6',	
					),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Percentage','edge-cpt'),
					'param_name' => 'percent',
					'description' => ''
				),	
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Percentage Type','edge-cpt'),
					'param_name' => 'percentage_type',
					'value' => array(
						esc_html__('Floating', 'edge-cpt')  => 'floating',
						esc_html__('Static', 'edge-cpt') => 'static'
					),
					'dependency' => Array('element' => 'percent', 'not_empty' => true)
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Active Color','edge-cpt'),
					'param_name' => 'active_color',
					'description' => '',
					'group' => esc_html__('Design Options','edge-cpt')
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Inactive Color','edge-cpt'),
					'param_name' => 'inactive_color',
					'description' => '',
					'group' => esc_html__('Design Options','edge-cpt')
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Title Color','edge-cpt'),
					'param_name' => 'title_color',
					'description' => '',
					'group' => esc_html__('Design Options','edge-cpt')
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Number Color','edge-cpt'),
					'param_name' => 'number_color',
					'description' => '',
					'group' => esc_html__('Design Options','edge-cpt')
				)
			)
		) );

	}

	public function render($atts, $content = null) {
		$args = array(
            'title' => '',
            'title_tag' => 'h5',
            'percent' => '100',
            'percentage_type' => 'floating',
            'active_color' => '',
            'inactive_color' => '',
            'title_color' => '',
            'number_color' => ''
        );
		$params = shortcode_atts($args, $atts);

		//Extract params for use in method
		extract($params);
		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

		$params['content_style'] = '';
		$params['outer_style'] = '';
		$params['title_style'] = '';
		$params['number_style'] = '';

		$params['percentage_classes'] = $this->getPercentageClasses($params);		

		if(!empty($params['active_color'])){
			$params['content_style'] = 'background-color:'.$params['active_color'];
		}
		if(!empty($params['inactive_color'])){
			$params['outer_style'] = 'background-color:'.$params['inactive_color'];
		}
		if(!empty($params['title_color'])){
			$params['title_style'] = 'color:'.$params['title_color'];
		}
		if(!empty($params['number_color'])){
			$params['number_style'] = 'color:'.$params['number_color'];
		}
        //init variables
		$html = edge_core_get_shortcode_template_part('templates/progress-bar-template', 'progress-bar', '', $params);
		
        return $html;
		
	}
	/**
    * Generates css classes for progress bar
    *
    * @param $params
    *
    * @return array
    */
	private function getPercentageClasses($params){
		
		$percentClassesArray = array();
		
		if(!empty($params['percentage_type']) !=''){

			$percentClassesArray[]= 'edgtf-'.$params['percentage_type'];
		}
		return implode(' ', $percentClassesArray);
	}
}