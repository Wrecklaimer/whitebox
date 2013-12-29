<?php
/**
 * Custom template tags for Twenty Fourteen
 */


/**
 * Display post meta
 */
if ( !function_exists( 'whitebox_post_meta' ) ) :
function whitebox_post_meta() {
	if ( Whitebox_Settings::get( 'show_post_author' ) ) {
		echo '<span class="post-author">' . __( 'By ', THEME_DOMAIN);
		the_author_posts_link();
		echo '</span>';
	}
	if ( Whitebox_Settings::get( 'show_post_date' ) ) {
		echo '<span class="post-date">' . __( ' on ', THEME_DOMAIN );
		the_date();
		the_time();
		echo '</span>';
	}
	if ( Whitebox_Settings::get( 'show_post_category' ) ) {
		echo '<span class="post-categories">' . __(' on ', THEME_DOMAIN );
		the_category( ', ' );
		echo '</span>';
	}
	edit_post_link( __( 'Edit', THEME_DOMAIN), ' | ', '' );
}
endif;


/**
 * Display entry page navigation
 */
if ( !function_exists( 'whitebox_entry_pagination' ) ) :
function whitebox_entry_pagination() {
	$args = array(
		'before'         => '<p class="post-pagination"><span class="pagination-label">' . __( 'Pages', THEME_DOMAIN ) . ':</span> ',
		'after'          => '</p>',
		'next_or_number' => 'number'
	);

	wp_link_pages( $args );
}
endif;


/**
 * Display entry page navigation
 */
if ( !function_exists( 'whitebox_entry_tags' ) ) :
function whitebox_entry_tags() {
	$before = '<p class="tags"><span class="tags-label">' . __( 'Tags', THEME_DOMAIN ) . ':</span> ';
	$sep    = ', ';
	$after  = '</p>';

	the_tags( $before, $sep, $after );
}
endif;
