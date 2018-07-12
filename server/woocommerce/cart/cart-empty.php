<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );
?>
<main class="dashboard">
	<div class="container">
		<div class="dashboard__headline">
			<h3>
				<svg class="icon small"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-cart"></use></svg>
				Cart
			</h3>
		</div>
		<div class="dashboard__content">
			<h4>Tu carrito se encuentra vacío</h4>
		</div>
	</div>
</main>
