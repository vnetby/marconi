<?php

if ( ! function_exists('barista_edge_logo_options_map') ) {

	function barista_edge_logo_options_map() {

		barista_edge_add_admin_page(
			array(
				'slug' => '_logo_page',
				'title' => esc_html__('Logo','baristawp'),
				'icon' => 'fa fa-coffee'
			)
		);

		$panel_logo = barista_edge_add_admin_panel(
			array(
				'page' => '_logo_page',
				'name' => 'panel_logo',
				'title' => esc_html__('Logo','baristawp')
			)
		);

		barista_edge_add_admin_field(
			array(
				'parent' => $panel_logo,
				'type' => 'yesno',
				'name' => 'hide_logo',
				'default_value' => 'no',
				'label' => esc_html__('Hide Logo','baristawp'),
				'description' => esc_html__('Enabling this option will hide logo image','baristawp'),
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#edgtf_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$hide_logo_container = barista_edge_add_admin_container(
			array(
				'parent' => $panel_logo,
				'name' => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value' => 'yes'
			)
		);

		barista_edge_add_admin_field(
			array(
				'name' => 'logo_image',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Default','baristawp'),
				'description' => esc_html__('Choose a default logo image to display ','baristawp'),
				'parent' => $hide_logo_container
			)
		);

		barista_edge_add_admin_field(
			array(
				'name' => 'logo_image_dark',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Dark','baristawp'),
				'description' => esc_html__('Choose a default logo image to display ','baristawp'),
				'parent' => $hide_logo_container
			)
		);

		barista_edge_add_admin_field(
			array(
				'name' => 'logo_image_light',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Light','baristawp'),
				'description' => esc_html__('Choose a default logo image to display ','baristawp'),
				'parent' => $hide_logo_container
			)
		);

		barista_edge_add_admin_field(
			array(
				'name' => 'logo_image_sticky',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Sticky','baristawp'),
				'description' => esc_html__('Choose a default logo image to display ','baristawp'),
				'parent' => $hide_logo_container
			)
		);

		barista_edge_add_admin_field(
			array(
				'name' => 'logo_image_mobile',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Mobile','baristawp'),
				'description' => esc_html__('Choose a default logo image to display ','baristawp'),
				'parent' => $hide_logo_container
			)
		);

	}

	add_action( 'barista_edge_options_map', 'barista_edge_logo_options_map', 2);

}