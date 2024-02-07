<?php
/**
 * Plugin Name: WP Create Multiple Posts & Pages
 * Plugin URI:  https://wordpress.org/plugins/wp-create-multiple-posts-pages/
 * Description: Create Multiple Wordpress Posts & Pages At Once With a Single Click.
 * Author:      Sajjad Hossain Sagor
 * Author URI:  http://profiles.wordpress.org/sajjad67
 * Version:     1.0.2
 * License:     GPL
 * Text Domain: wp-create-multiple-posts-pages
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

// ---------------------------------------------------------
// Define Plugin Folders Path
// ---------------------------------------------------------
define( "WPCMP_PLUGIN_PATH", plugin_dir_path( __FILE__ ) );
define( "WPCMP_PLUGIN_URL", plugin_dir_url( __FILE__ ) );

add_action( "init", "wpcmp_add_plugin_core_file" );

function wpcmp_add_plugin_core_file(){

	require_once WPCMP_PLUGIN_PATH . 'includes/enqueue.php';
	
	require_once WPCMP_PLUGIN_PATH . 'includes/dashboard.php';
}

?>