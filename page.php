<?php get_header(); ?>
  <main class="container">

    <!-- Hero Image and Page Title -->
    <section class="hero-section full-width">
      <?php the_post_thumbnail('full'); ?>
      <section class="page-title">
        <h1><?php the_title(); ?></h1>
      </section> <!-- End of page-title Section -->
    </section> <!-- End of hero-section Section -->


    <!-- Main Text on Page.php pages -->
    <section class="text-area">
      <?php
        // WordPress Loop
        if(have_posts()){
          while(have_posts()){
            the_post(); ?>

            <!-- Display Content on Page -->
            <p><?php the_content(); ?></p>
          <?php
          } // End of While
        } // End of If statement
      ?>
    </section> <!-- End of text-area Section -->
  </main> <!-- End of Main Container -->
<?php get_footer(); ?>
