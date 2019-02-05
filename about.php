<?php 
  /* Template Name: About Page */
?>

<?php get_header(); ?>
  <?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>
      <div class="container-fluid">

      <?php for ($i=1; $i <= 3; $i++ ):?>

        <?php if($i === 1 || $i === 3): ?>
          <div class="row no-margins">
            <div class="col-md-6 about__text-div">
              <h1 class="heading-one center"><?= get_theme_mod('about_page_heading_'.$i.'_setting'); ?></h1>
              <hr class="heading-one--underline">
              <p><?= get_theme_mod('about_page_paragraph_'.$i.'_setting'); ?></p>
            </div>
            <div class="col-md-6 about__img" style="background-image: url(<?php echo get_theme_mod('about_page_image_'.$i.'_setting'); ?>"></div>
          </div>

        <?php else: ?>
          <div class="row no-margins">
              <div class="col-md-6 about__img" style="background-image: url(<?php echo get_theme_mod('about_page_image_'.$i.'_setting'); ?>"></div>
              <div class="col-md-6 about__text-div">
                <h1 class="heading-one center"><?= get_theme_mod('about_page_heading_'.$i.'_setting'); ?></h1>
                <hr class="heading-one--underline">
                <p><?= get_theme_mod('about_page_paragraph_'.$i.'_setting'); ?></p>
              </div>
            </div>
        <?php endif; ?>


      <?php endfor; ?>

      </div>
    <?php endwhile; ?>
  <?php endif; ?>
<?php get_footer(); ?>