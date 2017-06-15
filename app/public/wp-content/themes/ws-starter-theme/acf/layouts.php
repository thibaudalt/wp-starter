<?php

  const LAYOUT_MAIN_FIELD = 'layout';   // (String) Name of main field

  const CAROUSEL_FLEX_FIELD = LAYOUT_MAIN_FIELD . '_carousel';  // (String) Name of carousel flex field
  const GALLERY_FLEX_FIELD  = LAYOUT_MAIN_FIELD . '_gallery';   // (String) Name of gallery flex field
  const MOSAIC_FLEX_FIELD   = LAYOUT_MAIN_FIELD . '_mosaic';    // (String) Name of mosaic flex field
  const MANSORY_FLEX_FIELD  = LAYOUT_MAIN_FIELD . '_mansory';   // (String) Name of mansory flex field

  const CAROUSEL_OPTIONS_FIELD  = 'carousel_options';   // (String) Name of carousel options field
  const GALLERY_OPTIONS_FIELD   = 'gallery_options';    // (String) Name of gallery options field
  const MOSAIC_OPTIONS_FIELD    = 'mosaic_options';     // (String) Name of mosaic options field
  const MANSORY_OPTIONS_FIELD   = 'mansory_options';    // (String) Name of mansory options field

  if ( class_exists( 'acf' ) && have_rows( LAYOUT_MAIN_FIELD ) ):

    while( have_rows( LAYOUT_MAIN_FIELD ) ) : the_row();

      if( get_row_layout() === CAROUSEL_FLEX_FIELD ) ws_get_acf( 'carousel', [ 'FLEX_FIELD' => CAROUSEL_FLEX_FIELD, 'OPTIONS_FIELD' => CAROUSEL_OPTIONS_FIELD ] );
      if( get_row_layout() === GALLERY_FLEX_FIELD ) ws_get_acf( 'gallery', [ 'FLEX_FIELD' => GALLERY_FLEX_FIELD, 'OPTIONS_FIELD' => GALLERY_OPTIONS_FIELD ] );
      if( get_row_layout() === MOSAIC_FLEX_FIELD ) ws_get_acf( 'mosaic', [ 'FLEX_FIELD' => MOSAIC_FLEX_FIELD, 'OPTIONS_FIELD' => MOSAIC_OPTIONS_FIELD ] );
      if( get_row_layout() === MANSORY_FLEX_FIELD ) ws_get_acf( 'mansory', [ 'FLEX_FIELD' => MANSORY_FLEX_FIELD, 'OPTIONS_FIELD' => MANSORY_OPTIONS_FIELD ] );

    endwhile;

  endif;

?>
