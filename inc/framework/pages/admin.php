<?php
/* Check that the user is allowed to update options */
if ( !current_user_can( 'manage_options' ) ) {
	wp_die( 'You do not have sufficient permissions to access this page.' );
}
?>

<div id="admin-wrap" class="wrap">

	<div id="admin-header">
		<div id="admin-theme">
			<?php screen_icon( 'options-general' ); ?>
			<h2><?php echo Whitebox::$themeName ?> Settings</h2>
		</div>
	</div><!-- / #admin-header -->

	<?php settings_errors(); ?>
	<div id="admin-form">
		<form method="post" action="options.php">
			<?php
			settings_fields( Whitebox_Settings::$settings_name );
			Whitebox_Settings::display_settings_sections( Whitebox_Settings::$settings_name );
			submit_button();
			?>
		</form>
	</div><!-- / #admin-form -->

</div><!-- / #admin-wrap -->