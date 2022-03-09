<?php
/**
 * Save & Load JSON Files
 * 
 */

// Save JSON to folder
function set_acf_json_save_folder($path){

    $path = WP_PLUGIN_DIR . '/gc-blocks/includes/json';

    return $path;
}
add_filter('acf/settings/save_json', 'set_acf_json_save_folder');

// Load JSON from folder
function add_acf_json_load_folder($paths){
	
	// Remove original path
    unset($paths[0]);

	// Set new path
    $paths[] = WP_PLUGIN_DIR . 'gc-blocks/includes/json';

    return $paths;
}
add_filter('acf/settings/load_json', 'add_acf_json_load_folder');