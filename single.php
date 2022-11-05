<?php get_header(); ?>

  <!-- Main Content Container -->
  <main>

    <!-- Hero Image and Page Title -->
    <section class="hero-section full-width">

      <!-- If/Else Statement. User must upload a featured image, or an error will display prompting user to upload featured image.. -->
      <?php
        if (get_the_post_thumbnail(get_the_ID())) {?>
          <div class="featured-image-header">
            <?php the_post_thumbnail('full'); ?>
          </div> <!-- Ends the featured-image-header Div -->
          <section class="page-title">
            <h1><?php the_title(); ?></h1>
          </section><!-- Ends the page-title Div --><?php

        } else {
          echo '<img class="placeholder-img" src="https://via.placeholder.com/100" />';?>
          <section class="page-title">
            <h1>You Must Upload Photo to Featured Section</h1>
          </section><!-- Ends the page-title Div (Error when no featured image is uploaded) --><?php
        }
      ?>
    </section> <!-- Ends the hero-section full-width Section -->



    <div class="container">
      <div class="row">
        <!-- Main Text Area -->
        <section class="col-md-8">
          <?php
            // WordPress Loop
            if(have_posts()){
              while(have_posts()){
                the_post(); ?>

                <article class="individual-posts">
                  <!-- Display Author and Publish Date Links -->
                  <?php post_data_for_single_posts(); ?>
                  <p><?php the_content(); ?></p>
                </article> <!-- Individual Post -->

              <?php
              }
            }
          ?>
        </section> <!-- Ends the col-md-9 Container -->

        <section class="col-md-1">
          &nbsp;
        </section>

        <!-- Sidebar Container with Widget Section -->
        <aside class="col-md-3">
          <?php dynamic_sidebar('sidebar-widget'); ?>
        </aside><!-- Ends the Col-md-3 Aside -->
      </div><!-- Ends the Row Div -->
    </div><!-- Ends the Container Div -->
  </main>


  <!-- Other Random Articles Below the Main Section -->
  <section class="other-articles container">
    <h3>We Think You Might Enjoy These Articles As Well!</h3>
    <div class="row">
        <?php
        //Query
        $args = array(
          'post_type'      => 'post',
          'post_status'    => 'publish',
          'posts_per_page' =>  4,
          'order'          => 'DESC',
          'orderby'        => 'rand',
        );

        $query = new WP_Query($args);

        if($query->have_posts()){
          while($query->have_posts()){
            $query->the_post(); ?>

            <div class="small-preview-blog-posts col-lg-3">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p><?php echo get_the_excerpt(); ?></p>
              <p class="read-more-link"><a href="<?php the_permalink(); ?>">Read More...</a></p>
            </div>
          <?php
          } // Closes while
        }// Closes if statment
      ?>
    </div> <!-- End of Row Div -->
  </section>



<?php get_footer(); ?>
