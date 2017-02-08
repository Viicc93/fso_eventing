<?php get_header(); ?>

<div class="main-content">
	<?php if ( have_posts() ) : ?>
		<?php	while ( have_posts() ) : the_post(); ?>
			<article class="fso-page panel h-entry">
				<h1 class="p-name"><?php the_title(); ?></h1>
				<div class="e-content"><?php the_content(); ?></div>
			</article>
		<?php endwhile; else : ?>
			<div class="not-found">
				<p><?php _e( 'No page was found here' , 'fso-eventing'); ?></p>
			</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
