<?php
$icon_html = barista_edge_icon_collections()->renderIcon($icon, $icon_pack);
?>

<div class="edgtf-message-icon-holder">
	<div class="edgtf-message-icon" <?php barista_edge_inline_style($icon_attributes); ?>>
		<div class="edgtf-message-icon-inner">
			<?php
				print barista_edge_get_module_part($icon_html);
			?>			
		</div> 
	</div>	 
</div>

