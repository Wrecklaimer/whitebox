<?php
/**
 * The template used for displaying page content
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h1 class="post-title"><?php the_title(); ?></h1>

	<span class="post-metadata">
		<?php edit_post_link( __( 'EDIT', THEME_DOMAIN ), '', ''); ?>
	</span>

	<div class="post-content">
		<?php the_content();

		wp_link_pages( array( 'before' => '<p class="post-pagination"><span class="pagination-label">'.__('Pages', THEME_DOMAIN ).':</span> ', 'after' => '</p>', 'next_or_number' => 'number' ) );
		?>
	</div> <!-- / .post-content -->

	<?php if ( comments_open() || get_comments_number() ) {
		comments_template();
	} ?>

</div> <!-- / #post-## -->
