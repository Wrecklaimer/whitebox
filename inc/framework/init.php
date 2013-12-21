<?php
/**
 * Framework Integration
 */

// Define these in functions.php to override
if ( !defined( 'INC' ) )
	define( 'INC', get_template_directory() . '/inc' );
if ( !defined( 'FRAMEWORK_INC' ) )
	define( 'FRAMEWORK_INC', INC . '/framework' );
if ( !defined( 'FRAMEWORK_URI' ) )
	define( 'FRAMEWORK_URI', get_template_directory_uri() . '/inc/framework' );

define( 'FRAMEWORK_ASSETS', FRAMEWORK_URI . '/assets' );
define( 'FRAMEWORK_JS', FRAMEWORK_ASSETS . '/js' );

/* Add framework components */
require_once FRAMEWORK_INC . '/whitebox.php';
require_once FRAMEWORK_INC . '/components/whitebox-settings.php';
require_once FRAMEWORK_INC . '/components/whitebox-utils.php';

/* Initialize framework */
Whitebox::init();

/* Initialize framework admin */
if ( is_admin() ) {
	require_once FRAMEWORK_INC . '/components/whitebox-admin.php';
	Whitebox_Admin::init();
}
