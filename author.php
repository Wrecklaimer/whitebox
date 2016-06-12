<?php
/**
 * The template for displaying Author archive pages
 */
?>


<?php get_header(); ?>

	<?php get_template_part( 'partials/content', 'start' ); ?>

		<div id="main" role="main">
			<div class="page-author">

				<h1 class="entry-title">
					<?php echo get_the_author_meta( 'display_name' ); ?>
				</h1>

				<div class="entry-content">

					<?php
					get_template_part( 'partials/author-card' );

					get_template_part( 'partials/loop', 'author' );
					?>

				</div><!-- / .entry-content -->
			</div><!-- / .page-author -->

		</div> <!-- / #main -->

		<?php get_sidebar(); ?>

	<?php get_template_part( 'partials/content', 'end' ); ?>

<?php get_footer(); ?>
