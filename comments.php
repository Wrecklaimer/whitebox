<?php
/**
 * Comments
 */
?>

<?php
// Do not delete these lines
if ( !empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
	<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
	return;
}
?>

<?php
if ( have_comments() ) { ?>
	<div id="comments-post"><a name="commentspost"></a>
		<h3 class="title">
			<?php
			if ( get_comments_number() > 1 ) {
				echo number_format_i18n( get_comments_number() );
				_e(' Comments', THEME_DOMAIN);
			}
			else {
				_e('1 Comment', THEME_DOMAIN);
			} ?>
		</h2>
		<ol class="comments-list">
			<?php wp_list_comments('type=all&avatar_size=60'); ?>
		</ol>
	</div><!-- end #commentspost -->
<?php
} else {
	if ( comments_open() ) { ?>
		<!-- If comments are open, but there are no comments. -->
		<div id="comments-post">
			<h2 class="title"><?php _e('No Comments', THEME_DOMAIN); ?></h2>
			<p><?php _e('Be the first one to leave a comment', THEME_DOMAIN); ?>.</p>
		</div>
	<?php
	} else { ?>
		<!-- If comments are closed. -->
	<?php
	} ?>
<?php
} ?>

<?php
if ( comments_open() ) : ?>
	<div id="respond">
	<h2 class="title"><?php comment_form_title( __('Leave a Comment', THEME_DOMAIN), __('Leave a Reply to %s', THEME_DOMAIN) ); ?></h2>
	<div class="cancel-comment-reply"><p><?php cancel_comment_reply_link('Cancel Reply'); ?></p></div>
	<?php
	if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p><?php _e('You must be', THEME_DOMAIN); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in', THEME_DOMAIN); ?></a> <?php _e('to post a comment.', THEME_DOMAIN); ?></p>
	<?php
	else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment-form">
		<?php
		if ( $user_ID ) : ?>
			<p><?php _e('Logged in as', THEME_DOMAIN); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Log out', THEME_DOMAIN); ?> &raquo;</a></p>
			<?php
		else : ?>
			<div id="comment-form-labels">
				<label for="author"><?php _e('Name', THEME_DOMAIN); ?>:</label>
				<input type="text" name="author" id="comment-author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true' required"; ?> /><br />

				<label for="email"><?php _e('E-Mail',  THEME_DOMAIN); ?>:</label>
				<input type="email" name="email" id="comment-email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true' required"; ?> /><br />

				<label for="url"><?php _e('Website', THEME_DOMAIN); ?>:</label>
				<input type="url" name="url" id="comment-url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /><br />
			</div>
			<?php
		endif; ?>

		<div id="comment-form-content">
			<textarea name="comment" id="comment" tabindex="4" cols="100" rows="4"></textarea>
			<input name="submit" type="submit" id="comment-submit" value="<?php _e('Add Comment', THEME_DOMAIN); ?>" />
		</div>
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>
		</form>
		<?php
	endif; ?>
	</div>
	<?php
endif; ?>