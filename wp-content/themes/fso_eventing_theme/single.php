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
				<article class="h-entry full-post panel">
				<?php if (has_post_thumbnail()): ?>
					<div class="thumbnail single-img <?php echo  $image_size; ?>">
						<img class="u-photo" src="<?php the_post_thumbnail_url(); ?>"></img>
					</div>
				<?php endif; ?>
					<h1 class="p-name"><?php the_title(); ?></h1>
  				<div class="e-content"><?php the_content(); ?></div>
					<p class="post-date dt-published"><?php _e('Posted at:', 'fso-eventing') ?> <?php the_date(); ?></p>
					<span class="categories"><?php _e('Categories:', 'fso-eventing') ?> <?php the_category(); ?></span>
				</article>
		<?php endwhile; else: ?>
				<div class="not-found">
					<p><?php _e( 'No post was found here' , 'fso-eventing'); ?></p>
				</div>
	<?php endif; ?>
	</div>

  <aside id="news-sidebar" class="sidebar col-xs-12 col-sm-12 col-md-4 col-lg-4">
  	<?php if ( is_active_sidebar( 'news-sidebar' ) ) : ?>
  		<header class="sidebar-header">
  			<h1 class="sidebar-title"><?php _e('NEWS', 'fso-eventing') ?></h1>
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
