<?php get_header(); ?>

  <section class="featured-image-section">
    <div class="featured-image-header">
      <?php the_post_thumbnail('full'); ?>
    </div><!-- Ends the featured-image Div -->

    <div class="page-title">
      <h2><?php the_title(); ?></h2>
    </div><!-- Ends the page-title Div -->
  </section><!-- Ends thefeatured-image-section Div -->

  <main>
    <?php
      // WordPress Loop
      if(have_posts()){
        while(have_posts()){
          the_post(); ?>

      <section class="single-page">
          <!-- Display Content on Page -->
          <p><?php the_content(); ?></p>
      </section> <!-- Ends the Individual Posts Div -->


        <?php
        }
      }
    ?>
  </main> <!-- Ends the Main Container -->

<?php get_footer(); ?>
