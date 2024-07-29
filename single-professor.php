<?php
  
  get_header();

  while(have_posts()) {
    the_post();
    display_page_banner_subtitle();
    ?>
        
    

    <div class="container container--narrow page-section">
        

      <div class="generic-content">
        <div class="row group">
            <div class="one-third">
            <?php the_post_thumbnail('professorPortrait'); ?>
            </div>
            <div class="two-thirds">
              <span class="like-box" >
              <i class="fa-regular fa-heart"></i>
              <i class="fa-solid fa-heart"></i>
              
                <span class="like-count">3</span>
              </span>
            <?php the_content(); ?>
            </div>
        </div>
      </div>

      <?php 
        $relatedPrograms = get_field('related_programs');
        if(!empty($relatedPrograms)){
          echo '<hr class="section-break" >';
          echo '<h2 class="headline headline--medium">Subject(s)</h2>';
          echo '<ul class="link-list link-list--horizontal">';
          foreach ($relatedPrograms as $program){ ?>
  
            <li><a href="<?php echo get_the_permalink($program); ?>" ><?php echo get_the_title($program); ?></a></li>
  
        <?php  }
         echo '</ul>';
        }
       
      ?>

    </div>
    

    
  <?php }

  get_footer();

?>