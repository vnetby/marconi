<?php

get_header();
barista_edge_get_title();
get_template_part('slider');
barista_edge_single_portfolio();
do_action('barista_edge_after_container_close');
get_footer();

?>