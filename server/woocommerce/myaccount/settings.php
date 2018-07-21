<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$current_id = get_current_user_id();

if( isset($_POST['language']) ){
	if( get_user_meta( $current_id, 'language', true ) ){
		update_user_meta( $current_id, 'language', $_POST['language'] );	
	}
	else{
		add_user_meta( $current_id, 'language', $_POST['language'] ); 
	}
} 

if(isset($_POST['currency'])){
	if( get_user_meta( $current_id, 'currency', true ) ){
		update_user_meta( $current_id, 'currency', $_POST['currency'] );
	}
	else{
		add_user_meta( $current_id, 'currency', $_POST['currency'] ); 
	}
	echo delete_transient( 'currency_' . get_current_user_id() ) . '</br>';

}

if(isset($_POST['payment_method'])){
	if( get_user_meta( $current_id, 'payment_method', true)){
		update_user_meta( $current_id, 'payment_method', $_POST['payment_method'] );
	}
	else{
		add_user_meta( $current_id, 'payment_method', $_POST['payment_method'] );
	}

	if($_POST['payment_method'] == 'openpay_cards'){

		$new_data=array(
			'cardholder'	=>	$_POST['cardholder'],
			'number' 		=>	$_POST['card_number'],
			'month'			=>	$_POST['card_month'],
			'year'			=>	$_POST['card_year']
		);

		if(get_user_meta($current_id, 'payment-info', true)) {
			update_user_meta( $current_id, 'payment-info', $new_data);
		}
		else{
			add_user_meta( $current_id, 'payment-info', $new_data);
		}
	}
}

?>

