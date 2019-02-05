<?php 


// CUSTOM POST TYPES

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
      'thumbnail',
      'editor'
    ),
    'query_var' => true
  );

  register_post_type('customer-feedback', $args);
};
add_action('init', 'add_customer_feedback_post_type');


function add_product_post_type(){
  $labels = array(
    'name' => _x('Products', 'post type name', 'myfoodbag'),
    'singular_name' => _x('Product', 'post types singular name', 'myfoodbag'),
    'add_new_item' => _x('Add new product', 'adding new product', 'myfoodbag')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'a post type for products',
    'public' => true,
    'hierarchical' => true,
    'exclude_from_search' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => false,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-gropus',
    'supports' => array(
      'title',
      'thumbnail',
      'editor'
    ),
    'query_var' => true
  );

  register_post_type('products-post', $args);
};
add_action('init', 'add_product_post_type');