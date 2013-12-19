<?php
/**
 * Whitebox Framework Admin
 */

class Whitebox_Admin {

	/**
	 * Init
	 * Initialize wp-admin options page
	 */
	public static function init() {
		add_action( 'admin_menu', array(__CLASS__, 'register_admin_pages') );
		add_action( 'admin_init', 'Whitebox_Settings::init' );
	}


	/**
	 * Register Admin Pages
	 * Register custom menus for wp-admin
	 */
	function register_admin_pages() {
		add_object_page( 'Whitebox Theme', 'Whitebox', 'edit_theme_options','whitebox_settings', array(__CLASS__, 'admin_page') );

		add_submenu_page( 'whitebox_settings', 'Whitebox Settings', 'Settings', 'edit_theme_options', 'whitebox_settings', array(__CLASS__, 'admin_page') );
		//add_submenu_page( 'whitebox_settings', 'Whitebox About', 'About', 'edit_theme_options', 'whitebox_about', array(__CLASS__, 'about_page') );
	}


	/**
	 * Admin Page
	 * Outputs the framework admin page
	 */
	function admin_page() {
		require_once(FRAMEWORK_INC . '/pages/admin.php');
	}

}
