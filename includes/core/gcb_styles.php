<?php
/**
 * Enqueue Additional Helper CSS
 */

function gcb_additional_css() {
    wp_enqueue_style('gcb-styles', plugin_dir_path(__FILE__) . 'gcb_styles.css');
}
add_action('wp_enqueue_scripts', 'gcb_additional_css');