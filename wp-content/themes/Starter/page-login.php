 
<?php get_header(); ?>
          
    	<section>
        	<div class="content">	
        	  <article>
        	  <h1>Login</h1>
				<?php if (have_posts()){ 
						while (have_posts()) {
						the_post();
						
						}
				} ?>
					  
					
					<?php $args = array(
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
			                      
     				  				<fieldset><?php wp_login_form($args); ?> </fieldset>
     				  				</article>
				</div>
				<aside>
				<?php get_sidebar(); ?>
                </aside>
         </section>
         
  

 
<?php get_footer(); ?> 	