<?php

//Masonry Gallery

if(!function_exists('barista_edge_map_masonry_gallery')) {
    function barista_edge_map_masonry_gallery()
    {

		$masonry_gallery_meta_box = barista_edge_create_meta_box(
			array(
				'scope' => array('masonry-gallery'),
				'title' => esc_html__('Masonry Gallery General', 'baristawp'),
				'name' => 'masonry_gallery_meta'
			)
		);

		barista_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_item_subtitle',
				'type' => 'text',
				'label' => esc_html__('Subtitle', 'baristawp'),
				'parent' => $masonry_gallery_meta_box
			)
		);

		barista_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_item_link',
				'type' => 'text',
				'label' => esc_html__('Link', 'baristawp'),
				'parent' => $masonry_gallery_meta_box
			)
		);

		barista_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_item_link_target',
				'type' => 'select',
				'default_value' => '_self',
				'label' => esc_html__('Link target', 'baristawp'),
				'parent' => $masonry_gallery_meta_box,
				'options' => array(
					'_self' => esc_html__('Self', 'baristawp'),
					'_blank' => esc_html__('Blank', 'baristawp')
				)
			)
		);

		barista_edge_add_admin_section_title(array(
			'name'   => 'edgtf_section_style_title',
			'parent' => $masonry_gallery_meta_box,
			'title'  => esc_html__('Masonry Gallery Item Style', 'baristawp')
		));

		barista_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_item_size',
				'type' => 'select',
				'default_value' => 'square-small',
				'label' => esc_html__('Size', 'baristawp'),
				'parent' => $masonry_gallery_meta_box,
				'options' => array(
					'square-small'			=> esc_html__('Square Small', 'baristawp'),
					'square-big'			=> esc_html__('Square Big', 'baristawp'),
					'rectangle-portrait'	=> esc_html__('Rectangle Portrait', 'baristawp'),
					'rectangle-landscape'	=> esc_html__('Rectangle Landscape', 'baristawp')
				)
			)
		);

		barista_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_item_type',
				'type' => 'select',
				'default_value' => 'standard',
				'label' => esc_html__('Type', 'baristawp'),
				'parent' => $masonry_gallery_meta_box,
				'options' => array(
					'standard'		=> esc_html__('Standard', 'baristawp'),
					'text-info'	=> esc_html__('Text Info', 'baristawp'),
					'simple'		=> esc_html__('Simple', 'baristawp')
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'text-info' => '#edgtf_masonry_gallery_item_standard_type_container, #edgtf_masonry_gallery_item_simple_type_container',
						'simple' => '#edgtf_masonry_gallery_item_standard_type_container, #edgtf_masonry_gallery_item_text_info_type_container',
						'standard' => '#edgtf_masonry_gallery_item_simple_type_container, #edgtf_masonry_gallery_item_text_info_type_container',
					),
					'show' => array(
						'text-info' => '#edgtf_masonry_gallery_item_text_info_type_container',
						'simple' => '#edgtf_masonry_gallery_item_simple_type_container',
						'standard' => '#edgtf_masonry_gallery_item_standard_type_container'
					)
				)
			)
		);

		$masonry_gallery_item_text_info_type_container = barista_edge_add_admin_container_no_style(array(
			'name'				=> 'masonry_gallery_item_text_info_type_container',
			'parent'			=> $masonry_gallery_meta_box,
			'hidden_property'	=> 'edgtf_masonry_gallery_item_type',
			'hidden_values'		=> array('standard', 'simple')
		));

		barista_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_item_text',
				'type' => 'text',
				'label' => esc_html__('Text', 'baristawp'),
				'parent' => $masonry_gallery_item_text_info_type_container
			)
		);
		$masonry_gallery_item_standard_type_container = barista_edge_add_admin_container_no_style(array(
			'name'				=> 'masonry_gallery_item_standard_type_container',
			'parent'			=> $masonry_gallery_meta_box,
			'hidden_property'	=> 'edgtf_masonry_gallery_item_type',
			'hidden_values'		=> array('text-info', 'simple')
		));

		barista_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_enable_hover',
				'type' => 'select',
				'label' => esc_html__('Enable Hover', 'baristawp'),
				'options' => array(
					'yes'		=> esc_html__('Yes', 'baristawp'),
					'no'		=> esc_html__('No', 'baristawp')
				),
				'parent' => $masonry_gallery_item_standard_type_container,
				'description' => esc_html__('Enable this option if you would like to display text content on hover', 'baristawp')
			)
		);

		$masonry_gallery_item_simple_type_container = barista_edge_add_admin_container_no_style(array(
			'name'				=> 'masonry_gallery_item_simple_type_container',
			'parent'			=> $masonry_gallery_meta_box,
			'hidden_property'	=> 'edgtf_masonry_gallery_item_type',
			'hidden_values'		=> array('text-info', 'standard')
		));

		barista_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_text_alignment',
				'type' => 'select',
				'label' => esc_html__('Text Alignment', 'baristawp'),
				'options' => array(
					'left'		=> esc_html__('Left', 'baristawp'),
					'center'	=> esc_html__('Center', 'baristawp'),
					'right'		=> esc_html__('Right', 'baristawp')
				),
				'parent' => $masonry_gallery_item_simple_type_container
			)
		);

		}
    add_action('barista_edge_meta_boxes_map', 'barista_edge_map_masonry_gallery');
}