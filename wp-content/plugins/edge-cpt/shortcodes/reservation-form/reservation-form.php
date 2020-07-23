<?php
namespace BaristaEdge\Modules\Shortcodes\ReservationForm;

use BaristaEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ReservationForm
 */

class ReservationForm implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'edgtf_reservation_form';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Reservation Form', 'edge-cpt'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by EDGE', 'edge-cpt'),
			'icon'                      => '',
			'icon' => 'icon-wpb-reservation-form extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('OpenTable ID', 'edge-cpt'),
					'param_name'  => 'open_table_id',
					'admin_label' => true
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$args = array(
			'open_table_id' => ''
		);

		$params = shortcode_atts($args, $atts);

		if($params['open_table_id'] === '') {
			$params['open_table_id'] = barista_edge_options()->getOptionValue('open_table_id');
		}

		return edge_core_get_shortcode_template_part('templates/reservation-form-template', 'reservation-form', '', $params);
	}

}