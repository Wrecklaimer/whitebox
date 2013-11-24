<?php
/**
 * Page
 */
?>

<?php get_header(); ?>

	<div id="main">
		<div id="page">

			<?php wp_reset_query();

			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post(); ?>

					<h1 class="post-title"><?php the_title(); ?></h1>
					<p class="post-metadata"><?php edit_post_link( __('EDIT', THEME_DOMAIN ), '', ''); ?></p>

					<div class="post-content">
						<?php
						the_content();

						wp_link_pages( array( 'before' => '<p class="post-pagination"><span class="pagination-label">'.__('Pages', THEME_DOMAIN ).':</span> ', 'after' => '</p>', 'next_or_number' => 'number' ) );
						?>
					</div> <!-- / .post-content -->
					<?php

				endwhile;

			else:

				?><p><?php _e('Sorry, no posts matched your criteria.', THEME_DOMAIN ); ?></p><?php

			endif; ?>

		</div> <!-- / #page -->
	</div> <!-- / #main -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>