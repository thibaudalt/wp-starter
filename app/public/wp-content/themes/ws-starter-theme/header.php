<!DOCTYPE html>
<html class="no-js" <?php language_attributes() ?>>

<head>

  <meta charset="<?php bloginfo( 'charset' ) ?>" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>" />

  <meta name="viewport"     content="width=device-width, initial-scale=1.0" />
  <meta name="author"       content="We studio" />
  <meta name="description"  content="<?php bloginfo( 'description' ); ?>"/>
  <meta name="keywords"     content="<?php acf_option( 'meta_keywords' ); ?>"/>

  <title><?php get_page_title() ?></title>

  <?php get_favicons() ?>

  <?php get_socials_meta() ?>

  <?php wp_head() ?>

</head>

<body <?php body_class() ?>>

  <header class="header py-2 fixed-top bg-faded">
    <div class="container">

      <a class="brand float-left" href="<?php echo home_url() ?>" title="<?php bloginfo( 'name' ) ?>" rel="home">
        <img src="<?php the_asset( 'brand.png' ) ?>" alt="<?php bloginfo( 'name' ) ?>"/>
      </a>

      <?php
        wp_nav_menu( array(
          'theme_location'  => 'main',
          'menu_id'         => 'main-menu',
          'container_class' => 'main-menu hidden-sm-down',
          'depth'           => 2,
        ) )
      ?>

      <?php get_languages( 'hidden-sm-down' ) ?>

      <?php get_offcanvas() ?>

    </div><!-- .container -->
  </header><!-- .header -->
