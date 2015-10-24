<?php
/**
 * Custom template tags for Whitebox
 */


/**
 * Title
 * Prints the formatted site title.
 */
if ( !function_exists( 'whitebox_title' ) ) :
function whitebox_title() {
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
endif;


/**
 * Whitebox Header Logo
 * Outputs the header logo image.
 */
if ( !function_exists( 'whitebox_header_logo' ) ) :
function whitebox_header_logo() {
	?>
	<a href="<?php echo home_url(); ?>" >
		<img src="<?php esc_url( Whitebox_Settings::get( 'header_logo', true ) ); ?>" alt="<?php bloginfo('name'); ?>" />
	</a>
	<?php
}
endif;


/**
 * Whitebox Header Title
 * Outputs the header title.
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
 * Displays the post thumbnail (featured image).
 *
 * @param string $size Optional. Image size.
 */
if ( !function_exists( 'whitebox_post_thumbnail' ) ) :
function whitebox_post_thumbnail( $size = null ) {
	if ( !has_post_thumbnail() || !Whitebox_Settings::get( 'show_post_thumbnails' ) )
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
 * Displays the post meta (author, date, categories, etc).
 */
if ( !function_exists( 'whitebox_post_meta' ) ) :
function whitebox_post_meta() {
	// Post author
	if ( !is_author() && Whitebox_Settings::get( 'show_post_author' ) ) {
		$author_before = apply_filters('whitebox_post_author_before', __( 'by ', THEME_DOMAIN) );
		echo '<span class="post-author">' . $author_before;
		the_author_posts_link();
		echo '</span>';
	}
	// Post date
	if ( Whitebox_Settings::get( 'show_post_date' ) ) {
		$date_before = apply_filters('whitebox_post_date_before', __( ' on ', THEME_DOMAIN ));
		$datetime = get_the_date( 'Y-m-d H:i:s' );
		echo '<span class="post-date">' . $date_before;
		echo '<time datetime="'.$datetime.'">';
		echo get_the_date();
		echo ' ';
		the_time();
		echo '</time>';
		echo '</span>';
	}
	// Post categories
	if ( is_single() && Whitebox_Settings::get( 'show_post_category' ) ) {
		$cat_before = apply_filters('whitebox_post_category_before', __( ' in ', THEME_DOMAIN ));
		echo '<span class="post-categories">' . $cat_before;
		the_category( ', ' );
		echo '</span>';
	}
	// Post edit link
	if ( is_single() ) {
		edit_post_link( __( 'Edit', THEME_DOMAIN ), ' | ', '' );
	}
}
endif;


/**
 * Whitebox Pagination
 * Displays the posts pagination.
 *
 * @see paginate_links()
 */
if ( !function_exists( 'whitebox_pagination' ) ) :
function whitebox_pagination() {
	global $wp_query;

	$big = 999999999;
	?>
	<nav class="pagination">
	<?php
		echo paginate_links( array(
			'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'type'      => 'list',
			'format'    => '?paged=%#%',
			'current'   => max( 1, get_query_var('paged') ),
			'total'     => $wp_query->max_num_pages,
			'prev_text' => __( 'Previous', THEME_DOMAIN ),
			'next_text' => __( 'Next', THEME_DOMAIN )
		 ) );
	?>
	</nav>
	<?php
}
endif;


/**
 * Whitebox Entry Pagination
 * Displays the single post pagination.
 *
 * @see wp_link_pages()
 */
if ( !function_exists( 'whitebox_entry_pagination' ) ) :
function whitebox_entry_pagination() {
	$pages_label = apply_filters('whitebox_post_pages_label', __( 'Pages', THEME_DOMAIN ));
	$args = array(
		'before'         => '<nav class="post-pagination"><span class="pagination-label">' . $pages_label . ':</span> ',
		'after'          => '</nav>',
		'link_before'    => '<span class="page">',
		'link_after'     => '</span>',
		'separator'      => '',
		'next_or_number' => 'number'
	);

	wp_link_pages( $args );
}
endif;


/**
 * Whitebox Entry Tags
 * Displays the post tags.
 *
 * @see the_tags()
 */
if ( !function_exists( 'whitebox_entry_tags' ) ) :
function whitebox_entry_tags() {
	$tags_label = apply_filters('whitebox_post_tags_label', __( 'Tags:', THEME_DOMAIN ));
	$before = '<p class="tags"><span class="tags-label">' . $tags_label . '</span> ';
	$sep    = ', ';
	$after  = '</p>';

	if ( is_single() && Whitebox_Settings::get( 'show_post_tags' ) )
		the_tags( $before, $sep, $after );
}
endif;


/**
 * Whitebox Comment Form
 * Displays the comment form.
 */
if ( !function_exists( 'whitebox_comment_form' ) ) :
function whitebox_comment_form() {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$req_class = 'required';
	$aria_req = ( $req ? " aria-required='true' required" : '' );
	$size = 35;

	$comments_args = array(
		'title_reply'         => __( 'Leave a Comment', THEME_DOMAIN ),
		'title_reply_to'      => __( 'Leave a Reply to %s', THEME_DOMAIN ),
		'cancel_reply_link'   => __( 'cancel reply', THEME_DOMAIN ),
		'label_submit'        => __( 'Add Comment', THEME_DOMAIN ),
		'fields'              => apply_filters( 'comment_form_default_fields', array(
			'author' =>
				'<div class="comment-form-author">' .
				'<label for="author"' . ( $req ? ' class="' . $req_class . '"' : '' ) . '>' . __( 'Name', THEME_DOMAIN ) . '</label>' .
				'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
				'" size="' . $size . '" tabindex="1"' . $aria_req . ' />' .
				'</div>',
			'email'  =>
				'<div class="comment-form-email">
				<label for="email"' . ( $req ? ' class="' . $req_class . '"' : '' ) . '>' . __( 'Email', THEME_DOMAIN ) . '</label>' .
				'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="' . $size . '" tabindex="2"' . $aria_req . ' />' .
				'</div>',
			'url'    =>
				'<div class="comment-form-url">' .
				'<label for="url">' . __( 'Website', THEME_DOMAIN ) . '</label>' .
				'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
				'" size="' . $size . '" tabindex="3" />' .
				'</div>'
			)
		),
		'comment_field'       =>
			'<div class="comment-form-comment"><label for="comment">' . __( 'Comment', THEME_DOMAIN ) . '</label>' .
			'<textarea id="comment" name="comment" tabindex="4" cols="80" rows="4" aria-required="true"></textarea>' .
			'</div>',
		'comment_notes_after' => '',0
	);

	comment_form( $comments_args );
}
endif;


/**
 * Whitebox Comment
 * Displays a single comment.
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
 * Whitebox Comments Nav
 * Displays the comments navigation.
 */
if ( !function_exists( 'whitebox_comments_nav' ) ) :
function whitebox_comments_nav() {
	echo '<nav class="navigation comment-navigation" role="navigation">';
	echo '<ul class="pager">';
	echo '<li class="previous">';
	previous_comments_link( __( '<span>&larr;</span> Older', THEME_DOMAIN ) );
	echo '</li>';
	echo '<li class="next">';
	next_comments_link( __( 'Newer <span>&rarr;</span>', THEME_DOMAIN ) );
	echo '</li>';
	echo '</ul>';
	echo '</nav>';
}
endif;

/**
 * Whitebox Footer Text
 * Outputs the footer text.
 *
 * @param bool $echo Optional.
 * @return string The footer text/markup.
 */
if ( !function_exists( 'whitebox_footer_text' ) ) :
function whitebox_footer_text( $echo = false ) {
	$copyright_year = Whitebox_Utils::copyright_year();
	$copyright_link = Whitebox_Settings::get( 'copyright_link' ) != '' ? Whitebox_Settings::get( 'copyright_link' ) : home_url();
	$copyright_text = Whitebox_Settings::get( 'copyright_text' ) != '' ? Whitebox_Settings::get( 'copyright_text' ) : get_bloginfo( 'name' );

	$footer_text = '<span class="copy">&copy; ' . $copyright_year . ' <a href="' . $copyright_link .'">' . $copyright_text . '</a></span>';

	$output = apply_filters('whitebox_footer_text', $footer_text);

	if ( $echo )
		echo $output;

	return $output;
}
endif;
