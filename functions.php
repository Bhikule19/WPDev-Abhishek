<?php 

//Adding style sheet

add_action('wp_enqueue_scripts', 'custom_style_sheet');

function custom_style_sheet(){
    wp_enqueue_style('custom_styles', get_stylesheet_uri());
}

?>