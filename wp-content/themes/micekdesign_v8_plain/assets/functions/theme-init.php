<?php 
	//add_custom_background(); 												//Adds custom background support
	//add_editor_style('assets/css/typography.css'); 							//Custom stylesheet for the visual editor
	//add_theme_support( 'nav-menus' ); 										//Allows the use of menus.
	add_theme_support( 'post-thumbnails' );				 					//Allows use of post thumbnails
	//add_theme_support( 'post-formats', array('audio', 'image', 'video' ) ); //Allows the user of pre-defined post types.
	automatic_feed_links(); 												//Sets RSS to be auto-discovered.
	set_post_thumbnail_size( 200, 200, false );								//Sets the thumbnail size


	if (!is_admin()) add_action('wp_print_scripts', 'ad_theme_javascript' ); //Adds the JS to the theme
	
	
function ad_theme_javascript( ) {
	wp_enqueue_script('jquery');
  wp_enqueue_script("general",  get_bloginfo('template_directory')."/assets/js/general.js", true);
}
	
?>