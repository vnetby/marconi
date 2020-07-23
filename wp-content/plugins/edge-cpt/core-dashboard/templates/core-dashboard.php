<div class="edgtf-core-dashboard wrap about-wrap">
	<div class="edgtf-cd-title-holder">
		<img class="edgtf-cd-logo" src="<?php echo  plugins_url( EDGE_CORE_REL_PATH . '/core-dashboard/assets/img/logo.png' ); ?>" alt="<?php esc_attr_e('Qode', 'edge-cpt') ?>" />
		<h1 class="edgtf-cd-title"><?php esc_html_e('Welcome to ', 'edge-cpt'); echo wp_get_theme()->Name;  ?></h1>
	</div>
	<h4 class="edgtf-cd-subtitle"><?php echo sprintf( esc_html__( 'Thank you for choosing %s. Now it\'s time to create something awesome.', 'edge-cpt' ), wp_get_theme()->Name ); ?></h4>
	<div class="edgtf-core-dashboard-inner">
		<div class="edgtf-core-dashboard-column">
			<div class="edgtf-core-dashboard-box edgtf-core-bottom-space">
				<div class="edgtf-cd-box-title-holder">
					<h2><?php esc_html_e('Registration', 'edge-cpt'); ?></h2>
					<?php if(!$is_activated) {  ?>
					<p><?php esc_html_e('Please input the purchase code you received with the theme as well as your email address in order to activate your copy of the theme.', 'edge-cpt'); ?></p>
					<?php } else { ?>
					<p><?php esc_html_e('You have successfully registered your copy of the theme! ', 'edge-cpt'); ?></p>
					<?php } ?>
				</div>
				<div class="edgtf-cd-box-inner">
					<form method="post" action="" id="edgtf-register-purchase-form">
						<?php if(!$is_activated) { ?>
							<div class="edgtf-cd-box-section edgtf-activation-holder" >
								<h3><?php esc_html_e('Register your theme', 'edge-cpt'); ?></h3>
								<div class="edgtf-cd-field-holder" data-empty-field = "<?php esc_html_e('Field is empty', 'edge-cpt'); ?>" >
									<label class="edgtf-cd-label"><?php esc_html_e('Purchase Code', 'edge-cpt'); ?></label>
									<input type="text" name="purchase_code" class="edgtf-cd-input edgtf-cd-required" required>
								</div>
								<div class="edgtf-cd-field-holder" data-empty-field = "<?php esc_html_e('Field is empty', 'edge-cpt'); ?>" data-invalid-field = "<?php esc_html_e('Email is not valid', 'edge-cpt'); ?>">
									<label class="edgtf-cd-label"><?php esc_html_e('Email', 'edge-cpt'); ?></label>
									<input type="text" name="email" class="edgtf-cd-input edgtf-cd-required" required>
								</div>
								<div class="edgtf-cd-field-holder">
									<input type="submit" class="edgtf-cd-button" value="<?php esc_attr_e('Register Theme', 'edge-cpt'); ?>" name="check" id="edgtf-register-purchase-key" />
									<span class="edgtf-cd-button-wait"><?php esc_attr_e('Please Wait...', 'edge-cpt'); ?></span>
								</div>
							</div>
						<?php } else { ?>
							<div class="edgtf-cd-box-section edgtf-deactivation-holder">
								<h3><?php esc_html_e('Deregister your theme', 'edge-cpt'); ?></h3>
								<div class="edgtf-cd-field-holder">
									<label class="edgtf-cd-label"><?php esc_html_e('Purchase Code', 'edge-cpt'); ?></label>
									<input type="text" name="text" class="edgtf-cd-input edgtf-cd-required" value="<?php echo $info['purchase_code']; ?>" disabled>
								</div>
								<div class="edgtf-cd-field-holder">
									<input type="submit" class="edgtf-cd-button" value="<?php esc_attr_e('Deregister Theme', 'edge-cpt'); ?>" name="check" id="edgtf-deregister-purchase-key" />
									<span class="edgtf-cd-button-wait"><?php esc_attr_e('Please Wait...', 'edge-cpt'); ?></span>
								</div>
							</div>
						<?php } ?>
						<div class="message"></div>
					</form>
				</div>
			</div>
			<div class="edgtf-core-dashboard-box">
				<div class="edgtf-cd-box-title-holder">
					<h2><?php esc_html_e('System Information', 'edge-cpt'); ?></h2>
					<p><?php esc_html_e('Here is an overview of your current server configuration info.', 'edge-cpt'); ?></p>
				</div>
				<div class="edgtf-cd-box-inner">
					<?php foreach ($system_info as $system_info_key => $system_info_value):
						$class = (isset($system_info_value['pass']) && !$system_info_value['pass']) ? 'edgtf-cdb-value-false' : '';
						?>
						<div class="edgtf-cd-box-row">
							<div class="edgtf-cdb-label"><?php echo esc_attr($system_info_value['title']); ?></div>
							<div class="edgtf-cdb-value <?php echo esc_attr($class); ?>"><span><?php echo wp_kses_post($system_info_value['value']); ?></span>
								<?php if(isset($system_info_value['notice']) && (isset($system_info_value['pass']) && !$system_info_value['pass'])){ ?>
									<?php echo esc_html($system_info_value['notice']); ?>
								<?php } ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="edgtf-core-dashboard-column edgtf-cd-smaller-column">
			<div class="edgtf-core-dashboard-box">
				<div class="edgtf-cd-box-title-holder">
					<h2><?php esc_html_e('Useful links', 'edge-cpt'); ?></h2>
				</div>

				<div class="edgtf-cd-box-inner">
					<ul class="edgtf-cd-box-list">
						<li><a href="<?php echo sprintf('http://barista.%s-themes.com/documentation/', EDGE_PROFILE_SLUG ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'edge-cpt' ); ?></a></li>
						<li><a href="https://helpcenter.qodeinteractive.com" target="_blank"><?php esc_html_e('Support center', 'edge-cpt'); ?></a></li>
						<li><a href="https://www.youtube.com/QodeInteractiveVideos" target="_blank"><?php esc_html_e('Video tutorials', 'edge-cpt'); ?></a></li>
						<li><a href="https://qodeinteractive.com" target="_blank"><?php esc_html_e('Qode Interactive themes', 'edge-cpt'); ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>