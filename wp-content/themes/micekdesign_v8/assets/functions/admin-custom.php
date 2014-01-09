<?php
//Adds the custom fields for the post/page areas

/* ============================================================================
All the hooks for adding and saving boxes/data
==============================================================================*/
add_action('admin_init','add_boxes');
add_action('save_post', 'dws_save_data');
add_action('wp_ajax_load_gallery', 'load_gallery');
add_action('wp_ajax_add_custom_content', 'add_custom_content');
 

/* ============================================================================
Adds the meta boxes to their respective locations
==============================================================================*/

function add_boxes (){
	add_meta_box("dws_input", "Single Input Example", "dws_single_input",   "project", "normal", "high");
	//add_meta_box("dws_private_option", "Private?", "dws_private_check",   "project", "normal", "side");
	add_meta_box("dws_private_option", "Primary/Secondary Project", "dws_private_check",   "project", "side", "high");
	add_meta_box("dws_gallery", "Gallery", "dws_gallery",   "project", "normal", "high");
 }

/* ============================================================================
Generates a Single input field in a meta box
==============================================================================*/

function dws_single_input() { 
	global $post;
 	$value = get_post_meta($post->ID,'_dws_input_test',true); ?>
	<p>Secondary Title</p>
    <!-- Nonce stands for Number Once-->
    <input type="hidden" name="dws_noncename" id="dws_noncename" value="<?php echo(wp_create_nonce('dws_nonce')); ?>" />
    <input class="text" id="dws_input_test" name="dws_input_test" value="<?php echo($value);?>" />

<?php }


/* ============================================================================
Generates a Checkbox
==============================================================================*/

function dws_private_check() { 
	global $post;
 	$value = get_post_meta($post->ID,'_dws_private',true);
 	
 	?>
      <!-- Nonce stands for Number Once-->
    <input type="hidden" name="dws_noncename" id="dws_noncename" value="<?php echo(wp_create_nonce('dws_nonce')); ?>" />
   <p>Is private? <input type="checkbox" class="" id="dws_private" name="dws_private" <?php if($value == 'on'){ ?> checked="checked" <?php } ?> /></p>

<?php }



/* ============================================================================
Generates two checkboxes marking a projedct as primary and secondary
==============================================================================*/

function dws_check() { 
	global $post;
 	$type = get_post_meta($post->ID,'_dws_project_type',true);
 echo($type);
   	 ?>

    <!-- Nonce stands for Number Once-->
    <input type="hidden" name="dws_noncename" id="dws_noncename" value="<?php echo(wp_create_nonce('dws_nonce')); ?>" />
    
   <p>
       <select name="dws_project_type" id="dws_project_type">
        <option value="none" <?php if($type == 'primary'){ echo('selected="selected"'); } ?>>None</option>
        <option value="primary" <?php if($type == 'primary'){ echo('selected="selected"'); } ?>>Primary</option>
        <option value="secondary" <?php if($type == 'secondary'){ echo('selected="selected"'); } ?>>Secondary</option>
      </select>
    </p>
         
<?php }



/* ============================================================================
Generates a Selectable List of User
==============================================================================*/

function ad_user_select() { 
	global $post;
  $user_selected = get_post_meta($post->ID,'_ad_user_select',true);
  $users = get_users();
    ?>
	<p>Select a User. Previous Value: <?php echo(get_post_meta($post->ID,'_ad_user_select',true)); ?></p>

    <!-- Nonce stands for Number Once-->
    <input type="hidden" name="dws_noncename" id="dws_noncename" value="<?php echo(wp_create_nonce('dws_nonce')); ?>" />
    
    <select id="ad_user_select" name="ad_user_select" size="1">
          <option value="null"></option>
          <?php 
            foreach ($users as $user) {
                  echo '<option value="'.$user->ID.'"';
                     if ($user_selected == $user->ID && $user_selected != "") echo ' selected="selected"';
                 echo '>'.$user->user_email.'</option>';
           }
           ?>
    </select>
    
    
 
<?php }
 
 

/* ============================================================================
Builds an image gallery meta box.
==============================================================================*/

