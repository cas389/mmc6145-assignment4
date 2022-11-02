<?php get_header(); ?>
  <main>
    <h1>index</h1>
    <section>
        <?php
        //Query
        $args = array(
          'post_type'      => 'post',
          'post_status'    => 'publish',
          'posts_per_page' =>  1,
          'order'          => 'DESC',
          'orderby'        => 'post_date',
        );

        $query = new WP_Query($args);

        if($query->have_posts()){
          while($query->have_posts()){
            $query->the_post(); ?>

            <section class="featured-blog-post">
              <div class="two-column">
                <div class="featured-blog-image-header">
                  <?php the_post_thumbnail('full'); ?>
                </div><!-- Ends the Featured Image Div -->
              </div>

              <div class="two-column">
                <div class="featured-text-container">
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p>
                    <?php
                    // Display Author and Publish Date Links
                    post_data();
                    ?>
                  </p>
                  <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
                  <p class="button-para"><a class="button" href="<?php the_permalink(); ?>">Read More</a></p>
                </div> <!-- Ends the Text Container Div -->

              </div> <!-- Ends the Div -->
            </section>
          <?php
          } // Closes while
        }// Closes if statment
      ?>
    </section> <!-- End of Section -->

    <section>
      <?php
      //Query
      $args2 = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' =>  5,
        'order'          => 'DESC',
        'orderby'        => 'post_date',
        'offset'         =>  1,
      );

      $query2 = new WP_Query($args2);

      if($query2->have_posts()){
        while($query2->have_posts()){
          $query2->the_post(); ?>

            <article class="individual-posts">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

              <p>
                <?php
                  // Display Author and Publish Date Links
                  post_data();
                ?>
              </p>

              <p class="blog-post-thumbnail"><?php the_post_thumbnail('medium');?></p>

              <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
              <p class="read-more-link"><a href="<?php the_permalink(); ?>">Read More...</a></p>
            </article> <!-- Individual Post -->
          <?php } //End of while loop
        }
        //Pagination function ?>
        <p class="pagination-para"><?php pagination_for_site(); ?></p>
    </section>
  </main> <!-- Ends the Main Container -->

<?php get_footer(); ?>
