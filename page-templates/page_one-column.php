<?php
/**
 * The template for displaying a page without a sidebar
 * Template Name: One Column
 */
?>

<?php get_header(); ?>

	<?php get_template_part( 'partials/content', 'start' ); ?>

		<div id="main" class="wide" role="main">
		<?php
		if ( have_posts() ) :
			// Start the Loop
			while ( have_posts() ) : the_post();
				get_template_part( 'partials/content', 'page' );
			endwhile;
		else: ?>
			<p><?php _e( 'Sorry, no pages matched your criteria.', 'whitebox' ); ?></p>
		<?php
		endif; ?>
		</div> <!-- / #main -->

	<?php get_template_part( 'partials/content', 'end' ); ?>

<?php get_footer(); ?>
