<?php if(barista_edge_core_installed() && barista_edge_options()->getOptionValue('enable_social_share') == 'yes'
    && barista_edge_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes') : ?>
    <div class="edgtf-portfolio-social">
        <?php echo barista_edge_get_social_share_html() ?>
    </div>
<?php endif; ?>