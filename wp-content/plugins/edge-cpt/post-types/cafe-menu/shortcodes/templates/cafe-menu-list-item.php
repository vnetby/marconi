<?php 
	$price = get_post_meta(get_the_ID(), 'edgtf_cafe_menu_item_price', true);
	$label = get_post_meta(get_the_ID(), 'edgtf_cafe_menu_item_label', true);
	$description = get_post_meta(get_the_ID(), 'edgtf_cafe_menu_item_description', true);
?>
<li class="edgtf-cml-item clearfix">
	<?php if($show_featured_image === 'yes') : ?>
			<div class="edgtf-cml-item-image">
				<a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" data-rel="prettyPhoto<?php echo esc_attr(the_ID()); ?>">
					<?php the_post_thumbnail('thumbnail'); ?>
				</a>
			</div>
	<?php endif; ?>
	<div class="edgtf-cml-item-content">
		<div class="edgtf-cml-top-holder">
			<div class="edgtf-cml-title-holder">
				<h3 class="edgtf-cml-title">
					<?php esc_html(the_title()); ?>
				</h3>
			</div>
			<div class="edgtf-cml-line"></div>

			<?php if(!empty($price)) : ?>
				<div class="edgtf-cml-price-holder">
					<h3 class="edgtf-cml-price"><?php echo esc_html($price); ?></h3>
				</div>

			<?php endif; ?>
		</div>
		<div class="edgtf-cml-bottom-holder clearfix">
			<?php if(!empty($description)) : ?>
			<div class="edgtf-cml-description-holder">
				<?php echo esc_html($description); ?>
			</div>
			<?php endif; ?>

			<?php if(!empty($label)) : ?>
				<div class="edgtf-cml-label-holder">
					<span class="edgtf-cml-label"><?php echo esc_html($label); ?></span>
				</div>
			<?php endif; ?>
		</div>
	</div>

</li>