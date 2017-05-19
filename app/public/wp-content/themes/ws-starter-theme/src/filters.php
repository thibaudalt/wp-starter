<?php

////////////////////////////////
// Filters
////////////////////////////////

add_filter( 'pre_option_link_manager_enabled', 'wb_are_links_enabled' );

add_filter( 'excerpt_length', 'wb_excerpt_length' );

add_filter( 'excerpt_more', function() {
    return '&hellip;&nbsp;<a href="' . get_permalink() . '">'.__( 'Continue reading', 'ws-starter' ).'</a>';
});

// Defines nav menu arguments
add_filter( 'wp_nav_menu_args', function( $args ) {
    $args['fallback_cb'] = false;
    $args['container']   = false;

    if ($args['menu_class'] == 'menu' ) {
        $args['menu_class'] = 'nav';
    }

    if (empty($args['walker'])) {
        $args['walker'] = 'default';
    }

    if (is_string($args['walker'])) {
        switch ($args['walker']) {
            case 'dropdowns':
                $args['walker'] = new Westudio_Bootstrap_Menu_DropdownsWalker();
                break;

            case 'list-group':
                $args['walker'] = new Westudio_Bootstrap_Menu_ListGroupWalker();
                break;

            case 'one-page':
                $args['walker'] = new Westudio_Bootstrap_Menu_OnePageWalker();
                break;

            default:
                $args['walker'] = new Westudio_Bootstrap_Menu_Walker();
        }
    }

    return $args;
}, 10, 1);
