<div <?php barista_edge_class_attribute($holder_classes); ?>>
    <div class="edgtf-iwt-icon-holder">
        <?php if(!empty($custom_icon)) : ?>
            <div class="edgtf-iwt-custom-icon" <?php barista_edge_inline_style($custom_icon_styles); ?>>
                <?php echo wp_get_attachment_image($custom_icon, 'full'); ?>
            </div>
        <?php else: ?>
            <?php echo edge_core_get_shortcode_template_part('templates/icon', 'icon-with-text', '', array('icon_parameters' => $icon_parameters)); ?>
        <?php endif; ?>
    </div>
    <div class="edgtf-iwt-content-holder" <?php barista_edge_inline_style($content_styles); ?>>
        <div class="edgtf-iwt-title-holder">
            <<?php echo esc_attr($title_tag); ?> <?php barista_edge_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
        </div>
        <div class="edgtf-iwt-text-holder">
            <p <?php barista_edge_inline_style($text_styles); ?>><?php print barista_edge_get_module_part($text); ?></p>

            <?php if(!empty($link) && !empty($link_text)) : ?>
                <a itemprop="url" class="edgtf-iwt-link" href="<?php echo esc_attr($link); ?>" <?php barista_edge_inline_attr($target, 'target'); ?>><?php echo esc_html($link_text); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>