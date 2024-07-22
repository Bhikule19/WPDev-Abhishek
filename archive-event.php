<?php

get_header(); 

display_page_banner_subtitle(array(
  'title' => 'All Events',
  'subtitle' => 'See what is going on in our world.',
));

?>


<div class="container container--narrow page-section">
<?php
  while(have_posts()) {
    the_post(); 
    get_template_part('template-parts/content', get_post_type());
   }
  echo paginate_links();
?>
</div>

<?php get_footer();

?>