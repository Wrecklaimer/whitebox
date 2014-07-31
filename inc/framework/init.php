<?php
/**
 * Framework Integration
 */


/**
 * Includes folder relative to the theme directory.
 * Define this in functions.php to override the default.
 * i.e. If the includes directory is 'wp-content/themes/my-theme/inc'
 * define as 'inc' (no leading or trailing slashes)
 */
if ( !defined( 'INC' ) )
	define( 'INC', 'inc' );

/**
 * Framework folder relative to the theme directory.
 * Define this in functions.php to override the default.
 * i.e. If the framework directory is 'wp-content/themes/my-theme/inc/framework'
 * define as 'inc/framework' (no leading or trailing slashes)
 */
if ( !defined( 'FRAMEWORK' ) )
	define( 'FRAMEWORK', INC . '/framework' );

define( 'INC_DIR', get_template_directory() . '/' . INC );
define( 'FRAMEWORK_DIR', get_template_directory() . '/' . FRAMEWORK );
define( 'FRAMEWORK_URI', get_template_directory_uri() . '/' . FRAMEWORK );

define( 'FRAMEWORK_ASSETS', FRAMEWORK_URI . '/assets' );
define( 'FRAMEWORK_JS', FRAMEWORK_ASSETS . '/js' );

/* Add framework components */
require_once FRAMEWORK_DIR . '/whitebox.php';
require_once FRAMEWORK_DIR . '/components/whitebox-settings.php';
require_once FRAMEWORK_DIR . '/components/whitebox-utils.php';

/* Initialize framework */
Whitebox::init();

/* Initialize framework admin */
if ( is_admin() ) {
	require_once FRAMEWORK_DIR . '/components/whitebox-admin.php';
	Whitebox_Admin::init();
}
