<?php
  $args = array ( 'post_type' =>'post', 'posts_per_page' => 3 );
  $horses = new WP_Query($args);

	while ( $horses->have_posts() ) : $horses->the_post(); ?>
    <article class="post post-wide">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="thumbnail">
          <?php the_post_thumbnail();?>
        </div>

        <div class="content">
      <?php else: ?>
        <div class="content-wide">
      <?php endif; ?>

          <h2 class ="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p class="post-date">Posted at: <?php the_date(); ?></p>
          <div class=""><?php the_excerpt(); ?></div>
          <div class="exc-footer">
              <a class="read-more" href="<?php the_permalink(); ?>">Read More &raquo;</a>
          </div>
        </div>
    </article>


    <?php endwhile; ?>
