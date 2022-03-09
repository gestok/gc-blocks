<?php
/**
 * Enqueue JS to add "GC Blocks" Category Icon
 *
 */
function gcb_enqueue_block_editor_assets() {
    wp_enqueue_script('gc-blocks', plugins_url( 'gc-blocks.js', __FILE__ ), array( 'wp-blocks', 'wp-element', 'wp-primitives' ));
}
add_action( 'enqueue_block_editor_assets', 'gcb_enqueue_block_editor_assets' );