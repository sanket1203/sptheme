<?php
/*
  Plugin Name: Custom Form Registration & Login
  Plugin URI: http://google.com
  Description: Custom form user registration & login
  Version: 1.0
  Author: Sanket Patel
  Author URI: http://google.com
 */
 
 
 global $wpdb;

include "registration.php"; 

function sp_user_registration() {
	wp_register_style('style.css', plugin_dir_url(__FILE__) . 'css/style.css');
	wp_enqueue_style('style.css');
	
	wp_register_script('user.js', plugin_dir_url(__FILE__) . 'js/user.js');
	wp_enqueue_script('user.js');
	//ob_start();	
	
	sp_registration_form();
	
}
add_shortcode( 'user_register', 'sp_user_registration' );
function sp_user_login(){
	
}
add_shortcode( 'user_login', 'sp_user_login' );



?>

