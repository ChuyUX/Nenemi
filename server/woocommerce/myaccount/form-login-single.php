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
              <h2 class="mb-3">Login</h2>
              <?php wc_print_notices(); ?>
              <?php do_action( 'woocommerce_before_customer_login_form' ); ?>
            </div>
            <div class="container-wrapper pt-5 pb-5 pr-5 pl-5">
              <div class="row mb-4">
                <div class="col-sm-6"><a href="#" class="btn btn-fb btn-sm btn-block" onclick="login_button_click('facebook','http://nenemi.com/')"><?php esc_html_e( 'Login with Facebook', 'woocommerce' ); ?></a></div>
                <div class="col-sm-6"><a href="#" class="btn btn-wc btn-sm btn-block" onclick="login_button_click('wechat','http://nenemi.com/')"><?php esc_html_e( 'Login with WeChat', 'woocommerce' ); ?></a></div>
              </div>
              <form method="post" autocomplete="on">
                <?php do_action( 'woocommerce_login_form_start' ); ?>
                <div class="form-group">
                  <label for="username">Email</label>
                  <input type="text" name="username" autocomplete="username email" required id="username" class="form-control" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" >
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" required autocomplete="password" id="password" autocomplete="off">
                </div>
                <?php do_action( 'woocommerce_login_form' ); ?>
                <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" name="rememberme" type="checkbox" id="rememberme" value="forever">
                  <label class="form-check-label" for="rememberme"><?php esc_html_e( 'Remember me?', 'woocommerce' ); ?></label>
                </div>
                <div class="form-check form-check-inline right">
                  <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
                </div>
                <?php do_action( 'woocommerce_login_form_end' ); ?>                
                <button type="submit" class="btn btn-primary btn-block" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>">Login</button>
              </form>
              <?php do_action( 'woocommerce_after_customer_login_form' ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Login Form -->
  </main>