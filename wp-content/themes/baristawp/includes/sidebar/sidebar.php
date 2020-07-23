<?php

if(!function_exists('barista_edge_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function barista_edge_register_sidebars() {

        register_sidebar(array(
            'name' => 'Sidebar',
            'id' => 'sidebar',
            'description' => 'Default Sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="edgtf-widget-title">',
            'after_title' => '</h4>' . barista_edge_get_separator_html(array('position' => 'left', 'class_name' => 'edgtf-sidebar-title-separator'))
        ));

    }

    add_action('widgets_init', 'barista_edge_register_sidebars');
}

if(!function_exists('barista_edge_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates BaristaEdgeSidebar object
     */
    function barista_edge_add_support_custom_sidebar() {
        add_theme_support('BaristaEdgeSidebar');
        if (get_theme_support('BaristaEdgeSidebar')) new BaristaEdgeSidebar();
    }

    add_action('after_setup_theme', 'barista_edge_add_support_custom_sidebar');
}
