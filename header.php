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

	<title><?php whitebox_title(); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/lib/normalize.min.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php whitebox_favicon(); ?>

	<?php wp_head(); ?>

</head>

<body <?php body_class() ?>>

	<div id="page">

		<div id="header-wrap" class="wrap">
			<div id="header" class="row cf">

				<?php if ( has_nav_menu( 'top' ) ) : ?>
				<div id="pre-menu-wrap">
					<?php wp_nav_menu( array( 'container' => 'nav', 'container_id' => 'top-nav', 'container_class' => 'dropdown nav cf', 'menu_class' => 'dropdown menu', 'sort_column' => 'menu_order', 'theme_location' => 'top', 'fallback_cb' => 'false' ) ); ?>
				</div><!-- / #pre-menu-wrap -->
				<?php endif; ?>

				<div id="logo">
					<?php
					if ( Whitebox_Settings::get( 'header_logo' ) ) :
						whitebox_header_logo();
					else :
						whitebox_header_title();
					endif; ?>
					<?php
					if ( Whitebox_Settings::get( 'show_site_description' ) ) : ?>
					<span id="site-description"><?php bloginfo('description'); ?></span>
					<?php endif; ?>
				</div><!-- / #logo -->

				<a id="primary-nav-button" href="#">Menu</a>
				<div id="menu-wrap">
					<?php wp_nav_menu( array( 'container' => 'nav', 'container_id' => 'primary-nav', 'container_class' => 'dropdown nav cf', 'menu_class' => 'dropdown menu', 'sort_column' => 'menu_order', 'theme_location' => 'primary' ) ); ?>
				</div><!-- / #menu-wrap -->

			</div><!-- / #header -->
		</div><!-- / #header-wrap -->
