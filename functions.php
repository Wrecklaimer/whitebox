<?php
/**
 * Theme Functions and Framework Integration
 */


/* Framework Core */
require_once get_template_directory() . '/inc/framework/init.php';


/* Paths to Theme Assets */
define( 'THEME_ASSETS', get_template_directory_uri() . '/assets' );
define( 'THEME_JS', THEME_ASSETS . '/js' );
define( 'THEME_CSS', THEME_ASSETS . '/css' );


/* Theme text domain */
define( 'THEME_DOMAIN', strtolower( wp_get_theme( get_template() )->Name ) );


/* Theme Components */
// Widget sidebars
include_once 'inc/sidebars.php';
// Custom menus
include_once 'inc/menus.php';
// Custom template tags
include_once 'inc/template-tags.php';


/* Use minified theme stylesheet instead */
add_filter( 'stylesheet_uri', 'min_stylesheet_uri', 10, 2 );
function min_stylesheet_uri( $stylesheet_uri, $stylesheet_dir_uri ) {
	$min_stylesheet_uri = $stylesheet_dir_uri . '/style.min.css';

	if ( file_exists( get_template_directory() . '/style.min.css' ) )
		return $min_stylesheet_uri;
	else
		return $stylesheet_uri;
}


/* Include jQuery and dependent scripts */
function whitebox_jquery_enqueue() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'responsive-menu', THEME_JS . '/lib/jquery.responsive-menu.min.js', false, null, true );
}
if ( !is_admin() ) add_action( 'wp_enqueue_scripts', 'whitebox_jquery_enqueue', 10 );

function whitebox_menu_init() {
    echo '<script type="text/javascript">jQuery(function ($) { $("#primary-nav").responsivemenu(); });</script>';
}
add_action('wp_footer', 'whitebox_menu_init', 20);


/* Set content width */
if ( !isset( $content_width ) ) $content_width = 960;


/* Add featured images to posts and pages */
add_theme_support( 'post-thumbnails' );

add_image_size( 'whitebox-homepage-thumb', 540, 999 );


/* Add RSS feed links for posts and comments */
add_theme_support( 'automatic-feed-links' );


/* WP Caption Width Fix */
function wpse14305_img_caption( $empty_string, $attributes, $content ) {
	extract( shortcode_atts( array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	), $attributes ) );
	if ( empty( $caption ) )
		return $content;
	if ( $id ) $id = 'id="' . esc_attr( $id ) . '" ';
	return '<div ' . $id . 'class="wp-caption ' . esc_attr( $align ) . '" style="width: ' . ((int) $width) . 'px">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}
add_filter( 'img_caption_shortcode', 'wpse14305_img_caption', 10, 3 );


/* Add comment-reply.js */
function add_comment_reply_js() {
	if ( !is_admin() && is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'add_comment_reply_js' );


/* Add basic WooCommerce support */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'wb_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'wb_theme_wrapper_end', 10);

function wb_theme_wrapper_start() { 
	get_template_part( 'partials/content', 'start' ); ?>
	<div id="main">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
}

function wb_theme_wrapper_end() { ?>
		</div> <!-- / #post-## -->
	</div> <!-- / #main -->
	<?php get_sidebar(); ?>
	<?php get_template_part( 'partials/content', 'end' );
}
