<?php

if(!function_exists('barista_edge_overlapping_content_opening_tag')) {
    /**
     * Prints opening HTML tags for overlapping content
     * Hooks to barista_edge_after_container_open
     */
    function barista_edge_overlapping_content_opening_tag() {
        if(barista_edge_overlapping_content_enabled()) : ?>
            <div class="edgtf-overlapping-content-holder">
            <div class="edgtf-overlapping-content">
            <div class="edgtf-overlapping-content-inner">
    <?php endif;
    }

    add_action('barista_edge_after_container_open', 'barista_edge_overlapping_content_opening_tag');
}

if(!function_exists('barista_edge_overlapping_content_closing_tag')) {
    /**
     * Prints closing HTML tags for overlapping content
     * Hooks to barista_edge_before_container_close
     */
    function barista_edge_overlapping_content_closing_tag() {
        if(barista_edge_overlapping_content_enabled()) : ?>
            </div> <!-- close .edgtf-overlapping-content-inner -->
            </div> <!-- close .edgtf-overlapping-content -->
            </div> <!-- close .edgtf-overlapping-content-holder -->
    <?php endif;
    }

    add_action('barista_edge_before_container_close', 'barista_edge_overlapping_content_closing_tag');
}