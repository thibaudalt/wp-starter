<?php

  $ID             = get_the_id( );                                                            // acf_dump( '$ID', $ID );
  $images         = get_sub_field( $args[ 'FLEX' ] . '_images' );                             // acf_dump( '$images', $images );
  $show_lightbox  = get_sub_field( $args[ 'FLEX' ] . '_lightbox' );                           // acf_dump( '$show_lightbox', $show_lightbox );
  $show_title     = get_sub_field( $args[ 'FLEX' ] . '_title' );                              // acf_dump( '$show_title', $show_title );
  $show_caption   = get_sub_field( $args[ 'FLEX' ] . '_caption' );                            // acf_dump( '$show_caption', $show_caption );
  $col_lg         = get_sub_field( $args[ 'FLEX' ] . '_col_lg' );                             // acf_dump( '$col_lg', $col_lg );
  $col_md         = get_sub_field( $args[ 'FLEX' ] . '_col_md' );                             // acf_dump( '$col_md', $col_md );
  $col_xs         = get_sub_field( $args[ 'FLEX' ] . '_col_xs' );                             // acf_dump( '$col_xs', $col_xs );
  $show_nav       = get_acf_option( $args[ 'OPTION' ] . '_nav_touch' );                       // acf_dump( '$show_nav', $show_nav );
  $show_numbers   = get_acf_option( $args[ 'OPTION' ] . '_images_numbers' );                  // acf_dump( '$show_numbers', $show_numbers );
  $album_label    = get_acf_option( $args[ 'OPTION' ] . '_album_label', 'Image %1 sur %2' );  // acf_dump( '$album_label', $album_label );
  $scrolling      = get_acf_option( $args[ 'OPTION' ] . '_page_scrolling' );                  // acf_dump( '$scrolling', $scrolling );
  $wrap           = get_acf_option( $args[ 'OPTION' ] . '_wrap' );                            // acf_dump( '$wrap', $wrap );
  $fade           = get_acf_option( $args[ 'OPTION' ] . '_fade', 500 );                       // acf_dump( '$fade', $fade );
  $resize         = get_acf_option( $args[ 'OPTION' ] . '_resize', 500 );                     // acf_dump( '$resize', $resize );

  $size = '90x90';
  if( $col_xs == 4 || $col_md == 3 || $col_lg == 2 ) $size = '160x160';
  if( $col_xs == 6 || $col_md == 4 || $col_lg == 3 ) $size = '255x255';
  if( $col_lg == 4 ) $size = '350x350';
  if( $col_lg == 6 ) $size = '510x510';

?>

<div id="gallery-<?php echo $ID ?>" class="gallery">
  <div class="row">

    <?php foreach( $images as $i => $image ):
            $id         = $image[ 'id' ];                       // acf_dump( '$id', $id );
            $title      = $image[ 'title' ];                    // acf_dump( '$title', $title );
            $caption    = $image[ 'caption' ];                  // acf_dump( '$caption', $caption );
            $full       = $image[ 'sizes' ][ '1920x1080' ];     // acf_dump( '$full', $full );
            $src        = $image[ 'sizes' ][ $size ];           // acf_dump( '$src', $src );
            $width      = $image[ 'sizes' ][ $size.'-width' ];  // acf_dump( '$width', $width );
            $height     = $image[ 'sizes' ][ $size.'-height' ]; // acf_dump( '$height', $height );

            if( ( $show_title && $title ) && ( $show_caption && $caption ) )
              $data_title = $title.' - '.$caption;
            elseif( $show_title && $title )
              $data_title = $title;
            elseif( $show_caption && $caption )
              $data_title = $caption;
            else
              $data_title = NULL;
    ?>

            <div class="gallery-inner <?php echo 'col-lg-'.$col_lg.' col-md-'.$col_md.' col-xs-'.$col_xs ?>">

              <?php if( $show_lightbox ): ?>
                <a  id="<?php echo 'gallery-'.$ID.'-item-'.$i ?>" href="<?php echo( $show_lightbox ? $full : '#' ); ?>" data-lightbox="gallery-<?php echo $ID ?>" data-title="<?php echo $data_title ?>">
              <?php endif; ?>

                  <img class="thumbnail" src="<?php echo $src ?>" srcset="<?php echo $srcset ?>" alt="<?php echo $title ?>" width="<?php echo $width ?>" height="<?php echo $height ?>"/>

              <?php if( $show_lightbox ): ?>
                </a>
              <?php endif; ?>

            </div><!-- .gallery-inner -->

    <?php endforeach; ?>

  </div><!-- .row -->
</div><!-- .gallery -->

<script type="text/javascript">lightbox.option({'alwaysShowNavOnTouchDevices':'<?php echo $show_nav ?>','albumLabel':'<?php echo $album_label ?>','disableScrolling':'<?php echo $scrolling ?>','fadeDuration':<?php echo $fade ?>,'resizeDuration':<?php echo $resize ?>,'showImageNumberLabel':'<?php echo $show_numbers ?>','wrapAround':'<?php echo $wrap ?>'})</script>
