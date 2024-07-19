<?php 

//Adding style sheet

add_action('wp_enqueue_scripts', 'custom_style_sheet');

function custom_style_sheet(){
    wp_enqueue_script('main-js-file', get_theme_file_uri('./build/index.js'), array('jquery'), '1.0.0', true);
    wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');
    wp_enqueue_style('custom_main_styles', get_theme_file_uri('./build/style-index.css'));
    wp_enqueue_style('custom_reset_styles', get_theme_file_uri('./build/index.css'));
}

// function to display the page bg and subtite dynamically

function display_page_banner_subtitle($args = null){ //In your case, you want to check if the $args variable is null 
    
    if(!isset($args['title'])) {
        $args['title'] = get_the_title();
      }
    if(!isset($args['subtitle'])){
        $args['subtitle'] = get_field('page_banner_subtitle');
    }
    if(!isset($args['photo'])){
        //function works well in many situations, however, when used on an archive page (for example the All Events page/query) if the first event in the list of events has a background image our code can get confused and try to use it as the banner for the entire Archive page.
        if(get_field('page_banner_background_image') && !is_archive() && !is_home()){
            $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('./images/ocean.jpg');
        }
    }

    ?>



<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; 
      ?>);"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
        <div class="page-banner__intro">
          <p><?php echo $args['subtitle']; ?></p>
        </div>
      </div>  
    </div>

<?php }


function custom_theme_features(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 650, true);
    add_image_size('pageBanner', 1500, 350, true);
    // register_nav_menu('HeaderMenuLocation', 'Header Menu Location'); //Registers a navigation menu location for a theme.
    // register_nav_menu('footerlocationone', 'Footer Location One'); //Registers a navigation menu location for a theme.
    // register_nav_menu('footerlocationytwo', 'Footer Location Two'); //Registers a navigation menu location for a theme.

}
add_action('after_setup_theme', 'custom_theme_features');

function custom_adjust_queries($query){

    if(!is_admin() && is_post_type_archive('program') && is_main_query() ){
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }

    if(!is_admin() && is_post_type_archive('event') && is_main_query()){
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => date('Y-m-d'),
                'type' => 'DATE'
                )
            ));
    
    }

}

add_action('pre_get_posts', 'custom_adjust_queries');

?>

