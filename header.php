<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php wp_head() ?>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body <?php body_class(); ?> >
<header class="site-header">
      <div class="container">
        <h1 class="school-logo-text float-left">
          <a href="<?php echo site_url(); ?>"><strong>Fictional</strong> University</a>
        </h1>
        <a href="<?php echo esc_url(site_url('./search')); ?>" class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
          <nav class="main-navigation">
            <!-- <?php wp_nav_menu(array(
                'theme_location' => 'HeaderMenuLocation',
            )); ?> -->

            <ul>
              <li
              <?php if(is_page('about') || wp_get_post_parent_id(0) == 14 ) echo 'class="current-menu-item"' ?>>
              <a href="<?php echo site_url('./about'); ?>">About Us</a></li>
              <li <?php if(get_post_type() == 'program') echo 'class="current-menu-item"' ?>> 
              <a href="<?php echo get_post_type_archive_link('program'); ?>">Programs</a></li>
              <li <?php if(get_post_type() == 'event') echo 'class="current-menu-item"' ?>> 
              <a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>
              <li><a href="#">Campuses</a></li>
            <!-- using get_post_type() will get all the post type pages ie blogs and they will get currebt class to be highlighted -->
              <li <?php if(get_post_type() == 'post') echo 'class="current-menu-item"' ?>> 
                <a href="<?php echo site_url('./blog'); ?>">Blog</a></li>
            </ul>
          </nav>
          <div class="site-header__util">

          <?php  if(is_user_logged_in()){  ?>

            <a href="<?php echo esc_url(site_url('./my-note')); ?>" class="btn btn--small btn--orange float-left push-right">My Notes</a>
            <a href="<?php echo wp_logout_url(); ?>" class="btn btn--small btn--dark-orange float-left">Log out</a>

          <?php  }else{  ?>

            <a href="<?php echo wp_login_url(); ?>" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="<?php wp_registration_url(); ?>" class="btn btn--small btn--dark-orange float-left">Sign Up</a>

          <?php  }  ?>

            
            <a href="<?php echo esc_url(site_url('./search')); ?>" class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a href="<?php echo esc_url(site_url('./search')); ?>">
          </div>
        </div>
      </div>
    </header>
    