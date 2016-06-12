<?php
/**
 * Comments template
 */


if ( post_password_required() ) { ?>
<p class="no-comments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'whitebox' ); ?></p>
<?php return;
} ?>

<div id="comments" class="comments-area">

<?php if ( have_comments() ) : ?>

	<h2 class="comments-title">
		<?php printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'whitebox' ), number_format_i18n( get_comments_number() ) ); ?>
	</h2>

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

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	whitebox_comments_nav();
	endif; // Check for comment navigation. ?>

	<?php if ( !comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'whitebox' ); ?></p>
	<?php endif; ?>

<?php endif; // have_comments() ?>

<?php whitebox_comment_form(); ?>

</div><!-- / #comments -->
