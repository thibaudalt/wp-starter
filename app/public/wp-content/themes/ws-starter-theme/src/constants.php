<?php

define('WB_VERSION',        '1.4.2');
define('WB_LINKS_ENABLED',  false);
define('WB_PATH',           dirname(dirname(__FILE__)));
define('WB_EXCERPT_LENGTH', ( get_field( 'constants_excerpt_length', 'option' ) ?: 50 ) );
