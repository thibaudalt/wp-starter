<?php

define( 'WB_VERSION',             '1.4.2' );
define( 'WB_LINKS_ENABLED',       false );
define( 'WB_PATH',                dirname( dirname(__FILE__) ) );

define( 'MAP_MAIN_FIELD',         'map' );
define( 'LAYOUT_MAIN_FIELD',      'layout' );

define( 'CAROUSEL_FLEX_FIELD',    LAYOUT_MAIN_FIELD . '_carousel' );
define( 'GALLERY_FLEX_FIELD',     LAYOUT_MAIN_FIELD . '_gallery' );
define( 'MOSAIC_FLEX_FIELD',      LAYOUT_MAIN_FIELD . '_mosaic' );
define( 'MASONRY_FLEX_FIELD',     LAYOUT_MAIN_FIELD . '_masonry' );

define( 'CAROUSEL_OPTIONS_FIELD', 'carousel_options' );
define( 'GALLERY_OPTIONS_FIELD',  'gallery_options' );
define( 'MOSAIC_OPTIONS_FIELD',   'mosaic_options' );
define( 'MASONRY_OPTIONS_FIELD',  'masonry_options' );
define( 'MAP_OPTIONS_FIELD',      'map_options' );

define( 'CAROUSEL_FULL_WIDTH',    get_acf_option( 'carousel_options_full_width' ) );
define( 'EXCERPT_LENGTH',         get_acf_option( 'constants_excerpt_length', 50 ) );
