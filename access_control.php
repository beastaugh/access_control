<?php
/*
Plugin Name: Access Control
Plugin URI: http://github.com/ionfish/access_control
Description: Only allow logged-in users to view this site.
Author: Benedict Eastaugh
Version: 1.1
Author URI: http://extralogical.net/
*/

/**
 * Redirects to the login page if...
 *
 *   - the user isn't logged in;
 *   - the user isn't on the login page already;
 *   - WordPress isn't currently installing.
 *
 * @uses is_user_logged_in
 * @uses wp_redirect
 * @uses site_url
 */
function access_control() {
    if (!is_user_logged_in() &&
        !function_exists('login_header') &&
        WP_INSTALLING !== true)
    {
        wp_redirect(site_url('/wp-login.php'), 401);
        exit;
    }
}

add_action('init', 'access_control');

?>