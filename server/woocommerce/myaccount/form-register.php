<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<main>
	<!-- BEGIN: Login Form -->
	<div class="pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="text-center">
						<h2 class="mb-3">Registro</h2>
						<?php wc_print_notices(); ?>
						<?php do_action( 'woocommerce_before_customer_login_form' ); ?>
					</div>
					<div class="container-wrapper pt-5 pb-5 pr-5 pl-5">
					<?php do_action( 'woocommerce_register_form_start' ); ?>
						<form method="post" class="register">
							<div class="form-group">
								<label for="name">First Name</label>
								<input type="text" class="form-control" name="first_name" value="<?php echo ( ! empty( $_POST['first_name'] ) ) ? esc_attr( wp_unslash( $_POST['first_name'] ) ) : ''; ?>" >
							</div>
							<div class="form-group">
								<label for="name">Last Name</label>
								<input type="text" class="form-control" name="last_name" value="<?php echo ( ! empty( $_POST['last_name'] ) ) ? esc_attr( wp_unslash( $_POST['last_name'] ) ) : ''; ?>" >
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" ><?php // @codingStandardsIgnoreLine ?>
							</div>
							<div class="form-group">
								<label for="billing_phone">Phone</label>
								<input type="tel" class="form-control" name="billing_phone" id="billing_phone" value="<?php echo ( ! empty( $_POST['billing_phone'] ) ) ? esc_attr( wp_unslash( $_POST['billing_phone'] ) ) : ''; ?>" >
							</div>
							<div class="form-group">
								<label for="birthday">Birthday</label>
								<input type="date" class="form-control" name="birthday" value="<?php echo ( ! empty( $_POST['birthday'] ) ) ? esc_attr( wp_unslash( $_POST['birthday'] ) ) : ''; ?>" >
							</div>
							<div class="form-group">
								<label for="country">Country</label>
								<?php 
								global $woocommerce;    
								woocommerce_form_field( 
									'billing_country', 
									array( 
										'type' => 'country',
										'input_class' => array('custom-select')
									) 
								); ?>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" autocomplete="off" class="form-control" name="password" id="reg_password" >
							</div>
							<?php do_action( 'woocommerce_register_form' ); ?>
			                <div class="form-check form-check-inline">
			                  <input class="form-check-input" name="rememberme" type="checkbox" id="rememberme" value="forever">
			                  <label class="form-check-label" for="rememberme">Recordar contraseña</label>
			                </div>
							<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
							<button type="submit" class="btn btn-primary btn-block" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>">Register</button>			
						</form>
						<?php do_action( 'woocommerce_register_form_end' ); ?>
						<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
						<div class="text-center"><p class="mb-2">Or connect whit:</p></div>
						<div class="row">
							<div class="col-sm-6"><a href="#" class="btn btn-fb btn-sm btn-block">Registrate con Facebook</a></div>
							<div class="col-sm-6"><a href="#" class="btn btn-wc btn-sm btn-block">Registrate con We Chat</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Login Form -->
</main>
