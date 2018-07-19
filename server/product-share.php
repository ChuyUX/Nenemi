<?php if (is_product()): ?>
	<div class="dropdown d-inline-block">
		<a href="#" class="btn btn-sm btn-sm-icon btn-light" data-toggle="dropdown">
			<svg class="icon">
				<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-share"></use>
			</svg>
			<span class="d-none d-sm-inline-block"><?php _e('Share', 'nenemi_button_element'); ?></span>
		</a>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<a href="#" class="dropdown-item" data-sharer="facebook" data-url="<?php the_permalink(); ?>">Facebook</a>
			<a href="#" class="dropdown-item" data-sharer="twitter" data-title="Checkout <?php the_title(); ?>!" data-url="<?php the_permalink(); ?>">Twitter</a>
		</div>
	</div>
	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
<?php else: ?>
	<div class="list-item__actions">
				<div class="dropdown d-inline-block">
					<a href="#" class="list-item__actions-item" data-toggle="dropdown">
						<svg class="icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-share"></use>
						</svg>
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a href="#" class="dropdown-item" data-sharer="facebook" data-url="<?php the_permalink(); ?>">Facebook</a>
						<a href="#" class="dropdown-item" data-sharer="twitter" data-title="Checkout <?php the_title(); ?>!" data-url="<?php the_permalink(); ?>">Twitter</a>
					</div>
				</div>
		<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	</div>
<?php endif; ?>
