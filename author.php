<?php
/**
 * The template for displaying Author archive pages
 */
?>


<?php get_header(); ?>

	<?php get_template_part( 'partials/content', 'start' ); ?>

		<div id="main" role="main">
			<div class="page-author">

				<h1 class="entry-title">
					<?php _e( get_the_author_meta( 'display_name' ), THEME_DOMAIN ); ?>
				</h1>

				<div class="entry-content">

					<div class="author-info cf">
						<div class="author-image">
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

					</div>

					<?php
					if ( have_posts() ) : ?>
						<div class="author-posts">
							<h2>Posts by this Author</h2>
						<?php
						while ( have_posts() ) : the_post();
							get_template_part( 'partials/content', get_post_format() );
						endwhile;

						get_template_part( 'partials/pagination' );
						?>
						</div>
					<?php endif; ?>
				</div><!-- / .entry-content -->
			</div><!-- / .page-author -->

		</div> <!-- / #main -->

		<?php get_sidebar(); ?>

	<?php get_template_part( 'partials/content', 'end' ); ?>

<?php get_footer(); ?>
