<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_orders', $has_orders ); 

$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
	'numberposts' => -1,
	'meta_key'    => '_customer_user',
	'meta_value'  => get_current_user_id(),
	'post_type'   => wc_get_order_types( 'view-orders' ),
	'post_status' => array_keys( wc_get_order_statuses() ),
) ) ); ?>

<div class="col-md-9 col-lg-10">
	<div class="dashboard">
		<div class="dashboard__headline">
			<h3><?php _e('Bookings', 'nenemi-bookings'); ?></h3>
			<button type="button" class="btn btn-primary btn-sm mt-3 mt-sm-0" style="max-width:150px;"><?php _e('View All', 'nenemi-bookings'); ?></button>
			<button type="button" class="btn btn-primary btn-sm ml-3 mt-3 mt-sm-0" style="max-width:150px;"><?php _e('Lived Experiencies', 'nenemi-bookings'); ?></button>
		</div>
		<div class="dashboard__content">
			<?php if ( $has_orders ) : ?>
		
				<div class="row">
						
					<?php 
					$activity_count=1;
					foreach ( $customer_orders as $customer_order ) :
						$order      = wc_get_order( $customer_order );
						$item_count = $order->get_item_count();

						foreach ($order->get_items() as $item_id => $item_value) : 
							$item_data = $item_value->get_data();
        					$product_id = $item_data['product_id'];

        					if ($activity_count%2 != 0 && $activity_count != 1) :
        					?>
        						</div>
        						<div class="row">
        					<?php endif; ?>
							<div class="col-md-6">
								<div class="grid-item" style="background-image:url(<?php echo get_the_post_thumbnail_url($product_id); ?>);">
									<div class="grid-item__content">
										<div class="row">
											<div class="col-8">
												<h4 class="text-white mb-0"><a href="<?php echo get_permalink($product_id);?>"><?php echo get_the_title($product_id); ?></a></h4>
												<div class="grid-item__meta"><?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?> | <svg class="icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-<?php echo esc_html($order->get_status()); ?>"></use></svg></div>
											</div>
											<?php if($order->get_status() != 'cancelled') : ?>
												<div class="col-4">
													<?php if($order->get_status() == 'completed') : ?>
														<a href="#review_<?php echo $activity_count; ?>" class="btn btn-primary btn-block btn-sm js-modal"><?php _e('Post a review', 'nenemi-bookings'); ?></a>
													<?php else : ?>
														<a href="<?php echo get_permalink($product_id);?>" class="btn btn-primary btn-block btn-sm"><?php _e('View experience', 'nenemi-bookings'); ?></a>
													<?php endif; ?>

													<?php if($order->get_status() != 'completed') : ?>
														<a href="#checkin_<?php echo $activity_count; ?>" class="btn btn-outline-primary bg-white btn-block btn-sm js-modal">Check-in</a>
													<?php endif; ?>
												</div>
											<?php endif; ?>
										</div>
									</div>
									<div id="review_<?php echo $activity_count; ?>" class="blue-popup-block mfp-hide">
										<button title="Close (Esc)" type="button" class="mfp-close">×</button>
										<?php
										$product_data = wc_yotpo_get_product_data(wc_get_product($product_id));	
										$yotpo_div = "<div class='yotpo yotpo-main-widget'
									   				data-product-id='".$product_data['id']."'
									   				data-name='".$product_data['title']."' 
									   				data-url='".$product_data['url']."' 
									   				data-image-url='".$product_data['image-url']."' 
									  				data-description='".$product_data['description']."' 
									  				data-lang='".$product_data['lang']."'></div>";
										echo $yotpo_div; 
										?>
									</div>
									<div id="checkin_<?php echo $activity_count; ?>" class="blue-popup-block mfp-hide">
										<button title="Close (Esc)" type="button" class="mfp-close">×</button>
										<div class="text-center">
										<h4 class="text-white"><?php _e('Scan QR code', 'nenemi-bookings'); ?></h4>
										<div class="d-inline-block bg-white p-3">
											<img src="<?php echo get_template_directory_uri(); ?>/img/dummy/qr.jpg" alt="">
										</div>
										</div>
									</div>
								</div>
							</div>
						<?php $activity_count++;
						endforeach; ?>
					<?php endforeach; ?>
				</div>

			<?php else : ?>
				<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
					<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
						<?php _e( 'Go shop', 'woocommerce' ) ?>
					</a>
					<?php _e( 'No order has been made yet.', 'woocommerce' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
