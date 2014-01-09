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
  
/* ============================================================================
Add Custom, Theme Specific Functions Below Here
==============================================================================*/


//Changes the ending of the excerpt string.
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
	return '';
}

//Returns true if a number is odd
function is_odd($number) { return($number & 1); }
//Returns true if a number is even
function is_even($number) { return(!($number & 1)); }

function is_first_third($number) { return(!($number & 1)); }

function m_gallery() {
  	
  	global $post;
  	$ids = explode(",",get_post_meta($post->ID, '_dws_gallery', true));
    $gallery = '<div id="gallery" class="gallery">';
  	$i=0;
  	foreach($ids as $id){
  		if($id){
  		  $image_full = wp_get_attachment_image_src($id, 'medium');
   			$image = wp_get_attachment_image_src($id, "full");
   			$image_details = get_post($id);
    		$image_link = get_attachment_link($id);
    		
  			$gallery .= "<figure class='series-image image-$id number-$i'>";
  			  $gallery .= "<figcaption><h4 data-title='$image_details->post_title'>$image_details->post_title</h4></figcaption>";
   					$gallery .= "<div class='image'><img src='$image[0]' width='$image[1]' height='$image[2]' alt='$image_details->post_excerpt'/></div>";
   			$gallery .="</figure>";
  			$i++;
     		}
  	}
   
  	
  	$gallery .='</div>';
  	
   	echo $gallery;
  	
  
}
function get_projects(){
  $posts = get_posts('post_type=project&numberposts=-1&order=ASC&orderby=menu_order');
  $i = 1;  
  $lineBreak = 3;
  $sectionBreak = 9;
  $sectionID = 'projectsPartial';
  $queryVar = '';
  if(isset($_GET['v'])){
     $queryVar = '?v='.$_GET['v'];
  }
  echo('<section class="projects" style="z-index: '.count($posts).'"><div class="content"><ul class="projects">');
   
    foreach ($posts as $post) {
      $thumb_id = get_post_thumbnail_id($post->ID);
      $thumb = get_the_post_thumbnail($thumb_id);
      $z = count($posts) - $i;
     	$isPrivate = get_post_meta($post->ID,'_dws_private',true);
  	  if($isPrivate == 'on' && !isset($_GET['v'])){
 	      continue;
 	    }
      if($i == $lineBreak+1){
        echo('</ul></div><div class="more"><a href="#" id="more" class=""><span>More work</span></a></div></section><section class="projects '.$sectionID.'" style="z-index: '.$z.'"><div class="content"><ul class="projects">');
          $sectionID = 'projectsHidden';
        
      }elseif (($i-$lineBreak-1) == $sectionBreak){
        echo('</ul></div><div class="more"><a href="#" id="more" class=""><span>Archives</span></a></div></section><section class="projects '.$sectionID.'" style="z-index: '.$z.'"><div class="content"><ul class="projects">');
      }
     
      if(is_int($i/$lineBreak)){
        echo('<li class="last">');
        
      }elseif(is_int(($i+$lineBreak-1)/$lineBreak)){
        
        echo('<li class="first">');
      }
      else{
        echo('<li>');
      }
      
        echo get_the_post_thumbnail($post->ID, 'thumbnail');
        echo('<a href="'.get_permalink($post->ID).$queryVar.'"><span>');
          echo('<h3>'.$post->post_title.'</h3>');
            echo('<ul>');
               $terms = wp_get_post_terms($post->ID, 'project_categories');
                foreach ($terms as $term) {
                 echo('<li>'.$term->name.'</li>');
               }
             echo('</ul>');
        echo('</a>');
      echo('</li>');
      $i++;
    }
  echo('</ul></div></section>');
}

?>