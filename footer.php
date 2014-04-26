<?php
/**
 * Footer section
 */
?>

			</div><!-- / #content -->
		</div><!-- / #content-wrap -->

		<div id="footer-wrap" class="wrap">

			<?php
			if ( is_active_sidebar( 'sidebar-footer-1' )
				|| is_active_sidebar( 'sidebar-footer-2' )
				|| is_active_sidebar( 'sidebar-footer-3' )
				|| is_active_sidebar( 'sidebar-footer-4' )
			) : ?>
			<div id="pre-footer" class="row four-column cf">
				<div class="column first">
					<?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar('sidebar-footer-1'); ?>
				</div>
				<div class="column">
					<?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar('sidebar-footer-2'); ?>
				</div>
				<div class="column">
					<?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar('sidebar-footer-3'); ?>
				</div>
				<div class="column last">
					<?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar('sidebar-footer-4'); ?>
				</div>
			</div><!-- / #preFooter -->
			<?php endif; ?>

			<div id="footer" class="row cf">
				<span class="copy">&copy; <?php Whitebox_Utils::copyright_year( true ); ?> <a href="
				<?php echo Whitebox_Settings::get( 'copyright_link' ) != '' ? Whitebox_Settings::get( 'copyright_link' ) : home_url(); ?>">
				<?php Whitebox_Settings::get( 'copyright_text' ) != '' ? Whitebox_Settings::get( 'copyright_text', true ) : bloginfo( 'name' ); ?>
				</a></span>

				<div id="footer-menu-wrap">
					<?php wp_nav_menu( array('container' => 'nav', 'container_id' => 'footer-nav', 'container_class' => 'nav cf', 'menu_class' => 'menu', 'sort_column' => 'menu_order', 'theme_location' => 'footer', 'fallback_cb' => 'false' ) ); ?>
				</div><!-- / #footer-menu-wrap -->
			</div><!-- / #footer -->

		</div><!-- / #footer-wrap -->

	</div><!-- / #page -->

	<?php wp_footer(); ?>

</body>
</html>
