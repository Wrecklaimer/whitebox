<?php
/**
 * The template for displaying all pages
 */
?>

<?php get_header(); ?>

	<?php get_template_part( 'content', 'start' ); ?>

		<div id="main" role="main">
		<?php
		if ( have_posts() ) :
			// Start the Loop
			while ( have_posts() ) :
				the_post();
				get_template_part( 'content', 'page' );
			endwhile;
		else: ?>
			<p><?php _e( 'Sorry, no pages matched your criteria.', THEME_DOMAIN ); ?></p>
		<?php
		endif; ?>
		</div> <!-- / #main -->

		<?php get_sidebar(); ?>

	<?php get_template_part( 'content', 'end' ); ?>

<?php get_footer(); ?>
