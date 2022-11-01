<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, inital-scale=1" />

    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>
  </head>

  <body <?php body_class() ?>>
    <!-- Header Bar -->
    <header>
      <!-- Logo Div -->
      <div class="logo">
        <?php
          // Display logo if it's set, if not display site title
          if(get_header_image() == ''){ ?>
            <h1 class="header-logo-text"><a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
          <?php
          }else { ?>
            <a href="<?php echo get_home_url(); ?>"><img class="logo" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="Company Logo" /></a>
        <?php
          }
        ?>
      </div> <!-- End of logo Div -->

      <!-- Hamburger Icon for Mobile -->
      <input class="side-menu" type="checkbox" id="side-menu"/>
      <label class="hamburger-menu" for="side-menu"><span class="hamb-line"></span></label>

      <nav class="header-menu">
        <!-- Navigation Bar -->
        <?php
          // Shows the navigation to the page, created by the user
          wp_nav_menu(array(
            'theme_location'  => 'main-menu',
          ));
        ?>
      </nav> <!-- End of Nav Tag -->
    </header> <!-- End of Header Tag -->
