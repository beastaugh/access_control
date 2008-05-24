<?php
/*
Plugin Name: Access Control
Plugin URI:	
Description: Only allow logged-in users to view this site.
Author: Benedict Eastaugh
Version: 1.0
Author URI: http://extralogical.net/
*/

function access_control() {
	if ( is_user_logged_in() || function_exists('login_header') ) {
		return;
	} else {
		wp_redirect(get_bloginfo('wpurl') . '/wp-login.php');
		exit;
	}
}

add_action('init', 'access_control');

?>