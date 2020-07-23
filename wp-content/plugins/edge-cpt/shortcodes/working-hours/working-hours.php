<?php
namespace BaristaEdge\Modules\Shortcodes\WorkingHours;

use BaristaEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class WorkingHours
 */

class WorkingHours implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_working_hours';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see edgt_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Edge Working Hours', 'edge-cpt'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by EDGE', 'edge-cpt'),
			'icon' 						=> 'icon-wpb-working-hours extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title', 'edge-cpt'),
					'param_name'  => 'title',
					'admin_label' => true,
					'value'       => '',
					'save_always' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Enable Frame', 'edge-cpt'),
					'param_name'  => 'enable_frame',
					'description' => esc_html__('Enabling this option will display dark frame around working hours', 'edge-cpt'),
					'admin_label' => true,
					'value'       => array(
						''    => '',
						esc_html__('Yes', 'edge-cpt') => 'yes',
						esc_html__('No', 'edge-cpt')  => 'no'
					),
					'save_always' => true
				),
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__('Background Image', 'edge-cpt'),
					'param_name'  => 'bg_image',
					'admin_label' => true,
					'save_always' => true,
				),
				array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__('Background Color', 'edge-cpt'),
                    'param_name'  => 'bg_color',
                    'admin_label' => true
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Show Footnote Text', 'edge-cpt'),
                    'param_name'  => 'show_footnote_text',
                    'admin_label' => true,
                    'value'       => array(
						''    => '',
						esc_html__('Yes', 'edge-cpt') => 'yes',
						esc_html__('No', 'edge-cpt')  => 'no'
					),
                ),
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'title'             => '',
			'enable_frame'      => '',
			'bg_image'          => '',
			'bg_color'			=> '',
			'show_footnote_text' => 'yes'
		);

		$params = shortcode_atts($default_atts, $atts);

		$params['working_hours']  = $this->getWorkingHours();
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['holder_styles']  = $this->getHolderStyles($params);
		$params['footnote']  = $this->getFootnote($params);

		return edge_core_get_shortcode_template_part('templates/working-hours-template', 'working-hours', '', $params);
	}

	private function getWorkingHours() {
		$workingHours = array();

		//monday
		if(barista_edge_options()->getOptionValue('wh_monday_from') !== '') {
			$workingHours['monday']['label'] = esc_html__('Monday', 'edge-cpt');
			$workingHours['monday']['from']  = barista_edge_options()->getOptionValue('wh_monday_from');
		}

		if(barista_edge_options()->getOptionValue('wh_monday_to') !== '') {
			$workingHours['monday']['to'] = barista_edge_options()->getOptionValue('wh_monday_to');
		}

		$workingHours['monday']['closed'] = barista_edge_options()->getOptionValue('wh_monday_closed');
		$workingHours['monday']['footnote'] = barista_edge_options()->getOptionValue('wh_monday_footnote');

		//tuesday
		if(barista_edge_options()->getOptionValue('wh_tuesday_from') !== '') {
			$workingHours['tuesday']['label'] = esc_html__('Tuesday', 'edge-cpt');
			$workingHours['tuesday']['from']  = barista_edge_options()->getOptionValue('wh_tuesday_from');
		}

		if(barista_edge_options()->getOptionValue('wh_tuesday_to') !== '') {
			$workingHours['tuesday']['to'] = barista_edge_options()->getOptionValue('wh_tuesday_to');
		}

		$workingHours['tuesday']['closed'] = barista_edge_options()->getOptionValue('wh_tuesday_closed');
		$workingHours['tuesday']['footnote'] = barista_edge_options()->getOptionValue('wh_tuesday_footnote');

		//wednesday
		if(barista_edge_options()->getOptionValue('wh_wednesday_from') !== '') {
			$workingHours['wednesday']['label'] = esc_html__('Wednesday', 'edge-cpt');
			$workingHours['wednesday']['from']  = barista_edge_options()->getOptionValue('wh_wednesday_from');
		}

		if(barista_edge_options()->getOptionValue('wh_wednesday_to') !== '') {
			$workingHours['wednesday']['to'] = barista_edge_options()->getOptionValue('wh_wednesday_to');
		}

		$workingHours['wednesday']['closed'] = barista_edge_options()->getOptionValue('wh_wednesday_closed');
		$workingHours['wednesday']['footnote'] = barista_edge_options()->getOptionValue('wh_wednesday_footnote');

		//thursday
		if(barista_edge_options()->getOptionValue('wh_thursday_from') !== '') {
			$workingHours['thursday']['label'] = esc_html__('Thursday', 'edge-cpt');
			$workingHours['thursday']['from']  = barista_edge_options()->getOptionValue('wh_thursday_from');
		}

		if(barista_edge_options()->getOptionValue('wh_thursday_to') !== '') {
			$workingHours['thursday']['to'] = barista_edge_options()->getOptionValue('wh_thursday_to');
		}

		$workingHours['thursday']['closed'] = barista_edge_options()->getOptionValue('wh_thursday_closed');
		$workingHours['thursday']['footnote'] = barista_edge_options()->getOptionValue('wh_thursdays_footnote');

		//friday
		if(barista_edge_options()->getOptionValue('wh_friday_from') !== '') {
			$workingHours['friday']['label'] = esc_html__('Friday', 'edge-cpt');
			$workingHours['friday']['from']  = barista_edge_options()->getOptionValue('wh_friday_from');
		}

		if(barista_edge_options()->getOptionValue('wh_friday_to') !== '') {
			$workingHours['friday']['to'] = barista_edge_options()->getOptionValue('wh_friday_to');
		}

		$workingHours['friday']['closed'] = barista_edge_options()->getOptionValue('wh_friday_closed');
		$workingHours['friday']['footnote'] = barista_edge_options()->getOptionValue('wh_friday_footnote');

		//saturday
		if(barista_edge_options()->getOptionValue('wh_saturday_from') !== '') {
			$workingHours['saturday']['label'] = esc_html__('Saturday', 'edge-cpt');
			$workingHours['saturday']['from']  = barista_edge_options()->getOptionValue('wh_saturday_from');
		}

		if(barista_edge_options()->getOptionValue('wh_saturday_to') !== '') {
			$workingHours['saturday']['to'] = barista_edge_options()->getOptionValue('wh_saturday_to');
		}

		$workingHours['saturday']['closed'] = barista_edge_options()->getOptionValue('wh_saturday_closed');
		$workingHours['saturday']['footnote'] = barista_edge_options()->getOptionValue('wh_saturday_footnote');

		//sunday
		if(barista_edge_options()->getOptionValue('wh_sunday_from') !== '') {
			$workingHours['sunday']['label'] = esc_html__('Sunday', 'edge-cpt');
			$workingHours['sunday']['from']  = barista_edge_options()->getOptionValue('wh_sunday_from');
		}

		if(barista_edge_options()->getOptionValue('wh_sunday_to') !== '') {
			$workingHours['sunday']['to'] = barista_edge_options()->getOptionValue('wh_sunday_to');
		}

		$workingHours['sunday']['closed'] = barista_edge_options()->getOptionValue('wh_sunday_closed');
		$workingHours['sunday']['footnote'] = barista_edge_options()->getOptionValue('wh_sunday_footnote');

		return $workingHours;
	}

	private function getFootnote() {
		$footnote = '';
		if(barista_edge_options()->getOptionValue('wh_footnote') !== '') {
			$footnote = barista_edge_options()->getOptionValue('wh_footnote');
		}

		return $footnote;
	}

	private function getHolderClasses($params) {
		$classes = array('edgtf-working-hours-holder');

		if(isset($params['enable_frame']) && $params['enable_frame'] === 'yes') {
			$classes[] = 'edgtf-wh-with-frame';
		}

		if(isset($params['bg_image']) && $params['bg_image'] !== '') {
			$classes[] = 'edgtf-wh-with-bg-image';
		}

		return $classes;
	}

	private function getHolderStyles($params) {
		$styles = array();

		if($params['bg_image'] !== '') {
			$bg_url = wp_get_attachment_url($params['bg_image']);

			if(!empty($bg_url)) {
				$styles[] = 'background-image: url('.$bg_url.')';
			}

		} else if($params['bg_color'] !== '') {
			$styles[] = 'background-color: '.$params['bg_color'];
		}

		return $styles;
	}

}