<?php
/**
 * The Loop
 */
?>

<?php wp_reset_query();

if ( have_posts() ) : ?>

	<ul class="posts posts-list">

		<?php
		while ( have_posts() ) : the_post(); ?>

			<li id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?>>

				<?php whitebox_post_thumbnail( 'whitebox-homepage-thumb' ); ?>

				<div class="content">

					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					<span class="entry-meta">
						<?php whitebox_post_meta(); ?>
					</span>

					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>

				</div> <!-- / .content -->

			</li> <!-- / #post-## -->
			<?php

		endwhile; ?>

	</ul>

	<?php

	get_template_part('pagination' );

else :

	?><p class="title"><?php _e( 'There are no posts to display', THEME_DOMAIN ); ?></p><?php

endif; ?>
