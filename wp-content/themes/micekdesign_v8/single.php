 
<?php get_header(); ?>

           
    	<section>
        	<div class="content">	
				<?php if (have_posts()){ 
						while (have_posts()) {
						the_post(); ?>
						<article>
						<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                        <p><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></p>
                        <?php  the_content(); ?>
                        
 			            
			          
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
			                   } ?>
        			
                    
                    	
				</div>
				<aside>
				<?php get_sidebar(); ?>
                </aside>
         </section>
         
  

 
<?php get_footer(); ?> 	