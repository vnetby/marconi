<?php barista_edge_get_module_template_part( 'templates/lists/parts/filter', 'blog' ); ?>
<div class="edgtf-blog-holder edgtf-blog-type-masonry edgtf-masonry-pagination-<?php echo barista_edge_options()->getOptionValue( 'masonry_pagination' ); ?>">
    <div class="edgtf-blog-masonry-grid-sizer"></div>
    <div class="edgtf-blog-masonry-grid-gutter"></div>
	<?php
	if ( $blog_query->have_posts() ) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
		barista_edge_get_post_format_html( $blog_type );
	endwhile;
	else:
		barista_edge_get_module_template_part( 'templates/parts/no-posts', 'blog' );
	endif;
	?>
</div>
<?php
if ( barista_edge_options()->getOptionValue( 'pagination' ) == 'yes' ) {
	$pagination_type = barista_edge_options()->getOptionValue( 'masonry_pagination' );

	if ( $pagination_type == 'load-more' || $pagination_type == 'infinite-scroll' ) {
		if ( get_next_posts_page_link( $blog_query->max_num_pages ) ) { ?>
            <div class="edgtf-blog-<?php echo esc_attr( $pagination_type ); ?>-button-holder">
					<span class="edgtf-blog-<?php echo esc_attr( $pagination_type ); ?>-button" data-rel="<?php echo esc_attr( $blog_query->max_num_pages ); ?>">
						<?php
						echo barista_edge_get_button_html( array(
							'link' => get_next_posts_page_link( $blog_query->max_num_pages ),
							'text' => esc_html__( 'Show more', 'baristawp' )
						) );
						?>
					</span>
            </div>

			<?php
			$unique_id = rand( 1000, 9999 );
			wp_nonce_field( 'edgtf_blog_load_more_nonce_' . $unique_id, 'edgtf_blog_load_more_nonce_' . $unique_id );
			?>

		<?php }
	}
}
?>

