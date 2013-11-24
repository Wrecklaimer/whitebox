<?php
/**
 * Initializing Widgetized Areas (Sidebars)
 */


$before_widget = '<div id="%1$s" class="widget %2$s">';
$after_widget  = '</div>';
$before_title  = '<h3 class="widget-title">';
$after_title   = '</h3>';

register_sidebar( array(
	'name'         	=> 'Pre Content',
	'before_widget'	=> $before_widget,
	'after_widget' 	=> $after_widget,
	'before_title' 	=> $before_title,
	'after_title'  	=> $after_title,
) );

register_sidebar( array(
	'name'          => 'Sidebar',
	'before_widget' => $before_widget,
	'after_widget'  => $after_widget,
	'before_title'  => $before_title,
	'after_title'   => $after_title,
) );

register_sidebar( array(
	'name'          => 'Footer: Column 1',
	'before_widget' => $before_widget,
	'after_widget'  => $after_widget,
	'before_title'  => $before_title,
	'after_title'   => $after_title,
) );

register_sidebar( array(
	'name'          => 'Footer: Column 2',
	'before_widget' => $before_widget,
	'after_widget'  => $after_widget,
	'before_title'  => $before_title,
	'after_title'   => $after_title,
) );

register_sidebar( array(
	'name'          => 'Footer: Column 3',
	'before_widget' => $before_widget,
	'after_widget'  => $after_widget,
	'before_title'  => $before_title,
	'after_title'   => $after_title,
) );

register_sidebar( array(
	'name'          => 'Footer: Column 4',
	'before_widget' => $before_widget,
	'after_widget'  => $after_widget,
	'before_title'  => $before_title,
	'after_title'   => $after_title,
) );
