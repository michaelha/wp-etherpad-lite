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

//run the etherpad.js script on pages
require_once('wp-etherpad-js-init.php');


//create a shortcode to display the etherpad
add_shortcode('wp_ep', 'display_etherpad_func');
add_action('init', 'load_jquery');

function load_jquery(){
	wp_enqueue_script( 'jquery' );
}

function display_etherpad_func() {

	if ( is_null(get_site_option('wp_ep_host_url'))) {
		echo "<div style=''>WP Etherpad is not configured correctly!</div>";
		
	} else {
		?>
	<div id="examplePadBasic"></div>

		
<script type="text/javascript">
jQuery(document).ready(function($){
 <?php global $current_user;
      get_currentuserinfo();
?>

        // The most basic example
	$('#examplePadBasic').pad({'padId':'test', 'userName':'<?php echo $current_user->user_login; ?>', 'width':'600px', 'height':'600px', 'showControls':'true'}); // sets the pad id and puts the pad in the div

     


});

	</script>
		

		<?php
	}
}