<?php

  if ( class_exists( 'acf' ) && have_rows( LAYOUT_MAIN_FIELD ) ):

    while( have_rows( LAYOUT_MAIN_FIELD ) ) : the_row();

      switch ( get_row_layout() ) :
        case CAROUSEL_FLEX_FIELD : return get_carousel( !CAROUSEL_FULL_WIDTH, CAROUSEL_FLEX_FIELD, 'carousel_options' );
        case GALLERY_FLEX_FIELD  : return get_gallery( GALLERY_FLEX_FIELD, 'gallery_options' );
        case MOSAIC_FLEX_FIELD   : return get_mosaic( MOSAIC_FLEX_FIELD, 'mosaic_options' );
        case MASONRY_FLEX_FIELD  : return get_masonry( MASONRY_FLEX_FIELD, 'masonry_options' );
      endswitch;

    endwhile;

  endif;

?>
