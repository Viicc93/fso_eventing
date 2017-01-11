<?php get_header(); ?>

<div class="main-content">


	<?php	while ( have_posts() ) : the_post(); ?>


					<article class="fso-page panel">
						<h1><?php the_title(); ?></h1>
						<div class=""><?php the_field('information'); ?></div>
					</article>

			<?php endwhile; else : ?>


</div>

<?php get_footer(); ?>
