<?php get_header(); ?>

<div class="main-content">
	
	<?php if ( have_posts() ) : ?>
	<div class="posts col-xs-12 col-sm-6 col-md-8">

	<?php	while ( have_posts() ) : the_post(); ?>

					<article class="post panel">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class=""><?php the_content(); ?></div>
					</article>

			<?php endwhile; else : ?>
				
			<p><?php _e( 'No Posts' , 'fso-eventing'); ?></p>

		<?php endif; ?>

	</div>
		<aside class="sidebar col-xs-12 col-sm-6 col-md-4">
		<?php // SIDEBAR ?>
		</aside>
</main>
</div>

<?php get_footer(); ?>