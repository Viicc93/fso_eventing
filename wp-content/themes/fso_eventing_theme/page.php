<?php get_header(); ?>
<?php if ( have_posts() ) : ?>

<?php	while ( have_posts() ) : the_post(); ?>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="hero-img" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
		</div>
	<?php else: ?>
		<div class="hero-img"></div>
	<?php endif; ?>
<?php endwhile; ?>

<?php endif; ?>
<?php include 'navigation.php'; ?>
<div class="main-content">

	<?php if ( have_posts() ) : ?>

	<?php	while ( have_posts() ) : the_post(); ?>

					<article class="fso-page panel h-entry">
						<h1 class="p-name"><?php the_title(); ?></h1>
						<div class="e-content"><?php the_content(); ?></div>
					</article>

			<?php endwhile; else : ?>
				<div class="not-found">
					<p><?php _e( 'No page was found here' , 'fso-eventing'); ?></p>
				</div>

		<?php endif; ?>

</main>
</div>

<?php get_footer(); ?>
