<?php /* Template Name: All News */ ?>
<?php get_header(); ?>

<?php $allPosts = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 3)); ?>

<div class="main-content">
	<section class="posts col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<?php if ( $allPosts->have_posts() ) : ?>
			<h1 class="p-name"><?php the_title(); ?></h1>
			<?php	while ( $allPosts->have_posts() ) : $allPosts->the_post(); ?>
					<article class="post h-entry">
						<?php if ( has_post_thumbnail() ) : ?>
              <div class="post-img">
                <div class="thumbnail">
									<div class="img">
										<img class="u-photo" src="<?php the_post_thumbnail_url(); ?>"></img>
									</div>
                </div>
              </div>
							<div class="content">
						<?php else: ?>
							<div class="content-wide">
						<?php endif; ?>
							<h2 class ="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p class="post-date dt-published"><?php the_date(); ?></p>
							<div class=""><?php the_excerpt(); ?></div>
							<div class="exc-footer">
								<span class="categories"><?php _e('Categories:', 'fso-eventing') ?> <?php the_category(); ?></span>
								<a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read More', 'fso-eventing'); ?>&raquo;</a>
							</div>
						</div>
					</article>
			<?php endwhile; ?>

			<?php if ($allPosts->max_num_pages > 1) {  ?>
			  <nav class="prev-next-posts">
			    <div class="prev-posts-link">
			      <?php echo get_next_posts_link( __('Older Entries &raquo;', 'fso-eventing'), $allPosts->max_num_pages ); ?>
			    </div>
			    <div class="next-posts-link">
			      <?php echo get_previous_posts_link( __('Newer Entries &raquo;', 'fso-eventing') ); ?>
			    </div>
			  </nav>
			<?php } ?>

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
