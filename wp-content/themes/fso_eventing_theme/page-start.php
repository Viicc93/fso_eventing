<?php /* Template Name: Start Page */ ?>

<?php get_header(); ?>

<div class="main-content">
	<?php if ( have_posts() ) : ?>
  	<?php	while ( have_posts() ) : the_post(); ?>
			<article class="page h-entry">
				<div class="content start-page-content">
						<div class="e-content"><?php the_content(); ?></div>
				</div>
			</article>
  	<?php endwhile;?>
	<?php endif; ?>
</div>
  	<?php	while ( have_posts() ) : the_post(); ?>
      <div class="image-link" style="background-image: url('<?php the_field('image_link_background'); ?>');">
        <a href="<?php the_field('image_link_url');?>"><a href="<?php the_field('image_link_url');?>"><h1><?php the_field('image_link_text');?></a></h1>
      </div>
    <?php endwhile; ?>
		<?php if ( is_active_sidebar( 'bottom-start' ) ) : ?>
		<div id="bottom-start-page" class="sidebar-content">
			<ul class="c widget-area" role="complementary">
				<?php dynamic_sidebar( 'bottom-start' ); ?>
			</ul>
		</div>
		<?php endif; ?>

<?php get_footer(); ?>
