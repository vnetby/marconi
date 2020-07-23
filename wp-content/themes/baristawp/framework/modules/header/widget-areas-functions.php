<?php

if(!function_exists('barista_edge_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function barista_edge_register_top_header_areas() {
        $top_bar_layout  = barista_edge_options()->getOptionValue('top_bar_layout');
        $top_bar_enabled = barista_edge_options()->getOptionValue('top_bar');

            register_sidebar(array(
                'name'          => esc_html__('Top Bar Left', 'baristawp'),
                'id'            => 'edgtf-top-bar-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));

            //register this widget area only if top bar layout is three columns
            if($top_bar_layout === 'three-columns') {
                register_sidebar(array(
                    'name'          => esc_html__('Top Bar Center', 'baristawp'),
                    'id'            => 'edgtf-top-bar-center',
                    'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                    'after_widget'  => '</div>'
                ));
            }

            register_sidebar(array(
                'name'          => esc_html__('Top Bar Right', 'baristawp'),
                'id'            => 'edgtf-top-bar-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));
    }

    add_action('widgets_init', 'barista_edge_register_top_header_areas');
}

if(!function_exists('barista_edge_header_standard_widget_areas')) {
    /**
     * Registers widget areas for standard header type
     */
    function barista_edge_header_standard_widget_areas() {
            register_sidebar(array(
                'name'          => esc_html__('Right From Main Menu', 'baristawp'),
                'id'            => 'edgtf-right-from-main-menu',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-right-from-main-menu-widget">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the main menu', 'baristawp')
            ));

    }

    add_action('widgets_init', 'barista_edge_header_standard_widget_areas');
}

if(!function_exists('barista_edge_header_vertical_widget_areas')) {
    /**
     * Registers widget areas for vertical header
     */
    function barista_edge_header_vertical_widget_areas() {
            register_sidebar(array(
                'name'          => esc_html__('Vertical Area', 'baristawp'),
                'id'            => 'edgtf-vertical-area',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-vertical-area-widget">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the bottom of vertical menu', 'baristawp')
            ));
    }

    add_action('widgets_init', 'barista_edge_header_vertical_widget_areas');
}

if(!function_exists('barista_edge_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function barista_edge_register_mobile_header_areas() {
        if(barista_edge_is_responsive_on() && barista_edge_core_installed()) {
            register_sidebar(array(
                'name'          => esc_html__('Right From Mobile Logo', 'baristawp'),
                'id'            => 'edgtf-right-from-mobile-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-right-from-mobile-logo">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'baristawp')
            ));
        }
    }

    add_action('widgets_init', 'barista_edge_register_mobile_header_areas');
}

if(!function_exists('barista_edge_register_sticky_header_areas')) {
    /**
     * Registers widget area for sticky header
     */
    function barista_edge_register_sticky_header_areas() {
        if(in_array(barista_edge_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            register_sidebar(array(
                'name'          => esc_html__('Sticky Right', 'baristawp'),
                'id'            => 'edgtf-sticky-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-sticky-right">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side in sticky menu', 'baristawp')
            ));
        }
    }

    add_action('widgets_init', 'barista_edge_register_sticky_header_areas');
}