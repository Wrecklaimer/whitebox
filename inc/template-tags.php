<?php
/**
 * Custom template tags for Twenty Fourteen
 */


/**
 * Display post thumbnail (featured image)
 */
if ( !function_exists( 'whitebox_post_thumbnail' ) ) :
function whitebox_post_thumbnail() {
	if ( !has_post_thumbnail() )
		return;

	if ( is_singular() ) :
		// Posts and pages
		if ( Whitebox_Settings::get( 'show_post_thumbnails' ) ) : ?>
			<div class="entry-image">
				<?php the_post_thumbnail(); ?>
			</div><?php
		endif;
	else :
		// Elsewhere
		if ( Whitebox_Settings::get( 'show_post_thumbnails' ) ) : ?>
			<div class="entry-image">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</div><?php
		endif;
	endif;
}
endif;


/**
 * Display post meta
 */
if ( !function_exists( 'whitebox_post_meta' ) ) :
function whitebox_post_meta() {
	// Post author
	if ( Whitebox_Settings::get( 'show_post_author' ) ) {
		echo '<span class="post-author">' . __( 'By ', THEME_DOMAIN);
		the_author_posts_link();
		echo '</span>';
	}
	// Post date
	if ( Whitebox_Settings::get( 'show_post_date' ) ) {
		echo '<span class="post-date">' . __( ' on ', THEME_DOMAIN );
		the_date();
		echo ' ';
		the_time();
		echo '</span>';
	}
	// Post categories
	if ( is_single() && Whitebox_Settings::get( 'show_post_category' ) ) {
		echo '<span class="post-categories">' . __(' on ', THEME_DOMAIN );
		the_category( ', ' );
		echo '</span>';
	}
	// Post edit link
	if ( is_single() ) {
		edit_post_link( __( 'Edit', THEME_DOMAIN), ' | ', '' );
	}
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
