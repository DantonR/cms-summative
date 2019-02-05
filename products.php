<?php 
/* Template Name: Products Page */
?>
<?php get_header(); ?>

<div class="container">
  <div class="row">

    <?php 
      $args = array(
        'post_type' => 'products-post',
        'order' => 'ASC',
        'orderby' => 'title',
        'posts_per_page' => -1
      );
      $allProducts = new WP_Query($args)
    ?>

    <?php if($allProducts->have_posts()): ?>
      <?php while($allProducts -> have_posts()): $allProducts->the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
      <?php endwhile; ?>
    <?php endif; ?>

  </div>

</div>

<?php get_footer(); ?>