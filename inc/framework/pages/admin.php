<?php
/* Check that the user is allowed to update options */
if ( !current_user_can( 'edit_theme_options' ) ) {
	wp_die( 'You do not have sufficient permissions to access this page.' );
} ?>

<div id="admin-wrap" class="wrap">

	<div id="admin-header">
		<div id="admin-theme">
			<h2><?php echo Whitebox::$themeName ?> Settings</h2>
			<?php settings_errors(); ?>
		</div>
	</div><!-- / #admin-header -->

	<div id="admin-form">
		<form method="post" action="options.php">
			<?php
			settings_fields( Whitebox_Settings::$settings_name );
			Whitebox_Settings::display_settings_sections( Whitebox_Settings::$settings_name );
			?>
			<p class="submit">
				<?php submit_button('Save Settings', 'primary', 'submit', false ); ?> <?php submit_button( 'Reset', 'secondary', Whitebox_Settings::$settings_name.'[reset]', false, array( 'id' => 'reset' ) ); ?>
			</p>
		</form>
	</div><!-- / #admin-form -->

	<script type="text/javascript">
		jQuery(function ($) {
			$(document).ready(function() {
				$('input[id="reset"]').click(function(e) {
					if (!confirm("Settings will be reset back to their defaults, and all current settings will be lost.\n\nThis cannot be undone.")) {
						e.preventDefault();
					}
				});
			});
		});
	</script>

</div><!-- / #admin-wrap -->
