<?php

define( 'CAROUSEL_MAIN_FIELD',     'layout' );            // (String)   Name of main field
define( 'CAROUSEL_FLEX_FIELD',     'layout_carousel' );   // (String)   Name of flex field
define( 'CAROUSEL_OPTIONS_FIELD',  'carousel_options' );  // (String)   Name of options field

if( function_exists( 'get_sub_field' ) && have_rows( constant( 'CAROUSEL_MAIN_FIELD' ) ) ):
  while( have_rows( constant( 'CAROUSEL_MAIN_FIELD' ) ) ) : the_row();
    if( get_row_layout() === constant( 'CAROUSEL_FLEX_FIELD' ) ):
      $ID                 = get_the_id();                                                        // acf_dump( '$ID', $ID);
      $images             = get_sub_field( constant( 'CAROUSEL_FLEX_FIELD' ).'_images' );        // acf_dump( '$images', $images);
      $size               = get_sub_field( constant( 'CAROUSEL_FLEX_FIELD' ).'_size' );          // acf_dump( '$size', $size);
      $show_title         = get_sub_field( constant( 'CAROUSEL_FLEX_FIELD' ).'_title' );         // acf_dump( '$show_title', $show_title);
      $show_caption       = get_sub_field( constant( 'CAROUSEL_FLEX_FIELD' ).'_caption' );       // acf_dump( '$show_caption', $show_caption);
      $show_controls      = get_sub_field( constant( 'CAROUSEL_FLEX_FIELD' ).'_controls' );      // acf_dump( '$show_controls', $show_controls);
      $show_indicators    = get_sub_field( constant( 'CAROUSEL_FLEX_FIELD' ).'_indicators' );    // acf_dump( '$show_indicators', $show_indicators); ?>

      <div  id="carousel-<?php echo $ID ?>"
            class="carousel slide"
            data-ride="carousel"
            data-interval="<?php echo ( ws_get_field( constant( 'CAROUSEL_OPTIONS_FIELD' ) . '_interval', 'option' ) ?: 10000 ); ?>"
            data-pause="<?php echo ( ws_get_field( constant( 'CAROUSEL_OPTIONS_FIELD' ) . '_pause', 'option' ) ? 'hover' : 'null' ); ?>"
            data-wrap="<?php echo ( ws_get_field( constant( 'CAROUSEL_OPTIONS_FIELD' ) . '_wrap', 'option' ) ?: true ); ?>"
            data-keyboard="<?php echo ( ws_get_field( constant( 'CAROUSEL_OPTIONS_FIELD' ) . '_keyboard', 'option' ) ?: false ); ?>">

        <div class="carousel-inner" role="listbox">
          <?php foreach( $images as $i => $image ):
                $id         = $image['id'];                                   // acf_dump( '$title', $title);
                $title      = $image['title'];                                // acf_dump( '$title', $title);
                $caption    = $image['caption'];                              // acf_dump( '$caption', $caption);
                $src        = $image['sizes'][$size];                         // acf_dump( '$src', $src);
                $srcset     = wp_get_attachment_image_srcset( $id, $size );   // acf_dump( '$srcset', $srcset);
                $width      = $image['sizes'][$size.'-width'];                // acf_dump( '$width', $width);
                $height     = $image['sizes'][$size.'-height'];               // acf_dump( '$height', $height); ?>

          <div id="<?php echo 'carousel-'.$ID.'-item-'.$i ?>" class="carousel-item<?php echo ($i == 0 ? ' active' : '' ); ?>">
            <img  src="<?php echo $src ?>"
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

          </div><!-- /.carousel-item -->

          <?php endforeach; ?>
        </div><!-- /.carousel-inner -->

        <?php if( count($images) > 1 ): ?>

          <?php if( $show_controls ): ?>
            <a class="carousel-control left" href="#carousel-<?php echo $ID ?>" role="button" data-slide="prev"><span class="icon-prev"></span></a>
            <a class="carousel-control right" href="#carousel-<?php echo $ID ?>" role="button" data-slide="next"><span class="icon-next"></span></a>
          <?php endif; ?>

          <?php if( $show_indicators ): ?>
            <ol class="carousel-indicators">
              <?php foreach( $images as $i => $image ): ?>
                <li data-target="#carousel-<?php echo $ID ?>" data-slide-to="<?php echo $i ?>" class="<?php echo ($i == 0 ? ' active' : '' ); ?>"></li>
              <?php endforeach; ?>
            </ol>
          <?php endif; ?>

        <?php endif; ?>

      </div><!-- /.carousel -->

<?php
    endif;
  endwhile;
else:
  return;
endif;
?>
