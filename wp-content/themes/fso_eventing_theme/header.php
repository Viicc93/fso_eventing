<!DOCTYPE html>
<html>

<head>
  <?php wp_head(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <!-- Add fancyBox -->
  <link rel="stylesheet" href="/fso_eventing/wp-content/themes/fso_eventing_theme/js/fancybox/source/jquery.fancybox.css?v=2.1.6" type="text/css" media="screen" />
  <script type="text/javascript" src="/fso_eventing/wp-content/themes/fso_eventing_theme/js/fancybox/source/jquery.fancybox.pack.js?v=2.1.6"></script>
</head>

<body <?php body_class(); ?>>
  <div id="fso-wrapper">
    <?php if (is_front_page()): ?>
      <div class="hero-img-slider" >
  	     <?php wd_slider(2); ?>
      </div>
    <?php else: ?>
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="hero-img" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
      <?php else: ?>
        <div class="hero-img" style="background-image: url('http://localhost:8888/fso_eventing/wp-content/themes/fso_eventing_theme/img/logo.jpg');"></div>
      <?php endif; ?>
    <?php endif; ?>

    <?php include 'include/navigation.php'; ?>
