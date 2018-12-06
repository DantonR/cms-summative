<?php 

function custom_theme_customizer($wp_customize){
  $wp_customize->add_section('custom_theme_header_info', array(
    'title' => __('Header Styles', 'myfoodbag')
  ));

  $wp_customize->add_setting('header_background_colour_setting', array(
    'default' => '#ffffff',
    'transport' => 'refresh'
  ));

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'header_background_colour_control',
      array(
        'label' => __('Header Background Colour', 'myfoodbag'),
        'section' => 'custom_theme_header_info',
        'settings' => 'header_background_colour_setting'
      )
    )
      );








  // FRONT PAGE PANEL
  // $wp_customize->add_panel('Front_Page_Panel', array(
  //   'title' => __('Front Page', 'myfoodbag'),
  //   'priority' => 10,
  //   'description' => 'This panel contains customization options for the front page'
  // ));

  $wp_customize->add_panel('Front_Page_Panel', array(
    'title'             => __('Front Page' , 'zealandiaTheme'),
    'priority'          => 30,
    'description'       => 'This panel will hold the home page sections'
));

  $wp_customize->add_section('front_page_image', array(
    'title' => __('Main image', 'myfoodbag'),
    'priority' => 21,
    'panel' => 'Front_Page_Panel'
  ));

  $wp_customize->add_setting('front_page_image_setting', array(
    'default' => '',
    'transport' => 'refresh'
  ));

  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'front_page_image_control',
      array(
        'label' => __('Image', 'myfoodbag'),
        'section' => 'front_page_image',
        'settings' => 'front_page_image_setting'
      )
    )
      );

  $wp_customize->add_section('front_page_image_text', array(
    'title' => __('Main image text', 'myfoodbag'),
    'priority' => 20,
    'panel' => 'Front_Page_Panel'
  ));

  $wp_customize->add_setting('front_page_image_heading_setting', array(
    'default' => 'Template Heading',
    'transport' => 'refresh'
  ));

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'front_page_image_heading_control',
      array(
        'label' => __('Image Heading', 'myfoodbag'),
        'section' => 'front_page_image_text',
        'settings' => 'front_page_image_heading_setting'
      )
    )
      );

  $wp_customize->add_setting('front_page_image_text_setting', array(
    'default' => 'Image text paragraph here',
    'transport' => 'refresh'
  ));

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'front_page_image_text_control',
      array(
        'label' => __('Image Text', 'myfoodbag'),
        'section' => 'front_page_image_text',
        'settings' => 'front_page_image_text_setting'
      )
    )
      );

  
};















add_action('customize_register', 'custom_theme_customizer');

function custom_theme_customizer_styles(){
  ?>

      <style type="text/css">
          .header-bg{
              background-color: <?php echo get_theme_mod('header_background_colour_setting', '#ffffff'); ?>!important;
          }
      </style>

  <?php
}
add_action('wp_head', 'custom_theme_customizer_styles');