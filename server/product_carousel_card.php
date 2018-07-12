<div class="posts-carousel__slide">
	<div class="posts-carousel__item">
		<?php 
		#Get the product objet for Woocommerce info
		$product_obj = wc_get_product(get_the_ID());
		?>
		<img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="<?php the_title(); ?>">
		<div class="posts-carousel__item-cta">
			<h4 class="text-white mb-0"><?php the_excerpt(); ?></h4>
		</div>
		<div class="posts-carousel__item-submit">
			<h3 class="text-white mb-2"><?php if($product_obj->is_type('variable')) { wc_currency_display_text($product_obj->get_variation_sale_price()); } ?></h3>
			<a href="<?php the_permalink(); ?>" class="btn btn-secondary"><?php _e('READ MORE', 'nenemi_button_element'); ?></a>
		</div>
		<div class="posts-carousel__item-content">
			<?php 
			#Get array of categories
			$cat_array = get_the_terms(get_the_ID(), 'product_cat');
			?>
			<h5 class="text-white mb-0">
				<?php foreach((array) $cat_array as $cat){
					echo $cat->name . '</br>';
				}?>
			</h5>
			<p class="posts-carousel__item-text"><?php echo get_post_meta( get_the_ID(), 'total_sales', true );?> <?php _e('booked', 'nenemi_button_element'); ?></p>
			<div class="posts-carousel__item-actions">
				<div class="mb-2">
					<div class="yotpo bottomLine" style="margin-bottom: 0" data-product-id="<?php echo get_the_ID(); ?>"></div>
				</div>
				<!--<div class="">
					<a href="#" class="posts-carousel__social">
						<svg class="posts-carousel__social-icon icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-share"></use>
						</svg>
					</a>
					<a href="#" class="posts-carousel__social">
						<svg class="posts-carousel__social-icon icon">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-love"></use>
						</svg>
					</a>
				</div>-->
			</div>
		</div>
	</div>
</div>