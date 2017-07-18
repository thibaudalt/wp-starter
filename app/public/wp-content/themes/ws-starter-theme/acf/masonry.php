<?php

  $ID             = get_the_id();                                                             // acf_dump( '$ID', $ID );
  $images         = get_sub_field( $args[ 'FLEX' ].'_images' );                               // acf_dump( '$images', $images );
  $max_images     = get_sub_field( $args[ 'FLEX' ].'_max_images' );                           // acf_dump( '$max_images', $max_images );
  $show_lightbox  = get_sub_field( $args[ 'FLEX' ].'_lightbox' );                             // acf_dump( '$show_lightbox', $show_lightbox );
  $show_title     = get_sub_field( $args[ 'FLEX' ].'_title' );                                // acf_dump( '$show_title', $show_title );
  $show_caption   = get_sub_field( $args[ 'FLEX' ].'_caption' );                              // acf_dump( '$show_caption', $show_caption );
  $show_nav       = get_acf_option( $args[ 'OPTION' ] . '_nav_touch' );                       // acf_dump( '$show_nav', $show_nav );
  $show_numbers   = get_acf_option( $args[ 'OPTION' ] . '_images_numbers' );                  // acf_dump( '$show_numbers', $show_numbers );
  $album_label    = get_acf_option( $args[ 'OPTION' ] . '_album_label', 'Image %1 sur %2' );  // acf_dump( '$album_label', $album_label );
  $scrolling      = get_acf_option( $args[ 'OPTION' ] . '_page_scrolling' );                  // acf_dump( '$scrolling', $scrolling );
  $wrap           = get_acf_option( $args[ 'OPTION' ] . '_wrap' );                            // acf_dump( '$wrap', $wrap );
  $fade           = get_acf_option( $args[ 'OPTION' ] . '_fade', 500 );                       // acf_dump( '$fade', $fade );
  $resize         = get_acf_option( $args[ 'OPTION' ] . '_resize', 500 );                     // acf_dump( '$resize', $resize );

?>

<div id="masonry-<?php echo $ID ?>" class="masonry">
  <div class="row d-block">

    <?php foreach( $images as $i => $image ):
            $id         = $image[ 'id' ];                         // acf_dump( '$id', $id );
            $title      = $image[ 'title' ];                      // acf_dump( '$title', $title );
            $caption    = $image[ 'caption' ];                    // acf_dump( '$caption', $caption );
            $width      = get_mosaic_size( $i, $max_images )[0];  // acf_dump( '$width', $width );
            $height     = get_mosaic_size( $i, $max_images )[1];  // acf_dump( '$height', $height );
            $full       = $image[ 'sizes' ][ '1920x1080' ];       // acf_dump( '$full', $full );
            $src        = $image[ 'sizes' ][ 'col-' . $width ];   // acf_dump( '$src', $src );

            if( ( $show_title && $title ) && ( $show_caption && $caption ) )
              $data_title = $title.' - ' . $caption;
            elseif( $show_title && $title )
              $data_title = $title;
            elseif( $show_caption && $caption )
              $data_title = $caption;
            else
              $data_title = NULL;
    ?>

            <div class="masonry-inner float-left col-6  col-md-<?php echo $i >= $max_images ? 4 : $width ?> col-lg-<?php echo $width ?> row-<?php echo $height ?>">
              <?php if( $show_lightbox ) : ?>
                <a id="<?php echo 'masonry-' . $ID . '-item-' . $i ?>" class="thumbnail" href="<?php echo( $show_lightbox ? $full : '#'  ); ?>" style="background-image: url(<?php echo $src ?> );" data-lightbox="gallery-<?php echo $ID ?>" data-title="<?php echo $data_title ?>"></a>
              <?php else : ?>
                <span class="thumbnail" href="<?php echo( $show_lightbox ? $full : '#'  ); ?>" style="background-image: url(<?php echo $src ?> );"></span>
              <?php endif; ?>
            </div><!-- .masonry-inner -->

    <?php endforeach; ?>
    <?php for( $i = 0; $i < 6 - intval( ( count( $images ) - $max_images ) % 6 ); $i++ ): ?>
      <div class="masonry-inner float-left col-md-4 col-lg-2 row-1">
      </div><!-- .masonry-inner -->
    <?php endfor; ?>

  </div><!-- .row -->
</div><!-- .masonry -->

<script type="text/javascript">lightbox.option({'alwaysShowNavOnTouchDevices':'<?php echo $show_nav ?>','albumLabel':'<?php echo $album_label ?>','disableScrolling':'<?php echo $scrolling ?>','fadeDuration':<?php echo $fade ?>,'resizeDuration':<?php echo $resize ?>,'showImageNumberLabel':'<?php echo $show_numbers ?>','wrapAround':'<?php echo $wrap ?>'})</script>
