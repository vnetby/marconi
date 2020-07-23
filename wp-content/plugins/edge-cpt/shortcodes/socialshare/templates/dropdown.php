<div class="edgtf-social-share-holder edgtf-dropdown">
	<a href="javascript:void(0)" target="_self" class="edgtf-social-share-dropdown-opener">
		<i class="social_share"></i>
		<span class="edgtf-social-share-title"><?php esc_html_e('Share', 'edge-cpt') ?></span>
	</a>
	<div class="edgtf-social-share-dropdown">
		<ul>
			<?php foreach ($networks as $net) {
				print barista_edge_get_module_part($net);
			} ?>
		</ul>
	</div>
</div>