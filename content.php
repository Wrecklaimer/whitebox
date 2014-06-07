<?php
/**
 * The default template for displaying content
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if ( !is_search() ) :
	whitebox_post_thumbnail();
	endif;

	if ( is_singular() ) : ?>
	<h1 class="entry-title"><?php the_title(); ?></h1><?php
	else: ?>
	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
	</h2><?php
	endif; ?>

	<span class="entry-meta">
		<?php whitebox_post_meta(); ?>
	</span>

	<?php
	if ( is_singular() ) : ?>
	<div class="entry-content"><?php
		the_content();
		whitebox_entry_pagination();
		whitebox_entry_tags(); ?>
	</div><!-- / .entry-content --><?php
	else: ?>
	<div class="entry-summary"><?php
		the_excerpt(); ?>
	</div><!-- / .entry-summary --><?php
	endif;

	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif; ?>

</div> <!-- / #post-## -->
