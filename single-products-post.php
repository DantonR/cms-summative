<?php get_header(); ?>


<?php if(have_posts()): ?>
  <?php while(have_posts()): the_post(); ?>
    <div class="container">
      <div class="row">
        <?php 
          $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
          echo '<div class="col-md-6" style="background: url('. $url.') no-repeat center/cover; height: 700px;"></div>';
        ?>
        <div class="col-md-6" style="padding:70px">
          <h1><?php the_title(); ?></h1>
          <?php
          $id = get_the_id();
          $productPrice = get_post_meta($id, 'productPrice', true);
          $peopleAmount = get_post_meta($id, 'peopleAmount', true);
        ?>
          <h3>$<?= $productPrice ?> per month<br>Feeds <?= $peopleAmount ?> people</h3>
          <p><?php the_content(); ?></p>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>