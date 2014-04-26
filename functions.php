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
require_once get_template_directory() . '/inc/sidebars.php';
// Custom menus
require_once get_template_directory() . '/inc/menus.php';
// Custom template tags
require get_template_directory() . '/inc/template-tags.php';


/* Use minified theme stylesheet instead */
add_filter( 'stylesheet_uri', 'min_stylesheet_uri', 10, 2 );
function min_stylesheet_uri( $stylesheet_uri, $stylesheet_dir_uri ) {
	return $stylesheet_dir_uri.'/style.min.css';
}


/* Include jQuery and dependent scripts */
function whitebox_jquery_enqueue() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'responsive-menu', THEME_JS . '/jquery.responsive-menu.min.js', false, null );
}
if ( !is_admin() ) add_action( 'wp_enqueue_scripts', 'whitebox_jquery_enqueue', 10 );


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
add_action( 'wp_print_scripts', 'add_comment_reply_js' );
