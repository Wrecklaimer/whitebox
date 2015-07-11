<?php
/**
 * The template for author information
 */
?>

<div id="<?php echo 'author-'.get_the_author_meta( 'ID' ); ?>" class="author-card">
	<div class="author-avatar">
	<?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?>
	</div>

	<?php if ( get_the_author_meta( 'description' ) ) : ?>
	<div class="author-description">
	<?php the_author_meta( 'description' ); ?>
	</div>
	<?php endif; ?>

	<div class="author-links">
		<ul>
			<li class="link-email"><a href="mailto:<?php echo get_the_author_meta( 'user_email' ); ?>">Email</a></li>
			<li class="link-website"><a href="<?php echo get_the_author_meta( 'user_url' ); ?>">Website</a></li>
		</ul>
	</div>

</div><!-- / #author-## -->
