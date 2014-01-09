 
<?php get_header(); ?>

           
    	<section>
        	<div class="content">	
				<?php if (have_posts()){ 
						while (have_posts()) {
						the_post(); ?>
						<article>
						<h2><?php the_title(); ?></h2>
                         
 			            			<p><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'full' ); ?></a></p>
 			            
			          
			            
			 				</article>
			 
			                    	<?php }
			                   } ?>
        			
                    
                    	
				</div>
          </section>
         
  

 
<?php get_footer(); ?> 	