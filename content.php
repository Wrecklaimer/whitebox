<?php
/**
 * The default template for displaying content
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php whitebox_post_thumbnail(); ?>

	<h1 class="entry-title"><?php the_title(); ?></h1>

	<span class="entry-meta">
		<?php whitebox_post_meta(); ?>
	</span>

	<div class="entry-content">
		<?php
		the_content();

		whitebox_entry_pagination();

		whitebox_entry_tags();
		?>
	</div><!-- / .entry-content -->

	<?php
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif; ?>

</div> <!-- / #post-## -->
