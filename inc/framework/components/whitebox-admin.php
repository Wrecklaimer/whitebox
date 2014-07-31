<?php
/**
 * Whitebox Framework Admin
 */

class Whitebox_Admin {

	/**
	 * Init
	 * Initialize wp-admin options page.
	 */
	public static function init() {
		add_action( 'admin_menu', array(__CLASS__, 'register_admin_pages') );
		add_action( 'admin_init', 'Whitebox_Settings::init' );
	}


	/**
	 * Register Admin Pages
	 * Register custom menus for wp-admin.
	 */
	function register_admin_pages() {
		add_theme_page( Whitebox::$themeName.' Settings', 'Theme Settings', 'edit_theme_options', Whitebox::$themeDomain.'-settings', array(__CLASS__, 'admin_page') );
	}


	/**
	 * Admin Page
	 * Output the framework admin page.
	 */
	function admin_page() {
		get_template_part( FRAMEWORK . '/pages/admin' );
	}

}
