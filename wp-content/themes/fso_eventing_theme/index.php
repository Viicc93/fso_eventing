<?php get_header(); ?>
<?php $i = 0; ?>

<div class="main-content">
	
	<?php if ( have_posts() ) : ?>
	<div class="posts col-xs-12 col-sm-8 col-md-9">

	<?php	while ( have_posts() ) : the_post(); ?>

				<?php if ($i === 0 ): ?>

					<article class="hero-post">
						<div class="thumbnail">
							<?php the_post_thumbnail();?>
						</div> 
						<div class="content">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class=""><?php the_content(); ?></div>
						</div>
					</article>

				<?php else: ?>

					<article class="post">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="thumbnail">
								<?php the_post_thumbnail();?>
							</div> 
							<div class="content">
						<?php else: ?>
							<div class="content-wide">
						<?php endif; ?>
						
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class=""><?php the_excerpt(); ?></div>
							<div class="exc-footer">
								<a class="read-more-btn" href="<?php the_permalink(); ?>"><button type="button" class="btn btn-default">Read More</button></a>
							</div>
						</div>
					</article>
					
				<?php endif ?>

				<?php $i++; ?>
			<?php endwhile; else : ?>
				
			<p><?php _e( 'No Posts' , 'fso-eventing'); ?></p>

		<?php endif; ?>

	</div>
		<aside class="sidebar col-xs-12 col-sm-4 col-md-3">
		<?php // SIDEBAR ?>
		</aside>
</main>
</div>

<?php get_footer(); ?>