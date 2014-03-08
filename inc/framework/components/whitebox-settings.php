<?php
/**
 * Whitebox Framework Settings Manager
 */

// Define in functions.php to override
if ( !defined( 'SETTINGS_NAME' ) )
	define( 'SETTINGS_NAME', Whitebox::$themeDomain . '_settings' );

class Whitebox_Settings {

	public static $settings_name = SETTINGS_NAME;


	/**
	 * Init
	 * Initialize theme and framework settings
	 */
	public static function init() {
		self::load_settings();
		self::load_scripts();
		self::set_upload_text();
	}


	/**
	 * Load Setttings
	 * Load theme and framework settings
	 */
	public static function load_settings() {
		$evoOptions = self::load_options();

		if ( !get_option( self::$settings_name ) )
			self::set_defaults( $evoOptions );

		register_setting( self::$settings_name, self::$settings_name, array(__CLASS__, 'validate_settings') );

		foreach ( $evoOptions as $name => $options ) {
			$section_name = str_replace( ' ', '_', strtolower( $name ) ).'_section';
			add_settings_section( $section_name, $name, array(__CLASS__, 'display_section'), self::$settings_name );

			if ( isset( $name[1] ) && $name[1] != '' ) {
				foreach ( $options as $option ) {
					add_settings_field( $option['id'], $option['name'], array(__CLASS__, 'display_field'), self::$settings_name, $section_name, $option);
				}
			}
		}
	}


	/**
	 * Load options
	 * Return options array from files
	 */
	function load_options() {
		if ( file_exists( INC . '/options.php' ) )
			$themeOptions = include(INC . '/options.php');
		$frameworkOptions = include(FRAMEWORK_INC . '/options.php');

		return ( $themeOptions ) ? array_merge_recursive( $themeOptions, $frameworkOptions ) : $frameworkOptions;
	}


	/**
	 * Get
	 * Return or echo the value of the setting named
	 *
	 * @param string $name
	 * @param bool $echo
	 */
	public static function get( $name, $echo = false ) {
		$options = get_option( self::$settings_name );
		$result = $options[$name];

		if ( !$result )
			return;

		if ( !$echo )
			return $result;

		echo $result;
	}


	/**
	 * Get Defaults
	 * Get option defaults
	 */
	public static function get_defaults() {
		$evoOptions = self::load_options();
		$defaults = array();

		foreach ( $evoOptions as $name => $options ) {
			if ( isset( $name[1] ) && $name[1] != '' ) {
				foreach ( $options as $option ) {
					$defaults[$option['id']] = $option['std'];
				}
			}
		}

		return $defaults;
	}


	/**
	 * Set Defaults
	 * Set options to defaults
	 */
	public static function set_defaults() {
		$defaults = self::get_defaults();

		update_option( self::$settings_name, $defaults );
	}


	/**
	 * Get Setting Type
	 * Return setting type
	 *
	 * @param string $name
	 */
	function get_setting_type( $setting_id ) {
		$evoOptions = self::load_options();
		$type = '';

		foreach ( $evoOptions as $name => $options ) {
			if ( isset( $name[1] ) && $name[1] != '' ) {
				foreach ( $options as $option ) {
					if ( $option['id'] == $setting_id ) {
						return $option['type'];
					}
				}
			}
		}

		return $type;
	}


	/**
	 * Display Settings Sections
	 * Print out all settings sections added to the settings page
	 *
	 * Modified from do_settings_sections() in wp-admin\includes\template.php
	 *
	 * @param string $page The slug name of the page whos settings sections you want to output
	 */
	function display_settings_sections( $page ) {
		global $wp_settings_sections, $wp_settings_fields;

		if ( ! isset( $wp_settings_sections[$page] ) )
			return;

		foreach ( (array) $wp_settings_sections[$page] as $section ) {
			echo '<div id="'.$section['id'].'" >';

			if ( $section['title'] )
				echo "<h3>{$section['title']}</h3>\n";

			if ( $section['callback'] )
				call_user_func( $section['callback'], $section );

			if ( ! isset( $wp_settings_fields ) || !isset( $wp_settings_fields[$page] ) || !isset( $wp_settings_fields[$page][$section['id']] ) )
				continue;

			echo '<table class="form-table">';
			do_settings_fields( $page, $section['id'] );
			echo '</table>';
			echo '</div>';
		}
	}


	/**
	 * Validate Settings
	 * Sanitize and validate settings
	 * register_setting() sanitize callback
	 *
	 * @param array $input
	 */
	function validate_settings( $input ) {
		$output = array();

		// Reset settings to defaults
		if ( !empty( $input['reset'] ) ) {
			$output = self::get_defaults();
			add_settings_error( null, 'settings_reset', 'Settings reset to defaults.', 'updated' );
			return $output;
		}

		// Validate inputs
		foreach ( $input as $name => $value ) {
			if ( isset( $input[$name] ) ) {
				switch ( self::get_setting_type( $name ) ) {
					case 'text':
						$output[$name] = sanitize_text_field( $input[$name] );
						break;
					case 'upload':
						$output[$name] = esc_url( $input[$name] );
						break;
					default:
						$output[$name] = $input[$name];
				}
			}
		}

		return $output;
	}


