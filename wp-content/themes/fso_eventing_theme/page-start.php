<?php /* Template Name: Start Page */ ?>

<?php get_header(); ?>
<div class="hero-img-slider" >
	<?php wd_slider(2); ?>
</div>
<?php include 'navigation.php'; ?>
<div class="main-content">

	<?php if ( have_posts() ) : ?>

  	<?php	while ( have_posts() ) : the_post(); ?>


  				<article class="page h-entry">
  					<div class="content start-page-content">
  							<div class="e-content"><?php the_content(); ?></div>
  					</div>
  				</article>


  	<?php endwhile; else : ?>

        <p><?php _e( 'No Posts' , 'fso-eventing'); ?></p>

		<?php endif; ?>

		<div class="latest-news">
				<h1><?php _e('LATEST NEWS'); ?></h1>
			<?php include 'latest-news.php'; ?>
		</div>

    <?php	while ( have_posts() ) : the_post(); ?>

            <div class="image-link" style="background-image: url('<?php the_field('image_link_background'); ?>');">
              <a href="<?php the_field('image_link_url');?>"><h1><?php the_field('image_link_text');?></h1></a>
            </div>

    <?php endwhile; ?>
	</div>


<?php get_footer(); ?>
