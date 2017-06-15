<!DOCTYPE html>
<html class="no-js" <?php language_attributes() ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ) ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="We studio" />
  <title><?php wb_page_title() ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>" />
  <?php ws_get_block( 'favicons' ) ?>
  <?php wp_head() ?>
</head>

<body <?php body_class() ?>>

  <header class="header navbar navbar-toggleable-md fixed-top navbar-light bg-faded">
    <div class="container">

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand p-0" href="<?php echo home_url() ?>" title="<?php echo get_bloginfo( 'name' ) ?>" rel="home">
        <img src="<?php echo get_site_icon_url( 40 ) ?>" alt="<?php echo get_bloginfo( 'name' ) ?>"/>
      </a>

      <div id="main-menu" class="collapse navbar-collapse">

        <?php
          wp_nav_menu( array(
            'theme_location' => 'main',
            'menu_class'     => 'navbar-nav mr-auto',
            'depth'          => 2,
          ) )
        ?>

      </div><!-- .main-menu -->

    </div><!-- .container -->
  </header><!-- .header -->
