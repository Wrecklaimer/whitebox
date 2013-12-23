<?php
/**
 * Theme Functions and Framework Integration
 */


/* Paths to Framework Functions */
//define('INC', get_template_directory() . '/inc'); /* Required */
//define('FRAMEWORK_INC', INC . '/framework'); /* Required */
//define('FRAMEWORK_URI', get_template_directory_uri() . '/inc/framework'); /* Required */

/* Framework Core */
require_once get_template_directory() . '/inc/framework/init.php';

/* Paths to Theme Assets */
define( 'THEME_ASSETS', get_template_directory_uri() . '/assets' );
define( 'THEME_JS', THEME_ASSETS . '/js' );
define( 'THEME_CSS', THEME_ASSETS . '/css' );

define( 'THEME_DOMAIN', strtolower( wp_get_theme( get_template() )->Name ) );

/* Theme Components */
require_once get_template_directory() . '/inc/sidebars.php';
require_once get_template_directory() . '/inc/menus.php';

/* Include jQuery and dependent scripts */
if ( !is_admin() ) add_action( 'wp_enqueue_scripts', 'whitebox_jquery_enqueue', 10 );

function whitebox_jquery_enqueue() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'responsivenav', THEME_JS . '/jquery.responsivenav.min.js', false, null );
}

/* WP Caption Width Fix */
add_filter( 'img_caption_shortcode', 'wpse14305_img_caption', 10, 3 );

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

/* Add comment-reply.js */
function add_comment_reply_js() {
	if ( !is_admin() && is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}

add_action( 'wp_print_scripts', 'add_comment_reply_js' );
