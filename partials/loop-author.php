<?php
/**
 * The Loop - Author Posts
 */
?>

<?php wp_reset_query();

if ( have_posts() ) : ?>
<div class="author-posts">
	<h2>Posts by this Author</h2>
	<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'partials/content', get_post_format() );
	endwhile;

	whitebox_pagination();
	?>
</div>
<?php endif; ?>
