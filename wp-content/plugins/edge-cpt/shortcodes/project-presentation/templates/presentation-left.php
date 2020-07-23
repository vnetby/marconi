<div class="edgtf-project-presentation <?php echo esc_attr( $project_classes ) ?>">
    <div class="edgtf-pp-content-holder">
        <div class="edgtf-pp-content-left">
            <div class="edgtf-pp-background">
                <img src="<?php echo esc_url( $image_single ); ?>" alt="<?php esc_attr_e( 'Project presentation background', 'edge-cpt' ); ?>"/>
            </div>
            <div class="edgtf-pp-text-holder">
                <div class="edgtf-pp-text-table">
                    <div class="edgtf-pp-text-cell">
						<?php if ( $title != '' ) { ?>
                        <<?php echo esc_attr( $title_tag ); ?> class="edgtf-pp-title">
						<?php echo esc_attr( $title ); ?>
                    </<?php echo esc_attr( $title_tag ); ?>>
					<?php } ?>
					<?php if ( $subtitle != '' ) { ?>
                        <p class="edgtf-pp-subtitle">
							<?php echo esc_attr( $subtitle ) ?>
                        </p>
					<?php } ?>
                </div>
            </div>
        </div>
		<?php if ( $show_button == "yes" && $button_text !== '' ) { ?>
            <div class="edgtf-pp-button">
				<?php echo barista_edge_get_button_html( array(
					'type'      => 'transparent',
					'link'      => $link,
					'target'    => $link_target,
					'text'      => $button_text,
					'icon_pack' => 'font_elegant',
					'fe_icon'   => 'arrow_right'
				) ); ?>
            </div>
		<?php } ?>
    </div>
    <div class="edgtf-pp-content-right">
        <div class="edgtf-pp-gallery">
            <div class="edgtf-pp-gallery-slider" <?php echo barista_edge_get_inline_attrs( $slider_data ); ?>>
				<?php foreach ( $images as $image ) { ?>
					<?php echo wp_get_attachment_image( $image['image_id'], 'full' ); ?>
				<?php } ?>
            </div>
        </div>
    </div>
</div>
</div>