function dws_gallery(){
	global $post;
	global $wpdb;
	
	//Gets the count of the images in the database so we can build the pagination
 	$db_count = $wpdb->get_results("SELECT COUNT(*) FROM wp_posts WHERE post_type= 'attachment'");
    $db_vars = get_object_vars($db_count[0]);
    $img_count = $db_vars["COUNT(*)"];
   	$pagination = 10;
  
  	//Loads the ids already stored in the database associated with this post
 	$secondaries = explode(",",get_post_meta($post->ID,'_dws_gallery',true));
   	$images = load_images("0,"+$pagination);
  	$gallery = build_gallery($images);
  ?>	
 	<div id="selected-gallery" class="gallery">
 			<?php if(count($secondaries)>1){echo("<h4>Selected Images</h4>");}
  			  foreach ($secondaries as $id) {
	 				if($id){
	 				$attachment = wp_get_attachment_image_src($id, 'medium', false);
	 				$thumb = wp_get_attachment_thumb_url($id);
	  				$selected_gallery .= ('<div class="image"><a class="remove">Remove</a><img alt="'.$id.'" src="'.$thumb.'"/><p>'.$post->post_name.'</p></div>'); 
  				}							 
  			} 
  			echo($selected_gallery);
  			?>
  	</div>
 	<div id="secondary-gallery" class="gallery">
 		
 		<?php echo($gallery); ?>
 	</div>
	
	<ul class="tablenav">
		<?php 
		$page_display = 1;
		for ($i = 0; $i <= $img_count; $i += $pagination) { ?>
			<li class="tablenav-pages"><a id="gallery-page" rel="<?php echo($i.",".$pagination) ?>" href=""><?php echo($page_display); ?></a></li>
	  	<?php
	 		$page_display++; 
	 	} ?>
	</ul>
	
	</div>
 	<input type="hidden" name="dws_noncename" id="dws_noncename" value="<?php echo(wp_create_nonce('dws_nonce')); ?>" />
	<input type="text" class="text" id="dws_gallery" name="dws_gallery" value="<?php echo(get_post_meta($post->ID,'_dws_gallery',true)); ?>" /> 
	 	
<?php }
 
 function load_images($limit){
	global $wpdb; 
	global $post;
 	if(!$limit){
		$limit = "0,25";
	}
	$images = $wpdb->get_results("SELECT ID, post_name FROM wp_posts WHERE post_type= 'attachment' LIMIT ".$limit); 
 	return ($images);
}
function build_gallery($images){
	$gallery = "";
	foreach($images as $image) {
		 $id = $image->ID;
		 $name = $image->post_name;
		 $attachment = wp_get_attachment_image_src($id, 'medium', false);
		 $thumb = wp_get_attachment_thumb_url($id);
 		 $gallery .= ('<div class="image"><a class="add">Add</a><img alt="'.$id.'" src="'.$thumb.'"/><p>'.$name.'</p></div>'); 							 
 	}
 	return $gallery;
}

//This gets called on pagination ajax
function load_gallery() {
 	$images = load_images($_POST["page"]);
 	$gallery = build_gallery($images);
  	echo($gallery);
  	die();
} 
 
/* ============================================================================
Saves the data generated by the meta boxes
==============================================================================*/

function dws_save_data($post_id) { 
     if (!wp_verify_nonce($_POST['dws_noncename'], 'dws_nonce')) return $post_id;  // verify this with nonce because save_post can be triggered at other times     
     if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id; // do not save if this is an auto save routine
	
    $dws_input_test = $_POST['dws_input_test'];
	  $ad_user_select = $_POST['ad_user_select'];
    $dws_project_type = $_POST['dws_project_type'];
    $dws_gallery   = $_POST['dws_gallery'];
    $dws_private   = $_POST['dws_private'];
   
   update_post_meta($post_id, '_dws_private', $dws_private); 
   update_post_meta($post_id, '_dws_project_type', $dws_project_type); 
   update_post_meta($post_id, '_dws_input_test', $dws_input_test); 
   update_post_meta($post_id, '_dws_gallery', $dws_gallery);
 } ?>