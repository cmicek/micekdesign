 
<?php get_header(); ?>
          
    	<section>
        	<div class="content">	
        	
				<?php if (have_posts()){ 
						while (have_posts()) {
						the_post();
						
						}
				} ?>
				<article>
				<h1>My Projects</h1>
								</article>  
				
				<?php 
				global $user_login , $user_email;
				get_currentuserinfo();
				$user = wp_get_current_user();
				$userid = $user->ID;
				
				if($userid != 0){
 				  
				$args=array(
				  'post_type' => 'learning',
				  'numberposts'            => -1,
				  'orderby'                => 'menu_order',
				  'order'                => 'ASC'
				);
				$projects = get_posts($args);
  				 echo('<article><p>Showing <strong>'.$user->user_login.'\'s</strong> projects</p></article>');  
 				
 				foreach ($projects as $project) {
				  $proj_user = get_post_meta($project->ID, '_ad_user_select', true);
				 if($userid == $proj_user || $userid == 1){
				  echo('<article>');
				     echo('<ul><li>');
				       echo('<a href="'.get_permalink($project->ID).'">'.$project->post_title.'</a>');
				     echo('</li></ul>');
 				  echo('</article>');
				    }
				    
        }  
        
        }else{
        
         $args = array(
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
        
       <?php }
				?>
				
					
 			    </div>                  
 				<aside>
				<?php get_sidebar(); ?>
                </aside>
         </section>
         
  

 
<?php get_footer(); ?> 	