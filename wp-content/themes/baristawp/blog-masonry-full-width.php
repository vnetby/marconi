<?php
	/*
	Template Name: Blog: Masonry Full Width
	*/
?>
<?php get_header(); ?>

<?php barista_edge_get_title(); ?>
<?php get_template_part('slider'); ?>

	<div class="edgtf-full-width">
		<div class="edgtf-full-width-inner clearfix">
			<?php barista_edge_get_blog('masonry-full-width'); ?>
		</div>
	</div>
	<?php do_action('barista_edge_after_full_width_container_close') ?>
<?php get_footer(); ?>