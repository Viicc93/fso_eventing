<?php /* Template Name: Horses */ ?>
<?php get_header(); ?>

<div class="main-content">

	<?php if ( have_posts() ) : ?>

	<?php	while ( have_posts() ) : the_post(); ?>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="hero-img" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); width: 100%; height: 400px;">
			</div>
		<?php endif; ?>

					<article class="fso-page panel">
						<h1><?php the_title(); ?></h1>
						<div class=""><?php the_content(); ?></div>
					</article>

			<?php endwhile; else : ?>

			<p><?php _e( 'No Posts' , 'fso-eventing'); ?></p>

		<?php endif; ?>

    <?php
      $args = array ( 'post_type' =>'fso-horses');
      $horses = new WP_Query($args);
    ?>
    <?php if ( $horses->have_posts() ) : ?>
  	<div class="posts col-xs-12 col-sm-12 col-md-8 col-lg-8">

  	<?php	while ( $horses->have_posts() ) : $horses->the_post(); ?>



  					<article class="post">
  							<div class="thumbnail">
  								<?php the_post_thumbnail();?>
  							</div>
  							<div class="content">

  							<h2 class ="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

  							<div class="">
                   <p><b class="horse-tag"><?php _e('Year: ', 'fso-eventing'); ?></b><?php the_field('year'); ?></p>
                   <p><b class="horse-tag"><?php _e('Height: ', 'fso-eventing'); ?></b><?php the_field('height'); ?></p>
                   <p><b class="horse-tag"><?php _e('Discipline: ', 'fso-eventing'); ?></b><?php the_field('discipline'); ?></p>
                   <p><b class="horse-tag"><?php _e('Level: ', 'fso-eventing'); ?></b><?php the_field('level'); ?></p>

                 </div>
  							<div class="exc-footer">
  								<a class="read-more" href="<?php the_permalink(); ?>">Read More &raquo;</a>
  							</div>
  						</div>
  					</article>


  			<?php endwhile; else : ?>


  			<p><?php _e( 'No Posts' , 'fso-eventing'); ?></p>

  		<?php endif; ?>
    </div>



</div>

<?php get_footer(); ?>
