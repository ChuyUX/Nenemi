<?php get_header(); ?>
	
<main class="dashboard">
	<div class="container">
		<div class="dashboard__headline">
			<h3>
				<svg class="icon small"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-cart"></use></svg>
				Cart
			</h3>
		</div>
		<div class="dashboard__content">
			<div class="row mb-1 mb-sm-4">
				<div class="col-md-7">
					<!--<div class="inline-children pt-2 mb-3 mb-sm-0">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input woocommerce-select-all" id="selectall_top">
							<label class="custom-control-label" for="selectall_top">Select All</label>
						</div>
						<button type="button" class="btn btn-link pt-0 pb-0">Delete selected activities</button>
					</div> -->
				</div>
				<div class="col-md-5">
					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon form-inline justify-content-end mb-2 mb-sm-0">
							<input type="text" name="coupon_code" class="form-control w-50" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Promo Code', 'woocommerce' ); ?>"/>
							<input type="submit" class="btn btn-link pr-0" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
			<table class="table table-striped mb-4 woocommerce-cart-form__contents">
				<thead>
					<tr>
						<th></th>
						<th class="d-none d-sm-table-cell"></th>
						<th>Experience</th>
						<th>Date</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$product_num = 0;
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) : 
						$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						$product_num++;

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
							<tr>
								<th>
									<!--<div class="custom-control custom-checkbox">
									  <input type="checkbox" class="custom-control-input" id="customCheck<?php echo $product_num; ?>">
									  <label class="custom-control-label" for="customCheck<?php echo $product_num; ?>"></label>
									</div> -->
									<?php
										// @codingStandardsIgnoreLine
										echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
											'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											__( 'Remove this item', 'woocommerce' ),
											esc_attr( $product_id ),
											esc_attr( $_product->get_sku() )
										), $cart_item_key );
									?>
								</th>
								<th class="d-none d-sm-table-cell">
									<img src="<?php echo get_the_post_thumbnail_url($product_id); ?>" class="img-fluid" width="100">
								</th>
								<th>
									<h4 class="mb-0">
										<?php
										echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
										?>
									</h4>
									<?php echo get_the_excerpt($product_id); ?>
								</th>
								<th><?php echo wc_clean( $cart_item['booking-date'] )?></th> <!-- PENDING -->
								<th><?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?></th>
							</tr>

						<?php endif;
					endforeach; ?>
				</tbody>
			</table>
			<div class="row">
				<div class="col-md-7">
					<!-- s<div class="inline-children mb-3 mb-sm-0">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input woocommerce-select-all" id="selectall_bottom">
							<label class="custom-control-label" for="selectall_bottom">Select All</label>
						</div>
						<button type="button" class="btn btn-link pt-0 pb-0">Delete selected activities</button>
					</div> -->
				</div>
				<div class="col-md-5 text-right">
					<hr>
					<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h2><?php _e( 'Cart totals', 'woocommerce' ); ?></h2>

	<table cellspacing="0" class="shop_table shop_table_responsive">

		<tr class="cart-subtotal">
			<th><?php _e( 'Subtotal', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

			<tr class="shipping">
				<th><?php _e( 'Shipping', 'woocommerce' ); ?></th>
				<td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
			</tr>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) :
			$taxable_address = WC()->customer->get_taxable_address();
			$estimated_text  = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
					? sprintf( ' <small>' . __( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] )
					: '';

			if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
					<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
						<th><?php echo esc_html( $tax->label ) . $estimated_text; ?></th>
						<td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?></th>
					<td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<tr class="order-total">
			<th><?php _e( 'Total', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

	</table>

	<div class="wc-proceed-to-checkout">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
