<?php
    /*
    Template Name: Blog: Standard Whole Post
    */
?>
<?php get_header(); ?>
<?php barista_edge_get_title(); ?>
<?php get_template_part('slider'); ?>
    <div class="edgtf-container">
        <?php do_action('barista_edge_after_container_open'); ?>
        <div class="edgtf-container-inner">
            <?php barista_edge_get_blog('standard-whole-post'); ?>
        </div>
        <?php do_action('barista_edge_before_container_close'); ?>
    </div>
<?php do_action('barista_edge_after_container_close'); ?>
<?php get_footer(); ?>