<?php

////////////////////////////////////////////////////////////////////////////////
// ! Advanced Custom Fields
////////////////////////////////////////////////////////////////////////////////

// Register custom get_field function
function ws_get_field( $field, $id = NULL, $format = NULL ) {
	return class_exists('acf') ? get_field( $field, $id, $format ) : false;
}

// Register custom get_field function for option page
function ws_get_option( $field, $fallback = false, $success = true ) {
	if ( !class_exists('acf') ) return false;
	if ( get_field_object( $field, 'option' )['type'] == 'true_false' )
		return get_field( $field, 'option' ) ? $success : $fallback;
	else
		return get_field( $field, 'option' ) ?: $fallback;
}

// Check if ACF Pro plugin is installed and activated
if ( !class_exists('acf') ) :

	define( 'ERROR_MSG', 'Please install and activate the <b>ACF Pro</b> plugin! ' );
	define( 'URL', 'www.advancedcustomfields.com' );

  add_action( 'admin_notices', function() {
  	echo (
			'<div class="notice notice-error">' .
				'<p>' . __( ERROR_MSG, 'ws-starter' ) .
					'<a href="https://' . URL . '/pro/" target="_blank">' . URL . '</a>' .
				'</p>' .
			'</div>'
		);
  });

	if ( !is_admin() )
		wp_die( __( ERROR_MSG, 'ws-starter' ) );

endif;

// Resgister options pages
if( function_exists('acf_add_options_page') ) :

	$parent = acf_add_options_page(array(
    'page_title' => 'Theme Options',
  	'menu_slug'  => 'ws-starter-options',
  	'position'   => 63.3,
  	'icon_url'   => 'dashicons-admin-customizer',
	));

	acf_add_options_sub_page( array(
		'page_title'  => 'General',
		'parent_slug' => $parent['menu_slug'],
	));

	acf_add_options_sub_page( array(
    'page_title'  => 'Restricted Access',
		'parent_slug' => $parent['menu_slug'],
	));

endif;

// Print in style
function acf_dump( $key, $value ) {
  echo '<pre style="width:100%;"><b>' . $key. ' : </b>';
  var_dump( $value );
  echo '</pre>';
}
