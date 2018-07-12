<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>

<main class="dashboard">
	<div class="container">
		<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
			<div class="dashboard__headline pl-0 pr-0">
				<h3>
					<svg class="icon small"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-card"></use></svg>
					Checkout
				</h3>
			</div>
			<div class="dashboard__content pl-0 pr-0">
				<div class="d-block d-md-none">
					
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="mb-4">
							

								<?php if ( $checkout->get_checkout_fields() ) : ?>

									<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>


									<?php do_action( 'woocommerce_checkout_billing' ); ?>

									<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?> 

								<?php endif; ?>

								

								<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

							
						</div>

						<?php woocommerce_checkout_payment(); ?>

					</div>
					<div class="col-md-4">
						<div class="sticky-scroll-box d-none d-md-block">
							<div class="panel mb-3">
								<div class="panel__header">
									<h4 class="mb-0" id="order_review_heading"><?php _e( 'Order Summary', 'woocommerce' ); ?></h4>
								</div>

								<hr>

								<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

								<div id="order_review" class="woocommerce-checkout-review-order">
									<?php woocommerce_order_review(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</main>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
