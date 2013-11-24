<?php
/**
 * The Loop
 */
?>

<?php wp_reset_query();

if ( have_posts() ) :

	$i = 0;

	?>
	<ul class="posts posts-list">

		<?php
		while ( have_posts() ) :

			the_post();
			$i++;

			?>
			<li class="cf">

			<?php if ( Whitebox_Settings::get( 'show_post_thumbnails' ) && has_post_thumbnail( $post->ID ) ) { ?>
				<div class="cover">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); ?>
					</a>
				</div><?php
			} ?>

				<div class="content">
					<h2 class="post-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					<span class="post-metadata"><?php
						_e('By ', THEME_DOMAIN ); the_author_posts_link();
						_e(' on ', THEME_DOMAIN ); the_date(); echo ' '; the_time(); ?>
					</span>

					<div class="post-content">
					<?php the_excerpt(); ?>
					</div>

				</div> <!-- / .content -->

			</li><?php

		endwhile; ?>

	</ul>

	<?php

	get_template_part('pagination');

else :

	?><p class="title"><?php _e('There are no posts to display', THEME_DOMAIN); ?></p><?php

endif;
?>