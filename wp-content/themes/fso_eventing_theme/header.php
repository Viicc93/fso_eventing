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
<header>
  <div id="logo" style="background-image: url('<?php bloginfo('url'); ?>/wp-content/themes/fso_eventing_theme/img/logo.jpg');"></div>
  <div class="info"></div>
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">

            <?php
                wp_nav_menu( array(
                    'menu' => 'primarynav',
                    'depth' => 2,
                    'container' => false,
                    'menu_class' => 'nav',
                    'walker' => new wp_bootstrap_navwalker())
                );
            ?>
          </div>
    </nav>
  </header>
