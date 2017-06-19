<?php

add_filter( 'pre_option_link_manager_enabled', 'wb_are_links_enabled' );
add_filter( 'excerpt_length', 'EXCERPT_LENGTH' );
add_filter( 'excerpt_more', function() { return '&hellip;'; });
