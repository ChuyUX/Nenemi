<?php if(is_front_page()) :?>
<!-- front page search -->
	<div class="mainsrch-box">
		<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
			<svg class="icon mainsrch-box__icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-search"></use></svg>
			<input type="search" name="s" class="form-control mainsrch-box__input" placeholder="<?php _e('Try city, destination or activity…', 'nenemi_button_element'); ?>">
			<button type="submit" class="btn btn-primary mainsrch-box__btn" role="button"><?php _e('SEARCH', 'nenemi_button_element'); ?></button>
		</form>
	</div>
<!-- /front page search -->

<?php else : ?>
	<!-- widget search -->
	<form>
		<div class="form-group mb-0">
			<input type="text" placeholder="<?php _e('Search...', 'nenemi_button_element'); ?>" class="form-control">
			<button type="submit" class="btn-icon">
				<svg class="icon">
					<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-search"></use>
				</svg>
			</button>
		</div>
	</form>
<!-- /widget search -->
<?php endif; ?>

