<?php
  $args = array ( 'post_type' =>'post', 'posts_per_page' => 3 );
  $horses = new WP_Query($args);

if ( have_posts() ) :

	while ( $horses->have_posts() ) : $horses->the_post(); ?>
    <article class="post post-wide h-entry">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-img">
        <div class="thumbnail">
          <div class="img" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
        </div>
      </div>

        <div class="content">
      <?php else: ?>
        <div class="content-wide">
      <?php endif; ?>

          <h2 class ="post-title p-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p class="post-date">Posted at: <?php the_date(); ?></p>
          <div class="p-summary"><?php the_excerpt(); ?></div>
          <div class="exc-footer">
              <a class="read-more" href="<?php the_permalink(); ?>">Read More &raquo;</a>
          </div>
        </div>
    </article>


  <?php endwhile; else: ?>

    <div class="not-found">
      <p><?php _e( 'No post was found here' , 'fso-eventing'); ?></p>
    </div>

  <?php endif; ?>
