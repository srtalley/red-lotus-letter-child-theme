<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/* Add custom functions below */

add_action( 'wp_enqueue_scripts', 'ds_enqueue_assets' );
function ds_enqueue_assets() {

  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
  wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.js', '', '', true );
}//end function ds_enqueue_assets

add_filter( 'plugins_auto_update_enabled', '__return_false' );
add_filter( 'themes_auto_update_enabled', '__return_false' );

////////////////////////////////////////////////////
// CUSTOM WIDGET AREAS
////////////////////////////////////////////////////
function ds_widgets_init() {

  register_sidebar( array(
    'name'          => 'Header Row',
    'id'            => 'header_row_01',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ));
} //end function ds_widgets_init

add_action( 'widgets_init', 'ds_widgets_init');

function ds_header_strip() {
  echo '<div id="header-custom-form">';
  if ( is_active_sidebar('header_row_01') ) :
    $content = '<div id="header-row-01" class="widget-area" role="complementary">';
    ob_start();
    dynamic_sidebar('header_row_01');
    $content .= ob_get_contents();
    ob_end_clean();
    $content .= '</div> <!--header-row-01-->';
 endif;
 echo $content;
 echo '</div>';

} //end function ds_header_strip

add_action( 'presscore_body_top', 'ds_header_strip' );

// From the "Remove Widget Titles" plugin
add_filter( 'widget_title', 'remove_widget_title' );
function remove_widget_title( $widget_title ) {
	if ( substr ( $widget_title, 0, 1 ) == '!' )
		return;
	else 
		return ( $widget_title );
}

