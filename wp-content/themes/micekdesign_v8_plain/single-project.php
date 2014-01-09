<?php get_header(); ?>
  <section class="spacer"><div class="content"></div></section>
  <section class="project">
    <?php if (have_posts()){ 
      while (have_posts()) {
			  the_post(); 
			  
 			  $subtitle = get_post_meta($post->ID,'_dws_input_test',true); 	
        $projects = get_posts('post_type=project&orderby=menu_order&order=ASC&numberposts=-1');
        $prev_project;
        $next_project;
        $i = 0;
        $queryVar = '';
        if(isset($_GET['v'])){
           $queryVar = '?v='.$_GET['v'];
        }
        
         foreach ($projects as $key => $project) { 
          if(get_post_meta($project->ID,'_dws_private',true) && !isset($_GET['v'])){
             continue;
          }
           if($post->ID == $project->ID){
             break;
           }
           
           $prev_project = $project; 
           $i++;
          
         }
        $i++;
        if($i < count($projects) ){
           $next_project = $projects[$i];
        } 
          
         
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
              <?php if($prev_project){ ?>
               <a class="prev" title="<?php echo($prev_project->post_title)?>" href="<?php echo(get_permalink($prev_project->ID).$queryVar)?>"><span>Previous Project: <?php echo($prev_project->post_title)?></span></a>
              <?php } if($next_project){ ?>
              <a class="next" title="<?php echo($next_project->post_title)?>" href="<?php echo(get_permalink($next_project->ID).$queryVar)?>"><span>Next Project: <?php echo($next_project->post_title)?></span></a>
              <?php } ?>
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
       <?php if($prev_project){ ?>
        <a class="next" title="<?php echo($prev_project->post_title)?>" href="<?php echo(get_permalink($prev_project->ID).$queryVar)?>"><span><?php echo($prev_project->post_title)?></span></a>
       <?php } if($next_project){ ?>
       <a class="prev" title="<?php echo($next_project->post_title)?>" href="<?php echo(get_permalink($next_project->ID).$queryVar)?>"><span><?php echo($next_project->post_title)?></span></a>
       <?php } ?>
       
      </div>
  </section>
<?php get_footer(); ?> 	