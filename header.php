<?php
/**
 * Header section
 */
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">

	<title><?php Whitebox_Utils::title(); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/normalize.min.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( Whitebox_Settings::get( 'favicon' ) ) : ?>
	<link rel="shortcut icon" href="<?php Whitebox_Settings::get( 'favicon', true ); ?>" type="image/x-icon" />
	<?php endif; ?>

	<?php wp_head(); ?>

</head>

<body <?php body_class() ?>>

	<div id="page">

		<div id="header-wrap" class="wrap">
			<div id="header" class="row cf">

				<div id="pre-menu-wrap">
					<?php wp_nav_menu( array( 'container' => 'nav', 'container_id' => 'top-nav', 'container_class' => 'dropdown nav cf', 'menu_class' => 'dropdown menu', 'sort_column' => 'menu_order', 'theme_location' => 'top', 'fallback_cb' => 'false' ) ); ?>
				</div><!-- / #pre-menu-wrap -->

				<div id="logo">
					<?php
					if ( Whitebox_Settings::get( 'header_logo' ) ) : ?>
					<a href="<?php echo home_url(); ?>" >
						<img src="<?php esc_url( Whitebox_Settings::get( 'header_logo', true ) ); ?>" alt="<?php bloginfo('name'); ?>" />
					</a>
					<?php
					else : ?>
					<h1 id="site-title">
						<a href="<?php echo home_url(); ?>" ><?php bloginfo('name'); ?></a>
					</h1>
					<?php endif; ?>
					<?php
					if ( Whitebox_Settings::get( 'show_site_description' ) ) : ?>
					<h2 id="site-description"><?php bloginfo('description'); ?></h2>
					<?php endif; ?>
				</div><!-- / #logo -->

				<a id="primary-nav-button" href="#">Menu</a>
				<div id="menu-wrap">
					<?php wp_nav_menu( array( 'container' => 'nav', 'container_id' => 'primary-nav', 'container_class' => 'dropdown nav cf', 'menu_class' => 'dropdown menu', 'sort_column' => 'menu_order', 'theme_location' => 'primary' ) ); ?>
					<script>
						jQuery(function ($) {
							$('#primary-nav').responsivemenu();
						});
					</script>
				</div><!-- / #menu-wrap -->

			</div><!-- / #header -->
		</div><!-- / #header-wrap -->
