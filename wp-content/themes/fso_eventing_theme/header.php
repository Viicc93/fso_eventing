<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png" />
  <?php wp_head(); ?>
  <title><?php bloginfo('name'); ?></title>
</head>

<body <?php body_class(); ?>>
  <div id="fso-wrapper">
    <?php if (is_front_page()): ?>
      <div class="hero-img-slider" >
  	     <?php wd_slider(2); ?>
         <?php language_nav(); ?>
      </div>
    <?php else: ?>
        <?php if ( is_singular('fso-horses') || is_singular('post') || !has_post_thumbnail() ) : ?>
          <div class="hero-img" style="background-image: url('<?php header_image(); ?>');">
            <?php language_nav(); ?>
          </div>
        <?php else: ?>
          <div class="hero-img" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
            <?php language_nav(); ?>
          </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php include 'include/navigation.php'; ?>
<?php
  function language_nav(){
        wp_nav_menu( array(
            'menu' => 'languagenav',
            'container' => false,
            'menu_id' => 'language-nav-mobile',
            'menu_class' => 'language-nav',
            'theme_location' => 'languagenav'
          )
        );
  }
 ?>
