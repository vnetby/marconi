<?php

if(!function_exists('barista_edge_map_portfolio_settings')) {
    function barista_edge_map_portfolio_settings() {
        $meta_box = barista_edge_create_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__('Portfolio Settings', 'baristawp'),
            'name'  => 'portfolio_settings_meta_box'
        ));

        barista_edge_create_meta_box_field(array(
            'name'        => 'edgtf_portfolio_single_template_meta',
            'type'        => 'select',
            'label'       => esc_html__('Portfolio Type', 'baristawp'),
            'description' => esc_html__('Choose a default type for Single Project pages', 'baristawp'),
            'parent'      => $meta_box,
            'options'     => array(
                ''                  => esc_html__('Default', 'baristawp'),
                'small-images'      => esc_html__('Portfolio small images', 'baristawp'),
                'small-slider'      => esc_html__('Portfolio small slider', 'baristawp'),
                'big-images'        => esc_html__('Portfolio big images', 'baristawp'),
                'big-slider'        => esc_html__('Portfolio big slider', 'baristawp'),
                'gallery'           => esc_html__('Portfolio gallery', 'baristawp'),
                'small-masonry'     => esc_html__('Portfolio small masonry', 'baristawp'),
                'big-masonry'       => esc_html__('Portfolio big masonry', 'baristawp'),
                'custom'            => esc_html__('Portfolio custom', 'baristawp'),
                'full-width-custom' => esc_html__('Portfolio full width custom', 'baristawp')
            )
        ));

        $all_pages = array();
        $pages     = get_pages();
        foreach($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        barista_edge_create_meta_box_field(array(
            'name'        => 'portfolio_single_back_to_link',
            'type'        => 'selectblank',
            'label'       => esc_html__('"Back To" Link', 'baristawp'),
            'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'baristawp'),
            'parent'      => $meta_box,
            'options'     => $all_pages
        ));

        barista_edge_create_meta_box_field(array(
            'name'        => 'portfolio_external_link',
            'type'        => 'text',
            'label'       => esc_html__('Portfolio External Link', 'baristawp'),
            'description' => esc_html__('Enter URL to link from Portfolio List page', 'baristawp'),
            'parent'      => $meta_box,
            'args'        => array(
                'col_width' => 3
            )
        ));

        barista_edge_create_meta_box_field(array(
            'name'        => 'portfolio_masonry_dimenisions',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Masonry', 'baristawp'),
            'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists', 'baristawp'),
            'parent'      => $meta_box,
            'options'     => array(
                'default'            => esc_html__('Default', 'baristawp'),
                'large_width'        => esc_html__('Large width', 'baristawp'),
                'large_height'       => esc_html__('Large height', 'baristawp'),
                'large_width_height' => esc_html__('Large width/height', 'baristawp')
            )
        ));
    }

    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_portfolio_settings');
}