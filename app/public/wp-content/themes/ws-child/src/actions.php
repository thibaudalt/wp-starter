<?php

// Enqueues CSS and JS files
add_action( 'wp_enqueue_scripts', function() {
  wp_enqueue_style( 'ws-starter-css', get_template_directory_uri() . '/assets/styles/dist/main.min.css', false , null );
  wp_enqueue_script( 'ws-starter-js', get_template_directory_uri() . '/assets/scripts/dist/main.min.js', array( 'jquery' ), null);
});
