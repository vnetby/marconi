<?php

class BaristaEdgeSideAreaOpener extends BaristaEdgeWidget {
    public function __construct() {
        parent::__construct(
            'edgtf_side_area_opener', // Base ID
            esc_html__('Edge Side Area Opener','baristawp') // Name
        );

        $this->setParams();
    }

    protected function setParams() {

		$this->params = array(
			array(
				'name'			=> 'side_area_opener_icon_color',
				'type'			=> 'textfield',
				'title'			=> esc_html__('Icon Color','baristawp'),
				'description'	=> esc_html__('Define color for Side Area opener icon','baristawp')
			)
		);

    }


    public function widget($args, $instance) {
		
		$sidearea_icon_styles = array();

		if ( !empty($instance['side_area_opener_icon_color']) ) {
			$sidearea_icon_styles[] = 'color: ' . $instance['side_area_opener_icon_color'];
		}
		
		$icon_size = '';
		if ( barista_edge_options()->getOptionValue('side_area_predefined_icon_size') ) {
			$icon_size = barista_edge_options()->getOptionValue('side_area_predefined_icon_size');
		}
		?>
        <a class="edgtf-side-menu-button-opener <?php echo esc_attr( $icon_size ); ?>" <?php barista_edge_inline_style($sidearea_icon_styles) ?> href="javascript:void(0)">
            <?php echo barista_edge_get_side_menu_icon_html(); ?>
        </a>

    <?php }

}