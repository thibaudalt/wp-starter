<?php

// Check if ACF Pro plugin is installed and activated
if ( !class_exists('acf') ) :

	define( 'ERROR_MSG', 'Please install and activate the <b>ACF Pro</b> plugin! ' );
	define( 'URL', 'www.advancedcustomfields.com' );

  add_action( 'admin_notices', function() {
  	echo (
			'<div class="notice notice-error">' .
				'<p>' . __( ERROR_MSG, 'wp-starter' ) .
					'<a href="https://' . URL . '/pro/" target="_blank">' . URL . '</a>' .
				'</p>' .
			'</div>'
		);
  });

	if ( !is_admin() )
		wp_die( __( ERROR_MSG, 'wp-starter' ) );

endif;

// Resgister options pages
if( function_exists('acf_add_options_page') && is_user_administrator() ) :

	$parent = acf_add_options_page(array(
    'page_title' => 'Theme Options',
  	'menu_slug'  => 'wp-starter-options',
  	'position'   => 63.3,
  	'icon_url'   => 'dashicons-admin-generic',
	));

	acf_add_options_sub_page( array(
		'page_title'  => 'General',
		'parent_slug' => $parent['menu_slug'],
	));

	acf_add_options_sub_page( array(
		'page_title'  => 'Layouts',
		'parent_slug' => $parent['menu_slug'],
	));

	acf_add_options_sub_page( array(
    'page_title'  => 'Restricted Access',
		'parent_slug' => $parent['menu_slug'],
	));

endif;

// Register custom get_field function for option page
function get_acf_option( $field, $fallback = false, $success = true ) {
	if ( !class_exists('acf') ) return false;
	if ( get_field_object( $field, 'option' )['type'] == 'true_false' )
		return get_field( $field, 'option' ) ? $success : $fallback;
	else
		return get_field( $field, 'option' ) ?: $fallback;
}

// Register custom the_field function for option page
function acf_option( $field, $fallback = false, $success = true ) {
	echo get_acf_option( $field, $fallback, $success );
}

// Register get_template_part function for acf templates
function get_acf_template( $file, $variables = null ) {
	return ws_get_template_part( 'acf/' . $file, $variables );
}

// Register get_template_part function for acf layouts
function get_acf_layouts( $variables = null ) {
	return ws_get_template_part( 'acf/layouts', $variables );
}

// Register get_template_part function for the carousel
function get_carousel( $flex_field = CAROUSEL_FLEX_FIELD, $options_field = CAROUSEL_OPTIONS_FIELD ) {
	return get_acf_layouts( [ 'LAYOUT' => 'carousel', 'FLEX' => $flex_field, 'OPTION' => $options_field ] );
}

// Register get_template_part function for the gallery
function get_gallery( $flex_field = GALLERY_FLEX_FIELD, $options_field = GALLERY_OPTIONS_FIELD ) {
	return get_acf_layouts( [ 'LAYOUT' => 'gallery', 'FLEX' => $flex_field, 'OPTION' => $options_field ] );
}

// Register get_template_part function for the mosaic
function get_mosaic( $flex_field = MOSAIC_FLEX_FIELD, $options_field = MOSAIC_OPTIONS_FIELD ) {
	return get_acf_layouts( [ 'LAYOUT' => 'mosaic', 'FLEX' => $flex_field, 'OPTION' => $options_field ] );
}

// Register get_template_part function for the masonry
function get_masonry( $flex_field = MASONRY_FLEX_FIELD, $options_field = MASONRY_OPTIONS_FIELD ) {
	return get_acf_layouts( [ 'LAYOUT' => 'masonry', 'FLEX' => $flex_field, 'OPTION' => $options_field ] );
}

// Register get_template_part function for acf map
function get_map() {
	return get_template_part( 'acf/map' );
}

// Set Google Maps API settings
add_action( 'acf/init', function() {
	define( 'GOOGLE_MAPS_API_KEY',    'AIzaSyA0x4svfKCtZu-UygFHO-KrmLgvVyf04is' );
	acf_update_setting( 'google_api_key', GOOGLE_MAPS_API_KEY );
});

// Print in style
function acf_dump( $key, $value ) {
  echo '<pre style="width:100%;"><b>' . $key. ' : </b>';
  var_dump( $value );
  echo '</pre>';
}
