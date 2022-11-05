<?php get_header(); ?>
  <main class="container">
    <div class="row">
      <?php
      //Query

      //Gets the page number you are on and stores it in $paged variable
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' =>  10,
        'order'          => 'DESC',
        'orderby'        => 'post_date',
        'paged' => $paged,
      );

      $query = new WP_Query($args);

      if($query->have_posts()){
        while($query->have_posts()){
          $query->the_post();

          //Variable created that is set to false.
          $first = false;

          //If we are looking at the first post of the first page, then we are going to change the value of the variable to true.
          if( $query->current_post == 0 && !is_paged() ) {
            $first = true;
          }

          ?>

          <!-- If the variable $first is set to true, then we are going to echo out the featured blog post class. This will only be true on the first page and the first post. -->
          <?php
          // This if statement allows a "featured blog" post to be shown at the top. It is stylized differently then the rest of the blog posts.
          if($first == true){ ?>
            <div class="featured-blog-post row g-0">
              <div class="featured-blog-image col-md-8">
                <?php the_post_thumbnail('full'); ?>
              </div>

              <div class="featured-blog-text my-auto col-md-4">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <!-- Display Author and Publish Date Links -->
                <?php post_data(); ?>
                <p><?php echo get_the_excerpt(); ?></p>
                <p class="button-para"><a class="button" href="<?php the_permalink(); ?>">Read More</a></p>
              </div>
            </div>
          <?php
          // This else portion of the statement allows the rest of the blog posts to be stylized differently then the featured counter part above.
          }
          else { ?>
            <div class="regular-blog-post col-lg-4">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p class="regular-blog-image"><?php the_post_thumbnail('medium');?></p>
              <!-- Display Author and Publish Date Links -->
              <?php post_data(); ?>
              <p><?php echo get_the_excerpt(); ?></p>
              <p class="read-more-link"><a href="<?php the_permalink(); ?>">Read More...</a></p>
            </div> <?php
          } // Closes else Statement
        } // Closes while
      }// Closes if statment
      ?>
      <p class="pagination-para"><?php pagination_for_site(); ?></p>
    </div>
  </main> <!-- Ends the Main Container -->

<?php get_footer(); ?>
