<?php

if(!function_exists('barista_edge_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function barista_edge_is_responsive_on() {
        return barista_edge_options()->getOptionValue('responsiveness') !== 'no';
    }
}