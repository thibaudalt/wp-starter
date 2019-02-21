<?php
  $thumbnail  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' )[0];
  $content = strstr( get_post( get_the_ID() )->post_content, '<h2>' );
  $excerpt = str_replace( strstr( $content, '</h2>' ), '', $content );
  if( !$content ) :
    $content = strstr( get_post( get_the_ID() )->post_content, '<p>' );
    $excerpt = str_replace( strstr( $content, '</p>' ), '', $content );
  endif;
?>

  <meta property="fb:app_id"        content="1073233889445225" />
  <meta property="fb:admins"        content="1579866379" />
  <meta property="og:site_name"     content="<?php bloginfo( 'name' ); ?>" />

  <meta name="twitter:card"         content="summary_large_image" />
  <meta name="twitter:site"         content="@web_tailor">
  <meta name="twitter:creator"      content="@web_tailor" />
  <meta name="twitter:url"          content="<?php the_permalink() ?>" />

<?php if( is_single() ) : ?>

  <meta property="og:type"          content="article" />
  <meta property="og:url"           content="<?php the_permalink() ?>"/>
  <meta property="og:title"         content="<?php the_title() ?>" />
  <meta property="og:description"   content="<?php echo wp_strip_all_tags( $excerpt ); ?>" />
  <meta property="og:image"         content="<?php echo $thumbnail; ?>" />

  <meta name="twitter:title"        content="<?php the_title() ?>" />
  <meta name="twitter:description"  content="<?php echo wp_strip_all_tags( $excerpt ); ?>" />
  <meta name="twitter:image"        content="<?php echo $thumbnail; ?>" />

<?php else : ?>

  <meta property="og:type"          content="website" />
  <meta property="og:url"           content="<?php bloginfo( 'url' ); ?>"/>
  <meta property="og:title"         content="<?php bloginfo( 'name' ); ?>" />
  <meta property="og:description"   content="<?php bloginfo( 'description' ); ?>" />
  <meta property="og:image"         content="<?php the_asset( 'placeholder.jpg' ) ?>" />

  <meta name="twitter:title"        content="<?php bloginfo( 'name' ); ?>" />
  <meta name="twitter:description"  content="<?php bloginfo( 'description' ); ?>" />
  <meta name="twitter:image"        content="<?php the_asset( 'placeholder.jpg' ) ?>" />

<?php endif; ?>
