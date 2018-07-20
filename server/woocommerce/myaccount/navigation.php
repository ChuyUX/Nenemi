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
			<?php 
			wp_nav_menu( array( 
			    'theme_location' => 'profile_menu', 
			    'menu_class' => 'nav flex-column dashboard__nav',
				'depth' => 2,
				'container' => false,
				'walker' => new wp_bootstrap_navwalker()
			    )
			);  
			?>
			</div>
		</nav>
<?php do_action( 'woocommerce_after_account_navigation' ); ?>
