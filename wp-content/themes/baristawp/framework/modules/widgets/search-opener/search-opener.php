<?php

/**
 * Widget that adds search icon that triggers opening of search form
 *
 * Class Edge_Search_Opener
 */
class BaristaEdgeSearchOpener extends BaristaEdgeWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'edgt_search_opener', // Base ID
            esc_html__('Edge Search Opener','baristawp') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'name'        => 'search_icon_size',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Size (px)','baristawp'),
                'description' => esc_html__('Define size for Search icon','baristawp'),
            ),
            array(
                'name'        => 'search_icon_color',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Color','baristawp'),
                'description' => esc_html__('Define color for Search icon','baristawp'),
            ),
            array(
                'name'        => 'search_icon_hover_color',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Hover Color','baristawp'),
                'description' => esc_html__('Define hover color for Search icon','baristawp'),
            ),
            array(
                'name'        => 'show_label',
                'type'        => 'dropdown',
                'title'       => esc_html__('Enable Search Icon Text','baristawp'),
                'description' => esc_html__('Enable this option to show \'Search\' text next to search icon in header','baristawp'),
                'options'     => array(
                    ''    => '',
                    'yes' => esc_html__('Yes','baristawp'),
                    'no'  => esc_html__('No','baristawp'),
                )
            ),
			array(
				'name'			=> 'close_icon_position',
				'type'			=> 'dropdown',
				'title'			=> esc_html__('Close icon stays on opener place','baristawp'),
				'description'	=> esc_html__('Enable this option to set close icon on same position like opener icon','baristawp'),
				'options'		=> array(
					'yes'	=> esc_html__('Yes','baristawp'),
					'no'	=> esc_html__('No','baristawp'),
				)
			)
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        global $barista_edge_options, $barista_edge_IconCollections;

        $search_type_class    = 'edgtf-search-opener';
		$fullscreen_search_overlay = false;
        $search_opener_styles = array();
        $show_search_text     = $instance['show_label'] == 'yes' || $barista_edge_options['enable_search_icon_text'] == 'yes' ? true : false;
		$close_icon_on_same_position = $instance['close_icon_position'] == 'yes' ? true : false;

		if (isset($barista_edge_options['search_type']) && $barista_edge_options['search_type'] == 'fullscreen-search') {
			if (isset($barista_edge_options['search_animation']) && $barista_edge_options['search_animation'] == 'search-from-circle') {
				$fullscreen_search_overlay = true;
			}
		}

        if(isset($barista_edge_options['search_type']) && $barista_edge_options['search_type'] == 'search_covers_header') {
            if(isset($barista_edge_options['search_cover_only_bottom_yesno']) && $barista_edge_options['search_cover_only_bottom_yesno'] == 'yes') {
                $search_type_class .= ' search_covers_only_bottom';
            }
        }

        if(!empty($instance['search_icon_size'])) {
            $search_opener_styles[] = 'font-size: '.$instance['search_icon_size'].'px';
        }

        if(!empty($instance['search_icon_color'])) {
            $search_opener_styles[] = 'color: '.$instance['search_icon_color'];
        }

        ?>

        <a <?php echo barista_edge_get_inline_attr($instance['search_icon_hover_color'], 'data-hover-color'); ?>
			<?php if ( $close_icon_on_same_position ) {
				echo barista_edge_get_inline_attr('yes', 'data-icon-close-same-position');
			} ?>
            <?php barista_edge_inline_style($search_opener_styles); ?>
            <?php barista_edge_class_attribute($search_type_class); ?> href="javascript:void(0)">
            <?php if(isset($barista_edge_options['search_icon_pack'])) {
                $barista_edge_IconCollections->getSearchIcon($barista_edge_options['search_icon_pack'], false);
            } ?>
            <?php if($show_search_text) { ?>
                <span class="edgtf-search-icon-text"><?php esc_html_e('Search', 'baristawp'); ?></span>
            <?php } ?>
        </a>
		<?php if($fullscreen_search_overlay) { ?>
			<div class="edgtf-fullscreen-search-overlay"></div>
		<?php } ?>
    <?php }
}