	/**
	 * Display Section
	 * add_settings_section() callback
	 *
	 * @param array $section
	 */
	function display_section( $section ) { }


	/**
	 * Display Field
	 * add_settings_field() callback
	 * Call the appropriate field function by given field type
	 *
	 * @param array $args
	 */
	function display_field( $args ) {
		$args['name'] = self::$settings_name.'['.$args['id'].']';

		switch ( $args['type'] ) {
			case 'text':
				self::text_field( $args );
				break;
			case 'textarea':
				self::textarea_field( $args );
				break;
			case 'checkbox':
				self::checkbox_field( $args );
				break;
			case 'select':
				self::select_field( $args );
				break;
			case 'upload':
				self::upload_field( $args );
				break;
			default:
				return;
		}
	}


	/**
	 * Text Field
	 * Print out a settings text field
	 *
	 * @param array $args
	 */
	function text_field( $args ) {
		extract( $args );
		$settings = get_option( self::$settings_name );
		$val = $settings[$id];

		echo '<input type="text" id="'.$id.'" class="regular-text" autocomplete="off" name="'.$name.'" value="'.$val.'" />';
		if ( isset( $desc ) && !is_null( $desc ) && $desc != '' )
			echo '<br /><span class="description">'.$desc.'</span>';
	}


	/**
	 * Textarea Field
	 * Print out a settings textarea field
	 *
	 * @param array $args
	 */
	function textarea_field( $args ) {
		extract( $args );
		$settings = get_option( self::$settings_name );
		$val = $settings[$id];

		echo '<textarea type="textarea" id="'.$id.'" class="large-text" name="'.$name.'" >'.$val.'</textarea>';
		if ( isset( $desc ) && !is_null( $desc ) && $desc != '' )
			echo '<br /><span class="description">'.$desc.'</span>';
	}


	/**
	 * Checkbox Field
	 * Print out a settings checkbox field
	 *
	 * @param array $args
	 */
	function checkbox_field( $args ) {
		extract( $args );
		$settings = get_option( self::$settings_name );
		$val = $settings[$id];

		echo '<label for=".$name.">';
		// The hidden field’s value gets submitted when the checkbox is left unchecked
		echo '<input type="hidden" name="'.$name.'" value="0" />';
		echo '<input type="checkbox" id="'.$id.'" name="'.$name.'" value="1" '.checked( 1, $val, false ).' />';
		if ( isset( $label ) && !is_null( $label ) && $label != '' )
			echo $label;
		echo '</label>';
		if ( isset( $desc ) && !is_null( $desc ) && $desc != '' )
			echo '<br /><span class="description">'.$desc.'</span>';
	}


	/**
	 * Select Field
	 * Print out a settings select field
	 *
	 * @param array $args
	 */
	function select_field( $args ) {
		extract( $args );
		$settings = get_option( self::$settings_name );
		$val = $settings[$id];

		echo '<select id="'.$id.'" name="'.$name.'">';
		foreach ( $options as $option ) {
			echo '<option value="'.$option.'" '.selected( $val, $option, false ).'>'.$option.'</option>';
		}
		echo '</select>';
		if ( isset( $desc ) && !is_null( $desc ) && $desc != '' )
			echo '<br /><span class="description">'.$desc.'</span>';
	}


	/**
	 * Upload Field
	 * Print out a settings upload field
	 *
	 * @param array $args
	 */
	function upload_field( $args ) {
		extract( $args );
		$settings = get_option( self::$settings_name );
		$val = $settings[$id];

		echo '<span class="upload">';
		echo '<input type="text" id="'.$id.'" class="regular-text text-upload" autocomplete="off" name="'.$name.'" value="'.esc_url( $val ).'" />';
		echo '<input type="button" class="button button-upload" value="Upload" />';
		if ( isset( $desc ) && !is_null( $desc ) && $desc != '' )
			echo '<br /><span class="description">'.$desc.'</span>';
		echo '<br /><img src="'.esc_url( $val ).'" class="preview-upload"/>';
		echo '</span>';
	}


	/**
	 * Load Scripts
	 * Add scripts used in settings page
	 */
	function load_scripts() {
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_script( 'whitebox-upload', FRAMEWORK_JS . '/whitebox-upload.js', array( 'thickbox', 'media-upload' ), null );
	}


	/**
	 * Set Upload Text
	 * Filter media uploader button text
	 */
	function set_upload_text() {
		global $pagenow;

		if ( $pagenow == 'media-upload.php' || $pagenow == 'async-upload.php' ) {
			add_filter( 'gettext', array(__CLASS__, 'replace_thickbox_text'), 1, 3 );
		}
	}


	/**
	 * Replace Thickbox Text
	 * Override Thickbox 'Insert into Post' button text
	 *
	 * @param string $translated_text
	 * @param string $text
	 * @param string $domain
	 */
	function replace_thickbox_text( $translated_text, $text, $domain ) {
		if ( $text == 'Insert into Post' ) {
			$referer = strpos( wp_get_referer(), 'whitebox_settings' );
			if ( $referer != '' ) {
					return 'Use this image';
			}
		}
		return $translated_text;
	}

}
