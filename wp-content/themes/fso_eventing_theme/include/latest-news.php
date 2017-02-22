<?php
  $args = array ( 'post_type' =>'post', 'posts_per_page' => 3 );
  $horses = new WP_Query($args);
?>

<?php if ( have_posts() ) : ?>

	<?php while ( $horses->have_posts() ) : $horses->the_post(); ?>
    <article class="post post-wide h-entry">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-img">
          <div class="thumbnail">
            <div class="img">
              <img class="u-photo" src="<?php the_post_thumbnail_url(); ?>"></img>
            </div>
          </div>
        </div>
        <div class="content">
      <?php else: ?>
        <div class="content-wide">
      <?php endif; ?>
        <h2 class ="post-title p-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="post-date dt-published"><?php _e('Posted at: ', 'fso-eventing'); ?> <?php the_date(); ?></p>
        <div class="p-summary"><?php the_excerpt(); ?></div>
        <div class="exc-footer">
          <a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read More', 'fso-eventing'); ?> &raquo;</a>
        </div>
      </div>
    </article>
  <?php endwhile; else: ?>
    <div class="not-found">
      <p><?php _e( 'Ouups, no latest news was found...' , 'fso-eventing'); ?></p>
    </div>
<?php endif; ?>
