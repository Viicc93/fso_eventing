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
    <?php if (get_field('breed') != null) : ?><p class="horse-breed"><?php the_field('breed'); ?></p><?php endif; ?>
    <div class="p-summary">
      <?php if (get_field('year') != null) : ?><p class="horse-tag"><b class="horse-tag-title p-category"><?php _e('Year: ', 'fso-eventing'); ?></b> <?php the_field('year'); ?></p><?php endif; ?>
      <?php if (get_field('gender') != null) : ?><p class="horse-tag"><b class="horse-tag-title p-category"><?php _e('Gender: ', 'fso-eventing'); ?></b> <?php the_field('gender'); ?></p><?php endif; ?>
      <?php if (get_field('height')!= null) : ?><p class="horse-tag"><b class="horse-tag-title p-category"><?php _e('Height: ', 'fso-eventing'); ?></b> <?php the_field('height'); ?></p><?php endif; ?>
      <?php if (get_field('discipline')!= null) : ?><p class="horse-tag"><b class="horse-tag-title p-category"><?php _e('Discipline: ', 'fso-eventing'); ?> </b><?php the_field('discipline'); ?></p><?php endif; ?>
      <?php if (get_field('level')!= null) : ?><p class="horse-tag"><b class="horse-tag-title p-category"><?php _e('Level: ', 'fso-eventing'); ?></b> <?php the_field('level'); ?></p><?php endif; ?>
    </div>
    <div class="exc-footer">
      <a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read More', 'fso-eventing'); ?> &raquo;</a>
    </div>
  </div>
</article>
