<?php /* Template Name: Horses */ ?>
<?php get_header(); ?>

<?php
	// GET HORSES WITH WP QUERY
	$horse_args = array ( 'post_type' =>'fso-horses',
												'meta_query' => array(
													array(
														'key'     => 'category',
														'value'   => 'our',
														'compare' => 'IN',
													),
												)
											);

	$horses = new WP_Query($horse_args);

	$sale_args = array ( 'post_type' =>'fso-horses',
												'meta_query' => array(
													array(
														'key'     => 'category',
														'value'   => 'sale',
														'compare' => 'IN',
													),
												)
											);
	$horses_for_sale = new WP_Query($sale_args);
?>

<div class="main-content">
	<!-- PAGE CONTENT FOR HORSE PAGE -->
		<div class="posts horses h-entry col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<?php if ( have_posts() ) : ?>
				<?php	while ( have_posts() ) : the_post(); ?>
					<article class="posts h-entry">
						<h1 class="p-name page-title"><?php the_title(); ?></h1>
						<div class="e-content"><?php the_content(); ?></div>
					</article>
				<?php endwhile; else : ?>
					<p><?php _e( 'No Posts' , 'fso-eventing'); ?></p>
			<?php endif; ?>

				<!-- HORSES FOR SALE -->
				<h2><?php _e('Horses for sale', 'fso-eventing'); ?></h2>
				<?php if ( $horses_for_sale->have_posts() ) : ?>
					<?php	while ( $horses_for_sale->have_posts() ) : $horses_for_sale->the_post(); ?>
						<?php include 'include/horse.php'; ?>
					<?php endwhile; else : ?>
						<div class="not-found">
							<p><?php _e( 'No horses at the moment...' , 'fso-eventing'); ?></p>
						</div>
				<?php endif; ?>

				<!-- OUR HORSES -->
				<h2><?php _e('Our horses', 'fso-eventing'); ?></h2>
				<?php if ( $horses->have_posts() ) : ?>
					<?php	while ( $horses->have_posts() ) : $horses->the_post(); ?>
						<?php include 'include/horse.php'; ?>
					<?php endwhile; else : ?>
						<p><?php _e( 'No horses at the moment...' , 'fso-eventing'); ?></p>
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
