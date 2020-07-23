<?php

//top header bar
add_action('barista_edge_before_page_header', 'barista_edge_get_header_top');

//mobile header
add_action('barista_edge_after_page_header', 'barista_edge_get_mobile_header');