<!-- Doctype HTML5 -->
<!doctype html>
<html class="no-js" dir="ltr" <?php language_attributes() ?>>

<head>

  <meta charset="<?php bloginfo( 'charset' ) ?>" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>" />

  <title><?php get_page_title() ?></title>

  <meta name="author"       content="We studio" />
  <meta name="description"  content="<?php bloginfo( 'description' ); ?>"/>
  <meta name="keywords"     content="<?php acf_option( 'meta_keywords' ); ?>"/>

  <?php get_favicons() ?>

  <?php get_socials_meta() ?>

  <?php wp_head() ?>

</head>

<body <?php body_class() ?>>

  <header class="header py-2 fixed-top bg-dark">
    <div class="container">

      <a class="brand float-left" href="<?php echo home_url() ?>" title="<?php bloginfo( 'name' ) ?>" rel="home">
        <img src="<?php the_asset( 'brand.png' ) ?>" alt="<?php bloginfo( 'name' ) ?>"/>
      </a>

      <?php
        wp_nav_menu( array(
          'theme_location'  => 'main',
          'menu_id'         => 'main-menu',
          'container_class' => 'main-menu d-none d-md-inline-block',
          'depth'           => 2,
        ) )
      ?>

      <?php get_languages( 'hidden-sm-down' ) ?>

      <?php get_offcanvas() ?>

    </div><!-- .container -->
  </header><!-- .header -->
