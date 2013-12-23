<?php
/**
 * Comments template
 */


if ( post_password_required() ) { ?>
	<p class="no-comments"><?php _e( 'This post is password protected. Enter the password to view comments.', THEME_DOMAIN ); ?></p>
	<?php return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

	<h2 class="comments-title">
		<?php
			printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), THEME_DOMAIN ), number_format_i18n( get_comments_number() ) );
		?>
	</h2>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', THEME_DOMAIN ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', THEME_DOMAIN ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', THEME_DOMAIN ) ); ?></div>
	</nav><!-- / #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size'=> 64,
			) );
		?>
	</ol><!-- / .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', THEME_DOMAIN ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', THEME_DOMAIN ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', THEME_DOMAIN ) ); ?></div>
	</nav><!-- / #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', THEME_DOMAIN ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true' required" : '' );

	$comments_args = array(
		'title_reply'         => __( 'Leave a Comment' ),
		'title_reply_to'      => __( 'Reply to %s' ),
		'cancel_reply_link'   => __( 'Cancel Reply' ),
		'label_submit'        => __( 'Add Comment' ),
		'fields'              => apply_filters( 'comment_form_default_fields', array(
			'author' =>
				'<p class="comment-form-author">' .
				'<label for="author">' . __( 'Name', THEME_DOMAIN ) . '</label> ' .
				( $req ? '<span class="required">*</span>' : '' ) .
				'<br/><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
				'" size="30" tabindex="1"' . $aria_req . ' /></p>',
			'email' =>
				'<p class="comment-form-email"><label for="email">' . __( 'Email', THEME_DOMAIN ) . '</label> ' .
				( $req ? '<span class="required">*</span>' : '' ) .
				'<br/><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30" tabindex="2"' . $aria_req . ' /></p>',
			'url' =>
				'<p class="comment-form-url"><label for="url">' .
				__( 'Website', THEME_DOMAIN ) . '</label>' .
				'<br/><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
				'" size="30" tabindex="3" /></p>'
			)
		),
		'comment_field'       => '<p class="comment-form-comment"><textarea id="comment" name="comment" tabindex="4" cols="100" rows="4" aria-required="true"></textarea></p>',
		'comment_notes_after' => '',0
	);

		comment_form( $comments_args );
	?>

</div><!-- / #comments -->
