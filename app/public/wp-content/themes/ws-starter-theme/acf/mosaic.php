<?php

  $ID          = get_the_id();                                    // acf_dump('$ID', $ID);
  $articles    = get_sub_field( $args[ 'FLEX' ] . '_articles');   // acf_dump('$articles', $articles);
  $show_date   = get_sub_field( $args[ 'FLEX' ] . '_date');       // acf_dump('$show_date', $show_date);
  $show_title  = get_sub_field( $args[ 'FLEX' ] . '_title');      // acf_dump('$show_title', $show_title);

?>

<div id="mosaic-<?php echo $ID ?>" class="mosaic">
  <div class="row">

    <?php foreach( $articles as $i => $article ):
            $id           = $article->ID;                                          // acf_dump('$id', $id);
            $date         = $article->post_date;                                   // acf_dump('$date', $date);
            $title        = $article->post_title;                                  // acf_dump('$title', $title);
            $url          = get_permalink($id);                                    // acf_dump('$url', $url);
            $width        = get_mosaic_size( $i, count($articles) )[0];            // acf_dump('$width', $width);
            $height       = get_mosaic_size( $i, count($articles) )[1];            // acf_dump('$height', $height);
            $thumb_id     = get_post_thumbnail_id($id);                            // acf_dump('$thumb_id', $thumb_id);
            $thumb_data   = wp_get_attachment_image_src($thumb_id, 'col-'.$width); // acf_dump('$thumb', $thumb);
            $thumb_src    = $thumb_data[0];                                        // acf_dump('$src', $src); ?>

            <div class="mosaic-inner col-sm-<?php echo $width ?> row-<?php echo $height ?>">
              <a  id="<?php echo 'mosaic-'.$ID.'-item-'.$i ?>"
                  class="thumbnail"
                  href="<?php echo $url; ?>"
                  style="background-image: url(<?php echo $thumb_src ?>);" >
                  <?php if( $show_date || $show_title ): ?>
                    <div class="mosaic-caption">
                      <?php if( $show_date && $date ): ?><span class="date"><?php echo $date; ?></span><?php endif; ?>
                      <?php if( $show_title && $title ): ?><h4 class="title"><?php echo $title; ?></h4><?php endif; ?>
                    </div>
                  <?php endif; ?>
              </a>
            </div><!-- .mosaic-inner -->

    <?php endforeach; ?>

  </div><!-- .row -->
</div><!-- .mosaic -->
