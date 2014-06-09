<?php
/**
 * Search Results
 */
?>

<?php get_header(); ?>

	<?php get_template_part( 'content', 'start' ); ?>

		<div id="main" role="main">

			<div class="page-search-results">

				<?php
				if ( have_posts() ) : ?>

				<h1 class="entry-title"><?php printf( __( 'Search Results for: %s', THEME_DOMAIN ), get_search_query() ); ?></h1>

				<div class="entry-content">
					<div class="posts">
						<?php
						while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
						endwhile; ?>
					</div> <!-- / .posts -->
					<?php get_template_part( 'pagination' ); ?>
				</div> <!-- / .entry-content -->

				<?php
				else : ?>
					<h1 class="entry-title"><?php printf( __( 'No Results for: %s', THEME_DOMAIN ), get_search_query() ); ?></h1>
					<div class="entry-content">
						<p class="title"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', THEME_DOMAIN ); ?></p>
						<?php get_search_form(); ?>
					</div> <!-- / .entry-content --><?php
				endif;?>

			</div><!-- / .page-search-results -->

		</div> <!-- / #main -->

		<?php get_sidebar(); ?>

	<?php get_template_part( 'content', 'end' ); ?>

<?php get_footer(); ?>
