<?php
/**
 * Output a single payment method
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment-method.php.
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
if(is_user_logged_in() && get_user_meta(get_current_user_id(), 'payment_method', true)){
	if(get_user_meta(get_current_user_id(), 'payment_method', true) == $gateway->id){
		$chosen_payment = true;
	}
	else{
		$chosen_payment = false;
	}
}
else{
	$chosen_payment = $gateway->chosen;
}
?>
<div class="wc_payment_method payment_method_<?php echo $gateway->id; ?> custom-control custom-radio payment__item">
	<input id="payment_method_<?php echo $gateway->id; ?>" type="radio" class="custom-control-input input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $chosen_payment, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />

	<label class="custom-control-label" for="payment_method_<?php echo $gateway->id; ?>">
		<?php echo $gateway->get_icon(); ?> <?php echo $gateway->get_title(); ?> 
	</label>
	<?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
		<div class="payment_box payment_method_<?php echo $gateway->id; ?>" <?php if ( ! $chosen_payment ) : ?>style="display:none;"<?php endif; ?>>
			<?php $gateway->payment_fields(); ?>
		</div>
	<?php endif; ?>
</div>
