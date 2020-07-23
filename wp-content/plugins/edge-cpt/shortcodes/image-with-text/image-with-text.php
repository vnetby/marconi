<?php
namespace BaristaEdge\Modules\Shortcodes\ImageWithText;

use BaristaEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ImageWithText
 */
class ImageWithText implements ShortcodeInterface  {
    private $base; 
    
    function __construct() {
        $this->base = 'edgtf_image_with_text';

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
            'name' => esc_html__('Image With Text', 'edge-cpt'),
            'base' => $this->base,
            'category' => esc_html__('by EDGE', 'edge-cpt'),
            'icon' => 'icon-wpb-image-with-text extended-custom-icon',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Image', 'edge-cpt'),
                    'param_name' => 'item_image'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Text', 'edge-cpt'),
                    'admin_label' => true,                    
                    'param_name' => 'image_with_text_text',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Link', 'edge-cpt'),
                    'admin_label' => true,                    
                    'param_name' => 'image_with_text_link',
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
            'item_image'                    => '',
            'image_with_text_text'          => '',
            'image_with_text_link'          => ''
        );

        $params = shortcode_atts($args, $atts);

        extract($params);

        $html = edge_core_get_shortcode_template_part('templates/image-with-text-template', 'image-with-text', '', $params);

        return $html;

    }
  }
