<?php

// Enqueues CSS and JS files
add_action( 'wp_enqueue_scripts', function() {

  wp_enqueue_style( 'animate-css', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css', false , null );
  wp_enqueue_style( 'wp-starter-css', get_asset( 'main.min.css', 'styles/dist' ), false , null );

  wp_deregister_script( 'jquery' );
  wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-3.3.1.min.js', false, null);

  wp_enqueue_script( 'gtag', 'https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXXXX-Y', null );
  wp_enqueue_script( 'wp-starter-js', get_asset( 'main.min.js', 'scripts/dist' ), array( 'jquery', 'gtag' ) , null );

});
