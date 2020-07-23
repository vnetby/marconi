<?php
$barista_edge_variable_blog_archive_pages_classes = barista_edge_blog_archive_pages_classes(barista_edge_get_default_blog_list());
?>
<?php get_header(); ?>
<?php barista_edge_get_title(); ?>
<div class="<?php echo esc_attr($barista_edge_variable_blog_archive_pages_classes['holder']); ?>">
	<?php do_action('barista_edge_after_container_open'); ?>
	<div class="<?php echo esc_attr($barista_edge_variable_blog_archive_pages_classes['inner']); ?>">
		<?php barista_edge_get_blog(barista_edge_get_default_blog_list()); ?>
	</div>
	<?php do_action('barista_edge_before_container_close'); ?>
</div>
<?php do_action('barista_edge_after_container_close'); ?>
<?php get_footer(); ?>
