<?php 

get_header();

while(have_posts()){
    the_post(); ?>
    <h2> <?php the_title();?></h2>
    <?php the_content();?>
    <p>Posted on: <?php the_date();?></p>
    <?php } ;
    
?>

<?php get_footer() ;?>
