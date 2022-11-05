<!-- Pulls in Header Information -->
<?php get_header(); ?>

  <main class="container">
    <div class="row">
      <div class="col-sm-12">
        <!-- Page Title for Archive Pages -->
        <h2><?php
            if(is_category()){
              single_cat_title();
            }elseif(is_tag()){
              single_tag_title();
            }elseif(is_day()){
              echo "Daily Archives: " . get_the_date();
            }elseif(is_month()){
              echo "Monthly Archives: " . get_the_date('F Y');
            }elseif(is_year()){
              echo "Yearly Archives: " . get_the_date('Y');
            }else {
              echo "Archives";
            }?></h2> <!-- End of Archive Title Page -->
      </div> <!-- End col-md-12 dive -->

      <div class="row">
        <?php
          // WordPress Loop
          if(have_posts()){
            while(have_posts()){
              the_post(); ?>

              <div class="archive-posts regular-blog-post col-md-6">
                <p class="regular-blog-image"><?php the_post_thumbnail('medium');?></p>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <!-- Display Author and Publish Date Links -->
                <?php post_data(); ?>
                <p><?php echo get_the_excerpt(); ?></p>
                <p class="read-more-link"><a href="<?php the_permalink(); ?>">Read More...</a></p>
              </div>
            <?php
            } //End of while loop
            ?>
            <!-- Pagination For Website -->
            <p class="pagination-para"><?php pagination_for_site(); ?></p>
          <?php
          } //End of If loop
          ?>
      </div> <!-- End of col-md-9 -->
    </div> <!-- End of row -->
  </main> <!-- End of Container -->


<!-- Pulls in Footer Information -->
<?php get_footer(); ?>
