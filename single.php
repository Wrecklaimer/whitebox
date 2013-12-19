<?php
/**
 * Single Post
 */
?>

<?php get_header();

$template = get_post_meta($post->ID, 'post_template', true); ?>

	<div id="main">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php wp_reset_query();

		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post(); ?>

				<h1 class="post-title"><?php the_title(); ?></h1>

				<span class="post-metadata">
					<?php if ( Whitebox_Settings::get( 'show_post_author' ) ) { ?>
					<span class="post-author"><?php _e('By ', THEME_DOMAIN); the_author_posts_link(); ?></span>
					<?php } ?>
					<?php if ( Whitebox_Settings::get( 'show_post_date' ) ) { ?>
					<span class="post-date"><?php _e(' on ', THEME_DOMAIN); the_date(); ?> <?php the_time(); ?></span>
					<?php } ?>
					<?php if ( Whitebox_Settings::get( 'show_post_category' ) ) { ?>
					<span class="post-categories"><?php _e(' on ', THEME_DOMAIN); the_category(', '); ?></span>
					<?php } ?>
					<?php edit_post_link( __('EDIT', THEME_DOMAIN), ' | ', ''); ?>
				</span>

				<div class="post-content">
					<?php the_content();

					wp_link_pages( array( 'before' => '<p class="post-pagination"><span class="pagination-label">' . __('Pages', THEME_DOMAIN) . ':</span> ', 'after' => '</p>', 'next_or_number' => 'number' ) );

					the_tags( '<p class="tags"><span class="tags-label">' . __('Tags', THEME_DOMAIN) . ':</span> ', ', ', '</p>' );
					?>
				</div><!-- / .post-content -->

				<?php comments_template();

			endwhile;

		else: ?>

			<p><?php _e('Sorry, no posts matched your criteria.', THEME_DOMAIN); ?></p><?php

		endif; ?>

		</div> <!-- / #post -->
	</div> <!-- / #main -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>