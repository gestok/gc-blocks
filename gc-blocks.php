<?php
/**
 * Plugin Name: GC Blocks
 * Plugin URI: https://georgechond.com/
 * Description: This plugin adds functionality for new custom blocks.
 * Version: 1.0.5
 * Requires at least: 5.2
 * Requires PHP: 7.4
 * Author: George Chond
 * Author URI: https://georgechond.com/
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Check if ACF Classes exists
if (!class_exists('acf_pro') || !class_exists('acf')){

    // Define path and URL to the ACF plugin.
    define( 'MY_ACF_PATH', plugin_dir_path( __FILE__ ) . '/includes/acf/' );
    define( 'MY_ACF_URL', plugin_dir_url( __FILE__ ) . '/includes/acf/' );

    // Include the ACF plugin.
    include_once( MY_ACF_PATH . 'acf.php' );

    // Customize the url setting to fix incorrect asset URLs.
    add_filter('acf/settings/url', 'my_acf_settings_url');
    function my_acf_settings_url( $url ) {
        return MY_ACF_URL;
    }

    // Hide the ACF admin menu item.
    add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
    function my_acf_settings_show_admin( $show_admin ) {
        return true;
    }
}

// Core Functions
include(plugin_dir_path(__FILE__) . 'includes/core/gcb_enqueue_block_editor_assets.php');
include_once(plugin_dir_path(__FILE__) . 'includes/core/gcb_json_save_load.php');
include_once(plugin_dir_path(__FILE__) . 'includes/core/gcb_json_sync.php');
// Register New Block Category
include(plugin_dir_path(__FILE__) . 'includes/core/gcb_block_category.php');
// Register Blocks, JS and CSS
include(plugin_dir_path(__FILE__) . 'includes/gcb_register_blocks.php');
include(plugin_dir_path(__FILE__) . 'includes/gcb_register_scripts.php');


// Auto-Update from Git Repo
require(plugin_dir_path(__FILE__) . 'includes/plugin-update-checker/plugin-update-checker.php');
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/gestok/gc-blocks',
	__FILE__,
	'gc-blocks'
);
//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');
