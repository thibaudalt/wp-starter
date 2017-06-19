<?php

  $layout = $args[ 'LAYOUT' ];
  $flex   = $args[ 'FLEX' ] ;
  $option = $args[ 'OPTION' ] ;

  if ( class_exists( 'acf' ) && have_rows( LAYOUT_MAIN_FIELD ) ):

    while( have_rows( LAYOUT_MAIN_FIELD ) ) : the_row();

      if ( ( ( !$layout && !CAROUSEL_FULL_WIDTH ) || ( $layout === 'carousel' && CAROUSEL_FULL_WIDTH ) ) && get_row_layout() === CAROUSEL_FLEX_FIELD )
        get_acf_template( 'carousel', [ 'FLEX' => $flex ?: CAROUSEL_FLEX_FIELD, 'OPTION' => $option ?: CAROUSEL_OPTIONS_FIELD ] );

      if ( ( !$layout || $layout === 'gallery' ) && get_row_layout() === GALLERY_FLEX_FIELD  )
        get_acf_template( 'gallery', [ 'FLEX' => $flex ?: GALLERY_FLEX_FIELD, 'OPTION' => $option ?: GALLERY_OPTIONS_FIELD ] );

      if ( ( !$layout || $layout === 'mosaic' ) && get_row_layout() === MOSAIC_FLEX_FIELD   )
        get_acf_template( 'mosaic', [ 'FLEX' => $flex ?: MOSAIC_FLEX_FIELD, 'OPTION' => $option ?: MOSAIC_OPTIONS_FIELD ] );

      if ( ( !$layout || $layout === 'masonry' ) && get_row_layout() === MASONRY_FLEX_FIELD  )
        get_acf_template( 'masonry', [ 'FLEX' => $flex ?: MASONRY_FLEX_FIELD, 'OPTION' => $option ?: MASONRY_OPTIONS_FIELD ] );

    endwhile;

  endif;

?>
