<div class="list-item">
	<div class="list-item__thumbnail-wrapper">
		<a href="<?php the_permalink(); ?>" class="list-item__thumbnail">
			<img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="<?php the_title(); ?>">
			<?php 
			#Get array of categories
			$cat_array = get_the_terms(get_the_ID(), 'product_cat');
			?>
			<span class="list-item__cat">
				<?php foreach((array) $cat_array as $cat){
					echo $cat->name . '</br>';
				}?>
			</span>
			<?php if(get_field('video')) : ?>
				<svg class="list-item__cat-icon icon">
					<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-play-rounded"></use>
				</svg>
			<?php endif; ?>
		</a>
		<!--<div class="list-item__actions">
			<a href="#" class="list-item__actions-item">
				<svg class="list-item__actions-icon icon">
					<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-share"></use>
				</svg>
			</a>
			<a href="#" class="list-item__actions-item">
				<svg class="list-item__actions-icon icon">
					<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-love"></use>
				</svg>
			</a>
		</div> -->
	</div>
	<div class="list-item__content">
		<h4 class="text-white"><?php the_title(); ?></h4>
		<p class="text-white"><?php echo get_the_excerpt(); ?></p>
		<div class="list-item__meta text-white">
			<div class="list-item__meta-item">
				<div class="yotpo bottomLine" style="margin-bottom: 0" data-product-id="<?php echo get_the_ID(); ?>"></div>
			</div>
			|
			<div class="list-item__meta-item"><?php echo get_post_meta( get_the_ID(), 'total_sales', true );?> <?php _e('booked', 'nenemi_button_element'); ?></div>
		</div>
	</div>
	<?php 
	#Get the product objet for Woocommerce info
	$product_obj = wc_get_product(get_the_ID());
	?>
	<div class="list-item__submit">
		<h3 class="text-white mb-2"><?php if($product_obj->is_type('variable')) { wc_currency_display_text($product_obj->get_variation_sale_price()); } ?></h3>
		<a href="<?php the_permalink(); ?>" class="btn btn-secondary"><?php _e('READ MORE', 'nenemi_button_element'); ?></a>
	</div>
</div>