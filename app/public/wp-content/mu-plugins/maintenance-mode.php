<?php
/*
 * Plugin Name: Maintenance Mode
 * Description: Displays a coming soon page for anyone who's not logged in. The login page gets excluded so that you can login if necessary.
 * Version: 1.0
 * Author: Thibaud
 * Author URI: mailto:thibaud@we-studio.ch
*/

add_action( 'wp_loaded', function() {

	global $pagenow;
	$allowEditor = get_acf_option( 'maintenance_mode_editor' ) && current_user_can( 'editor' );

	if ( class_exists('acf') && !get_field( 'maintenance_mode_enabled', 'option' ) )
		return;

	if ( $pagenow !== 'wp-login.php' && !is_admin() && !( current_user_can( 'administrator' ) || $allowEditor ) ) :

    header( $_SERVER["SERVER_PROTOCOL"] . ' 503 Service Temporarily Unavailable', true, 503 );
		header( 'Content-Type: text/html; charset=utf-8' );

    if ( file_exists( WP_CONTENT_DIR . '/maintenance.php' ) )
		  require_once( WP_CONTENT_DIR . '/maintenance.php' );

		die();

	endif;

});
