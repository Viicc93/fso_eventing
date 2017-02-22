<header>
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
            <a class="navbar-brand" title="Ostholt Eventing" href="<?php bloginfo('url')?>"><img class="u-logo" src="<?php echo content_url(); ?>/themes/fso_eventing_theme/img/logo_fso.png" alt="Ostholt Eventing Logo"></a>
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
          <?php

                  wp_nav_menu( array(
                      'menu' => 'languagenav',
                      'container' => false,
                      'menu_id' => 'language-nav-desktop',
                      'menu_class' => 'language-nav',
                      'theme_location' => 'languagenav'
                    )
                  );

           ?>
    </nav>
  </header>
