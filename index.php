<?php get_header(); ?>
  <main class="container">
    <?php
      // WordPress Loop
      if(have_posts()){
        while(have_posts()){
          the_post(); ?>

          <div class="individual-post">
            <div class="featured-image">
              <?php the_post_thumbnail('thumbnail'); ?>
            </div><!-- Ends the Featured Image Div -->

            <div class="text-container">
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
            </div> <!-- Ends the Text Container Div -->

          </div> <!-- Ends the Individual Posts Div -->

        <?php
        } //End of while loop

        //Pagination function
        pagination_for_site();
      }
    ?>
  </main> <!-- Ends the Main Container -->

<?php get_footer(); ?>
