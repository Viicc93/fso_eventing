<?php get_header(); ?>

<div class="main-content">
	
	<?php if ( have_posts() ) : ?>

	<?php	while ( have_posts() ) : the_post(); ?>

					<article class="fso-page panel">
						<h1><?php the_title(); ?></h1>
						<div class=""><?php the_content(); ?></div>
					</article>

			<?php endwhile; else : ?>
				
			<p><?php _e( 'No Posts' , 'fso-eventing'); ?></p>

		<?php endif; ?>

</main>
</div>

<?php get_footer(); ?>