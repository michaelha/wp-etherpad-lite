<?php
/**
 * Plugin Name: WP Etherpad Lite
 * Plugin URI:  TBD
 * Description: Plugin to interact with a etherpad 
 * Author:      UBC
 * Version:     0.1
 * Author URI:  TBD
 * Network:     true
 */

//set up network settings in etherpad
require_once('wp-etherpad-lite-settings.php');

//create a shortcode to display the etherpad

add_shortcode('wp_ep', 'display_etherpad_func');

function display_etherpad_func() {

	if ( is_null(get_site_option('wp_ep_host_url'))) {
		echo "<div style=''>WP Etherpad is not configured correctly!</div>";
	}
}