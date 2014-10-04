<?php
/**
 * Archive page
 */
?>

<?php get_header(); ?>

	<?php get_template_part( 'partials/content', 'start' ); ?>

		<div id="main" role="main">

			<div class="page-archive<?php
				if ( is_day() ) :
					echo ' archive-day';
				elseif ( is_month() ) :
					echo ' archive-month';
				elseif ( is_year() ) :
					echo ' archive-year';
				endif;
			?>">

				<h1 class="entry-title">
				<?php
					if ( is_day() ) :
						printf( __( 'Archives: %s', THEME_DOMAIN ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'Archives: %s', THEME_DOMAIN ), get_the_date( _x( 'F Y', 'monthly archives date format', THEME_DOMAIN ) ) );
					elseif ( is_year() ) :
						printf( __( 'Archives: %s', THEME_DOMAIN ), get_the_date( _x( 'Y', 'yearly archives date format', THEME_DOMAIN ) ) );
					else :
						_e( 'Archives', THEME_DOMAIN );
					endif;
				?>
				</h1>

				<div class="entry-content">
				<?php
				if ( have_posts() ) : ?>
					<div class="posts">
					<?php
						while ( have_posts() ) : the_post();
							get_template_part( 'partials/content', get_post_format() );
						endwhile;
					?>
					</div> <!-- / .posts -->
				<?php whitebox_pagination(); ?>
				<?php	else : ?>
					<p class="title"><?php _e( 'There are no posts to display', THEME_DOMAIN ); ?></p>
				<?php endif; ?>
				</div> <!-- / .entry-content -->

			</div><!-- / .page-search-results -->

		</div> <!-- / #main -->

		<?php get_sidebar(); ?>

	<?php get_template_part( 'partials/content', 'end' ); ?>

<?php get_footer(); ?>
