<?php get_header(); ?>
  <main class="container">
    <?php
      // WordPress Loop
      if(have_posts()){
        while(have_posts()){
          the_post(); ?>

          <div class="single-page">
            <div class="featured-image">
              <?php the_post_thumbnail('large'); ?>
            </div><!-- Ends the Featured Image Div -->

            <div class="text-container">
              <h2><?php the_title(); ?></h2>
              <p class="excerpt"><?php the_content(); ?></p>
            </div> <!-- Ends the Text Container Div -->

          </div> <!-- Ends the Individual Posts Div -->

        <?php
        }
      }
    ?>
  </main> <!-- Ends the Main Container -->

<?php get_footer(); ?>
