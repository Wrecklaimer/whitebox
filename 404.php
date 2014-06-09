<?php
/**
 * 404 page (Not Found)
 */
?>

<?php get_header(); ?>

	<?php get_template_part( 'content', 'start' ); ?>

		<div id="main" class="wide" role="main">
			<?php get_template_part( 'content', '404' ); ?>
		</div> <!-- / #main.wide -->

	<?php get_template_part( 'content', 'end' ); ?>

<?php get_footer(); ?>
