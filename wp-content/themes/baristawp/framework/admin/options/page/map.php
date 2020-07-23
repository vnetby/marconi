<?php

if ( ! function_exists('barista_edge_page_options_map') ) {

    function barista_edge_page_options_map() {

        barista_edge_add_admin_page(
            array(
                'slug'  => '_page_page',
                'title' => esc_html__('Page', 'baristawp'),
                'icon'  => 'fa fa-file-o'
            )
        );

        $custom_sidebars = barista_edge_get_custom_sidebars();

        $panel_sidebar = barista_edge_add_admin_panel(
            array(
                'page'  => '_page_page',
                'name'  => 'panel_sidebar',
                'title' => esc_html__('Design Style', 'baristawp')
            )
        );

        barista_edge_add_admin_field(array(
            'name'        => 'page_sidebar_layout',
            'type'        => 'select',
            'label'       => esc_html__('Sidebar Layout', 'baristawp'),
            'description' => esc_html__('Choose a sidebar layout for pages', 'baristawp'),
            'default_value' => 'default',
            'parent'      => $panel_sidebar,
            'options'     => array(
                'default'			=> esc_html__('No Sidebar', 'baristawp'),
                'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'baristawp'),
                'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'baristawp'),
                'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'baristawp'),
                'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'baristawp')
            )
        ));


        if(count($custom_sidebars) > 0) {
            barista_edge_add_admin_field(array(
                'name' => 'page_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'baristawp'),
                'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'baristawp'),
                'parent' => $panel_sidebar,
                'options' => $custom_sidebars
            ));
        }

        barista_edge_add_admin_field(array(
            'name'        => 'page_show_comments',
            'type'        => 'yesno',
            'label'       => esc_html__('Show Comments', 'baristawp'),
            'description' => esc_html__('Enabling this option will show comments on your page', 'baristawp'),
            'default_value' => 'yes',
            'parent'      => $panel_sidebar
        ));

    }

    add_action( 'barista_edge_options_map', 'barista_edge_page_options_map', 8);

}