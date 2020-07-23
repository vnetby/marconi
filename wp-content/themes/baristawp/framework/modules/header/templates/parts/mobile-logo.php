<?php do_action('barista_edge_before_mobile_logo'); ?>

<div class="edgtf-mobile-logo-wrapper">
    <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>" <?php barista_edge_inline_style($logo_styles); ?>>
        <img itemprop="image" src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_attr_e('mobile logo','baristawp'); ?>"/>
    </a>
</div>

<?php do_action('barista_edge_after_mobile_logo'); ?>