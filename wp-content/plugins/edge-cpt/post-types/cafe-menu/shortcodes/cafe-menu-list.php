<?php

namespace EdgeCore\CPT\CafeMenu\Shortcodes;

use EdgeCore\Lib;

/**
 * Class CafeMenuList
 * @package EdgeCore\CPT\CafeMenu\Shortcodes
 */
class CafeMenuList implements Lib\ShortcodeInterface {
	/**
     * @var string
     */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_cafe_menu_list';

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
     * Maps shortcode to Visual Composer
     *
     * @see vc_map
     */
	public function vcMap() {
		if(function_exists('vc_map')) {

			$icons_array= array();
            if(edgt_core_theme_installed()) {
                $icons_array = \BaristaEdgeIconCollections::get_instance()->getVCParamsArray();
            }

			vc_map(array(
				'name'                      => esc_html__('Cafe Menu List', 'edge-cpt'),
				'base'                      => $this->getBase(),
				'category'                  => esc_html__('by EDGE', 'edge-cpt'),
				'icon'                      => 'icon-wpb-menu extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params'                    => array(
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Show Featured Image?', 'edge-cpt'),
						'param_name'  => 'show_featured_image',
						'value'       => array(
							''    => '',
							esc_html__('Yes', 'edge-cpt') => 'yes',
							esc_html__('No', 'edge-cpt')  => 'no'
						),
						'admin_label' => true,
						'description' => esc_html__('Use this option to show featured image of menu items', 'edge-cpt'),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Skin', 'edge-cpt'),
						'param_name'  => 'skin',
						'value'       => array(
							esc_html__('Dark', 'edge-cpt') 	 => 'dark',
							esc_html__('Light', 'edge-cpt')  => 'light'
						),
						'admin_label' => true,
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Order By', 'edge-cpt'),
						'param_name'  => 'order_by',
						'value'       => array(
							esc_html__('Menu Order', 'edge-cpt') => 'menu_order',
							esc_html__('Title', 'edge-cpt')      => 'title',
							esc_html__('Date', 'edge-cpt')       => 'date'
						),
						'admin_label' => true,
						'save_always' => true,
						'description' => '',
						'group'       => esc_html__('Query and Layout Options', 'edge-cpt')
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Order', 'edge-cpt'),
						'param_name'  => 'order',
						'value'       => array(
							'ASC'  => 'ASC',
							'DESC' => 'DESC',
						),
						'admin_label' => true,
						'save_always' => true,
						'description' => '',
						'group'       => esc_html__('Query and Layout Options', 'edge-cpt')
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Cafe Menu Category', 'edge-cpt'),
						'param_name'  => 'cafe_menu_category',
						'value'       => '',
						'admin_label' => true,
						'description' => esc_html__('Enter one cafe menu category slug (leave empty for showing all cafe menu categories)', 'edge-cpt'),
						'group'       => esc_html__('Query and Layout Options', 'edge-cpt')
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Number of Cafe Menu Items', 'edge-cpt'),
						'param_name'  => 'number',
						'value'       => '-1',
						'admin_label' => true,
						'save_always' => true,
						'description' => esc_html__('(enter -1 to show all)', 'edge-cpt'),
						'group'       => esc_html__('Query and Layout Options', 'edge-cpt')
					)
				)
			));
		}
	}

	/**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
	public function render($atts, $content = null) {
		$args = array(
			'show_featured_image' 	=> '',
			'order_by'     			=> 'date',
			'order'        			=> 'ASC',
			'cafe_menu_category'	=> '',
			'number'      			=> '-1',
			'skin'					=> 'dark'
		);

		$params = shortcode_atts($args, $atts);
		extract($params);
		
		$query_array = $this->getQueryArray($params);
		$query_results = new \WP_Query($query_array);

		$listItemParams = array(
			'show_featured_image' => $params['show_featured_image']
		);

		$holderClasses = $this->getHolderClasses($params);

		$html = '<div '.barista_edge_get_class_attribute($holderClasses).'>';

		if($query_results->have_posts()) {
			$html .= '<ul class="edgtf-cml-holder">';

			while($query_results->have_posts()) {
				$query_results->the_post();
				$html .= edgt_core_get_shortcode_module_template_part('cafe-menu', 'cafe-menu-list-item', '', $listItemParams);
			}

			$html .= '</ul>';

			wp_reset_postdata();
		} else {
			$html .= '<p>'.esc_html__('Sorry, no menu items matched your criteria.', 'edge-cpt').'</p>';
		}

		$html .= '</div>';

		return $html;
	}

	/**
    * Generates menu list query attribute array
    *
    * @param $params
    *
    * @return array
    */
	public function getQueryArray($params){
		
		$query_array = array();
		
		$query_array = array(
			'post_type' => 'edgtf-cafe-menu-item',
			'orderby' =>$params['order_by'],
			'order' => $params['order'],
			'posts_per_page' => $params['number']
		);
		
		if(!empty($params['cafe_menu_category'])){
			$query_array['edgtf-cafe-menu-category'] = $params['cafe_menu_category'];
		}
		
		return $query_array;
	}

	private function getHolderClasses($params) {
		$classes = array('edgtf-cafe-menu-list');

		if($params['show_featured_image'] === 'yes') {
			$classes[] = 'edgtf-cml-with-featured-image';
		}

		if($params['skin'] === 'light') {
			$classes[] = 'edgtf-cml-light';
		}

		return $classes;
	}

}