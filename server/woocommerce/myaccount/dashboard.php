<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
			<div class="col-md-9 col-lg-10">
				<div class="dashboard__headline dashboard__headline--profile">
					<h3 class="text-white">Profile
				</div>
				<div class="dashboard__content dashboard__content--bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/dummy/profile-bg.jpg);">
					<div class="row justify-content-md-center">
						<div class="col-lg-4 col-md-6 profile">
							<div class="text-center pb-4">
								<div class="profile__picture-wrapper">
									<img src="<?php echo get_template_directory_uri(); ?>/img/dummy/avatar.jpg" alt="Shiratori June" class="profile__picture mb-4">
									<a href="#" class="profile__edit js-toggle-profile-edit">
										<svg class="icon"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-pencil"></use></svg>
									</a>
								</div>
								<h4 class="text-white"><?php echo esc_attr( $current_user->first_name . " " .  $current_user->last_name); ?></h4>
							</div>
							<div class="js-profile-display">
								<div class="text-center text-white">
									<div class="mb-4">
										<p class="mb-2"><b>Email:</b></p>
										<h5 class="profile__field"><?php echo esc_attr( $current_user->user_email ); ?></h5>
									</div>
									<?php if (get_user_meta($current_user->ID, 'birthday',true)): ?>
										<div class="mb-4">
											<p class="mb-2"><b>Birthday:</b></p>
											<h5 class="profile__field"><?php echo get_user_meta($current_user->ID, 'birthday',true); ?></h5>
										</div>											
									<?php endif ?>
									<?php if (get_user_meta($current_user->ID, 'billing_phone',true)): ?>
										<div class="mb-4">
											<p class="mb-2"><b>Phone:</b></p>
											<h5 class="profile__field"><?php echo get_user_meta($current_user->ID, 'billing_phone',true); ?></h5>
										</div>										
									<?php endif ?>
									<?php if (get_user_meta($current_user->ID, 'billing_country',true)): ?>
										<div class="mb-4">
											<p class="mb-2"><b>Country:</b></p>
											<h5 class="profile__field"><?php echo WC()->countries->countries[ get_user_meta($current_user->ID, 'billing_country',true) ];?></h5>
										</div>										
									<?php endif ?>
										<div class="mb-4">
											<p class="mb-2"><b>Points:</b></p>
											<h5 class="profile__field"><?php echo do_shortcode("[mycred_my_balance]"); ?></h5>
										</div>	

									<a href="#" class="btn btn-primary js-toggle-profile-edit">Editar</a>
								</div>
							</div>
							<div class="js-profile-edit" style="display:none;">
								<form action="" method="post">
									<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
									<div class="form-group">
										<label for="first_name" class="text-white">First Name</label>
										<input type="text" class="form-control" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $current_user->first_name ); ?>">
									</div>
									<div class="form-group">
										<label for="last_name" class="text-white">Last Name</label>
										<input type="text" class="form-control" name="account_last_name" id="account_last_name"  value="<?php echo esc_attr( $current_user->last_name ); ?>" >
									</div>
									<div class="form-group">
										<label for="email" class="text-white">Email</label>
										<input type="email" class="form-control" name="account_email" id="account_email" value="<?php echo esc_attr( $current_user->user_email ); ?>">
									</div>
									<div class="form-group">
										<label for="birthday" class="text-white">Birthday</label>
										<input type="date" class="form-control" name="birthday" value="<?php echo date('Y-m-d', strtotime(get_user_meta($current_user->ID, 'birthday',true))); ?>" >
									</div>      
									<div class="form-group">
										<label for="billing_phone" class="text-white">Phone</label>
										<input type="phone" class="form-control" name="billing_phone" id="billing_phone" value="<?php echo esc_attr( get_user_meta($current_user->ID, 'billing_phone',true) ); ?>">
									</div>
									<div class="form-group">
										<label for="country" class="text-white">Country</label>
										<select class="custom-select" name="billing_country" id="billing_country">
											<?php 
												$countries_obj = new WC_Countries();
												$countries = 	$countries_obj->get_allowed_countries( ); 

												foreach($countries as $code=>$country ){
													echo $code;
													if (get_user_meta($current_user->ID, 'billing_country',true) == $code) {
														$selected = "selected";
													}
													echo "<option value='". $code ."'" . $selected . ">". $country."</option>";
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<label for="password_current" class="text-white">Current Password</label>
										<input type="password" class="form-control" name="password_current" id="password_current" value="" autocomplete="off">
									</div>	
									<div class="form-group">
										<label for="password_1" class="text-white">New Password</label>
										<input type="password" class="form-control" name="password_1" id="password_1" value="" autocomplete="off">
									</div>	
									<div class="form-group">
										<label for="password_2" class="text-white">Repeat Password</label>
										<input type="password" class="form-control" name="password_2" id="password_2" value="" autocomplete="off">
									</div>
									<?php wp_nonce_field( 'save_account_details' ); ?>
									<input type="submit" class="btn btn-primary btn-block" value="<?php esc_attr_e( 'Save', 'theme-my-login' ); ?>" name="save_account_details" id="submit">Guardar</button>
									<input type="hidden" name="action" value="save_account_details" />
								</form>
							</div>
							<?php 
							//do_action( 'woocommerce_account_dashboard' );
							//do_action( 'woocommerce_before_my_account' );
							//do_action( 'woocommerce_after_my_account' );
							 ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
