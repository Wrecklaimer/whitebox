<?php
/**
 * The default template for displaying content
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if ( !is_search() && !is_archive() && !is_author() ) :
	whitebox_post_thumbnail();
	endif;

	$heading_level = 2;
	if ( is_singular() ) : // single post/page
		$heading_level = 1;
	elseif ( is_author() ) : // author posts list
		$heading_level = 3;
	endif; ?>

	<h<?php echo $heading_level ?> class="entry-title"><?php
		if ( is_singular() ) :
			the_title();
		else : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		<?php endif; ?>
	</h<?php echo $heading_level ?>>

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
