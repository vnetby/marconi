<?php

if(!function_exists('barista_edge_map_blog')) {
    function barista_edge_map_blog()
    {

        $edgt_blog_categories = array();
        $categories = get_categories();
        foreach ($categories as $category) {
            $edgt_blog_categories[$category->slug] = $category->name;
        }

        $blog_meta_box = barista_edge_create_meta_box(
            array(
                'scope' => array('page'),
                'title' => esc_html__('Blog', 'baristawp'),
                'name' => 'blog_meta'
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_blog_category_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Blog Category', 'baristawp'),
                'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)', 'baristawp'),
                'parent' => $blog_meta_box,
                'options' => $edgt_blog_categories
            )
        );

        barista_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_show_posts_per_page_meta',
                'type' => 'text',
                'label' => esc_html__('Number of Posts', 'baristawp'),
                'description' => esc_html__('Enter the number of posts to display', 'baristawp'),
                'parent' => $blog_meta_box,
                'options' => $edgt_blog_categories,
                'args' => array("col_width" => 3)
            )
        );
    }

    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_blog');
}
	

