<?php
/**
 * Blockquote shortcode template
 */
?>

<blockquote class="edgtf-blockquote-shortcode" <?php barista_edge_inline_style($blockquote_style); ?> >
	<span class="edgtf-blockquote-text">
		<?php echo esc_attr($text); ?>
	</span>
</blockquote>