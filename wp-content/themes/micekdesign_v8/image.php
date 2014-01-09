<?php get_header(); ?>
  <section class="spacer"><div class="content"></div></section>
  <section class="project">
    <?php if (have_posts()){ 
      while (have_posts()) {
			  the_post(); 
 			  ?>
        <article>
          <header>
            <hgroup>
              <h2><span><?php  echo($post->post_title) ?></span></h2>
               
            </hgroup>
          </header>
          <div class="gallery">
            <figure class="series-image"><div class="image">
            <?php echo('<img src="'.$post->guid.'" />');?>
            </div></figure>
            </div>
         <?php }
    } ?>
    </article>
  </section>
   <section class="more pagination">
     <div class="content">
     
              </div>
  </section>
<?php get_footer(); ?> 	