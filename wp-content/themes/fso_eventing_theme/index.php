<?php get_header(); ?>
<?php $i = 0; ?>

<div class="main-content">
	
	<?php if ( have_posts() ) : ?>
	<div class="posts col-xs-12 col-sm-6 col-md-8">

	<?php	while ( have_posts() ) : the_post(); ?>

				<?php if ($i === 0 ): ?>

					<article class="post panel">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class=""><?php the_content(); ?></div>
						<div class="exc-footer">
							<a class="read-more-btn" href="<?php the_permalink(); ?>"><button type="button" class="btn btn-default">Read More</button></a>
						</div>
					</article>

				<?php else: ?>

					<article class="post panel">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class=""><?php the_content(); ?></div>
						<div class="exc-footer">
							<a class="read-more-btn" href="<?php the_permalink(); ?>"><button type="button" class="btn btn-default">Read More</button></a>
						</div>
					</article>
					
				<?php endif ?>

				<?php $i++; ?>
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