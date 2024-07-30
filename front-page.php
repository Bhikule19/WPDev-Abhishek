<?php get_header(); ?>

<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('./images/library-hero.jpg') ?>)"></div>
      <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <input type="text" class="">
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
        <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
      </div>
    </div>

    <div class="full-width-split group">
      <div class="full-width-split__one">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
          <?php 
            $homePageEvents = new WP_Query(array(
              'posts_per_page' => -1,
              'post_type' => 'event',
              'meta_key' => 'event_date',
              'orderby' => 'meta_value_num',
              'order' => 'ASC',
              'meta_query' => array(
                array(
                  'key' => 'event_date',
                  'compare' => '>=',
                  'value' => current_time('Ymd'),
                  'type' => 'DATE',
                ),
              ),
            ));

            while($homePageEvents->have_posts()){
              $homePageEvents->the_post(); 
              
              get_template_part('template-parts/content', get_post_type());

           }
          ?> 

          <p class="t-center no-margin"><a href="<?php echo site_url('./events'); ?>" class="btn btn--blue">View All Events</a></p>
        </div>
      </div>
      <div class="full-width-split__two">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>

          <?php 
            //Custom Queries for Post
            $homePagePosts = new WP_Query(array(
              'posts_per_page' => 2
            ));

            while($homePagePosts->have_posts()){
              $homePagePosts->the_post(); ?>

              <div class="event-summary">
                <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                  <span class="event-summary__month"><?php the_time('M'); ?></span>
                  <span class="event-summary__day"><?php the_time('d'); ?></span>
                </a>
                <div class="event-summary__content">
                  <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                  <p><?php if(has_excerpt()){
                    echo get_the_excerpt();
                  } else {
                    echo wp_trim_words(get_the_content(), 18);
                  }
                  
                  ?><a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
                </div>
            </div>
           <?php } wp_reset_postdata();
           ?>
          <p class="t-center no-margin"><a href="<?php echo site_url('./blog') ?>" class="btn btn--yellow">View All Blog Posts</a></p>
        </div>
      </div>
    </div>

    <div class="hero-slider">
      <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
        

          <?php 

                  $homepageSlider = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => 'homepage-slideshow'
                  ));

                  while($homepageSlider->have_posts()){
                    $homepageSlider->the_post(); 
                    $bgImage = get_field('slide_bg_image'); // Use get_field to store the URL in a variable
                    $bgImageUrl = $bgImage['url']; // Ensure this returns a valid URL

                    // echo '<pre>'; // Debugging line
                    // var_dump($bgImage); // Debugging line
                    // echo '</pre>'; // Debugging line
                     ?>
                      <div class="hero-slider__slide" style="background-image: url(<?php echo esc_url($bgImageUrl); ?>)">
                        <div class="hero-slider__interior container">
                          <div class="hero-slider__overlay">
                            <h2 class="headline headline--medium t-center"><?php the_field('slide_title') ?></h2>
                            <p class="t-center"><?php the_field('slide_subtitle') ?></p>
                            <p class="t-center no-margin"><a href="#" class="btn btn--blue"><?php the_field('slide_link_text') ?></a></p>
                          </div>
                        </div>
                      </div>

              <?php    }

          ?>

          

          

        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
      </div>
    </div>

<?php get_footer() 


;?>




