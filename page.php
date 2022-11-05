<?php get_header(); ?>
  <main class="container">
    <section class="hero-section full-width">
      <?php the_post_thumbnail('full'); ?>
      <section class="page-title">
        <h1><?php the_title(); ?></h1>
      </section>
    </section>


    <section class="text-area">
      <?php
        // WordPress Loop
        if(have_posts()){
          while(have_posts()){
            the_post(); ?>

            <!-- Display Content on Page -->
            <p><?php the_content(); ?></p>


          <?php
          }
        }
      ?>
    </section>
  </main>
<?php get_footer(); ?>
