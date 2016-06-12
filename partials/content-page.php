<?php
/**
 * The template used for displaying page content
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php whitebox_post_thumbnail(); ?>

	<h1 class="entry-title"><?php the_title(); ?></h1>

	<span class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'whitebox' ), '', '' ); ?>
	</span>

	<div class="entry-content">
		<?php
		the_content();

		whitebox_entry_pagination();
		?>
	</div> <!-- / .entry-content -->

	<?php if ( comments_open() || get_comments_number() ) {
		comments_template();
	} ?>

</div> <!-- / #post-## -->
