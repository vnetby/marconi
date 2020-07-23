<div class="wrap about-wrap edgtf-core-dashboard">
	<h1 class="edgtf-cd-title"><?php esc_html_e('Import', 'edge-cpt'); ?></h1>
	<h4 class="edgtf-cd-subtitle"><?php esc_html_e('You can import the theme demo content here.', 'edge-cpt'); ?></h4>
	<div class="edgtf-core-dashboard-inner">
		<div class="edgtf-core-dashboard-column">
			<div class="edgtf-core-dashboard-box edgtf-cd-import-box">
				<?php
				if(!empty(EdgeCoreDashboard::get_instance()->get_purchased_code())) {?>
					<div class="edgtf-cd-box-title-holder">
						<h3><?php esc_html_e('Import demo content', 'edge-cpt'); ?></h3>
						<p><?php esc_html_e('Start the demo import process by choosing which content you wish to import. ', 'edge-cpt'); ?></p>
					</div>
					<div class="edgtf-cd-box-inner">
						<form method="post" class="edgtf-cd-import-form" data-confirm-message="<?php esc_attr_e('Are you sure, you want to import Demo Data now?', 'edge-cpt'); ?>">
							<div class="edgtf-cd-box-form-section">
								<?php echo edgt_core_get_module_template_part('core-dashboard/sub-pages/import', 'notice', ''); ?>
								<label class="edgtf-cd-label"><?php esc_html_e('Select Demo to import', 'edge-cpt'); ?></label>
								<select name="demo" class="edgtf-import-demo">
									<option value="barista-v2" data-thumb="<?php echo EDGE_CORE_URL_PATH . '/core-dashboard/assets/img/demo.png'; ?>"><?php esc_html_e('Barista', 'edge-cpt'); ?></option>
								</select>
							</div>
							<div class="edgtf-cd-box-form-section edgtf-cd-box-form-section-columns">
								<div class="edgtf-cd-box-form-section-column">
									<label class="edgtf-cd-label"><?php esc_html_e('Select Import Option', 'edge-cpt'); ?></label>
									<select name="import_option" class="edgtf-cd-import-option" data-option-name="import_option" data-option-type="selectbox">
										<option value="none"><?php esc_html_e('Please Select', 'edge-cpt'); ?></option>
										<option value="complete"><?php esc_html_e('All', 'edge-cpt'); ?></option>
										<option value="content"><?php esc_html_e('Content', 'edge-cpt'); ?></option>
										<option value="widgets"><?php esc_html_e('Widgets', 'edge-cpt'); ?></option>
										<option value="options"><?php esc_html_e('Options', 'edge-cpt'); ?></option>
<!--										<option value="single-page">--><?php //esc_html_e('Single Page', 'edge-cpt'); ?><!--</option>-->
									</select>
								</div>
								<div class="edgtf-cd-box-form-section-column">
									<label class="edgtf-cd-label"><?php esc_html_e('Import Attachments', 'edge-cpt'); ?></label>
									<div class="edgtf-cd-switch">
										<label class="edgtf-cd-cb-enable selected"><span><?php esc_html_e('Yes', 'edge-cpt'); ?></span></label>
										<label class="edgtf-cd-cb-disable"><span><?php esc_html_e('No', 'edge-cpt'); ?></span></label>
										<input type="checkbox" class="edgtf-cd-import-attachments checkbox" name="import_attachments" value="1" checked="checked">
									</div>
								</div>
							</div>
							<div class="edgtf-cd-box-form-section edgtf-cd-box-form-section-dependency"></div>
							<div class="edgtf-cd-box-form-section edgtf-cd-box-form-section-progress">
								<span><?php esc_html_e('The import process may take some time. Please be patient.', 'edge-cpt') ?></span>
								<progress id="edgtf-progress-bar" value="0" max="100"></progress>
								<span class="edgtf-cd-progress-percent"><?php esc_attr_e('0%', 'edge-cpt'); ?></span>
							</div>
							<div class="edgtf-cd-box-form-section edgtf-cd-box-form-last-section">
								<span class="edgtf-cd-import-is-completed"><?php esc_html_e('Import is completed', 'edge-cpt') ?></span>
								<input type="submit" class="edgtf-cd-button" value="<?php esc_attr_e('Import', 'edge-cpt'); ?>" name="import" id="edgtf-<?php echo esc_attr($submit); ?>" />
							</div>
							<?php wp_nonce_field("edgtf_cd_import_nonce","edgtf_cd_import_nonce") ?>
						</form>
					</div>
				<?php } else { ?>
					<div class="edgtf-cd-box-title-holder">
						<h3><?php esc_html_e('Import demo content', 'edge-cpt'); ?></h3>
						<p><?php esc_html_e('Please activate your copy of the theme by registering the theme so you could proceed with the demo import process. ', 'edge-cpt'); ?></p>
					</div>
					<div class="edgtf-cd-box-inner">
						<div class="edgtf-cd-box-section">
							<div class="edgtf-cd-field-holder">
								<a href="<?php echo admin_url('admin.php?page=barista_core_dashboard'); ?>" class="edgtf-cd-button"><?php esc_attr_e('Activate your theme copy', 'edge-cpt'); ?></a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>