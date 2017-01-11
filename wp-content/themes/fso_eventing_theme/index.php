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
							<h2 class ="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p class="post-date">Posted at: <?php the_date(); ?></p>
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

							<h2 class ="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p class="post-date">Posted at: <?php the_date(); ?></p>
							<div class=""><?php the_excerpt(); ?></div>
							<div class="exc-footer">
								<a class="read-more" href="<?php the_permalink(); ?>">Read More &raquo;</a>
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
			<?php if ( is_active_sidebar( 'news-sidebar' ) ) : ?>
				<header class="sidebar-header">
					<h1 class="sidebar-title">NEWS</h1>
				</header>
				<div id="primary-sidebar" class="c widget-area panel" role="complementary">
					<?php dynamic_sidebar( 'news-sidebar' ); ?>
				</div>
			<?php endif; ?>
		</aside>
</main>
</div>

<?php get_footer(); ?>
