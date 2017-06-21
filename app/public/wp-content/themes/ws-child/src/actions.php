<?php

// Enqueues CSS and JS files
add_action( 'wp_enqueue_scripts', function() {
  wp_enqueue_style( 'ws-starter-css', get_asset( 'main.min.css', 'styles/dist' ) , false , null );
  wp_enqueue_script( 'ws-starter-js', get_asset( 'main.min.js', 'scripts/dist' ), array( 'jquery' ), null);
});
