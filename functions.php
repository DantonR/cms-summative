<?php 
  function add_custom_theme_styles(){
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.3', 'all');
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme-style.css', array(), '0.0.1', 'all');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '4.1.3', 'all');
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', array(), '0.0.1', 'all');


    global $wp_query;

    wp_localize_script('theme-scripts', 'load_more', array(
      'ajax_url' => site_url() . '/wp-admin/admin-ajax.php',
      'query' => json_encode($wp_query->query_vars),
      'current_page' => get_query_var('paged') ? get_query_var('paged'): 1,
      'max_page' => $wp_query->max_num_pages
    ));

  }
  add_action('wp_enequeue_scripts', 'add_custom_theme_styles')

  function add_admin_custom_styles(){
    wp_enqueue_style('admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), '0.0.1', 'all');
  }
  add_action('admin_enqueue_scripts', 'add_admin_custom_styles');

  function add_custom_theme_supports(){
    add_theme_support('post-thumbnails');
    add_theme_support('menus');

    register_nav_menu('header_nav', 'Navigation menu for the top of the page');
    register_nav_menu('header_nav', 'Navigation menu for the bottom of the page');

    add_theme_support('post-formats', array( 'aside', 'gallery', 'image', 'video', 'link'))

    add_theme_support('custom-logo', array());
  }
  add_action('init', 'add_custom_theme_supports');


  require_once get_template_directory() . '/addons/class-wp-bootstrap-navwalker.php';
  require_once get_template_directory() . '/addons/class-wp-comments-walker.php';

  require get_parent_theme_file_path('./addons/custom_post_types.php');
  require get_parent_theme_file_path('./addons/custom_customizer.php');
  require get_parent_theme_file_path('.addons/custom_fields.php');


?>