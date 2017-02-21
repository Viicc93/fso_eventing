<article class="post horse-sm h-entry">
  <div class="post-img">
    <div class="thumbnail">
      <div class="img">
        <img class="u-photo" src="<?php the_post_thumbnail_url(); ?>"></img>
      </div>
    </div>
  </div>
  <div class="content">
    <h2 class ="post-title p-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="p-summary">
      <p><b class="horse-tag p-category"><?php _e('Year: ', 'fso-eventing'); ?></b><?php the_field('year'); ?></p>
      <p><b class="horse-tag p-category"><?php _e('Height: ', 'fso-eventing'); ?></b><?php the_field('height'); ?></p>
      <p><b class="horse-tag p-category"><?php _e('Discipline: ', 'fso-eventing'); ?></b><?php the_field('discipline'); ?></p>
      <p><b class="horse-tag p-category"><?php _e('Level: ', 'fso-eventing'); ?></b><?php the_field('level'); ?></p>
    </div>
    <div class="exc-footer">
      <a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read More', 'fso-eventing'); ?> &raquo;</a>
    </div>
  </div>
</article>
