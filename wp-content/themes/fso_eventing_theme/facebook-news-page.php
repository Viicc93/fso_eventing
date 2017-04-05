<?php /* Template Name: Facebook News */ ?>
<?php get_header(); ?>


<div class="main-content">

	<section class="posts col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<?php if ( have_posts() ) : ?>
			<?php	while ( have_posts() ) : the_post(); ?>
					<article class="h-entry">
						<h1 class="p-name page-title"><?php the_title(); ?></h1>
						<div class="facebook-news"><?php the_content(); ?></div>
					</article>
			<?php endwhile; ?>

		<?php else : ?>
				<div class="not-found">
					<h5><?php _e( 'Ouups! Nothing found here!' , 'fso-eventing' ); ?></h5>
				</div>
		<?php endif; ?>
	</section>
	<aside id="news-sidebar" class="sidebar col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<?php if ( is_active_sidebar( 'news-sidebar' ) ) : ?>
			<header class="sidebar-header">
				<h1 class="sidebar-title"><?php _e('News', 'fso-eventing'); ?></h1>
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
