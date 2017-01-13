<?php get_header(); ?>
<?php $i = 0; ?>

<div class="main-content">
	<div class="posts col-xs-12 col-sm-12 col-md-8 col-lg-8">
	<?php if ( have_posts() ) : ?>

	<?php	while ( have_posts() ) : the_post(); ?>

				<?php if ($i === 0 ): ?>

					<article class="hero-post h-entry">
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

					<article class="post h-entry">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="thumbnail">
								<div class="img" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
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
					<div class="not-found">
						<h5><?php _e( 'Ouups, nothing foud here!' , 'fso-eventing'); ?></h5>
					</div>
		<?php endif; ?>

	</div>
		<aside id="news-sidebar" class="sidebar col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<?php if ( is_active_sidebar( 'news-sidebar' ) ) : ?>
					<header class="sidebar-header">
						<h1 class="sidebar-title">NEWS</h1>
					</header>
					<div class="sidebar-content">
						<ul class="c widget-area" role="complementary">
							<?php dynamic_sidebar( 'news-sidebar' ); ?>
						</ul>
					</div>
			<?php endif; ?>
		</aside>
	</div>


<?php get_footer(); ?>
