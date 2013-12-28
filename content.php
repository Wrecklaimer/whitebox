<?php
/**
 * The default template for displaying content
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h1 class="post-title"><?php the_title(); ?></h1>

	<span class="post-metadata">
		<?php if ( Whitebox_Settings::get( 'show_post_author' ) ) { ?>
		<span class="post-author"><?php _e( 'By ', THEME_DOMAIN); the_author_posts_link(); ?></span>
		<?php } ?>
		<?php if ( Whitebox_Settings::get( 'show_post_date' ) ) { ?>
		<span class="post-date"><?php _e( ' on ', THEME_DOMAIN ); the_date(); ?> <?php the_time(); ?></span>
		<?php } ?>
		<?php if ( Whitebox_Settings::get( 'show_post_category' ) ) { ?>
		<span class="post-categories"><?php _e(' on ', THEME_DOMAIN ); the_category( ', ' ); ?></span>
		<?php } ?>
		<?php edit_post_link( __( 'Edit', THEME_DOMAIN), ' | ', '' ); ?>
	</span>

	<div class="post-content">
		<?php the_content();

		wp_link_pages( array( 'before' => '<p class="post-pagination"><span class="pagination-label">' . __('Pages', THEME_DOMAIN) . ':</span> ', 'after' => '</p>', 'next_or_number' => 'number' ) );

		the_tags( '<p class="tags"><span class="tags-label">' . __( 'Tags', THEME_DOMAIN ) . ':</span> ', ', ', '</p>' );
		?>
	</div><!-- / .post-content -->

	<?php if ( comments_open() || get_comments_number() ) {
		comments_template();
	} ?>

</div> <!-- / #post-## -->
