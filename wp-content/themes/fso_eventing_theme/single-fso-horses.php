<?php get_header(); ?>

<div class="main-content">

	<?php	while ( have_posts() ) : the_post(); ?>

<input type="button" value=" <?php _e('All Horses') ?>" onclick="history.back(-1)" />
					<article class="fso-page panel">
						<div class="thumbnail">
							<?php the_post_thumbnail();?>
						</div>
						<h1><?php the_title(); ?></h1>
						<div class="horse-tags">
							 <p><b class="horse-tag"><?php _e('Year: ', 'fso-eventing'); ?></b><?php the_field('year'); ?></p>
							 <p><b class="horse-tag"><?php _e('Height: ', 'fso-eventing'); ?></b><?php the_field('height'); ?></p>
							 <p><b class="horse-tag"><?php _e('Discipline: ', 'fso-eventing'); ?></b><?php the_field('discipline'); ?></p>
							 <p><b class="horse-tag"><?php _e('Level: ', 'fso-eventing'); ?></b><?php the_field('level'); ?></p>
						</div>
						<div class=""><?php the_field('information'); ?></div>

					</article>

			<?php endwhile; ?>




</div>

<?php get_footer(); ?>
