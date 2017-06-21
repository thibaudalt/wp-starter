<?php

////////////////////////////////////////////////////////////////////////////////
// ! Login page
////////////////////////////////////////////////////////////////////////////////

// Custom CSS Login
add_action('login_head', function() {
	echo ('<style>h1 a {
		width: auto !important;
		height: 144px !important;
		background-size: auto !important;
		background-image: url(' . get_asset( 'login.png' ) . ') !important;
		}</style>');
});

// Custom Logo URL
add_filter( 'login_headerurl', function() {
	return esc_url( home_url( '/' ) );
});

// Custom Logo Title
add_filter( 'login_headertitle', function() {
	return get_bloginfo( 'name' );
});

// Remember me always checked
add_action( 'init', function () {
	add_filter( 'login_footer', function() {
		echo "<script>document.getElementById( 'rememberme' ).checked = true;</script>";
	});
});

// Override the login error message
add_filter( 'login_errors', function() {
    return '<strong>ERREUR</strong>&nbsp;: Informations de connexion incorrects.';
});

// Remove the login page shake
add_action( 'login_head', function() {
	remove_action( 'login_head', 'wp_shake_js', 12);
});

////////////////////////////////////////////////////////////////////////////////
// ! Customizing Admin
////////////////////////////////////////////////////////////////////////////////

// Favicon in WordPress admin
add_action( 'admin_head', function() {
 echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_asset( 'favicon.ico', 'favicons' ) . '" />';
});

// Customize WordPress Footer Credits
add_filter( 'admin_footer_text', function() {
	return '© Copyright '.date("Y").' - Site web par <a href="https://we-studio.ch/" title="We studio" target="_blank">We studio</a>';
});

// Remove Help tab
add_filter( 'contextual_help', function( $old_help, $screen_id, $screen ) {
	$screen->remove_help_tabs(); return $old_help;
}, 999, 3 );

// Remove Dashboard widgets
add_action( 'wp_dashboard_setup', function() {
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
});

// Custom widget dashboard
add_action( 'wp_dashboard_setup', function() {
	wp_add_dashboard_widget( 'ws_summary_dashboard_widget', 'We studio', function() {
		echo '<table style="width:100%">'
				.'<tr><td>We studio<br>Côtes-de-Montbenon 30<br>CH-1003 Lausanne / VD</td>'
				.'<td>Mail : <a title="We studio" href="mailto:support@we-studio.ch">support@we-studio.ch</a><br>'
				.'Tel : <a href="tel:+41213114721">+41 21 311 47 21</a></p></td></tr>'
				.'</table>';
	});
});

// Remove menu page
add_action( 'admin_menu', function() {
	remove_menu_page( 'edit-comments.php' );
});

////////////////////////////////////////////////////////////////////////////////
// ! Admin bar
////////////////////////////////////////////////////////////////////////////////

// Remove elements from WordPress admin bar
add_action( 'admin_bar_menu', function( $wp_admin_bar ) {
	$wp_admin_bar->remove_node(	'wp-logo' );
	$wp_admin_bar->remove_menu(	'comments' );
}, 999 );

////////////////////////////////////////////////////////////////////////////////
// ! Medias
////////////////////////////////////////////////////////////////////////////////

// Remove media columns
add_filter( 'manage_media_columns', function( $columns ) {
	unset( $columns['author'] );
	unset( $columns['comments'] );
	return $columns;
});

// Remove posts columns
add_filter( 'manage_posts_columns', function( $columns ) {
	unset( $columns['comments'] ); 	// Comments
	return $columns;
});

// Remove pages columns
add_filter( 'manage_pages_columns', function( $columns ) {
	unset( $columns['comments'] ); 	// Comments
	return $columns;
});

////////////////////////////////////////////////////////////////////////////////
// ! Comments
////////////////////////////////////////////////////////////////////////////////

// Disable comments
add_filter( 'comments_open', function ( $open, $post_id ) {
	if ( 'post' == get_post($post_id)->post_type) $open = false;
	return $open;
}, 10, 2 );
