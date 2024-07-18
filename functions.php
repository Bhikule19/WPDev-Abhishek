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


function custom_theme_features(){
    add_theme_support('title-tag');
    // register_nav_menu('HeaderMenuLocation', 'Header Menu Location'); //Registers a navigation menu location for a theme.
    // register_nav_menu('footerlocationone', 'Footer Location One'); //Registers a navigation menu location for a theme.
    // register_nav_menu('footerlocationytwo', 'Footer Location Two'); //Registers a navigation menu location for a theme.

}
add_action('after_setup_theme', 'custom_theme_features');

function custom_adjust_queries($query){
    if(!is_admin() && is_post_type_archive('event') && $query->is_main_query()){
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

