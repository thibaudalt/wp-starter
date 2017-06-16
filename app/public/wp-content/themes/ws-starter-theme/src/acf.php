<?php

 // Register custom get_field function for option page
function get_acf_option( $field, $fallback = false, $success = true ) {
	if ( !class_exists('acf') ) return false;
	if ( get_field_object( $field, 'option' )['type'] == 'true_false' )
		return get_field( $field, 'option' ) ? $success : $fallback;
	else
		return get_field( $field, 'option' ) ?: $fallback;
}

// Register get_template_part function for acf templates
function get_acf_template( $file, $variables = null ) {
	return ws_get_template_part( 'acf/' . $file, $variables );
}

// Register get_template_part function for acf layouts
function get_acf_layouts() {
	return get_template_part( 'acf/layouts' );
}

// Register get_template_part function for acf map
function get_map() {
	return get_template_part( 'acf/map' );
}

// Register get_template_part function for the carousel
function get_carousel( $show = CAROUSEL_FULL_WIDTH, $flex_field = 'layout_carousel', $options_field ='carousel_options' ) {
	return !$show ?: get_acf_template( 'carousel', [ 'FLEX' => $flex_field, 'OPTION' => $options_field ] );
}

// Register get_template_part function for the gallery
function get_gallery( $flex_field = 'layout_gallery', $options_field ='gallery_options' ) {
	return get_acf_template( 'gallery', [ 'FLEX' => $flex_field, 'OPTION' => $options_field ] );
}

// Register get_template_part function for the mosaic
function get_mosaic( $flex_field = 'layout_mosaic', $options_field ='mosaic_options' ) {
	return get_acf_template( 'mosaic', [ 'FLEX' => $flex_field, 'OPTION' => $options_field ] );
}

// Register get_template_part function for the masonry
function get_masonry( $flex_field = 'layout_masonry', $options_field ='masonry_options' ) {
	return get_acf_template( 'masonry', [ 'FLEX' => $flex_field, 'OPTION' => $options_field ] );
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
		'page_title'  => 'Layouts',
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
