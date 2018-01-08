<?php

add_filter( 'pre_option_link_manager_enabled', 'wb_are_links_enabled' );

add_filter( 'excerpt_length', 'EXCERPT_LENGTH' );

add_filter( 'excerpt_more', function() {
  return '&hellip;';
});

// Disable the emoji's in Tinymce
add_filter( 'tiny_mce_plugins', function( $plugins ) {
  return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
});

// Remove emoji CDN hostname from DNS prefetching hints
add_filter( 'wp_resource_hints', function( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) :
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
    $urls = array_diff( $urls, array( $emoji_svg_url ) );
  endif;
  return $urls;
}, 10, 2 );

// Allow SVG uploads
add_filter('upload_mimes', function ( $mimes ) {
  $mimes[ 'svg' ] = 'image/svg+xml';
  return $mimes;
});

// Filters the JPEG compression quality
// add_filter( 'jpeg_quality', function() {
//   return 100;
// });
