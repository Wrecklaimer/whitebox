<?php
/**
 * Initializing Widgetized Areas (Sidebars)
 */


$before_widget = '<div id="%1$s" class="widget %2$s">';
$after_widget  = '</div>';
$before_title  = '<h3 class="widget-title">';
$after_title   = '</h3>';

register_sidebar( array(
	'name'          => __( 'Pre Content', 'whitebox' ),
	'id'            => 'sidebar-pre-content',
	'description'   => __( 'Displays widgets before the content.', 'whitebox' ),
	'before_widget'	=> $before_widget,
	'after_widget' 	=> $after_widget,
	'before_title' 	=> $before_title,
	'after_title'  	=> $after_title,
) );

register_sidebar( array(
	'name'          => __( 'Sidebar', 'whitebox' ),
	'id'            => 'sidebar-primary',
	'description'   => __( 'Displays widgets to the side of the post content.', 'whitebox' ),
	'before_widget' => $before_widget,
	'after_widget'  => $after_widget,
	'before_title'  => $before_title,
	'after_title'   => $after_title,
) );

register_sidebar( array(
	'name'          => __( 'Footer Column 1', 'whitebox' ),
	'id'            => 'sidebar-footer-1',
	'description'   => __( 'Displays widgets in the first column of the footer.', 'whitebox' ),
	'before_widget' => $before_widget,
	'after_widget'  => $after_widget,
	'before_title'  => $before_title,
	'after_title'   => $after_title,
) );

register_sidebar( array(
	'name'          => __( 'Footer Column 2', 'whitebox' ),
	'id'            => 'sidebar-footer-2',
	'description'   => __( 'Displays widgets in the second column of the footer.', 'whitebox' ),
	'before_widget' => $before_widget,
	'after_widget'  => $after_widget,
	'before_title'  => $before_title,
	'after_title'   => $after_title,
) );

register_sidebar( array(
	'name'          => __( 'Footer Column 3', 'whitebox' ),
	'id'            => 'sidebar-footer-3',
	'description'   => __( 'Displays widgets in the third column of the footer.', 'whitebox' ),
	'before_widget' => $before_widget,
	'after_widget'  => $after_widget,
	'before_title'  => $before_title,
	'after_title'   => $after_title,
) );

register_sidebar( array(
	'name'          => __( 'Footer Column 4', 'whitebox' ),
	'id'            => 'sidebar-footer-4',
	'description'   => __( 'Displays widgets in the fourth column of the footer.', 'whitebox' ),
	'before_widget' => $before_widget,
	'after_widget'  => $after_widget,
	'before_title'  => $before_title,
	'after_title'   => $after_title,
) );
