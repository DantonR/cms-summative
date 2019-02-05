<?php get_header(); ?>

<div class="container">

  <div class="row">
    <div class="col">
    
      <h2 class="heading-two" >Popular Items</h2>
    </div>
  </div>

  
  <?php
    $args = array(
      'post_type' => 'products-post',
      'posts_per_page' => 4
    );
    $productsPost = new WP_Query($args)
  ?>
  
  <div class="row">
    <?php if( $productsPost->have_posts()): ?>
      <?php while( $productsPost->have_posts()): $productsPost->the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>

                
  

  <div class="row">
    <div class="col-12">
      <div class="image image__lg" style="background-image: url(<?php echo get_theme_mod('front_page_image_setting'); ?>">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5 hero-container">
              <h1 class="heading-one"><?php echo get_theme_mod('front_page_image_heading_setting'); ?></h1>
              <p><?php echo get_theme_mod('front_page_image_text_setting'); ?></p>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-3"></div>
    <div class="col-6">
      <h1 class="heading-one center">Hear from our happy customers</h1>
      <hr class="heading-one--underline">
    </div>
    <div class="col-3"></div>
  </div>


    <div class="row">
 <?php
            $args = array(
                'post_type' => 'customer-feedback',
                'posts_per_page' => -1
            );
            $customerFeedback = new WP_Query($args);
           ?>

           <?php if( $customerFeedback->have_posts() ): ?>

            <?php while($customerFeedback->have_posts()): $customerFeedback->the_post(); ?>
              <?php $id = get_the_id(); ?>
              <div class="col-md-3">
              <?php  
                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                echo '<div class="user-review__profile" style="background: url('. $url.') no-repeat center/cover"></div>';
              ?>
                <!-- <div class="user-review__profile"></div> -->
                <h3 class="heading-one heading-one--small center"><?php the_title(); ?></h3>
                <p><?php the_content(); ?></p>
              </div>
            <?php endwhile; ?>
           <?php endif; ?>
           </div>
  
</div>

<?php get_footer(); ?>