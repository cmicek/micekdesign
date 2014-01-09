<?php get_header(); ?>

        
    	<section>
        		<div class="content">
 					<article>
 						<?php 
 							global $wpdb;
 							$mylink = $wpdb->get_row("SELECT * FROM $wpdb->links"); 
  						?>
 					</article>
 				
 				<?php if (have_posts()){ 
						while (have_posts()) {
						the_post(); ?>
						<article>
							<h2><?php the_title(); ?></h2>
	                        <p><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></p>
	                        <?php  the_content(); ?>
                        </article>
                    	<?php }
                   } ?>
        			
                    
                    	

				
				</div>
				<aside>
				<?php get_sidebar(); ?>
                </aside>
								 <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
				
        </section>	
         
  

 
<?php get_footer(); ?> 	