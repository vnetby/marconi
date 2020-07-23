<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php

global $barista_edge_variable_woocommerce;

$barista_edge_variable_id = get_option('woocommerce_shop_page_id');
$barista_edge_variable_shop = get_post($barista_edge_variable_id);
$barista_edge_variable_sidebar = barista_edge_sidebar_layout();

if(get_post_meta($barista_edge_variable_id, 'edgt_page_background_color', true) != ''){
	$barista_edge_variable_background_color = 'background-color: '.esc_attr(get_post_meta($barista_edge_variable_id, 'edgt_page_background_color', true));
}else{
	$barista_edge_variable_background_color = '';
}

$barista_edge_variable_content_style = '';
if(get_post_meta($barista_edge_variable_id, 'edgt_content-top-padding', true) != '') {
	if(get_post_meta($barista_edge_variable_id, 'edgt_content-top-padding-mobile', true) == 'yes') {
		$barista_edge_variable_content_style = 'padding-top:'.esc_attr(get_post_meta($barista_edge_variable_id, 'edgt_content-top-padding', true)).'px !important';
	} else {
		$barista_edge_variable_content_style = 'padding-top:'.esc_attr(get_post_meta($barista_edge_variable_id, 'edgt_content-top-padding', true)).'px';
	}
}

if ( get_query_var('paged') ) {
	$barista_edge_variable_paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
	$barista_edge_variable_paged = get_query_var('page');
} else {
	$barista_edge_variable_paged = 1;
}

get_header();

barista_edge_get_title();
get_template_part('slider');

$barista_edge_variable_full_width = false;

if ( barista_edge_options()->getOptionValue('edgtf_woo_products_list_full_width') == 'yes' && !is_singular('product') ) {
	$barista_edge_variable_full_width = true;
}

if ( $barista_edge_variable_full_width ) { ?>
	<div class="edgtf-full-width" <?php barista_edge_inline_style($barista_edge_variable_background_color); ?>>
<?php } else { ?>
	<div class="edgtf-container" <?php barista_edge_inline_style($barista_edge_variable_background_color); ?>>
<?php }
		if ( $barista_edge_variable_full_width ) { ?>
			<div class="edgtf-full-width-inner" <?php barista_edge_inline_style($barista_edge_variable_content_style); ?>>
		<?php } else { ?>
			<div class="edgtf-container-inner clearfix" <?php barista_edge_inline_style($barista_edge_variable_content_style); ?>>
		<?php }

			//Woocommerce content
			if ( ! is_singular('product') ) {

				switch( $barista_edge_variable_sidebar ) {

					case 'sidebar-33-right': ?>
						<div class="edgtf-two-columns-66-33 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1">
								<div class="edgtf-column-inner">
									<?php barista_edge_woocommerce_content(); ?>
								</div>
							</div>
							<div class="edgtf-column2">
								<?php get_sidebar();?>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-25-right': ?>
						<div class="edgtf-two-columns-75-25 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1 edgtf-content-left-from-sidebar">
								<div class="edgtf-column-inner">
									<?php barista_edge_woocommerce_content(); ?>
								</div>
							</div>
							<div class="edgtf-column2">
								<?php get_sidebar();?>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-33-left': ?>
						<div class="edgtf-two-columns-33-66 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1">
								<?php get_sidebar();?>
							</div>
							<div class="edgtf-column2">
								<div class="edgtf-column-inner">
									<?php barista_edge_woocommerce_content(); ?>
								</div>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-25-left': ?>
						<div class="edgtf-two-columns-25-75 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1">
								<?php get_sidebar();?>
							</div>
							<div class="edgtf-column2 edgtf-content-right-from-sidebar">
								<div class="edgtf-column-inner">
									<?php barista_edge_woocommerce_content(); ?>
								</div>
							</div>
						</div>
					<?php
						break;
					default:
						barista_edge_woocommerce_content();
				}

			} else {
				barista_edge_woocommerce_content();
			} ?>

			</div>
	</div>
	<?php do_action('barista_edge_after_container_close'); ?>
<?php get_footer(); ?>
