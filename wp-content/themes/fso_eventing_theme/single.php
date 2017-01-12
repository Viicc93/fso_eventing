<?php get_header(); ?>

<div class="main-content">
	<div class="posts col-xs-12 col-sm-12 col-md-8 col-lg-8">
	<?php	while ( have_posts() ) : the_post(); ?>
		<?php 	$filename = get_the_post_thumbnail_url();
			$size = getimagesize($filename);
			$image_size = "horizontal-image";
			if ($size[0] < $size[1]) {
				$image_size = "vertical-image";
			}

			?>

				<button class="fso-button" value="" onclick="history.back(-1)" /><i class="fa fa-arrow-left" aria-hidden="true"></i></button>

				<article class="fso-page panel">
						<div class="thumbnail single-img  <?php echo  $image_size; ?>">
							<?php the_post_thumbnail();?>
						</div>
						<h1><?php the_title(); ?></h1>

  						<div class=""><?php the_content(); ?></div>

					</article>

			<?php endwhile; ?>

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
