<?php get_header(); ?>

  <section class="featured-image-section">
    <?php
      if (get_the_post_thumbnail(get_the_ID())) {?>
        <div class="featured-image-header">
          <?php the_post_thumbnail('full'); ?>
        </div><!-- Ends the featured-image Div -->

        <div class="page-title">
          <h2><?php the_title(); ?></h2>
        </div><!-- Ends the page-title Div --><?php
      } else {
          echo '<img class="placeholder-img" src="https://via.placeholder.com/100" />';
      }
    ?>
  </section>

  <main>
    <?php
      // WordPress Loop
      if(have_posts()){
        while(have_posts()){
          the_post(); ?>

          <article class="individual-posts">
            <p class="excerpt"><?php the_content(); ?></p>

            <p>
              <?php
                // Display Author and Publish Date Links
                post_data();
              ?>
            </p>
          </article> <!-- Individual Post -->

        <?php
        }
      }
    ?>
  </main> <!-- Ends the Main Container -->


  <aside class="container">
    <h2>Hufflepuff House</h2>
    <p>Read other Hufflepuff House items!</p>
    <div class="row">
        <?php
        //Query
        $args = array(
          'post_type'      => 'post',
          'post_status'    => 'publish',
          'posts_per_page' =>  3,
          'order'          => 'DESC',
          'orderby'        => 'rand',
          'category_name'  => 'Hufflepuff'
        );

        $query = new WP_Query($args);

        if($query->have_posts()){
          while($query->have_posts()){
            $query->the_post(); ?>

            <div class="individual-post col-md-4">
              <div class="featured-image">
                <?php the_post_thumbnail('thumbnail'); ?>
              </div><!-- Ends the Featured Image Div -->

              <div class="text-container">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
              </div> <!-- Ends the Text Container Div -->

            </div> <!-- Ends the Individual Posts Div -->
          <?php
          } // Closes while
        }// Closes if statment
      ?>
    </div> <!-- End of Row Div -->
  </aside>
<?php get_footer(); ?>
