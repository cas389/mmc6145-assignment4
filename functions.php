<?php
/* ======================================

  Adding Stylsheets and JavaScripts Files

====================================== */
  function custom_theme_scripts(){
    // Main CSS Stylesheet
    wp_enqueue_style('main-styles', get_stylesheet_uri());

    // Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Zen+Antique&display=swap', false );

    // JavaScript File
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/js/javascript.js');
  }

  add_action('wp_enqueue_scripts', 'custom_theme_scripts');

  /* ======================================

    Adding Featured Images

  ====================================== */
  add_theme_support('post-thumbnails');


  /* ======================================

    Custom Header Image (Logo)

  ====================================== */
  $custom_image_header = array(
    'width'   => 200,
    'height'  => 100,
    'uploads' => true
  );

  add_theme_support('custom-header', $custom_image_header);

  /* ======================================

    Post Data Information of Author and Date

  ====================================== */
  function post_data(){
    $archive_year   = get_the_time('Y');
    $archive_month  = get_the_time('m');
    $archive_day    = get_the_time('d');
    ?>

    <p class="post-data">
      Written by: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>
    </p>
    <p class="post-data">
      Published on: <a href="<?php echo get_day_link($archive_year,$archive_month,$archive_day); ?>"><?php echo "$archive_month/$archive_day/$archive_year"; ?></a>
    </p>
  <?php
  }

  /* ======================================

    Add Menus to the Theme

  ====================================== */
  function register_my_menus(){
    register_nav_menus(array(
      'main-menu'     => __('Main Menu'),
      'footer-right'   => __('Right Footer Menu'),
    ));
  }

  add_action('init','register_my_menus');

  /* ======================================

    Pagination Links

  ====================================== */

  function pagination_for_site(){
    global $wp_query;

    $big = 999999999; // need an unlikely integer
    $translated = __( 'Page', 'mytextdomain' ); // Supply translatable string

    echo paginate_links( array(
      'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format'             => '?paged=%#%',
      'current'            => max( 1, get_query_var('paged') ),
      'total'              => $wp_query->max_num_pages,
      'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
    ) );
  }

  /* ======================================

    Creating Widget Areas

  ====================================== */
  function blank_widgets_init(){
    register_sidebar(array(
      'name'          => ('Left Footer Widget'),
      'id'            => 'left-footer-widget',
      'description'   => 'Area in the left footer for content',
      'before_widget' => '<div class="left-footer-widget-container">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));

    register_sidebar(array(
      'name'          => ('Middle Footer Widget'),
      'id'            => 'middle-footer-widget',
      'description'   => 'Area in the middle footer for content',
      'before_widget' => '<div class="middle-footer-widget-container">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));

    register_sidebar(array(
      'name'          => ('Single Blog Post Page Widget'),
      'id'            => 'blog-post-widget',
      'description'   => 'Area Above Other Posts on the Single Blog Post Pages',
      'before_widget' => '<div class="blog-post-widget-container">',
      'after_widget'  => '</div>',// End of sidebar widget container
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
    ));
  }

  add_action('widgets_init', 'blank_widgets_init');

?>
