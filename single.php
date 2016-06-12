<?php
/**
 * The template for displaying all single posts
 */
?>

<?php get_header(); ?>

	<?php get_template_part( 'partials/content', 'start' ); ?>

		<div id="main" role="main">
		<?php
		if ( have_posts() ) :
			// Start the Loop
			while ( have_posts() ) : the_post();
				get_template_part( 'partials/content', get_post_format() );
			endwhile;
		else: ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.', 'whitebox' ); ?></p>
		<?php
		endif; ?>
		</div> <!-- / #main -->

		<?php get_sidebar(); ?>

	<?php get_template_part( 'partials/content', 'end' ); ?>

<?php get_footer(); ?>
