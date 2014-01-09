<?php get_header(); ?>
  <section class="spacer"><div class="content"></div></section>
  <section class="single-page">
    <?php if (have_posts()){ 
      while (have_posts()) {
			  the_post(); 
 			  $subtitle = get_post_meta($post->ID,'_dws_input_test',true); 	         
			  ?>
        <article>
          <header>
            <hgroup>
              <h2><span><?php  echo(get_the_title($current)) ?></span></h2>
              <?php 
                 	if($subtitle){
                 	  echo('<h3>'.$subtitle.'</h3>');
                 	}
               ?>
            </hgroup>
          </header>
          <div class="article-main">
            <?php the_content(); ?>
           </div>
            <?php m_gallery(); ?>
        <?php }
    } ?>
    </article>
  </section>
   <section class="more pagination">
     <div class="content">
              </div>
  </section>
<?php get_footer(); ?> 	