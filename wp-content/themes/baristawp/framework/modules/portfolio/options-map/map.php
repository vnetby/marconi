<?php

if ( ! function_exists('barista_edge_portfolio_options_map') ) {

	function barista_edge_portfolio_options_map() {

		barista_edge_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__('Portfolio','baristawp'),
			'icon'  => 'fa fa-camera-retro'
		));

		$panel = barista_edge_add_admin_panel(array(
			'title' => esc_html__('Portfolio Single','baristawp'),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		barista_edge_add_admin_field(array(
			'name'        => 'portfolio_single_template',
			'type'        => 'select',
			'label'       => esc_html__('Portfolio Type','baristawp'),
			'default_value'	=> 'small-images',
			'description' => esc_html__('Choose a default type for Single Project pages','baristawp'),
			'parent'      => $panel,
			'options'     => array(
				'small-images' => esc_html__('Portfolio small images','baristawp'),
				'small-slider' => esc_html__('Portfolio small slider','baristawp'),
				'big-images' => esc_html__('Portfolio big images','baristawp'),
				'big-slider' => esc_html__('Portfolio big slider','baristawp'),
				'small-masonry' => esc_html__('Portfolio small masonry','baristawp'),
				'big-masonry' => esc_html__('Portfolio big masonry','baristawp'),
				'gallery' => esc_html__('Portfolio gallery','baristawp'),
				'custom' => esc_html__('Portfolio custom','baristawp'),
				'full-width-custom' => esc_html__('Portfolio full width custom','baristawp'),
			)
		));

		barista_edge_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Images','baristawp'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for projects with images.','baristawp'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		barista_edge_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Videos','baristawp'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.','baristawp'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		barista_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_title',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Portfolio Title','baristawp'),
			'description'   => esc_html__('Enabling this option will disable title on Single Projects.','baristawp'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		barista_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Categories','baristawp'),
			'description'   => esc_html__('Enabling this option will disable category meta description on Single Projects.','baristawp'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		barista_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Date','baristawp'),
			'description'   => esc_html__('Enabling this option will disable date meta on Single Projects.','baristawp'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		barista_edge_add_admin_field(array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments','baristawp'),
			'description'   => esc_html__('Enabling this option will show comments on your page.','baristawp'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		barista_edge_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label'         => esc_html__('Sticky Side Text','baristawp'),
			'description'   => esc_html__('Enabling this option will make side text sticky on Single Project pages','baristawp'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		barista_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Pagination','baristawp'),
			'description'   => esc_html__('Enabling this option will turn off portfolio pagination functionality.','baristawp'),
			'parent'        => $panel,
			'default_value' => 'no',
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '#edgtf_navigate_same_category_container'
			)
		));

		$container_navigate_category = barista_edge_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		barista_edge_add_admin_field(array(
			'name'            => 'portfolio_single_nav_same_category',
			'type'            => 'yesno',
			'label'           => esc_html__('Enable Pagination Through Same Category','baristawp'),
			'description'     => esc_html__('Enabling this option will make portfolio pagination sort through current category.','baristawp'),
			'parent'          => $container_navigate_category,
			'default_value'   => 'no'
		));

		barista_edge_add_admin_field(array(
			'name'        => 'portfolio_single_numb_columns',
			'type'        => 'select',
			'label'       => esc_html__('Number of Columns','baristawp'),
			'default_value' => 'three-columns',
			'description' => esc_html__('Enter the number of columns for Portfolio Gallery type','baristawp'),
			'parent'      => $panel,
			'options'     => array(
				'two-columns' => esc_html__('2 columns','baristawp'),
				'three-columns' => esc_html__('3 columns','baristawp'),
				'four-columns' => esc_html__('4 columns','baristawp'),
			)
		));

		barista_edge_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Portfolio Single Slug','baristawp'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)','baristawp'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action( 'barista_edge_options_map', 'barista_edge_portfolio_options_map', 13);

}