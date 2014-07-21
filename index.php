<?php
/**
 * Index site frontpage
 */
?>

<?php get_header(); ?>

	<?php
	if ( is_active_sidebar( 'sidebar-pre-content' ) && is_home() && $paged < 2 ) : ?>
	<div id="pre-content-wrap" class="wrap">
		<div id="pre-content" class="row">
		<?php if ( function_exists( 'dynamic_sidebar' ) ) dynamic_sidebar( 'sidebar-pre-content' ); ?>
		</div><!-- / #pre-content -->
	</div><!-- / #pre-content-wrap -->
	<?php endif; ?>

	<?php get_template_part( 'partials/content', 'start' ); ?>

		<div id="main" <?php echo ( Whitebox_Settings::get( 'show_homepage_sidebar' ) ) ? '' : 'class="wide"' ?> role="main">
			<?php if ( Whitebox_Settings::get( 'show_recent_posts' ) ) get_template_part( 'partials/loop' ); ?>
		</div><!-- end #main -->

		<?php if ( Whitebox_Settings::get( 'show_homepage_sidebar' ) ) get_sidebar(); ?>

	<?php get_template_part( 'partials/content', 'end' ); ?>

<?php get_footer(); ?>