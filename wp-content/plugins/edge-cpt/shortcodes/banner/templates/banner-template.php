<div class="edgtf-banner">
	<?php if ( $link ) : ?>
        <a class="edgtf-banner-link" href="<?php echo esc_url( $link ); ?>" <?php barista_edge_inline_attr( $target, 'target' ); ?>></a>
	<?php endif; ?>
    <div class="edgtf-banner-image">
        <img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr_e( 'Banner image', 'edge-cpt' ); ?>"/>
    </div>
    <div class="edgtf-banner-text-holder">
        <div class="edgtf-banner-text-table">
            <div class="edgtf-banner-text-cell">
				<span class="edgtf-banner-subtitle" <?php barista_edge_inline_style( $subtitle_font_style ); ?>>
					<?php if ( $subtitle != '' ) { ?>
						<?php echo esc_attr( $subtitle ) ?>
					<?php } ?>
				</span>
				<?php if ( $title != '' ) { ?>
                <<?php echo esc_attr( $title_tag ); ?> class="edgtf-banner-title" <?php barista_edge_inline_style( $title_font_style ); ?>>
				<?php echo esc_attr( $title ); ?>
            </<?php echo esc_attr( $title_tag ); ?>>
			<?php } ?>
			<?php if ( $link !== '' ) { ?>
                <a href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>" class="edgtf-banner-read-more" <?php barista_edge_inline_style( $link_style ); ?>><?php echo esc_html__( 'Read More', 'edge-cpt' ); ?>
                    <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_right"></span></a>
			<?php } ?>
        </div>
    </div>
</div>
</div>