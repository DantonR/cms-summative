<?php get_header(); ?>

<div class="container">

  <div class="row">
    <h2 class="heading-two">Popular Items</h2>
  </div>
  <div class="row">
        <?php if (have_posts()): ?>
          <?php while(have_posts()): the_post(); ?>
            <div class="col-md-3 col-sm-6 margin-below">
              <div class="image image__sm">
                <div class="img-description__container">
                  <h1 class="p__main white"><?php the_title(); ?></h1>
                  <h1 class="p__subtitle white"><?php the_content(); ?></h1>
                </div>
              </div>
            </div>
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

 <?php
            $args = array(
                'post_type' => 'customer-feedback',
                'posts_per_page' => -1
            );
            $customerFeedback = new WP_Query($args);
            // var_dump($customerFeedback);
            // die();
            // var_dump($image);
           ?>

           <?php if( $customerFeedback->have_posts() ): ?>

            <?php while($customerFeedback->have_posts()): $customerFeedback->the_post(); ?>
              <?php $id = get_the_id(); ?>
              <h3><?php the_title(); ?></h3>
            <?php endwhile; ?>
           <?php endif; ?>

  
</div>

<?php get_footer(); ?>