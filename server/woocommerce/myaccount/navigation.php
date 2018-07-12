<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<main>
	<div class="row no-gutters">
		<nav class="col-md-3 col-lg-2 dashboard__sidebar">
			<div class="dashboard__sidebar-wrapper">
				<ul class="nav flex-column dashboard__nav">
				  <li class="nav-item">
				    <a class="nav-link dashboard__nav-item dashboard__nav-item--active" href="<?php echo esc_url(wc_get_page_permalink( 'myaccount' ))?>">Profile</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link dashboard__nav-item" href="/wishlists">Wishlist</a>
				  </li>
					<li class="nav-item">
				    <a class="nav-link dashboard__nav-item" href="<?php echo esc_url(wc_get_endpoint_url('orders'));?>">Bookings</a>
				  </li>
					<li class="nav-item">
				    <a class="nav-link dashboard__nav-item" href="#">Settings</a>
				  </li>
				</ul>
			</div>
		</nav>
<?php do_action( 'woocommerce_after_account_navigation' ); ?>
