<?php

if(!function_exists('barista_edge_overlapping_content_enabled')) {
    /**
     * Checks if overlapping content is enabled
     *
     * @return bool
     */
    function barista_edge_overlapping_content_enabled() {
        $id = barista_edge_get_page_id();

        return get_post_meta($id, 'edgtf_overlapping_content_enable_meta', true) === 'yes';
    }
}

if(!function_exists('barista_edge_overlapping_content_class')) {
    /**
     * Adds overlapping content class to body tag
     * if overlapping content is enabled
     * @param $classes
     *
     * @return array
     */
    function barista_edge_overlapping_content_class($classes) {
        if(barista_edge_overlapping_content_enabled()) {
            $classes[] = 'edgtf-overlapping-content-enabled';
        }

        return $classes;
    }

    add_filter('body_class', 'barista_edge_overlapping_content_class');
}

if(!function_exists('barista_edge_overlapping_content_amount')) {
    /**
     * Returns amount of overlapping content
     *
     * @return int
     */
    function barista_edge_overlapping_content_amount() {
        return 75;
    }
}

if(!function_exists('barista_edge_oc_content_top_padding')) {
    function barista_edge_oc_content_top_padding($style) {
	    $id = barista_edge_get_page_id();

	    $class_prefix = barista_edge_get_unique_page_class();

	    $content_selector = array(
		    $class_prefix.' .edgtf-content .edgtf-content-inner > .edgtf-container .edgtf-overlapping-content'
	    );

	    $content_class = array();

	    $page_padding_top = get_post_meta($id, 'edgtf_page_content_top_padding', true);
		$page_padding_right = get_post_meta($id, "edgtf_page_content_right_padding", true);
		$page_padding_bottom = get_post_meta($id, "edgtf_page_content_bottom_padding", true);
		$page_padding_left = get_post_meta($id, "edgtf_page_content_left_padding", true);

	    if($page_padding_top !== '') {
		    if(get_post_meta($id, 'edgtf_page_content_top_padding_mobile', true) == 'yes') {
			    $content_class['padding-top'] = barista_edge_filter_px($page_padding_top).'px!important';
		    } else {
			    $content_class['padding-top'] = barista_edge_filter_px($page_padding_top).'px';
		    }

	    }

		if($page_padding_bottom !== '') {
			$content_class['padding-bottom'] = barista_edge_filter_px($page_padding_bottom).'px';
		}
		if($page_padding_left !== '') {
			$content_class['padding-left'] = barista_edge_filter_px($page_padding_left).'px';
		}
		if($page_padding_right !== '') {
			$content_class['padding-right'] = barista_edge_filter_px($page_padding_right).'px';
		}

		if(!empty ($content_class)) {
			$current_style =  barista_edge_dynamic_css($content_selector, $content_class);
			$style[] = $current_style;
		}

	    return $style;
    }

	add_filter('barista_edge_add_page_custom_style', 'barista_edge_oc_content_top_padding');
}