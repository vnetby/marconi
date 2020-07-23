<div class="edgtf-rf-holder">
	<?php if($open_table_id !== '') : ?>
		<form class="edgtf-rf" target="_blank" action="http://www.opentable.com/restaurant-search.aspx" name="edgtf-rf">
			<div class="edgtf-rf-row clearfix">
				<div class="edgtf-rf-col-holder">
					<div class="edgtf-rf-field-holder clearfix">
						<select name="partySize" class="edgtf-ot-people">
							<option value="1"><?php esc_html_e('1 Person', 'edge-cpt'); ?></option>
							<option value="2"><?php esc_html_e('2 People', 'edge-cpt'); ?></option>
							<option value="3"><?php esc_html_e('3 People', 'edge-cpt'); ?></option>
							<option value="4"><?php esc_html_e('4 People', 'edge-cpt'); ?></option>
							<option value="5"><?php esc_html_e('5 People', 'edge-cpt'); ?></option>
							<option value="6"><?php esc_html_e('6 People', 'edge-cpt'); ?></option>
							<option value="7"><?php esc_html_e('7 People', 'edge-cpt'); ?></option>
							<option value="8"><?php esc_html_e('8 People', 'edge-cpt'); ?></option>
							<option value="9"><?php esc_html_e('9 People', 'edge-cpt'); ?></option>
							<option value="10"><?php esc_html_e('10 People', 'edge-cpt'); ?></option>
						</select>
					<span class="edgtf-rf-icon">
						<i class="fa fa-users" aria-hidden="true"></i>
					</span>
					</div>
				<span class="edgtf-rf-label">
					<?php esc_html_e('For', 'edge-cpt'); ?>
				</span>
				</div>
				<div class="edgtf-rf-col-holder">
					<div class="edgtf-rf-field-holder clearfix">
						<input type="text" value="<?php echo date('m.d.Y'); ?>" class="edgtf-ot-date" name="startDate">
					<span class="edgtf-rf-icon">
						<i class="fa fa-calendar" aria-hidden="true"></i>
					</span>
					</div>
				<span class="edgtf-rf-label">
					<?php esc_html_e('At', 'edge-cpt'); ?>
				</span>

				</div>
				<div class="edgtf-rf-col-holder edgtf-rf-time-col">
					<div class="edgtf-rf-field-holder clearfix">
						<select name="ResTime" class="edgtf-ot-time">
                            <option value="6:30am"><?php esc_html_e('6:30 am', 'edge-cpt'); ?></option>
                            <option value="7:00am"><?php esc_html_e('7:00 am', 'edge-cpt'); ?></option>
                            <option value="7:30am"><?php esc_html_e('7:30 am', 'edge-cpt'); ?></option>
                            <option value="8:00am"><?php esc_html_e('8:00 am', 'edge-cpt'); ?></option>
                            <option value="8:30am"><?php esc_html_e('8:30 am', 'edge-cpt'); ?></option>
                            <option value="9:00am"><?php esc_html_e('9:00 am', 'edge-cpt'); ?></option>
                            <option value="9:30am"><?php esc_html_e('9:30 am', 'edge-cpt'); ?></option>
                            <option value="10:00am"><?php esc_html_e('10:00 am', 'edge-cpt'); ?></option>
                            <option value="10:30am"><?php esc_html_e('10:30 am', 'edge-cpt'); ?></option>
                            <option value="11:00am"><?php esc_html_e('11:00 am', 'edge-cpt'); ?></option>
                            <option value="11:30am"><?php esc_html_e('11:30 am', 'edge-cpt'); ?></option>
                            <option value="12:00am"><?php esc_html_e('12:00 am', 'edge-cpt'); ?></option>
                            <option value="12:30am"><?php esc_html_e('12:30 am', 'edge-cpt'); ?></option>
                            <option value="1:00pm"><?php esc_html_e('1:00 pm', 'edge-cpt'); ?></option>
                            <option value="1:30pm"><?php esc_html_e('1:30 pm', 'edge-cpt'); ?></option>
                            <option value="2:00pm"><?php esc_html_e('2:00 pm', 'edge-cpt'); ?></option>
                            <option value="2:30pm"><?php esc_html_e('2:30 pm', 'edge-cpt'); ?></option>
                            <option value="3:00pm"><?php esc_html_e('3:00 pm', 'edge-cpt'); ?></option>
                            <option value="3:30pm"><?php esc_html_e('3:30 pm', 'edge-cpt'); ?></option>
                            <option value="4:00pm"><?php esc_html_e('4:00 pm', 'edge-cpt'); ?></option>
                            <option value="4:30pm"><?php esc_html_e('4:30 pm', 'edge-cpt'); ?></option>
                            <option value="5:00pm"><?php esc_html_e('5:00 pm', 'edge-cpt'); ?></option>
                            <option value="5:30pm"><?php esc_html_e('5:30 pm', 'edge-cpt'); ?></option>
                            <option value="6:00pm"><?php esc_html_e('6:00 pm', 'edge-cpt'); ?></option>
                            <option value="6:30pm"><?php esc_html_e('6:30 pm', 'edge-cpt'); ?></option>
                            <option value="7:00pm" selected="selected"><?php esc_html_e('7:00 pm', 'edge-cpt'); ?></option>
                            <option value="7:30pm"><?php esc_html_e('7:30 pm', 'edge-cpt'); ?></option>
                            <option value="8:00pm"><?php esc_html_e('8:00 pm', 'edge-cpt'); ?></option>
                            <option value="8:30pm"><?php esc_html_e('8:30 pm', 'edge-cpt'); ?></option>
                            <option value="9:00pm"><?php esc_html_e('9:00 pm', 'edge-cpt'); ?></option>
                            <option value="9:30pm"><?php esc_html_e('9:30 pm', 'edge-cpt'); ?></option>
                            <option value="10:00pm"><?php esc_html_e('10:00 pm', 'edge-cpt'); ?></option>
                            <option value="10:30pm"><?php esc_html_e('10:30 pm', 'edge-cpt'); ?></option>
                            <option value="11:00pm"><?php esc_html_e('11:00 pm', 'edge-cpt'); ?></option>
                            <option value="11:30pm"><?php esc_html_e('11:30 pm', 'edge-cpt'); ?></option>
						</select>
					<span class="edgtf-rf-icon">
						<i class="fa fa-clock-o" aria-hidden="true"></i>
					</span>
					</div>
				</div>
				<div class="edgtf-rf-col-holder edgtf-rf-btn-holder">
					<?php if(barista_edge_core_installed()) : ?>
						<?php echo barista_edge_get_button_html(
							array(
								'type'         => '',
								'html_type'	   => 'button',
								'text'         => esc_html__('Book a Table', 'edge-cpt'),
								'input_name'   => 'edgtf-rf-submit',
							)
						) ?>
					<?php else: ?>
						<input type="submit" class="edgtf-btn edgtf-btn-solid" name="edgtf-rf-time">
					<?php endif; ?>
				</div>
			</div>

			<input type="hidden" name="RestaurantID" class="RestaurantID" value="<?php echo esc_attr($open_table_id); ?>">
			<input type="hidden" name="rid" class="rid" value="<?php echo esc_attr($open_table_id); ?>">
			<input type="hidden" name="GeoID" class="GeoID" value="15">
			<input type="hidden" name="txtDateFormat" class="txtDateFormat" value="MM/dd/yyyy">
			<input type="hidden" name="RestaurantReferralID" class="RestaurantReferralID" value="<?php echo esc_attr($open_table_id); ?>">

		</form>
		<p class="edgtf-rf-copyright"><?php esc_html_e('Powered by OpenTable', 'edge-cpt'); ?></p>
	<?php else: ?>
		<p><?php esc_html_e("You haven't added OpenTable ID", 'edge-cpt'); ?></p>
	<?php endif; ?>
</div>