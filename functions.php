<?php 

  

  // ADD CSS AND JAVASCRIPT
  function add_custom_theme_styles(){
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.3', 'all');
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme-style.css', array(), '0.0.1', 'all');
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '4.1.3', true);
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', array(), '0.0.1', 'all');

  }
  add_action('wp_enqueue_scripts', 'add_custom_theme_styles');

  require get_parent_theme_file_path('./addons/customCustomizer.php');

  // CUSTOM SIDEBAR
  function register_my_sidebars(){
    register_sidebar(array(
      'id' => 'front_page_sidebar',
      'name' => 'Front Page Sidebar',
      'description' => 'Sidebar for the front page',
      'before_widget' => '<div id="%1$s" class="widget customWidget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgetTitle">',
      'after_titel' => '</h3>'

    ));
  }
  add_action('widgets_init', 'register_my_sidebars');

  function add_custom_theme_supports(){
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array('aside', 'gallery', 'image', 'video', 'link'));
  }
  add_action('wp_enqueue_scripts', 'add_custom_theme_supports');

  function add_custom_logo(){
    add_theme_support('custom-logo', array(
      'height' => 100,
      'width'  => 300,
      'flex-width' => true,
      'flex-height' => true
    ));
  }
  add_action('init', 'add_custom_logo');


  // CUSTOM MENUS
  function addCustomMenus() {
    add_theme_support('menus');
    register_nav_menu('header_nav', 'This is the navigation that appears at the top of the page');
    register_nav_menu('footer_nav', 'This is the navigation that appears at the bottom of the page');
  }
  add_action('init', 'addCustomMenus');

  require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

  function add_customer_feedback_post_type(){
    $labels = array(
      'name' => _x('Customer Feedback', 'post type name', 'myfoodbag'),
      'singular_name' => _x('Customer Feedback', 'post types singular name', 'myfoodbag'),
      'add_new_item' => _x('Add new customer feedback', 'adding new customer feedback', 'myfoodbag')
    );
  
    $args = array(
      'labels' => $labels,
      'description' => 'a post type for customer feedback',
      'public' => false,
      'hierarchical' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => false,
      'menu_position' => 20,
      'menu_icon' => 'dashicons-gropus',
      'supports' => array(
        'title',
        'thumbnail'
      ),
      'query_var' => true
    );
  
    register_post_type('customer-feedback', $args);
  }
  add_action('init', 'add_customer_feedback_post_type');
