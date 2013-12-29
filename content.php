<?php
/**
 * The default template for displaying content
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h1 class="post-title"><?php the_title(); ?></h1>

	<span class="post-metadata">
		<?php whitebox_post_meta(); ?>
	</span>

	<div class="post-content">
		<?php the_content();

		whitebox_entry_pagination();

		whitebox_entry_tags();
		?>
	</div><!-- / .post-content -->

	<?php if ( comments_open() || get_comments_number() ) {
		comments_template();
	} ?>

</div> <!-- / #post-## -->
