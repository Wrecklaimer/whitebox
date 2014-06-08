<?php
/**
 * Whitebox Framework Core
 */

class Whitebox {

	/* Class variables */
	public static $frameworkVersion;
	public static $frameworkPath;
	public static $assetsPath;
	public static $themeData;
	public static $theme_raw_name;
	public static $themeName;
	public static $themePath;
	public static $themeVersion;
	public static $themeDomain;


	/**
	 * Init
	 * Initializes framework
	 */
	public static function init() {
		self::load_theme_data();
	}


	/**
	 * Load Theme Data
	 * Loads theme data and configs
	 */
	private static function load_theme_data() {
		self::$frameworkVersion = '1.0b';
		self::$frameworkPath    = self::get_root_dir();
		self::$assetsPath       = self::$frameworkPath . '/assets';
		self::$themePath        = get_template_directory();

		if ( function_exists( 'wp_get_theme' ) ) {
			self::$themeData    = wp_get_theme( get_stylesheet() );
			self::$themeVersion = self::$themeData->Version;
			self::$themeName    = self::$themeData->Name;
			self::$themeDomain  = self::$themeData->TextDomain;
			if ( self::$themeDomain == '' )
				self::$themeDomain = strtolower( str_replace( ' ', '', self::$themeName ) );
		}
		self::$theme_raw_name = basename( get_template_directory() );
	}


	/**
	 * Get Root Directory
	 * Get framework root directory
	 *
	 * @return string
	 */
	public static function get_root_dir() {
		return dirname( __FILE__ );
	}


	/**
	 * Debug Out
	 * Prints out framework debug info
	 */
	public static function debug_out() {
		global $wp_version;

		$debug = '# DEBUG<br/>';
		$debug .= str_replace( ' ', '&nbsp;', 'Theme Name:        ' . self::$themeName . '<br/>' );
		$debug .= str_replace( ' ', '&nbsp;', 'Theme Version:     ' . self::$themeVersion . '<br/>' );
		$debug .= str_replace( ' ', '&nbsp;', 'Framework Version: ' . self::$frameworkVersion . '<br/>' );
		$debug .= str_replace( ' ', '&nbsp;', 'Wordpress Version: ' . $wp_version . '<br/>' );
		$debug .= '# END DEBUG';

		echo $debug;
	}
}
