<style>.mosaic .row{padding:10px}.mosaic .mosaic-inner{margin-bottom:10px;padding:0 5px}.mosaic .thumbnail{border:0;border-radius:0;height:100%;background-position:center center;background-repeat:no-repeat;background-size:cover;opacity:.95}.mosaic .thumbnail:hover{opacity:1}.mosaic .row-1{height:140px}.mosaic .row-2{height:290px}.mosaic .mosaic-inner .date,.mosaic .mosaic-inner .title{margin:0;position:absolute;padding:5px;color:#EEE;background-color:rgba(0,0,0,.8)}.mosaic .mosaic-inner .date{top:0;right:5px}.mosaic .mosaic-inner .title{bottom:0;right:5px;left:5px}</style>
<?php

define('MOSAIC_MAIN_FIELD', 'layout');    // (String) Name of main field
define('MOSAIC_FLEX_FIELD', 'mosaic');    // (String) Name of flex field

if( function_exists('get_sub_field') && have_rows(constant('MOSAIC_MAIN_FIELD')) ):
  
  function get_mosaic_size( $i, $count ) {
    $isLast = ($i === $count - 1);
    switch( $i % 16 ):
      case 0: case 10: return $isLast ? [12,2] : [8,2];
      case 1: case 11: return $isLast ? [4,2] : [4,1];
      case 2: case 6: case 12: return [4,1];
      case 3: return $isLast ? [12,2] : [4,2];
      case 4: return $isLast ? [8,2] : [8,1];
      case 5: return $isLast ? [8,1] : [4,1];
      case 7: case 15: return [12,1];
      case 8: return $isLast ? [12,1] : [4,1];
      case 9: return [8,1];
      case 13: return $isLast ? [12,1] : [4,2];
      case 14: return [8,2];
    endswitch;
  }
  
  while( have_rows(constant('MOSAIC_MAIN_FIELD')) ) : the_row();
    if( get_row_layout() === constant('MOSAIC_FLEX_FIELD') ):
      $ID             = get_the_id();                                               // acf_dump('$ID', $ID); 
      $articles       = get_sub_field(constant('MOSAIC_FLEX_FIELD').'_articles');   // acf_dump('$articles', $articles);
      $show_date      = get_sub_field(constant('MOSAIC_FLEX_FIELD').'_date');       // acf_dump('$show_date', $show_date); 
      $show_title     = get_sub_field(constant('MOSAIC_FLEX_FIELD').'_title');      // acf_dump('$show_title', $show_title); 
      $nb_articles    = count($articles);                                           // acf_dump('$nb_articles', $nb_articles); ?> 
      
      <div id="mosaic-<?php echo $ID ?>" class="mosaic">
        <div class="row">
          
          <?php foreach( $articles as $i => $article ):
                  $id           = $article->ID;                                             // acf_dump('$id', $id);
                  $date         = $article->post_date;                                      // acf_dump('$date', $date);
                  $title        = $article->post_title;                                     // acf_dump('$title', $title);
                  $url          = get_permalink($id);                                       // acf_dump('$url', $url);
                  $width        = get_mosaic_size($i, $nb_articles)[0];                     // acf_dump('$width', $width);
                  $height       = get_mosaic_size($i, $nb_articles)[1];                     // acf_dump('$height', $height);
                  $thumb_id     = get_post_thumbnail_id($id);                               // acf_dump('$thumb_id', $thumb_id);
                  $thumb_data   = wp_get_attachment_image_src($thumb_id, 'col-'.$width);    // acf_dump('$thumb', $thumb); 
                  $thumb_src    = $thumb_data[0];                                           // acf_dump('$src', $src); ?>
                  
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
                  </div><!-- /.mosaic-inner -->
 
          <?php endforeach; ?>
          
        </div><!-- /.row -->
      </div><!-- /.mosaic -->
      
<?php 
    endif;
  endwhile;
else:
  return;
endif;
?>