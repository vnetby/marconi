<?php
namespace BaristaEdge\Modules\Shortcodes\ImageGallery;

use BaristaEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageGallery implements ShortcodeInterface{

	private $base;

	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'edgtf_image_gallery';

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
			'name'                      => esc_html__('Edge Image Gallery', 'edge-cpt'),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__('by EDGE','edge-cpt'),
			'icon'                      => 'icon-wpb-image-gallery extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'			=> 'attach_images',
					'heading'		=> esc_html__('Images','edge-cpt'),
					'param_name'	=> 'images',
					'description'	=> esc_html__('Choose images from media library','edge-cpt')
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Image Size','edge-cpt'),
					'param_name'	=> 'image_size',
					'description'	=> esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size','edge-cpt')
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Gallery Type','edge-cpt'),
					'admin_label' => true,
					'param_name'  => 'type',
					'value'       => array(
						esc_html__('Slider', 'edge-cpt')		=> 'slider',
						esc_html__('Carousel', 'edge-cpt')	=> 'carousel',
						esc_html__('Image Grid', 'edge-cpt')	=> 'image_grid',
						esc_html__('Masonry', 'edge-cpt')	=> 'masonry',
					),
					'description' => esc_html__('Select gallery type','edge-cpt'),
					'save_always' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Image Shadow','edge-cpt'),
					'param_name'  => 'image_shadow',
					'value'       => array(
						esc_html__('No','edge-cpt') => 'no',
						esc_html__('Yes','edge-cpt')  => 'yes'
					),
					'dependency'	=> array('element'	=> 'type', 'value' => array('carousel'))
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
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'slider',
							'carousel'
						)
					),
					'description' => esc_html__('Auto rotate slides each X seconds','edge-cpt'),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Slide Animation','edge-cpt'),
					'admin_label'	=> true,
					'param_name'	=> 'slide_animation',
					'value'			=> array(
						esc_html__('Slide', 'edge-cpt')		=> 'slide',
						esc_html__('Fade', 'edge-cpt')		=> 'fade',
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'slider'
						)
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Column Number','edge-cpt'),
					'param_name'	=> 'column_number',
					'value'			=> array(2, 3, 4, 5),
					'save_always'	=> true,
					'dependency'	=> array(
						'element' 	=> 'type',
						'value'		=> array(
							'image_grid'
						)
					),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Open PrettyPhoto on click','edge-cpt'),
					'param_name'	=> 'pretty_photo',
					'value'			=> array(
						esc_html__('No', 'edge-cpt')		=> 'no',
						esc_html__('Yes', 'edge-cpt')		=> 'yes'
					),
					'save_always'	=> true,
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Grayscale Images','edge-cpt'),
					'param_name' => 'grayscale',
					'value' => array(
						esc_html__('No', 'edge-cpt') => 'no',
						esc_html__('Yes', 'edge-cpt') => 'yes'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'image_grid'
						)
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Image Overlay','edge-cpt'),
					'param_name' => 'overlay',
					'value' => array(
						esc_html__('No', 'edge-cpt') => 'no',
						esc_html__('Yes', 'edge-cpt') => 'yes'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'image_grid'
						)
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Navigation Arrows','edge-cpt'),
					'param_name' 	=> 'navigation',
					'value' 		=> array(
						esc_html__('Yes', 'edge-cpt')		=> 'yes',
						esc_html__('No', 'edge-cpt')		=> 'no'
					),
					'dependency' 	=> array(
						'element' => 'type',
						'value' => array(
							'slider',
							'carousel'
						)
					),
					'save_always'	=> true
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Pagination','edge-cpt'),
					'param_name' 	=> 'pagination',
					'value' 		=> array(
						esc_html__('Yes', 'edge-cpt') 		=> 'yes',
						esc_html__('No', 'edge-cpt')		=> 'no'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element' => 'type',
						'value' => array(
							'slider',
							'carousel'
						)
					)
				)
			)
		));

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
			'images'			=> '',
			'image_size'		=> 'thumbnail',
			'image_shadow'		=> 'no',
			'type'				=> 'slider',
			'autoplay'			=> '5000',
			'slide_animation'	=> 'slide',
			'pretty_photo'		=> '',
			'column_number'		=> '',
			'grayscale'			=> '',
			'overlay'           => '',
			'navigation'		=> 'yes',
			'pagination'		=> 'yes'
		);

		$params = shortcode_atts($args, $atts);
		$params['slider_data'] = $this->getSliderData($params);
		$params['image_size'] = $this->getImageSize($params['image_size']);
		$params['images'] = $this->getGalleryImages($params);
		$params['slider_class'] = $this->getSliderClass($params);
		$params['pretty_photo'] = ($params['pretty_photo'] == 'yes') ? true : false;
		$params['columns'] = 'edgtf-gallery-columns-' . $params['column_number'];
		$params['gallery_classes'] = ($params['grayscale'] == 'yes') ? 'edgtf-grayscale' : '';


		if ($params['type'] == 'image_grid') {
			$template = 'gallery-grid';
			$params['gallery_classes'] .= ($params['overlay'] == 'yes') ? ' edgtf-overlay' : '';
		} elseif ($params['type'] == 'slider') {
			$template = 'gallery-slider';
		}elseif ($params['type'] == 'carousel') {
			$template = 'gallery-carousel';
		} elseif ($params['type'] == 'masonry') {
			$template = 'gallery-masonry';
		}

		$html = edge_core_get_shortcode_template_part('templates/' . $template, 'imagegallery', '', $params);

		return $html;

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
			$image['class'] = '';
			if ($params['type'] == 'masonry') {
		        $size = get_post_meta($id,'_ptf_single_masonry_image_size', true);
		        $size = ($size)?$size:'edgtf-default-masonry-item';
		        switch($size){
			        case 'edgtf-large-height-masonry-item' :
				        $img_size = 'barista_edge_large_height';
				        $image['class'] = 'edgtf-size-portrait';
				        break;
			        case 'edgtf-large-width-masonry-item' :
				        $img_size = 'barista_edge_large_width';
				        $image['class'] = 'edgtf-size-landscape';
				        break;
			        case 'edgtf-large-width-height-masonry-item' :
				        $img_size = 'barista_edge_large_width_height';
				        $image['class'] = 'edgtf-size-big-square';
				        break;
			        default:
				        $img_size = 'barista_edge_square';
				        $image['class'] = 'edgtf-size-square';
				        break;
		        }
			}
			else{
				$img_size = 'full';
			}
			$image_original = wp_get_attachment_image_src($id, 'full');
			$image['masonry_size'] = $img_size;
			$image['url'] = $image_original[0];
			$image['title'] = get_the_title($id);
			$image['link'] = get_post_meta($id,'_attachment_image_custom_link', true);
			$image['link_target'] = get_post_meta($id,'_attachment_image_link_target', true);

			if ($image['link_target'] == ''){
				$image['link_target'] = '_self';
			}

			$images[$i] = $image;
			$i++;
		}

		return $images;

	}

	/**
	 * Return image size or custom image size array
	 *
	 * @param $image_size
	 * @return array
	 */
	private function getImageSize($image_size) {

		$image_size = trim($image_size);
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if(in_array( $image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full'))) {
			return $image_size;
		} elseif(!empty($matches[0])) {
			return array(
					$matches[0][0],
					$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
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
		$slider_data['data-animation'] = ($params['slide_animation'] !== '') ? $params['slide_animation'] : '';
		$slider_data['data-navigation'] = ($params['navigation'] !== '') ? $params['navigation'] : '';
		$slider_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';

		return $slider_data;

	}

	private function getSliderClass($params) {

		$class = array();
		if($params['image_shadow'] == 'yes'){
			$class[] = 'shadow';
		}
		return implode(' ', $class);
	}

}