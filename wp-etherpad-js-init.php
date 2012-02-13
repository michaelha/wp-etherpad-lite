<?php
function etherpad_js_init_method() {
    wp_deregister_script( 'etherpad' );
    wp_register_script( 'etherpad', plugins_url('/etherpad-lite-jquery-plugin/js/etherpad.js', __FILE__) );;
    wp_enqueue_script( 'etherpad' );
}    
 
add_action('wp_enqueue_scripts', 'etherpad_js_init_method');