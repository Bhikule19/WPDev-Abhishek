<?php 

get_header();

while(have_posts()){
    the_post(); ?>
    <h2> <a href=" <?php the_permalink() ;?> " > <?php the_title();?></a></h2>
    <?php the_content();?>
    <p>Posted on: <?php the_date();?></p>
    <hr>
    <?php } ;
    
?>

<?php get_footer() ;?>