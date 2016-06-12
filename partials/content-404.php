<?php
/**
 * The template used for displaying 404 page content
 */
?>

<div class="page-404-not-found">

	<h1 class="entry-title"><?php _e( 'Page Not Found', 'whitebox' ); ?></h1>

	<div class="entry-content">
		<p><?php _e( 'It looks like there\'s nothing here... Maybe try a search?', 'whitebox' ); ?></p>
		<?php get_search_form(); ?>
	</div> <!-- / .entry-content -->

</div>
