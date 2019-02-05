<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <?php wp_head(); ?>
</head>
<body>
  <div class="content">
  <div class="container">
    <div class="row">
      <div class="col-12">
  <nav class="navbar navbar-expand-lg navbar-light bg-light header-bg" role="navigation">

      <button class="navbar-toggler" type="button" data-toggle="collapse"  data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <?php 
        $custom_logo = get_theme_mod('custom_logo');
        $logo_url = wp_get_attachment_image_url($custom_logo, 'medium');
      ?>
      <?php if($custom_logo): ?>
        <a href="<?= bloginfo('home');?>" class="navbar-brand">
          <img src="<?= $logo_url ?>" alt="Company Logo" height="80">
        </a>
      <?php else:?>
      <a href="<?= bloginfo('home'); ?>" class="navbar-brand"><?= bloginfo('name'); ?></a>
      <?php endif; ?>

      <?php 
        wp_nav_menu( array(
          'theme_location' => 'header_nav',
          'depth'          => 2,
          'container'      => 'div',
          'container_class'=> 'collapse navbar-collapse',
          'container_id'   => 'bs-example-navbar-collapse-1',
          'menu_class'     => 'nav navbar-nav',
          'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
          'walker'         => new WP_Bootstrap_Navwalker(),
        ));
      ?>
  </nav>
      
      </div>
    </div>
  </div>



