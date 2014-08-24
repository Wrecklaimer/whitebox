<?php
/**
 * Framework Utilities
 */

class Whitebox_Utils {

	/**
	 * Copyright Year
	 *
	 * @param bool $echo Optional. Output the result.
	 */
	public static function copyright_year( $echo = false ) {
		$args = array( 'numberposts' => '1', 'post_status' => 'publish' );
		$recent_posts = wp_get_recent_posts( $args );
		$output = mysql2date( 'Y', $recent_posts[0]['post_date'] );

		if ( !$echo )
			return $output;

		echo $output;
	}

}
