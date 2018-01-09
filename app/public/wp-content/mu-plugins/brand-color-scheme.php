<?php

/*
 * Plugin Name: Brand Color Scheme
 * Description: Add a new admin color scheme based on default site colors.
 * Version: 1.0
 * Author: Thibaud
 * Author URI: mailto:thibaud@we-studio.ch
*/

class Brand_Color_Scheme {

	/**
	 * List of colors registered in this plugin.
	 *
	 * @since 1.0
	 * @access private
	 * @var array $colors List of colors registered in this plugin.
	 *                    Needed for registering colors-fresh dependency.
	 */
	private $colors = array(
		'brand'
	);

	function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'load_default_css' ) );
		add_action( 'admin_init' , array( $this, 'add_colors' ) );
	}

	/**
	 * Register color schemes.
	 */
	function add_colors() {
		wp_admin_css_color(
			'brand', get_bloginfo( 'name' ),
			plugins_url( "brand-colors.min.css", __FILE__ ),
			array( '#2C3E50', '#2980b9', '#868e96', '#fff' ),
			array( 'base' => '#2C3E50', 'focus' => '#2980b9', 'current' => '#868e96' )
		);
	}

	/**
	 * Make sure core's default `colors.css` gets enqueued, since we can't
	 * @import it from a plugin stylesheet. Also force-load the default colors
	 * on the profile screens, so the JS preview isn't broken-looking.
	 */
	function load_default_css() {

		global $wp_styles, $_wp_admin_css_colors;

		$color_scheme = get_user_option( 'admin_color' );

		$scheme_screens = apply_filters( 'acs_picker_allowed_pages', array( 'profile', 'profile-network' ) );
		if ( in_array( $color_scheme, $this->colors ) || in_array( get_current_screen()->base, $scheme_screens ) ){
			$wp_styles->registered[ 'colors' ]->deps[] = 'colors-fresh';
		}

	}

}

global $acs_colors;
$acs_colors = new Brand_Color_Scheme();
