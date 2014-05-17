<?php
/**
 * Comments template
 */


if ( post_password_required() ) { ?>
<p class="no-comments"><?php _e( 'This post is password protected. Enter the password to view comments.', THEME_DOMAIN ); ?></p>
<?php return;
} ?>

<div id="comments" class="comments-area">

<?php if ( have_comments() ) : ?>

	<h2 class="comments-title">
		<?php printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), THEME_DOMAIN ), number_format_i18n( get_comments_number() ) ); ?>
	</h2>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation cf" role="navigation">
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
			'callback'   => 'whitebox_comment'
		) );
		?>
	</ol><!-- / .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation cf" role="navigation">
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', THEME_DOMAIN ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', THEME_DOMAIN ) ); ?></div>
	</nav><!-- / #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( !comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', THEME_DOMAIN ); ?></p>
	<?php endif; ?>

<?php endif; // have_comments() ?>

<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$req_text = '(required)';
$aria_req = ( $req ? " aria-required='true' required" : '' );
$size = 35;

$comments_args = array(
	'title_reply'         => __( 'Leave a Comment', THEME_DOMAIN ),
	'title_reply_to'      => __( 'Reply to %s', THEME_DOMAIN ),
	'cancel_reply_link'   => __( 'Cancel Reply', THEME_DOMAIN ),
	'label_submit'        => __( 'Add Comment', THEME_DOMAIN ),
	'fields'              => apply_filters( 'comment_form_default_fields', array(
		'author' =>
			'<div class="comment-form-author">' .
			'<label for="author">' . __( 'Name', THEME_DOMAIN ) . ( $req ? ' <span class="required">' . $req_text . '</span>' : '' ) . '</label>' .
			'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			'" size="' . $size . '" tabindex="1"' . $aria_req . ' />' .
			'</div>',
		'email' =>
			'<div class="comment-form-email">
			<label for="email">' . __( 'Email', THEME_DOMAIN ) . ( $req ? ' <span class="required">' . $req_text . '</span>' : '' ) . '</label>' .
			'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			'" size="' . $size . '" tabindex="2"' . $aria_req . ' />' .
			'</div>',
		'url' =>
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
?>

</div><!-- / #comments -->
