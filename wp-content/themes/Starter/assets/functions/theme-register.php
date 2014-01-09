<?php

 
/* ============================================================================
Registers Sidebars
==============================================================================*/

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
	  'id'            =>  'products_sidebar',
	  'name'          =>  'Products Sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
	  'id'            =>  'learning_sidebar',
	  'name'          =>  'Learning Center Sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	 
}

/* ============================================================================
Builds Custom Taxonomies
==============================================================================*/
$learning_taxonomy_labels = array(
   'name' => __( 'Project Categories' ),
   	'singular_name' => __( 'Project Category' ),
   	'search_items' => __( 'Search Project Categories' ),
   	'popular_items' => __( 'Popular Project Categories' ),
   	'all_items' => __( 'All Project Categories' ),
   	'parent_item' => __( 'Parent Category' ),
   	'parent_item_colon' => __( 'Parent Category:' ),
   	'edit_item' => __( 'Edit Project Category' ),
   	'update_item' => __( 'Update Project Category' ),
   	'add_new_item' => __( 'Add New Project Category' ),
   	'new_item_name' => __( 'New Project Category Name' )
 );
$learning_taxonomy_args = array(
		'public' => true,
		'labels' => $learning_taxonomy_labels,
  		'hierarchical' => true,
  		'rewrite' => true
);


//register_taxonomy('learning_categories','learning',$learning_taxonomy_args);


/* ============================================================================
Builds Custom Post Types
==============================================================================*/
 $learning_label = array(
   'name' => _x('Projects', 'post type general name'),
   'singular_name' => _x('Project', 'post type singular name'),
   'add_new' => _x('Add New', 'Project'),
   'add_new_item' => __('Add New Project'),
   'edit_item' => __('Edit Project'),
   'new_item' => __('New Project'),
   'view_item' => __('View Project'),
   'search_items' => __('Search Projects'),
   'not_found' =>  __('No Projects found'),
   'not_found_in_trash' => __('No Projects found in Trash'), 
   'parent_item_colon' => ''
 );

$learning_args = array(
  'description' => 'Projects',
  'labels' => $learning_label,
  'public' => true,
  'show_ui' => true,
  '_builtin' => false,
  '_edit_link' => 'post.php?post=%d',
  'capability_type' => 'page',
  'hierarchical' => false,
  'rewrite' => true,
  'query_var' => false,
  'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
  'menu_position' => 20,
  'taxonomies' => array( 'learning_categories'),
    'show_in_menu' => true,
  'show_in_nav_menus' => true,
  'has_archive' => 'blargs'
); 
 

 register_post_type('learning',$learning_args);
 
/* ============================================================================
Registers Custom Navigation Menus
==============================================================================*/
   
 
?>