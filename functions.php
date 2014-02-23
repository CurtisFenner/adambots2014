<?php
function shortcode_left($atts, $content=null){
   return '<div id=twocolumnbackground></div><div id="leftcol">' . do_shortcode($content) . '</div>';
}
add_shortcode('left','shortcode_left');

function shortcode_right($atts, $content=null){
   return '<div id="rightcol">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('right','shortcode_right');


function shortcode_bigdivider($atts, $content=null) {
	return '<div style="margin-top:30px;margin-bottom:20px;margin-left:-20px;margin-right:-20px;position:relative;background-color:#252525;background-image:url(\''.get_bloginfo("template_directory").'/res/img/noisy.png\');height:6px;"></div>';
}
add_shortcode('bigdivider','shortcode_bigdivider');








if (!function_exists('pristine_register_menus')) {
	function pristine_register_menus() {
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu'),
		) );		
	}
	add_action( 'init', 'pristine_register_menus');
}











if ( function_exists('register_sidebar') ) {
	$args = array(
	'name' => 'Default Sidebar',
	'before_widget' => '<div class="sidebar-box">',
	'after_widget' => '</div>',
	'before_title' => '<h4>',
	'after_title' => '</h4>');

	register_sidebar($args);
		
	$args = array(
		'name'          => 'Display Infotext',
		'id'            => 'display-infotext',
		'before_widget' => '<div class="display_infotext">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>' );

	register_sidebar($args);
	
	$args = array(
		'name'          => 'Homepage 1',
		'id'            => 'homepage-1',
		'before_widget' => '<div class="threecols_left">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>' );

	register_sidebar($args);
	
	$args = array(
		'name'          => 'Homepage 2',
		'id'            => 'homepage-2',
		'before_widget' => '<div class="threecols_middle">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>' );

	register_sidebar($args);
	
	$args = array(
		'name'          => 'Homepage 3',
		'id'            => 'homepage-3',
		'before_widget' => '<div class="threecols_right">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>' );

	register_sidebar($args);
	
	$args = array(
		'name'          => 'Media Gallery Sidebar',
		'id'            => 'mediagallery-1',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>' );

	register_sidebar($args);
	
	$args = array(
		'name'          => 'Contact Page Sidebar',
		'id'            => 'contact-1',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>' );

	register_sidebar($args);
	
	$args = array(
		'name'          => 'About Submenu',
		'id'            => 'about-submenu',
		'before_widget' => '<div class="subnav">',
		'after_widget'  => '</div>' );

	register_sidebar($args);
	
	$args = array(
		'name'          => 'FIRST Submenu',
		'id'            => 'first-submenu',
		'before_widget' => '<div class="subnav">',
		'after_widget'  => '</div>' );

	register_sidebar($args);
	
	$args = array(
		'name'          => 'Media Gallery Submenu',
		'id'            => 'media-submenu',
		'before_widget' => '<div class="subnav">',
		'after_widget'  => '</div>' );

	register_sidebar($args);
	
	$args = array(
		'name'          => 'Resources Submenu',
		'id'            => 'resources-submenu',
		'before_widget' => '<div class="subnav">',
		'after_widget'  => '</div>' );

	register_sidebar($args);
	
	$args = array(
		'name'          => 'Footer 1',
		'id'            => 'footer-1',
		'before_widget' => '<div class="footer_col">',
		'after_widget'  => '</div>',
		'before_title'  => '<strong><em>',
		'after_title'   => '</em></strong>' );

	register_sidebar($args);

	$args = array(
		'name'          => 'Footer 2',
		'id'            => 'footer-2',
		'before_widget' => '<div class="footer_col">',
		'after_widget'  => '</div>',
		'before_title'  => '<strong><em>',
		'after_title'   => '</em></strong>' );

	register_sidebar($args);

	$args = array(
		'name'          => 'Footer 3',
		'id'            => 'footer-3',
		'before_widget' => '<div class="footer_col">',
		'after_widget'  => '</div>',
		'before_title'  => '<strong><em>',
		'after_title'   => '</em></strong>' );
		
	register_sidebar($args);

	$args = array(
		'name'          => 'Footer 4',
		'id'            => 'footer-4',
		'before_widget' => '<div class="footer_col">',
		'after_widget'  => '</div>',
		'before_title'  => '<strong><em>',
		'after_title'   => '</em></strong>' );
		
	register_sidebar($args);

	$args = array(
		'name'          => 'Footer 5',
		'id'            => 'footer-5',
		'before_widget' => '<div class="footer_col">',
		'after_widget'  => '</div>',
		'before_title'  => '<strong><em>',
		'after_title'   => '</em></strong>' );
		
	register_sidebar($args);

	$args = array(
		'name'          => 'Footer 6',
		'id'            => 'footer-6',
		'before_widget' => '<div class="footer_col">',
		'after_widget'  => '</div>',
		'before_title'  => '<strong><em>',
		'after_title'   => '</em></strong>' );

	register_sidebar($args);
	
	
}





























































function my_css_attributes_filter($var) {
  return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);


















?>