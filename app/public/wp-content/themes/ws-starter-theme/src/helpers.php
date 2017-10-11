<?php

// Returns page title
function get_page_title() {
    if( is_front_page() )
      echo get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' );
    else
      echo get_the_title() . ' - ' . get_bloginfo( 'name' );
}

// Displays publication date
function ws_posted_on() {
    printf(
        '<time class="entry-date" datetime="%s" pubdate>%s</time>',
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date( 'j F Y' ) )
    );
}

// Register get_template_part function for blocks
function get_block( $file, $variables = null ) {
	return ws_get_template_part( 'blocks/' . $file, $variables );
}

// Register get_template_part function for the edit button
function get_edit_button() {
	return get_template_part( 'blocks/edit', 'button' );
}

// Register get_template_part function for languages
function get_languages( $class = null ) {
	return ws_get_template_part( 'blocks/languages', [  'CLASS' => $class ] );
}

// Register get_template_part function for favicons
function get_favicons() {
	return get_template_part( 'blocks/favicons' );
}

// Register get_template_part function for offcanvas
function get_offcanvas() {
	return get_template_part( 'blocks/offcanvas' );
}

// Register get_template_part function for socials networks meta
function get_socials_meta() {
	return get_template_part( 'blocks/socials', 'meta' );
}

// Register get_template_part function for socials networks
function get_socials_networks() {
	return get_template_part( 'blocks/socials', 'networks' );
}

// Register get_template_part function for navigation
function get_navigation() {
	return get_template_part( 'blocks/navigation' );
}

// Register get_template_part function for navigation
function get_article() {
	return get_template_part( 'blocks/loop' );
}

// Register get_stylesheet_directory_uri function for assets
function get_asset( $file, $folder = 'images' ) {
  return get_stylesheet_directory_uri() . '/assets/' . $folder . '/' . $file;
}

// Register get_stylesheet_directory_uri function for assets
function the_asset( $file, $folder = 'images' ) {
  echo get_asset( $file, $folder );
}

// Check if the current user is an administrator
function is_user_administrator() {
  return current_user_can( 'administrator' );
}

// Check if the current user is an editor
function is_user_editor() {
  return current_user_can( 'editor' );
}

// Check if the current user is an author
function is_user_author() {
  return current_user_can( 'author' );
}

// Check if the current user is a contributor
function is_user_contributor() {
  return current_user_can( 'contributor' );
}

// Check if the current user is a subscriber
function is_user_subscriber() {
  return current_user_can( 'subscriber' );
}

// Returns the good occurrence size
function get_mosaic_size( $i, $count ) {
  if ( $i >= $count )
    return [2,1];
  $isLast = ( $i === $count - 1 );
  switch( $i % 16 ):
    case 0: case 10: return $isLast ? [12,2] : [8,2];
    case 1: case 11: return $isLast ? [4,2] : [4,1];
    case 2: case 6: case 12: return [4,1];
    case 3: return $isLast ? [12,2] : [4,2];
    case 4: return $isLast ? [8,2] : [8,1];
    case 5: return $isLast ? [8,1] : [4,1];
    case 7: case 15: return [12,1];
    case 8: return $isLast ? [12,1] : [4,1];
    case 9: return [8,1];
    case 13: return $isLast ? [12,1] : [4,2];
    case 14: return [8,2];
  endswitch;
}

/**
 * Like get_template_part() put lets you pass args to the template file
 * Args are available in the tempalte as $args array
 * @param string filepart
 * @param mixed wp_args style argument list
 */
function ws_get_template_part( $file, $args = array(), $cache_args = array() ) {
    $args = wp_parse_args( $args );
    $cache_args = wp_parse_args( $cache_args );
    if ( $cache_args ) {
        foreach ( $args as $key => $value ) {
            if ( is_scalar( $value ) || is_array( $value ) ) {
                $cache_args[$key] = $value;
            } else if ( is_object( $value ) && method_exists( $value, 'get_id' ) ) {
                $cache_args[$key] = call_user_method( 'get_id', $value );
            }
        }
        if ( ( $cache = wp_cache_get( $file, serialize( $cache_args ) ) ) !== false ) {
            if ( ! empty( $args['return'] ) )
                return $cache;
            echo $cache;
            return;
        }
    }
    $file_handle = $file;
    do_action( 'start_operation', 'hm_template_part::' . $file_handle );
    if ( file_exists( get_stylesheet_directory() . '/' . $file . '.php' ) )
        $file = get_stylesheet_directory() . '/' . $file . '.php';
    elseif ( file_exists( get_template_directory() . '/' . $file . '.php' ) )
        $file = get_template_directory() . '/' . $file . '.php';
    ob_start();
    $return = require( $file );
    $data = ob_get_clean();
    do_action( 'end_operation', 'hm_template_part::' . $file_handle );
    if ( $cache_args ) {
        wp_cache_set( $file, $data, serialize( $cache_args ), 3600 );
    }
    if ( ! empty( $args['return'] ) )
        if ( $return === false )
            return false;
        else
            return $data;
    echo $data;
}
