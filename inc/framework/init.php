<?php
/**
 * Framework Integration
 */

/* Add framework components */
require_once FRAMEWORK_INC . '/whitebox.php';
require_once FRAMEWORK_INC . '/components/whitebox-settings.php';
require_once FRAMEWORK_INC . '/components/utils.php';

/* Initialize framework */
Whitebox::init();

/* Initialize framework admin */
if ( is_admin() ) {
	require_once FRAMEWORK_INC . '/components/whitebox-admin.php';
	Whitebox_Admin::init();
}
