<?php
/**
 * Index site frontpage
 */
?>

<?php get_header(); ?>

	<div id="main" <?php echo ( Whitebox_Settings::get( 'show_homepage_sidebar' ) ) ? '' : 'class="wide"' ?> role="main">

		<?php if ( Whitebox_Settings::get( 'show_recent_posts' ) ) get_template_part('loop'); ?>

	</div><!-- end #main -->

	<?php if ( Whitebox_Settings::get( 'show_homepage_sidebar' ) ) get_sidebar(); ?>

<?php get_footer(); ?>