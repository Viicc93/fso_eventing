<?php get_header(); ?>

<div class="main-content">
	<div class="fso-page col-xs-12 col-sm-12 col-md-8 col-lg-8">
	<?php if (have_posts()): ?>
		<?php	while ( have_posts() ) : the_post(); ?>
			<?php if (has_post_thumbnail()): ?>
				<?php
					$filename = get_the_post_thumbnail_url();
					$size = getimagesize($filename);
					$image_size = "horizontal-image";
					if ($size[0] < $size[1]) {
						$image_size = "vertical-image";
					}
				?>
			<?php endif; ?>

			<button class="fso-button" value="" onclick="history.back(-1)" /><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
				<article class="h-entry full-post">
					<p class="post-date dt-published"><?php the_date(); ?></p>
				<?php if (has_post_thumbnail()): ?>
					<div class="thumbnail single-img <?php echo  $image_size; ?>">
						<img class="u-photo" src="<?php the_post_thumbnail_url(); ?>"></img>
					</div>
				<?php endif; ?>
					<h1 class="p-name"><?php the_title(); ?></h1>
  				<div class="e-content"><?php the_content(); ?></div>
					<p class="post-date dt-published"><?php the_date(); ?></p>
					<span class="categories"><?php _e('Categories:', 'fso-eventing') ?> <?php the_category(', '); ?></span>
				</article>
		<?php endwhile; else: ?>
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

  <aside id="news-sidebar" class="sidebar col-xs-12 col-sm-12 col-md-4 col-lg-4">
  	<?php if ( is_active_sidebar( 'news-sidebar' ) ) : ?>
  		<header class="sidebar-header">
  			<h1 class="sidebar-title"><?php _e('News', 'fso-eventing') ?></h1>
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
