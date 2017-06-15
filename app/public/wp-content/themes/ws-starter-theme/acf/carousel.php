<?php

  $ID              = get_the_id();                                                              // acf_dump( '$ID', $ID );
  $images          = get_sub_field( $args[ 'FLEX_FIELD' ] . '_images' );                        // acf_dump( '$images', $images );
  $size            = get_sub_field( $args[ 'FLEX_FIELD' ] . '_size' );                          // acf_dump( '$size', $size );
  $show_title      = get_sub_field( $args[ 'FLEX_FIELD' ] . '_title' );                         // acf_dump( '$show_title', $show_title );
  $show_caption    = get_sub_field( $args[ 'FLEX_FIELD' ] . '_caption' );                       // acf_dump( '$show_caption', $show_caption );
  $show_controls   = get_sub_field( $args[ 'FLEX_FIELD' ] . '_controls' );                      // acf_dump( '$show_controls', $show_controls );
  $show_indicators = get_sub_field( $args[ 'FLEX_FIELD' ] . '_indicators' );                    // acf_dump( '$show_indicators', $show_indicators );
  $interval        = ws_get_option( $args[ 'OPTIONS_FIELD' ] . '_interval', 5000 );             // acf_dump( '$interval', $interval );
  $pause           = ws_get_option( $args[ 'OPTIONS_FIELD' ] . '_pause', null, 'hover' );       // acf_dump( '$pause', $pause );
  $wrap            = ws_get_option( $args[ 'OPTIONS_FIELD' ] . '_wrap', 'false', 'true' );      // acf_dump( '$wrap', $wrap );
  $keyboard        = ws_get_option( $args[ 'OPTIONS_FIELD' ] . '_keyboard', 'false', 'true' );  // acf_dump( '$keyboard', $keyboard );

?>

<div  id="carousel-<?php echo $ID ?>"
      class="carousel slide"
      data-ride="carousel"
      data-interval="<?php echo $interval; ?>"
      data-pause="<?php echo $pause; ?>"
      data-wrap="<?php echo $wrap; ?>"
      data-keyboard="<?php echo $keyboard; ?>">

  <div class="carousel-inner" role="listbox">
    <?php foreach( $images as $i => $image ):
          $id         = $image[ 'id' ];                                 // acf_dump( '$title', $title);
          $title      = $image[ 'title' ];                              // acf_dump( '$title', $title);
          $caption    = $image[ 'caption' ];                            // acf_dump( '$caption', $caption);
          $src        = $image[ 'sizes' ][ $size ];                     // acf_dump( '$src', $src);
          $srcset     = wp_get_attachment_image_srcset( $id, $size );   // acf_dump( '$srcset', $srcset);
          $width      = $image[ 'sizes' ][ $size.'-width' ];            // acf_dump( '$width', $width);
          $height     = $image[ 'sizes' ][ $size.'-height' ];           // acf_dump( '$height', $height); ?>

    <div id="<?php echo 'carousel-'.$ID.'-item-'.$i ?>" class="carousel-item<?php if( !$i ) echo ' active'; ?>">
      <img  class="d-block img-fluid"
            src="<?php echo $src ?>"
            srcset="<?php echo $srcset ?>"
            alt="<?php echo $title ?>"
            width="<?php echo $width ?>"
            height="<?php echo $height ?>"/>

      <?php if( $show_title || $show_caption ): ?>
        <div class="carousel-caption">
          <?php if( $show_title && $title ): ?><h3><?php echo $title; ?></h3><?php endif; ?>
          <?php if( $show_caption && $caption ): ?><p><?php echo $caption; ?></p><?php endif; ?>
        </div>
      <?php endif; ?>

    </div><!-- .carousel-item -->

    <?php endforeach; ?>
  </div><!-- .carousel-inner -->

  <?php if( count($images) > 1 ): ?>

    <?php if( $show_controls ): ?>
      <a class="carousel-control-prev" href="#carousel-<?php echo $ID ?>" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span></a>
      <a class="carousel-control-next" href="#carousel-<?php echo $ID ?>" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    <?php endif; ?>

    <?php if( $show_indicators ): ?>
      <ol class="carousel-indicators">
        <?php foreach( $images as $i => $image ): ?>
          <li data-target="#carousel-<?php echo $ID ?>" data-slide-to="<?php echo $i ?>" <?php if( !$i ) echo 'class="active"'; ?>></li>
        <?php endforeach; ?>
      </ol>
    <?php endif; ?>

  <?php endif; ?>

</div><!-- .carousel -->
