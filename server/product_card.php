<div class="card">
	<div class="list-item__thumbnail-wrapper">
		<a href="<?php the_permalink(); ?>" class="list-item__thumbnail">
			<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="">
			<?php 
			#Get array of categories
			$cat_array = get_the_terms(get_the_ID(), 'product_cat');
			?>
			<span class="list-item__cat">
				<?php foreach((array) $cat_array as $cat){
					echo $cat->name . '</br>';
				}?>
			</span>
			<svg class="list-item__cat-icon icon">
				<use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-play-rounded"></use>
			</svg>
		</a>
		<div class="list-item__actions">
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
		</div>
	</div>
	<?php 
	#Get the product objet for Woocommerce info
	$product_obj = wc_get_product(get_the_ID());
	?>
	<div class="card-body">
		<h5 class="card-title"><?php echo the_title(); ?></h5>
		<div class="list-item__meta mb-4">
			<div class="list-item__meta-item">
				<div class="yotpo bottomLine" style="margin-bottom: 0" data-product-id="<?php echo get_the_ID(); ?>"></div>
			</div>
			|
			<div class="list-item__meta-item"><?php echo get_post_meta( get_the_ID(), 'total_sales', true );?> booked</div>
		</div>
	</div>
	<div class="card-footer">
		<div class="row">
			<div class="col-sm">
				<h4 class="mb-1"><?php wc_currency_display_text($product_obj->get_sale_price()); ?></h4>
			</div>
			<div class="col-sm text-right">
				<p class="list-price mb-0"><?php wc_currency_display_text($product_obj->get_regular_price()); ?></p>
			</div>
		</div>
		<div class="row align-items-end">
			<div class="col-sm"><a href="<?php the_permalink(); ?>" class="btn btn-secondary">READ MORE</a></div>
			<?php if(is_between_dates(get_field('schedule_start'), get_field('schedule_end'))) : ?>
				<div class="col-sm text-right">
					<p class="mb-0 small">Available now</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>