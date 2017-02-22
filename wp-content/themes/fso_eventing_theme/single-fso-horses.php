<?php get_header(); ?>

<?php
// GET HORSES WITH WP QUERY
	$horse_args = array ( 'post_type' =>'fso-horses',
												'meta_query' => array(
															array(
																'key'     => 'category',
																'value'   => 'our',
																'compare' => 'IN',
																), ));

	$horses = new WP_Query($horse_args);

	$sale_args = array ( 'post_type' =>'fso-horses',
												'meta_query' => array(
														array(
															'key'     => 'category',
															'value'   => 'sale',
															'compare' => 'IN',
														), ));

	$horses_for_sale = new WP_Query($sale_args);
?>

<div class="main-content">
	<div class="fso-page col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<?php if (have_posts()): ?>
		<?php	while ( have_posts() ) : the_post(); ?>
			<?php
				// CHECK IF IMAGE IS HORIZONTAL OR VERTICAL
				$filename = get_the_post_thumbnail_url();
				$size = getimagesize($filename);
				$image_size = "horizontal-image";
				if ($size[0] < $size[1]) {
					$image_size = "vertical-image";
				}
			?>

		<button class="fso-button" value="" onclick="history.back(-1)" /><i class="fa fa-arrow-left" aria-hidden="true"></i></button>

			<article class="horse h-entry panel">
				<div class="thumbnail u-photo single-img  <?php echo  $image_size; ?>">
					<img class="u-photo" src="<?php the_post_thumbnail_url(); ?>"></img>
				</div>
				<h1 class="p-name"><?php the_title(); ?></h1>
				<div class="horse-tags">
				 <p><b class="horse-tag p-category"><?php _e('Year: ', 'fso-eventing'); ?></b><?php the_field('year'); ?></p>
				 <p><b class="horse-tag p-category"><?php _e('Height: ', 'fso-eventing'); ?></b><?php the_field('height'); ?></p>
				 <p><b class="horse-tag p-category"><?php _e('Discipline: ', 'fso-eventing'); ?></b><?php the_field('discipline'); ?></p>
				 <p><b class="horse-tag p-category"><?php _e('Level: ', 'fso-eventing'); ?></b><?php the_field('level'); ?></p>
				</div>
				<div class=""><?php the_field('information'); ?></div>
				<div class="horse-images">
					<?php
						$images = array( get_field('image_1'), get_field('image_2'), get_field('image_3'), get_field('image_4'), get_field('image_5'));
						foreach ($images as $image) {
							if( !empty($image) ): ?>
								<a class="fancybox-thumbs hp" data-fancybox-group="thumb1" href="<?php echo $image['url']; ?>"><img class="u-photo" src="<?php echo $image['url']; ?>" alt="" /></a>
								<a class="fancybox-thumbs hidden" data-fancybox-group="thumb1" href="<?php echo $image['url']; ?>"><img class="u-photo" src="<?php echo $image['url']; ?>" alt="" /></a>
							<?php endif;
						}
					?>
				</div>
			</article>
		<?php endwhile; else: ?>
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
	</div>

	<aside id="horses-sidebar" class="sidebar col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<header class="sidebar-header">
			<h1 class="sidebar-title"><?php _e('Horses', 'fso-eventing'); ?></h1>
		</header>
		<?php if ( is_active_sidebar( 'horses-sidebar' ) ) : ?>
		<div class="sidebar-content">
			<ul class="c widget-area" role="complementary">
				<?php dynamic_sidebar( 'horses-sidebar' ); ?>
			</ul>
		</div>
		<?php endif; ?>
	</aside>

</div>

<?php get_footer(); ?>
