    <footer>
      <div class="container">
        <div class="row">

          <!-- Left Side of Footer -->
          <div class="col-lg-5">
            <!-- Left Side Widget Bar Code -->
            <?php dynamic_sidebar('left-footer-widget'); ?>
          </div> <!-- End of Left Side of Footer Div -->

          <!-- Middle Side of Footer -->
          <div class="col-lg-5">
            <!-- Middle Side Widget Bar Code -->
            <?php dynamic_sidebar('middle-footer-widget'); ?>
          </div> <!-- End of Middle Side of Footer Div -->

          <!-- Right Side of Footer -->
          <div class="col-lg-2">
            <?php
              // Footer Menu Bar Section
              // Says, if the footer is filled out, display menu, if not, displays a message.
              if(has_nav_menu('footer-right')){ ?>
                <nav class="footer-menu">
                  <?php
                  // Shows the navigation to the page, created by the user
                  wp_nav_menu(array(
                    'theme_location'  => 'footer-right',
                  ));
                  ?>
                </nav><!-- End of footer-menu Navigation -->
              <?php
              } else {
                echo "<p>Please select a menu through the dashboard to display here.</p>";
              }
            ?>

            <!-- Social Media Links Section, Code from WPGossip.com -->
            <ul class="social-icon">
              <?php do_action('social-media-links'); ?>
            </ul>

          </div> <!-- End of col-lg-2 (Right Side of Footer) div -->
        </div> <!-- End of Row Dic -->
      </div> <!-- End of Container Div -->
    </footer><!-- End of Footer -->
  </body><!-- End of Body Tag (Began in Header) -->
  <?php wp_footer(); ?>
</html><!-- End of HTML Tag (Began in Header) -->
