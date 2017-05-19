<?php

define('CAROUSEL_MAIN_FIELD',  'layout');     // (String)   Name of main field
define('CAROUSEL_FLEX_FIELD',  'carousel');   // (String)   Name of flex field
define('CAROUSEL_INTERVAL',    ( get_field( 'carousel_interval', 'option' ) ?: 10000 ) );
define('CAROUSEL_PAUSE',       ( get_field( 'carousel_pause', 'option' ) ? 'hover' : NULL ) );
define('CAROUSEL_WRAP',        ( get_field( 'carousel_wrap', 'option' ) ?: TRUE ) );
define('CAROUSEL_KEYBOARD',    ( get_field( 'carousel_keyboard', 'option' ) ?: FALSE ) );

if( function_exists('get_sub_field') && have_rows(constant('CAROUSEL_MAIN_FIELD')) ):
  while( have_rows(constant('CAROUSEL_MAIN_FIELD')) ) : the_row();
    if( get_row_layout() === constant('CAROUSEL_FLEX_FIELD') ):
      $ID                 = get_the_id();                                                   // App\pre_print('$ID', $ID);
      $images             = get_sub_field(constant('CAROUSEL_FLEX_FIELD').'_images');       // App\pre_print('$images', $images);
      $size               = get_sub_field(constant('CAROUSEL_FLEX_FIELD').'_size');         // App\pre_print('$size', $size);
      $show_title         = get_sub_field(constant('CAROUSEL_FLEX_FIELD').'_title');        // App\pre_print('$show_title', $show_title);
      $show_caption       = get_sub_field(constant('CAROUSEL_FLEX_FIELD').'_caption');      // App\pre_print('$show_caption', $show_caption);
      $show_controls      = get_sub_field(constant('CAROUSEL_FLEX_FIELD').'_controls');     // App\pre_print('$show_controls', $show_controls);
      $show_indicators    = get_sub_field(constant('CAROUSEL_FLEX_FIELD').'_indicators');   // App\pre_print('$show_indicators', $show_indicators); ?>

      <div  id="carousel-<?php echo $ID ?>"
            class="carousel slide"
            data-ride="carousel"
            data-interval="<?php echo constant('CAROUSEL_INTERVAL'); ?>"
            data-pause="<?php echo constant('CAROUSEL_PAUSE'); ?>"
            data-wrap="<?php echo constant('CAROUSEL_WRAP') ? 'true' : 'false'; ?>"
            data-keyboard="<?php echo constant('CAROUSEL_KEYBOARD') ? 'true' : 'false'; ?>">

        <div class="carousel-inner" role="listbox">
          <?php foreach( $images as $i => $image ):
                $id         = $image['id'];                                   // App\pre_print('$title', $title);
                $title      = $image['title'];                                // App\pre_print('$title', $title);
                $caption    = $image['caption'];                              // App\pre_print('$caption', $caption);
                $src        = $image['sizes'][$size];                         // App\pre_print('$src', $src);
                $srcset     = wp_get_attachment_image_srcset( $id, $size );   // App\pre_print('$srcset', $srcset);
                $width      = $image['sizes'][$size.'-width'];                // App\pre_print('$width', $width);
                $height     = $image['sizes'][$size.'-height'];               // App\pre_print('$height', $height); ?>

          <div id="<?php echo 'carousel-'.$ID.'-item-'.$i ?>" class="carousel-item<?php echo ($i == 0 ? ' active' : ''); ?>">
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
                <li data-target="#carousel-<?php echo $ID ?>" data-slide-to="<?php echo $i ?>" class="<?php echo ($i == 0 ? ' active' : ''); ?>"></li>
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
