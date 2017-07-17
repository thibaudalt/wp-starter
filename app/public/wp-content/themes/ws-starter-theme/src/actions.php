<?php

// Registers custom post types
add_action( 'init', function() {

  register_taxonomy( 'project_category', 'project', array(
    'hierarchical'  => true,
    'label'         => __( 'Categories', 'ws-starter' ),
    'rewrite'       => array( 'slug' => 'projects' )
  ));

  register_post_type ( 'project', array(
    'labels'              => array(
      'name'              => __( 'Projects', 'ws-starter' ),
      'singular_name'     => __( 'Project', 'ws-starter' )
    ),
    'public'              => true,
    'exclude_from_search' => true,
    'can_export'          => false,
    'has_archive'         => true,
    'menu_icon'           => 'dashicons-images-alt2',
    'show_ui'             => true,
    'supports'            => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'          => array( 'project_category' ),
    'show_in_nav_menus'   => true,
    'show_in_menu'        => true,
    'rewrite'             => array( 'slug' => 'project' )
  ));

});

// Registers sidebars
add_action( 'init', function() {

  register_sidebar(array(
    'name'          => 'Archive sidebar',
    'id'            => 'archive',
    'description'   => 'Sidebar on archives',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h1>',
    'after_title'   => '</h1>'
  ));

});

add_action( 'after_setup_theme', function() {

  load_theme_textdomain( 'ws-starter', get_template_directory() . '/languages' );

  register_nav_menus(array(
    'main'   => __( 'Main', 'ws-starter' )
  ));

  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );

  add_image_size('col-2', 370);
  add_image_size('col-4', 370);
  add_image_size('col-8', 750);
  add_image_size('col-12', 1130);
  add_image_size( '90x90', 90, 90, true );
  add_image_size( '160x160', 160, 160, true );
  add_image_size( '255x255', 255, 255, true );
  add_image_size( '350x350', 350, 350, true );
  add_image_size( '510x510', 510, 510, true );
  add_image_size( '1920x180', 1920, 180, true );
  add_image_size( '1920x480', 1920, 480, true );
  add_image_size( '1920x780', 1920, 780, true );
  add_image_size( '1920x1080', 1920, 1080, true );

});

// Enqueues CSS and JS files
add_action( 'wp_enqueue_scripts', function() {
  wp_enqueue_style( 'ws-starter-css', get_template_directory_uri() . '/assets/styles/dist/main.min.css', false , null );
  wp_enqueue_script( 'ws-starter-js', get_template_directory_uri() . '/assets/scripts/dist/main.min.js', array( 'jquery' ), null);
});

// Annoying JQMIGRATE
add_action( 'wp_default_scripts', function( $scripts ) {
  if ( ! empty( $scripts->registered['jquery'] ) )
    $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, array( 'jquery-migrate' ) );
});

// Change the search results URL
add_action( 'template_redirect', function() {
  if ( is_search() && ! empty( $_GET['s'] ) ) :
    wp_redirect( home_url('/search/') . urlencode( get_query_var( 's' ) ) );
    exit();
  endif;
});

add_action( 'init', function() {
  add_rewrite_rule( 'search(/([^/]+))?(/([^/]+))?(/([^/]+))?/?', 'index.php?s=$matches[2]&paged=$matches[6]', 'top' );
});
