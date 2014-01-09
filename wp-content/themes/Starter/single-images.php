 
<?php get_header(); ?>
          
    	<section>
        	<div class="content">	
				<?php if (have_posts()){ 
						while (have_posts()) {
						the_post(); ?>
						<article>
						<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                        <p><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></p>
                         
                        <?php dws_image_gallery(get_post_meta($post->ID, '_dws_gallery', true), "medium", true);?>
 			           	</article>
			 
			                    	<?php }
			                   } ?>
        			
                    
                    	
				</div>
				<aside>
				<?php get_sidebar(); ?>
                </aside>
         </section>
         
  

 
<?php get_footer(); ?> 	