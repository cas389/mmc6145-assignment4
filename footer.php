<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <?php
          // Says, if the footer is filled out, display menu, if not, displays a message.
          if(has_nav_menu('footer-left')){ ?>
            <nav class="footer-menu">
              <?php
              // Shows the navigation to the page, created by the user
              wp_nav_menu(array(
                'theme_location'  => 'footer-left',
              ));
              ?>
            </nav><!-- End of footer-menu Navigation -->
          <?php
        }else {
          echo "<p>Please select a main menu through the dashboard.</p>";
        }
        ?>
      </div><!-- End of Col-md-4 div -->

      <div class="col-md-4">
        <?php
          // Says, if the footer is filled out, display menu, if not, displays a message.
          if(has_nav_menu('footer-middle')){ ?>
            <nav class="footer-menu">
              <?php
              // Shows the navigation to the page, created by the user
              wp_nav_menu(array(
                'theme_location'  => 'footer-middle',
              ));
              ?>
            </nav><!-- End of footer-menu Navigation -->
          <?php
        }else {
          echo "<p>Please select a main menu through the dashboard.</p>";
        }
        ?>
      </div><!-- End of Col-md-4 div -->

      <div class="col-md-4">
        <?php
          dynamic_sidebar('right-footer-widget');
        ?>
        <?php
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
        }else {
          echo "<p>Please select a main menu through the dashboard.</p>";
        }
        ?>
      </div><!-- End of Col-md-4 div -->
    </div><!-- End of Row Div -->
  </div><!-- End of Container -->
</footer><!-- End of Footer -->
<?php wp_footer(); ?>
</body>
</html>
