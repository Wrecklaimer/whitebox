<?php
/**
 * Framework Utilities
 */

class Whitebox_Utils {

	/**
	 * Copyright Year
	 *
	 * @param array $post_types Optional. Post types to query.
	 * @param bool $echo Optional. Output the result.
	 */
	public static function copyright_year( $post_types = array( 'any' ), $echo = false ) {
		if ( !$post_types )
			$post_types = array( 'any' );

		$args = array(
			'post_type' => $post_types,
			'numberposts' => '1',
			'post_status' => 'publish'
		);
		$query = wp_get_recent_posts( $args );

		if ( count($query) > 0 )
			$output = mysql2date( 'Y', $query[0]['post_date'] );
		else
			$output = '';

		if ( !$echo )
			return $output;

		echo $output;
	}

}
