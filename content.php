<?php if(has_post_thumbnail() ): ?>




<a href="<?= esc_url(get_permalink()); ?>" class="col-md-3 col-sm-6 margin-below">

<?php  
  $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
  echo '<div class="image image__sm" style="background: url('. $url.') no-repeat center/cover">';
?>
    <!-- <div class="image image__sm"> -->
      <div class="img-description__container">
        <h1 class="p__main white"><?php the_title(); ?></h1>

        <?php
          $id = get_the_id();
          $productPrice = get_post_meta($id, 'productPrice', true);
          $peopleAmount = get_post_meta($id, 'peopleAmount', true);
        ?>

        <p class="p__subtitle white">$<?= $productPrice ?> per month<br>Feeds <?= $peopleAmount ?> people</p>
      </div>
    </div>

</a>
<?php endif; ?>
