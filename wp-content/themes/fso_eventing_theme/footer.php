		<footer class="fso-footer">
			<?php if ( is_active_sidebar( 'footer-wigets' ) ) : ?>
				<div id="footer-wigets" class="footer-widgets widget-area " role="complementary">
					<?php
		        wp_nav_menu( array(
		            'menu' => 'languagenav',
		            'container' => false,
		            'menu_id' => 'language-nav-footer',
		            'menu_class' => 'language-nav',
		            'theme_location' => 'languagenav'
		          )
		        );
					 ?>
					<?php dynamic_sidebar( 'footer-wigets' ); ?>
				</div>
			<?php endif; ?>
			<?php wp_footer(); ?>
		</footer>
		<div class="copyright">
			<p><i> &copy; 2017 Ostholt Eventing || Made by <a href="http://victoria-johansson.com">Victoria Johansson</a></i></p>
		</div>
	</div>
</body>
</html>
