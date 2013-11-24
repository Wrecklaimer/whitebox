<?php
/**
 * Framework Utilities
 */

class Whitebox_Utils {

	/**
	 * Title
	 * Prints the formatted site title
	 */
	public static function title() {
		if ( !Whitebox_Settings::get( 'enable_seo' ) ) {
			echo get_bloginfo('name').wp_title('-', false, '');
			return;
		}

		$sep = Whitebox_Settings::get( 'seo_title_separator' );

		if ( is_home() ) {
			switch ( Whitebox_Settings::get( 'seo_homepage_title' ) ) {
				case 'Site Title - Site Description':
					echo get_bloginfo('name').' '.$sep.' '.get_bloginfo('description');
					break;
				case 'Site Description - Site Title':
					echo get_bloginfo('description').' '.$sep.' '.get_bloginfo('name');
					break;
				case 'Site Title':
				default:
					echo get_bloginfo('name');
			}
		} else if ( is_single() || is_page() ) {
			switch ( Whitebox_Settings::get( 'seo_post_title' ) ) {
				case 'Site Title - Page Title':
					echo get_bloginfo('name').wp_title($sep, false, '');
					break;
				case 'Page Title - Site Title':
					echo wp_title($sep, false, 'right').get_bloginfo('name');
					break;
				case 'Page Title':
				default:
					echo wp_title('', false, '');
			}
		} else if ( is_category() || is_archive() || is_search() || is_404() ) {
			switch ( Whitebox_Settings::get( 'seo_index_title' ) ) {
				case 'Site Title - Page Title':
					echo get_bloginfo('name').wp_title($sep, false, '');
					break;
				case 'Page Title - Site Title':
					echo wp_title($sep, false, 'right').get_bloginfo('name');
					break;
				case 'Page Title':
				default:
					echo wp_title('', false, '');
			}
		} else {
			echo wp_title('', false, '');
		}
	}


	/**
	 * Copyright Year
	 *
	 * @param bool $echo
	 */
	public static function copyright_year( $echo = false ) {
		$args = array( 'numberposts' => '1' );
		$recent_posts = wp_get_recent_posts( $args );
		$output = mysql2date( 'Y', $recent_posts[0]['post_date'] );

		if ( !$echo )
			return $output;

		echo $output;
	}

}
