    <footer>
      <div class="three-column">
        <?php
          dynamic_sidebar('left-footer-widget');
        ?>
      </div><!-- End of three-column Div -->

      <div class="three-column">
        <?php
          dynamic_sidebar('middle-footer-widget');
        ?>
      </div><!-- End of three-column Div -->

      <div class="three-column">
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
          echo "<p>Please select a menu through the dashboard.</p>";
        }
        ?>
      </div><!-- End of three-column Div -->


    </footer><!-- End of Footer -->
  </body><!-- End of Body Tag (Began in Header) -->
  <?php wp_footer(); ?>
</html><!-- End of HTML Tag (Began in Header) -->