<div class="col-md-9 col-lg-10">
	<div class="dashboard">
		<div class="dashboard__headline">
			<h3><?php _e('Settings', 'nenemi_my-account'); ?></h3>
		</div>
		
		<div class="dashboard__content">
			<form action="<?php echo wc_get_endpoint_url('settings');?>" method="post" enctype='multipart/form-data'>
				<h4 class="featured-heading"><?php _e('Language and currency', 'nenemi_my-account'); ?></h4>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="language"><?php _e('Default language', 'nenemi_my-account'); ?></label>
							<select class="custom-select" name="language" id="language">
								<option value="default" disabled <?php echo ( get_user_meta($current_id, 'language', true) ) ? '' : 'selected'; ?>><?php _e('Select', 'nenemi_my-account'); ?></option>
								<option value="en" <?php echo ( get_user_meta($current_id, 'language', true) == 'en') ? 'selected' : '';  ?>><?php _e('English', 'nenemi_my-account'); ?></option>
								<option value="zh-hans" <?php echo ( get_user_meta($current_id, 'language', true) == 'zh-hans' ) ? 'selected' : ''; ?>><?php _e('Chinese', 'nenemi_my-account'); ?></option>
							</select>
						</div>
						<div class="form-group">
							<label for="currency"><?php _e('Default currency', 'nenemi_my-account'); ?></label>
							<select class="custom-select" name="currency" id="currency">
								<option value="default" disabled <?php echo ( get_user_meta($current_id, 'currency', true) ) ? '' : 'selected'; ?>><?php _e('Select', 'nenemi_my-account'); ?></option>
								<option value="USD" <?php echo ( get_user_meta($current_id, 'currency', true) == 'USD') ? 'selected' : ''; ?>>US Dollar</option>
								<option value="CNY" <?php echo ( get_user_meta($current_id, 'currency', true) == 'CNY') ? 'selected' : ''; ?>>Chinese Yuan</option>
							</select>
						</div>
					</div>
				</div>
				<h4 class="featured-heading"><?php _e('Payment method', 'nenemi_my-account'); ?></h4>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="payment_method"><?php _e('Payment method', 'nenemi_my-account'); ?></label>
							<select class="custom-select" name="payment_method" id="payment_method">
								<option value="default" disabled <?php echo ( get_user_meta($current_id, 'payment_method', true) ) ? '' : 'selected'; ?>><?php _e('Select', 'nenemi_my-account'); ?></option>
								<option value="paypal" <?php echo ( get_user_meta($current_id, 'payment_method', true) == 'paypal') ? 'selected' : ''; ?>>Paypal</option>
								<option value="wechatpay" <?php echo ( get_user_meta($current_id, 'payment_method', true) == 'wechatpay') ? 'selected' : ''; ?>>We Chat</option>
								<option value="openpay_cards" <?php echo ( get_user_meta($current_id, 'payment_method', true) == 'openpay_cards') ? 'selected' : ''; ?>>Visa / Mastercard Card</option>
							</select>
						</div>
					</div>
				</div>
				<div class="js-visamastercard" <?php if( get_user_meta($current_id, 'payment_method', true) != 'openpay_cards') : ?>style="display:none;"<?php endif; ?>>

					<?php
					if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){
						$card_info = get_user_meta($current_id, 'payment-info', true);
					}
					?>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="cardholder"><?php _e("Cardholder's Name", 'nenemi_my-account'); ?></label>
								<input type="text" class="form-control" name="cardholder" id="cardholder" value="<?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo $card_info['cardholder'];} ?>">
							</div>
						</div>
					</div>
					<div class="form-row">
					    <div class="col-md-6">
							<div class="form-group">
								<label for="card_number"><?php _e('Card Number', 'nenemi_my-account'); ?></label>
				      			<input type="text" class="form-control" name="card_number" id="card_number" value="<?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo $card_info['number'];} ?>">
							</div>
					    </div>
					    <div class="col-xs-3">
							<div class="form-group">
								<div class="form-group">
									<label for="card_month"><?php _e('Month', 'nenemi_my-account'); ?></label>
									<select class="custom-select" name="card_month" id="card_month">
										<option value="default" disabled <?php if(get_user_meta($current_id, 'payment_method', true) != 'openpay_cards'){echo 'selected'; } ?>><?php _e('Select', 'nenemi_my-account'); ?></option>
										<option value="1" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['month'] == '1') ? 'selected' : ''; } ?>>January</option>
										<option value="2" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['month'] == '2') ? 'selected' : ''; } ?>>February</option>
										<option value="3" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['month'] == '3') ? 'selected' : ''; } ?>>March</option>
										<option value="4" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['month'] == '4') ? 'selected' : ''; } ?>>April</option>
										<option value="5" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['month'] == '5') ? 'selected' : ''; } ?>>May</option>
										<option value="6" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['month'] == '6') ? 'selected' : ''; } ?>>June</option>
										<option value="7" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['month'] == '7') ? 'selected' : ''; } ?>>July</option>
										<option value="8" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['month'] == '8') ? 'selected' : ''; } ?>>August</option>
										<option value="9" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['month'] == '9') ? 'selected' : ''; } ?>>September</option>
										<option value="10" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['month'] == '10') ? 'selected' : ''; } ?>>October</option>
										<option value="11" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['month'] == '11') ? 'selected' : ''; } ?>>November</option>
										<option value="12" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['month'] == '12') ? 'selected' : ''; } ?>>December</option>
									</select>
								</div>
							</div>
					    </div>
						<div class="col-xs-3">
							<div class="form-group">
								<div class="form-group">
									<label for="card_year">Year</label>
									<select class="custom-select" name="card_year" id="card_year">
										<option disabled <?php if(get_user_meta($current_id, 'payment_method', true) != 'openpay_cards'){echo 'selected'; } ?>>Seleccionar</option>
										<option value="2018" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['year'] == '2018') ? 'selected' : ''; } ?>>2018</option>
										<option value="2019" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['year'] == '2019') ? 'selected' : ''; } ?>>2019</option>
										<option value="2020" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['year'] == '2020') ? 'selected' : ''; } ?>>2020</option>
										<option value="2021" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['year'] == '2021') ? 'selected' : ''; } ?>>2021</option>
										<option value="2022" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['year'] == '2022') ? 'selected' : ''; } ?>>2022</option>
										<option value="2023" <?php if(get_user_meta($current_id, 'payment_method', true) == 'openpay_cards'){echo ($card_info['year'] == '2023') ? 'selected' : ''; } ?>>2023</option>
									</select>
								</div>
							</div>
				    	</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Save</button>
			</form>
			
		</div>
	</div>
</div>