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
    'title'             => __('Front Page' , 'myfoodbag'),
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


    //ABOUT PAGE
    $wp_customize->add_panel('About_Page_Panel', array(
      'title'             => __('About Page' , 'myfoodbag'),
      'priority'          => 60,
      'description'       => 'This panel will hold the about page sections'
  ));
  


  

    for ($i=1; $i <= 3; $i++ ){
      $wp_customize->add_section('about_page_section_'.$i, array(
        'title' => __('About Section '.$i, 'myfoodbag'),
        'priority' => 21,
        'panel' => 'About_Page_Panel'
      ));
    
      $wp_customize->add_setting('about_page_heading_'.$i.'_setting', array(
        'default' => 'Heading '.$i.' here',
        'transport' => 'refresh'
      ));

      $wp_customize->add_control(
        new WP_Customize_Control(
          $wp_customize,
          'about_page_heading_'.$i.'_control',
          array(
            'label' => __('About Page Heading', 'myfoodbag'),
            'section' => 'about_page_section_'.$i,
            'settings' => 'about_page_heading_'.$i.'_setting'
          )
        )
          );

      $wp_customize->add_setting('about_page_paragraph_'.$i.'_setting', array(
        'default' => 'paragraph '.$i.' here',
        'transport' => 'refresh'
      ));

      $wp_customize->add_control(
        new WP_Customize_Control(
          $wp_customize,
          'about_page_paragraph_'.$i.'_control',
          array(
            'label' => __('About Page paragraph', 'myfoodbag'),
            'section' => 'about_page_section_'.$i,
            'settings' => 'about_page_paragraph_'.$i.'_setting'
          )
        )
          );
      
      $wp_customize->add_setting('about_page_image_'.$i.'_setting', array(
        'default' => '',
        'transport' => 'refresh'
      ));
    
      $wp_customize->add_control(
        new WP_Customize_Image_Control(
          $wp_customize,
          'about_page_image_'.$i.'_control',
          array(
            'label' => __('About Page Image', 'myfoodbag'),
            'section' => 'about_page_section_'.$i,
            'settings' => 'about_page_image_'.$i.'_setting'
          )
        )
          );

    };
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