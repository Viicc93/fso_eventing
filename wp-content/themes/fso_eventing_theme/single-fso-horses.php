<?php get_header(); ?>

<div class="main-content">

	<?php	while ( have_posts() ) : the_post(); ?>
		<?php 	$filename = get_the_post_thumbnail_url();
			$size = getimagesize($filename);

			$image_size = "horizontal-image";
			if ($size[0] < $size[1]) {
				$image_size = "vertical-image";
			}

			?>

					<button class="fso-button" value="" onclick="history.back(-1)" /><i class="fa fa-arrow-left" aria-hidden="true"></i></button>

				<article class="fso-page horse panel">
						<div class="thumbnail single-img  <?php echo  $image_size; ?>">
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
