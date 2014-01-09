<?php

/* ============================================================================
Theme Functions
==============================================================================*/

$assets_path = TEMPLATEPATH . '/assets/';
$functions_path = TEMPLATEPATH . '/assets/functions/';

 


//Admin Framework
require_once ($functions_path."admin-init.php"); 				//Admin specific settings and loads
require_once ($functions_path."admin-menu.php"); 				//Sets Up Options Menu
require_once ($functions_path."admin-interface.php");			//Customizes the Menus & Dashboard
require_once ($functions_path."admin-interface-widgets.php");	//Stores the Custom dashboard widgets
require_once ($functions_path."admin-custom.php");				//Adds custom meta boxes to the post/page areas

//Theme Requirements
require_once ($functions_path."theme-init.php"); 				//Theme Specific Settings and loads
require_once ($functions_path."theme-register.php"); 			//Sets up sides bars, nav menus, and custom post types
require_once ($functions_path."wp-pagenavi.php");  				//3rd Party numbered pagination
  
/* ============================================================================
Add Custom, Theme Specific Functions Below Here
==============================================================================*/


//Changes the ending of the excerpt string.
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
	return '';
}

//Displays a set of images in a list, with links to the original
//$ids is an array or comma separated string
//$size = thumbnail, medium, large or full
//$echo = true/false
function dws_image_gallery($ids, $size, $echo){
	global $post;
	if(!ids){
		return false;
	}
	if(!$size){
		$size = "medium";
	}
	if(!is_array($ids)){
		$ids = explode(",", $ids);
	}
	$gallery = "<ul class='gallery-$post->ID'>";
	foreach($ids as $id){
		if($id){
			$image = wp_get_attachment_image_src($id, $size);
 			$image_details = get_post($id);
 			
			$gallery .= "<li class='image-$id'>";
				$gallery .= "<a href='$image_details->guid' title='$image_details->post_title'>";
					$gallery .= "<img src='$image[0]' width='$image[1]' height='$image[2]' alt='$image_details->post_excerpt'/>";
				$gallery .="</a>";
			$gallery .="</li>";
   		}
	}
	$gallery .="</ul>";
	if($echo == true){
		echo($gallery);
	}
	else{
		return $gallery;
	}
	
}
//Returns true if a number is odd
function is_odd($number) { return($number & 1); }
//Returns true if a number is even
function id_even($number) { return(!($number & 1)); }


?>