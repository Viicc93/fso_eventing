<?php get_header(); ?>


<div class="main-content">
	<section class="posts col-xs-12 col-sm-12 col-md-8 col-lg-8">
	<?php if ( have_posts() ) : ?>
		<?php	while ( have_posts() ) : the_post(); ?>
				<article class="hero-post h-entry">
					<?php if (has_post_thumbnail()): ?>
						<div class="thumbnail">
							<?php the_post_thumbnail();?>
						</div>
					<?php endif; ?>
					<div class="content">
						<h2 class ="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class=""><?php the_content(); ?></div>
					</div>
				</article>
		<?php endwhile; else : ?>
			<div class="not-found">
				<h5><?php _e( 'Ouups! Nothing found here!' , 'fso-eventing'); ?></h5>
				<p>
					<?php _e('I screwed up and you discovered my fatal flaw.
										Well, we\'re not all perfect, but we try.  Can you try this
										again or maybe visit our ', 'fso-eventing'); ?>
					<a title="Ostholt Eventing" href="<?php bloginfo('url'); ?>"><?php _e('Home Page', 'fso-eventing') ?></a>
					<?php _e(' to start fresh.  We\'ll do better next time.', 'fso-eventing'); ?>
				</p>
			</div>
		<?php endif; ?>
	</section>
</div>

<?php get_footer(); ?>
