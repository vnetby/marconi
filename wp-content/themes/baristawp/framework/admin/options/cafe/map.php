<?php

if ( ! function_exists('barista_edge_cafe_options_map') ) {

	function barista_edge_cafe_options_map() {

		barista_edge_add_admin_page(
			array(
				'slug'  => '_cafe',
				'title' => esc_html__('Cafe', 'baristawp'),
				'icon'  => 'fa fa-cafe-alt'
			)
		);

		//#OpenTable Panel
		$panel_open_table = barista_edge_add_admin_panel(array(
			'page'  => '_cafe',
			'name'  => 'panel_open_table',
			'title' => esc_html__('OpenTable', 'baristawp')
		));

		barista_edge_add_admin_field(array(
			'name'        => 'open_table_id',
			'type'        => 'text',
			'label'       => esc_html__('OpenTable ID', 'baristawp'),
			'description' => esc_html__("Add your restaurant's OpenTable ID", 'baristawp'),
			'parent'      => $panel_open_table,
			'args'        => array(
				'col_width' => 3
			)
		));

		//#Working Hours panel
		$panel_working_hours = barista_edge_add_admin_panel(array(
			'page'  => '_cafe',
			'name'  => 'panel_working_hours',
			'title' => esc_html__('Working Hours', 'baristawp')
		));

		$monday_group = barista_edge_add_admin_group(array(
			'name'        => 'monday_group',
			'title'       => esc_html__('Monday', 'baristawp'),
			'parent'      => $panel_working_hours,
			'description' => esc_html__('Working hours for Monday', 'baristawp')
		));

		$monday_row = barista_edge_add_admin_row(array(
			'name'   => 'monday_row',
			'parent' => $monday_group
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_monday_from',
			'type'   => 'textsimple',
			'label'  => esc_html__('From', 'baristawp'),
			'parent' => $monday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_monday_to',
			'type'   => 'textsimple',
			'label'  => esc_html__('To', 'baristawp'),
			'parent' => $monday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_monday_closed',
			'type'   => 'yesnosimple',
			'default_value' => 'no',
			'label'  => esc_html__('Closed', 'baristawp'),
			'parent' => $monday_row,
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_monday_footnote',
			'type'   => 'yesnosimple',
			'default_value' => 'no',
			'label'  => esc_html__('Enable Footnote', 'baristawp'),
			'parent' => $monday_row,
		));

		$tuesday_group = barista_edge_add_admin_group(array(
			'name'        => 'tuesday_group',
			'title'       => esc_html__('Tuesday', 'baristawp'),
			'parent'      => $panel_working_hours,
			'description' => esc_html__('Working hours for Tuesday', 'baristawp')
		));

		$tuesday_row = barista_edge_add_admin_row(array(
			'name'   => 'tuesday_row',
			'parent' => $tuesday_group
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_tuesday_from',
			'type'   => 'textsimple',
			'label'  => esc_html__('From', 'baristawp'),
			'parent' => $tuesday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_tuesday_to',
			'type'   => 'textsimple',
			'label'  => esc_html__('To', 'baristawp'),
			'parent' => $tuesday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_tuesday_closed',
			'type'   => 'yesnosimple',
			'default_value' => 'no',
			'label'  => esc_html__('Closed', 'baristawp'),
			'parent' => $tuesday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_tuesday_footnote',
			'type'   => 'yesnosimple',
			'default_value' => 'no',
			'label'  => esc_html__('Enable Footnote', 'baristawp'),
			'parent' => $tuesday_row,
		));

		$wednesday_group = barista_edge_add_admin_group(array(
			'name'        => 'wednesday_group',
			'title'       => esc_html__('Wednesday', 'baristawp'),
			'parent'      => $panel_working_hours,
			'description' => esc_html__('Working hours for Wednesday', 'baristawp')
		));

		$wednesday_row = barista_edge_add_admin_row(array(
			'name'   => 'wednesday_row',
			'parent' => $wednesday_group
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_wednesday_from',
			'type'   => 'textsimple',
			'label'  => esc_html__('From', 'baristawp'),
			'parent' => $wednesday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_wednesday_to',
			'type'   => 'textsimple',
			'label'  => esc_html__('To', 'baristawp'),
			'parent' => $wednesday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_wednesday_closed',
			'type'   => 'yesnosimple',
			'default_value' => 'no',
			'label'  => esc_html__('Closed', 'baristawp'),
			'parent' => $wednesday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_wednesday_footnote',
			'type'   => 'yesnosimple',
			'default_value' => 'no',
			'label'  => esc_html__('Enable Footnote', 'baristawp'),
			'parent' => $wednesday_row,
		));

		$thursday_group = barista_edge_add_admin_group(array(
			'name'        => 'thursday_group',
			'title'       => esc_html__('Thursday', 'baristawp'),
			'parent'      => $panel_working_hours,
			'description' => esc_html__('Working hours for Thursday', 'baristawp')
		));

		$thursday_row = barista_edge_add_admin_row(array(
			'name'   => 'thursday_row',
			'parent' => $thursday_group
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_thursday_from',
			'type'   => 'textsimple',
			'label'  => esc_html__('From', 'baristawp'),
			'parent' => $thursday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_thursday_to',
			'type'   => 'textsimple',
			'label'  => esc_html__('To', 'baristawp'),
			'parent' => $thursday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_thursday_closed',
			'type'   => 'yesnosimple',
			'default_value' => 'no',
			'label'  => esc_html__('Closed', 'baristawp'),
			'parent' => $thursday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_thursday_footnote',
			'type'   => 'yesnosimple',
			'default_value' => 'no',
			'label'  => esc_html__('Enable Footnote', 'baristawp'),
			'parent' => $thursday_row,
		));

		$friday_group = barista_edge_add_admin_group(array(
			'name'        => 'friday_group',
			'title'       => esc_html__('Friday', 'baristawp'),
			'parent'      => $panel_working_hours,
			'description' => esc_html__('Working hours for Friday', 'baristawp')
		));

		$friday_row = barista_edge_add_admin_row(array(
			'name'   => 'friday_row',
			'parent' => $friday_group
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_friday_from',
			'type'   => 'textsimple',
			'label'  => esc_html__('From', 'baristawp'),
			'parent' => $friday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_friday_to',
			'type'   => 'textsimple',
			'label'  => esc_html__('To', 'baristawp'),
			'parent' => $friday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_friday_closed',
			'type'   => 'yesnosimple',
			'default_value' => 'no',
			'label'  => esc_html__('Closed', 'baristawp'),
			'parent' => $friday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_friday_footnote',
			'type'   => 'yesnosimple',
			'default_value' => 'no',
			'label'  => esc_html__('Enable Footnote', 'baristawp'),
			'parent' => $friday_row,
		));

		$saturday_group = barista_edge_add_admin_group(array(
			'name'        => 'saturday_group',
			'title'       => esc_html__('Saturday', 'baristawp'),
			'parent'      => $panel_working_hours,
			'description' => esc_html__('Working hours for Saturday', 'baristawp')
		));

		$saturday_row = barista_edge_add_admin_row(array(
			'name'   => 'saturday_row',
			'parent' => $saturday_group
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_saturday_from',
			'type'   => 'textsimple',
			'label'  => esc_html__('From', 'baristawp'),
			'parent' => $saturday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_saturday_to',
			'type'   => 'textsimple',
			'label'  => esc_html__('To', 'baristawp'),
			'parent' => $saturday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_saturday_closed',
			'type'   => 'yesnosimple',
			'default_value' => 'no',
			'label'  => esc_html__('Closed', 'baristawp'),
			'parent' => $saturday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_saturday_footnote',
			'type'   => 'yesnosimple',
			'default_value' => 'no',
			'label'  => esc_html__('Enable Footnote', 'baristawp'),
			'parent' => $saturday_row,
		));

		$sunday_group = barista_edge_add_admin_group(array(
			'name'        => 'sunday_group',
			'title'       => esc_html__('Sunday', 'baristawp'),
			'parent'      => $panel_working_hours,
			'description' => esc_html__('Working hours for Sunday', 'baristawp')
		));

		$sunday_row = barista_edge_add_admin_row(array(
			'name'   => 'sunday_row',
			'parent' => $sunday_group
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_sunday_from',
			'type'   => 'textsimple',
			'label'  => esc_html__('From', 'baristawp'),
			'parent' => $sunday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_sunday_to',
			'type'   => 'textsimple',
			'label'  => esc_html__('To', 'baristawp'),
			'parent' => $sunday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_sunday_closed',
			'type'   => 'yesnosimple',
			'default_value' => 'no',
			'label'  => esc_html__('Closed', 'baristawp'),
			'parent' => $sunday_row
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_sunday_footnote',
			'type'   => 'yesnosimple',
			'default_value' => 'no',
			'label'  => esc_html__('Enable Footnote', 'baristawp'),
			'parent' => $sunday_row,
		));

		barista_edge_add_admin_field(array(
			'name'   => 'wh_footnote',
			'type'   => 'text',
			'label'  => esc_html__('Footnote Text', 'baristawp'),
			'parent' => $panel_working_hours,
			'args' => array(
                'col_width' => 6
            )
		));
	}

	add_action( 'barista_edge_options_map', 'barista_edge_cafe_options_map', 18);
}