<?php
/**
 * Custom template tags for Whitebox
 */

class_alias('Whitebox_Settings', 'Settings');


/**
 * Whitebox Favicon
 * Output favicon link.
 */
if ( !function_exists( 'whitebox_favicon' ) ) :
function whitebox_favicon() {
	if ( Settings::get( 'favicon' ) ) : ?>
	<link rel="shortcut icon" href="<?php Settings::get( 'favicon', true ); ?>" type="image/x-icon" />
	<?php endif;
}
endif;


/**
 * Whitebox Header Logo
 * Output header logo image.
 */
if ( !function_exists( 'whitebox_header_logo' ) ) :
function whitebox_header_logo() {
	?>
	<a href="<?php echo home_url(); ?>" >
		<img src="<?php esc_url( Settings::get( 'header_logo', true ) ); ?>" alt="<?php bloginfo('name'); ?>" />
	</a>
	<?php
}
endif;


/**
 * Whitebox Header Title
 * Output header logo image.
 */
if ( !function_exists( 'whitebox_header_title' ) ) :
function whitebox_header_title() {
	?>
	<h1 id="site-title">
		<a href="<?php echo home_url(); ?>" ><?php bloginfo('name'); ?></a>
	</h1>
	<?php
}
endif;


/**
 * Whitebox Post Thumbnail
 * Display post thumbnail (featured image).
 *
 * @param string $size Optional. Image size.
 */
if ( !function_exists( 'whitebox_post_thumbnail' ) ) :
function whitebox_post_thumbnail( $size = null ) {
	if ( !has_post_thumbnail() || !Settings::get( 'show_post_thumbnails' ) )
		return;

	?>
	<div class="entry-image"><?php
	if ( is_singular() ) : // Posts and pages
		is_null( $size ) ? the_post_thumbnail() : the_post_thumbnail( $size );
	else : // Elsewhere ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php is_null( $size ) ? the_post_thumbnail() : the_post_thumbnail( $size ); ?>
		</a>
		<?php
	endif; ?>
	</div><?php
}
endif;


/**
 * Whitebox Post Meta
 * Display post meta.
 */
if ( !function_exists( 'whitebox_post_meta' ) ) :
function whitebox_post_meta() {
	// Post author
	if ( Settings::get( 'show_post_author' ) ) {
		echo '<span class="post-author">' . __( 'By ', THEME_DOMAIN);
		the_author_posts_link();
		echo '</span>';
	}
	// Post date
	if ( Settings::get( 'show_post_date' ) ) {
		echo '<span class="post-date">' . __( ' on ', THEME_DOMAIN );
		the_date();
		echo ' ';
		the_time();
		echo '</span>';
	}
	// Post categories
	if ( is_single() && Settings::get( 'show_post_category' ) ) {
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
 * Whitebox Entry Pagination
 * Display post page navigation.
 *
 * @see wp_link_pages()
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
 * Whitebox Entry Tags
 * Display post tags.
 *
 * @see the_tags()
 */
if ( !function_exists( 'whitebox_entry_tags' ) ) :
function whitebox_entry_tags() {
	$before = '<p class="tags"><span class="tags-label">' . __( 'Tags', THEME_DOMAIN ) . ':</span> ';
	$sep    = ', ';
	$after  = '</p>';

	if ( is_single() && Settings::get( 'show_post_tags' ) )
		the_tags( $before, $sep, $after );
}
endif;


/**
 * Whitebpx Comment
 * Display a single comment.
 * Custom comment callback for wp_list_comments().
 *
 * @see wp-includes/comment-template.php comment()
 *
 * @param object $comment Comment to display.
 * @param array  $args    An array of arguments.
 * @param int    $depth   Depth of comment.
 */
if ( !function_exists( 'whitebox_comment' ) ) :
function whitebox_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	} ?>

	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">

	<?php
	if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
	endif;
	?>

		<div class="comment-avatar">
		<?php if ( $args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>

		<div class="comment-content">
			<div class="comment-author vcard">
			<?php comment_author_link(); ?>
			</div>

			<?php
			if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', THEME_DOMAIN ) ?></em>
			<br /><?php
			endif;
			?>

			<div class="comment-meta commentmetadata">
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf( __( '%1$s at %2$s', THEME_DOMAIN ), get_comment_date(),  get_comment_time()) ?></a>
				<?php edit_comment_link(__( '(Edit)', THEME_DOMAIN ),'  ','' ); ?>
			</div>

			<div class="comment-text">
				<?php comment_text() ?>
			</div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
			</div>
		</div><!-- / comment-content -->

	<?php if ( 'div' != $args['style'] ) : ?>
	</div><!-- / comment-body --><?php
	endif;
}
endif;


/**
 * Whitebox Footer Text
 * Output footer text.
 *
 * @param bool $echo Optional.
 * @return string The footer text/markup.
 */
if ( !function_exists( 'whitebox_footer_text' ) ) :
function whitebox_footer_text( $echo = false ) {
	$copyright_year = Whitebox_Utils::copyright_year();
	$copyright_link = Settings::get( 'copyright_link' ) != '' ? Settings::get( 'copyright_link' ) : home_url();
	$copyright_text = Settings::get( 'copyright_text' ) != '' ? Settings::get( 'copyright_text' ) : get_bloginfo( 'name' );

	$footer_text = '<span class="copy">&copy; ' . $copyright_year . ' <a href="' . $copyright_link .'">' . $copyright_text . '</a></span>';

	$output = apply_filters('whitebox_footer_text', $footer_text);

	if ( $echo )
		echo $output;

	return $output;
}
endif;
