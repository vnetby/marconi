<?php get_header(); ?>

	<?php barista_edge_get_title(); ?>

	<div class="edgtf-container">
	<?php do_action('barista_edge_after_container_open'); ?>
		<div class="edgtf-container-inner edgtf-404-page">
			<div class="edgtf-page-not-found">
				<span class="edgtf-page-not-found-top">
					<?php esc_html_e('404', 'baristawp'); ?>
				</span>
				<?php
					echo barista_edge_get_separator_html(array('position'=>'center'));
				?>
				<h3>
					<?php if(barista_edge_options()->getOptionValue('404_title')){
						echo esc_html(barista_edge_options()->getOptionValue('404_title'));
					}
					else{
						esc_html_e('Page you are looking is not found', 'baristawp');
					} ?>
				</h3>
				<p>
					<?php if(barista_edge_options()->getOptionValue('404_text')){
						echo esc_html(barista_edge_options()->getOptionValue('404_text'));
					}
					else{
						esc_html_e('The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'baristawp');
					} ?>
				</p>
				<?php
					$params = array();
					if (barista_edge_options()->getOptionValue('404_back_to_home')){
						$params['text'] = barista_edge_options()->getOptionValue('404_back_to_home');
					}
					else{
						$params['text'] = esc_html__('Homepage', 'baristawp');
					}
				$params['link'] = esc_url(home_url('/'));
				$params['target'] = '_self';
				echo barista_edge_execute_shortcode('edgtf_button',$params);?>
			</div>
		</div>
		<?php do_action('barista_edge_before_container_close'); ?>
	</div>
<?php get_footer(); ?>