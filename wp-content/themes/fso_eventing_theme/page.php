<?php get_header(); ?>

<div class="main-content">
	<?php if ( have_posts() ) : ?>
		<?php	while ( have_posts() ) : the_post(); ?>
			<article class="fso-page h-entry">
				<h1 class="p-name page-title"><?php the_title(); ?></h1>
				<div class="e-content"><?php the_content(); ?></div>
			</article>
		<?php endwhile; else : ?>
			<div class="not-found">
				<h5><?php _e( 'Ouups! Nothing found here!' , 'fso-eventing'); ?></h5>
				<p>
					<?php _e('I screwed up and you discovered my fatal flaw. Well, we\'re not all perfect, but we try.  Can you try this again or maybe visit our ', 'fso-eventing'); ?>
					<a title="Ostholt Eventing" href="<?php bloginfo('url'); ?>"><?php _e('Home Page', 'fso-eventing') ?></a>
					<?php _e(' to start fresh.  We\'ll do better next time.', 'fso-eventing'); ?>
				</p>
			</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
