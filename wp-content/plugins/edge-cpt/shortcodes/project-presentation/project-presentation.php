<?php
namespace BaristaEdge\Modules\Shortcodes\ProjectPresentation;

use BaristaEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProjectPresentation implements ShortcodeInterface{
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_project_presentation';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Project Presentation Slider', 'edge-cpt'),
			'base' => $this->base,
			'icon' => 'icon-wpb-project-presentation extended-custom-icon',
			'category' => esc_html__('by EDGE', 'edge-cpt'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'attach_image',
					'class' => '',
					'heading' => esc_html__('Background Image','edge-cpt'),
					'param_name' => 'image',
					'value' => '',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Presentation Type','edge-cpt'),
					'param_name' => 'type',
					'value' => array(
						'Info Left' => 'presentation-left',
						'Info Right' => 'presentation-right'
					),
					'description' => ''
				),
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
					'heading' => esc_html__('Subtitle','edge-cpt'),
					'param_name' => 'subtitle',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Show Button','edge-cpt'),
					'param_name' => 'show_button',
					'value' => array(
						esc_html__('Default','edge-cpt') => '',
						esc_html__('Yes','edge-cpt') => 'yes',
						esc_html__('No','edge-cpt') => 'no'
					),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Button Text','edge-cpt'),
					'param_name' => 'button_text',
					'dependency' => array('element' => 'show_button',  'value' => 'yes')
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Button Link','edge-cpt'),
					'param_name' => 'link',
					'dependency' => array('element' => 'show_button',  'value' => 'yes')
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Button Link Target','edge-cpt'),
					'param_name' => 'link_target',
					'value' => array(
						esc_html__('Self','edge-cpt') => '_self',
						esc_html__('Blank','edge-cpt') => '_blank'
					),
					'dependency' => array('element' => 'show_button',  'value' => 'yes')
				),
				array(
					'type'			=> 'attach_images',
					'heading'		=> esc_html__('Slider Images','edge-cpt'),
					'param_name'	=> 'images',
					'description'	=> esc_html__('Choose images from media library','edge-cpt')
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Show Slider Pagination','edge-cpt'),
					'param_name' => 'pagination',
					'save_always'	=> true,
					'value' => array(
						esc_html__('Yes','edge-cpt') => 'yes',
						esc_html__('No','edge-cpt') => 'no'
					),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Slide duration','edge-cpt'),
					'admin_label'	=> true,
					'param_name'	=> 'autoplay',
					'value'			=> array(
						'3'			=> '3',
						'5'			=> '5',
						'10'		=> '10',
						'Disable'	=> 'disable'
					),
					'save_always'	=> true,
					'description' => esc_html__('Auto rotate slides each X seconds','edge-cpt'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Skin','edge-cpt'),
					'admin_label'	=> true,
					'param_name'	=> 'skin',
					'value'			=> array(
						esc_html__('Dark','edge-cpt')		=> 'dark',
						esc_html__('Light','edge-cpt')		=> 'light',
					),
					'save_always'   => true
				)
			)
		) );

	}

	public function render($atts, $content = null) {
		$args = array(
            'image' => '',
            'images' => '',
            'title' => '',
			'type' => 'presentation-left',
            'title_tag' => 'h2',
			'subtitle' => '',
			'autoplay' => '',
			'pagination' => 'yes',
			'show_button' => '',
			'button_text' => '',
			'link' => '',
			'link_target' => '_self',
			'skin' => 'dark'
        );
		$params = shortcode_atts($args, $atts);

		//Extract params for use in method
		extract($params);
		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

		$params['image_single']= wp_get_attachment_url($params['image']);
		$params['images'] = $this->getGalleryImages($params);
		$params['project_classes'] = $this->getProjectClasses($params);
		$params['slider_data'] = $this->getSliderData($params);

        //init variables
		$html = edge_core_get_shortcode_template_part('templates/' . $params['type'], 'project-presentation', '', $params);
		
        return $html;
		
	}

	private function getProjectClasses($params) {

		$class = array($params['type'], 'edgtf-project-presentation-'.$params['skin']);

		return implode(' ', $class);
	}

	/**
	 * Return images for gallery
	 *
	 * @param $params
	 * @return array
	 */
	private function getGalleryImages($params) {
		$image_ids = array();
		$images = array();
		$i = 0;

		if ($params['images'] !== '') {
			$image_ids = explode(',', $params['images']);
		}

		foreach ($image_ids as $id) {

			$image['image_id'] = $id;
			$image_original = wp_get_attachment_image_src($id, 'full');
			$image['url'] = $image_original[0];
			$image['title'] = get_the_title($id);

			$images[$i] = $image;
			$i++;
		}

		return $images;

	}

	/**
	 * Return all configuration data for slider
	 *
	 * @param $params
	 * @return array
	 */
	private function getSliderData($params) {

		$slider_data = array();

		$slider_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';
		$slider_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';

		return $slider_data;

	}
}