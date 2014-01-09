 
<?php get_header(); ?>
    	<section>
        	<div class="content">	
				<?php if (have_posts()){ 
						while (have_posts()) {
						the_post(); ?>
						<article>
						
										<?php if(is_user_logged_in()){  ?>
						
						<h2><?php the_title(); ?></h2>
                        <p><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></p>
                        <?php  the_content(); ?>
                        
 			          <?php  if(get_post_meta($post->ID, '_dws_gallery', true)){ ?>
 			          	<h4 style="margin:30px 0 20px 0;">Image Gallery</h4>
 			          	
 			          	<?php
 			          	  $ids = explode(',', get_post_meta($post->ID, '_dws_gallery', true));
  			          	 $i=0;
  			          	 $gallery = "";
  			          	  foreach($ids as $id){
  			          	  	if($id){ 			
  			          	  	  $image_full = wp_get_attachment_image_src($id, 'medium');
  			          	  	  $image = wp_get_attachment_image_src($id, "thumbnail");
  			          	  	  $image_details = get_post($id);
  			          	  	  $image_link = get_attachment_link($id);
  			          	  	  
  			          	  	  
  			          	  	  $gallery .= "<li style='float:left; list-style:none; margin:0 20px 20px 0;' class='series-image image-$id number-$i'>";
  			          	  	  	$gallery .= "<a href='".$image_link."' data-width='".$image_full[1]."' data-height='".$image_full[2]."' title='$image_details->post_title'>";
  			          	  	  		$gallery .= "<img src='$image[0]' width='$image[1]' height='$image[2]' alt='$image_details->post_excerpt'/>";
  			          	  	  	$gallery .="</a>";
  			          	  	  $gallery .="</li>";
  			          	  	  $i++;
                 
                        }
                      }
                      
                      echo($gallery);
 			          	   	} ?>
 			          
 			            
			          
			          	<?php  if(get_post_meta($post->ID, '_dws_input_test', true)){ ?>
			          		<h5>Input Test:</h5>
			          		<p> <?php echo( get_post_meta($post->ID, '_dws_input_test', true));	?></p>
			          	<?php 	} ?>
			          	
			           
   						 <?php  if(get_post_meta($post->ID, '_dws_tags', true) && get_post_meta($post->ID, '_dws_tags', true) != "null"){ ?>
			            	<h5>Tag Test:</h5>
			            	<p> <?php echo( get_post_meta($post->ID, '_dws_tags', true));	?></p>
			            <?php 	} ?>
			           			            
			            
			 				</article>
			 
			                    	<?php }
			                    	
			                    	}
			                   } ?>
        			
           										<?php if(!is_user_logged_in()){  ?>
           										
           										 <?php   $args = array(
           										          'echo' => true,
           										          'redirect' =>  get_bloginfo('url'). "?page_id=644", 
           										          'form_id' => 'loginform',
           										          'label_username' => __( 'Username' ),
           										          'label_password' => __( 'Password' ),
           										          'label_remember' => __( 'Remember Me' ),
           										          'label_log_in' => __( 'Log In' ),
           										          'id_username' => 'user_login',
           										          'id_password' => 'user_pass',
           										          'id_remember' => 'rememberme',
           										          'id_submit' => 'wp-submit',
           										          'remember' => false,
           										          'value_username' => NULL,
           										          'value_remember' => false ); 
           										          
           										  	        
           										          ?> 
           										                    
           										  		  				<article><fieldset><?php wp_login_form($args); ?> </fieldset></article>
           										 
           										<?php } ?>
                    
                    	
				</div>
				<aside>
				<?php get_sidebar(); ?>
                </aside>
         </section>
         
  

 
<?php get_footer(); ?> 	