			<footer>
				<div class="container">
					<div class="row">
						<div class="col-md mb-3">
							<img src="<?php echo get_template_directory_uri(); ?>/img/nenemi-wlogo.svg" class="mb-4" alt="Nenemi">
							<?php 
							wp_nav_menu( array( 
							    'theme_location' => 'footer_menu', 
							    'menu_class' => 'nav flex-column',
								'depth' => 2,
								'container' => false,
								'walker' => new wp_bootstrap_navwalker()
							    )
							);  
							?>
						</div>
						<div class="col-md col-lg-5 mb-3">
							<h4 class="mb-3">Subscribe to our newsletter</h4>
							<form class="form-inline">
								<input type="text" class="form-control" placeholder="Enter your email adress...">
								<button type="submit" class="btn btn-primary">SUBMIT</button>
							</form>
						</div>
						<div class="col-lg mb-3">
							<h4 class="mb-3">Follow us</h4>
							<nav class="social">
								<a href="#" class="social__item">
									<svg class="icon social__icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-facebook-rounded"></use></svg>
								</a>
								<a href="#" class="social__item">
									<svg class="icon social__icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-twitter-rounded"></use></svg>
								</a>
								<a href="#" class="social__item">
									<svg class="icon social__icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-instagram-rounded"></use></svg>
								</a>
								<a href="#" class="social__item">
									<svg class="icon social__icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-youtube-rounded"></use></svg>
								</a>
								<a href="#" class="social__item">
									<svg class="icon social__icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-mail-rounded"></use></svg>
								</a>
							</nav>
						</div>
					</div>
					<div class="text-center footer__bottom">
						®Nenemi 2018. ©All rights reserved.  |  <a href="#">Terms of service</a>.  | <a href="#">Privacy policy</a>.
					</div>
				</div>
			</footer>

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
