<?php 
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'custom_loop_product_thumbnail', 10 );
function custom_loop_product_thumbnail() {
    ?>
	<div class="list-item__thumbnail-wrapper">
		<a href="<?php the_permalink(); ?>" class="list-item__thumbnail">
			<?php 
			$attr = array(
			    'class' => "img-fluid",
			    'alt'   => get_the_title()
			);
			the_post_thumbnail('woocommerce-custom',$attr);?>
				<span class="list-item__cat"><?php echo get_the_title( $ID = get_field("city") ); ?></span>
			<svg class="list-item__cat-icon icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-play-rounded"></use></svg>
		</a>
   		<?php get_template_part( "product", "share" ) ?>
	</div>
	<?php 
}

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'custom_product_title', 10 );
function custom_product_title() {
    global $product;
    ?>
	<div class="card-body">
			<h5 class="card-title">
				<a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
			</h5>
		<div class="list-item__meta mb-4">
			<div class="list-item__meta-item">
				<?php wc_rating_star_markup($product->get_id()); ?>
			</div>
			<?php if (product_sold_count()): ?>
			|
			<div class="list-item__meta-item"><?php product_sold_count(); _e(' booked', 'nenemi_booked'); ?></div>
		<?php endif; ?>
		</div>
	</div>
	<?php 
}

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'custom_product_price', 10 );
function custom_product_price() {
    global $product;
	$variations = $product->get_available_variations(); 
	$variation_lowest_price = variation_lowest_price($variations);
	$lowest_price = $variation_lowest_price[0];
	$lowest_regular_price = $variation_lowest_price[1];
    ?>
	<div class="card-footer">
		<div class="row">
			<div class="col-sm"><h4 class="mb-1"><?php echo wc_currency_display_text($lowest_price);  ?></h4></div>
			<div class="col-sm text-right"><p class="list-price mb-0"><?php echo wc_currency_display_text($lowest_regular_price); ?></p></div>
		</div>
		<div class="row align-items-end">
			<div class="col-sm"><a href="<?php the_permalink(); ?>" class="btn btn-secondary">BOOK NOW</a></div>
			<?php if ( $product->is_in_stock() ):?>
				<div class="col-sm text-right"><p class="mb-0 small">Available now</p></div>
			<?php endif; ?>
		</div>
	</div>
	<?php 
}


remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10 );
// Remove "Showing the Single Result" - WooCommerce
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

 ?>