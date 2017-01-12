<?php /* Template Name: Start Page */ ?>
<?php get_header(); ?>

<div class="main-content">

	<?php if ( have_posts() ) : ?>

  	<?php	while ( have_posts() ) : the_post(); ?>
      <div class="hero-img" >
        <?php wd_slider(2); ?>
      </div>


  				<article class="page">
  					<div class="content">
  							<h2 class ="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  							<div class=""><?php the_content(); ?></div>
  					</div>
  				</article>

          <div class="hero-img" style="background-image: url('<?php the_field('image_link_horses'); ?>'); width: 100%; height: 400px;">
          </div>


  	<?php endwhile; else : ?>

        <p><?php _e( 'No Posts' , 'fso-eventing'); ?></p>

		<?php endif; ?>

    <div class="latest-news">
      <?php include 'latest-news.php'; ?>
    </div>


    <?php	while ( have_posts() ) : the_post(); ?>

            <div class="hero-img" style="background-image: url('<?php the_field('image_link_horses'); ?>'); width: 100%; height: 400px;">
              <h1><?php _e('SALES HORSES', 'fso-eventing'); ?></h1>
            </div>

    <?php endwhile; ?>

	</div>


<?php get_footer(); ?>
