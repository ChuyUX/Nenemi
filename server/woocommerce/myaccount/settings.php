<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="col-md-9 col-lg-10">
	<div class="dashboard">
		<div class="dashboard__headline">
			<h3>Settings</h3>
		</div>
		<div class="dashboard__content">
			<form action="#">
				<h4 class="featured-heading">Language currency</h4>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="language">Default language</label>
							<select class="custom-select" name="language" id="language">
								<option selected>Seleccionar</option>
								<option value="1">English</option>
								<option value="2">Japanese</option>
								<option value="3">Chinese</option>
								<option value="4">Corean</option>
							</select>
						</div>
						<div class="form-group">
							<label for="language">Default currency</label>
							<select class="custom-select" name="language" id="language">
								<option selected>Seleccionar</option>
								<option value="1">US Dollar</option>
								<option value="2">Yen</option>
								<option value="3">Mexican Peso</option>
							</select>
						</div>
					</div>
				</div>
				<h4 class="featured-heading">Payment method</h4>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="payment_method">Payment method</label>
							<select class="custom-select" name="payment_method" id="payment_method">
								<option selected>Seleccionar</option>
								<option value="paypal">Paypal</option>
								<option value="wechat">We Chat</option>
								<option value="alipay">Alipay</option>
								<option value="visamastercard">Visa / Mastercard Card</option>
							</select>
						</div>
					</div>
				</div>
				<div class="js-visamastercard" style="display:none;">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="cardholder">Cardholder's Name</label>
								<input type="text" class="form-control" name="cardholder" id="cardholder">
							</div>
						</div>
					</div>
					<div class="form-row">
			    <div class="col-md-6">
						<div class="form-group">
							<label for="card_number">Card Number</label>
			      	<input type="text" class="form-control" name="card_number" id="card_number">
						</div>
			    </div>
			    <div class="col-xs-3">
						<div class="form-group">
							<div class="form-group">
								<label for="card_month">Month</label>
								<select class="custom-select" name="card_month" id="card_month">
									<option selected>Seleccionar</option>
									<option value="1">January</option>
									<option value="2">February</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
							</div>
						</div>
			    </div>
					<div class="col-xs-3">
						<div class="form-group">
							<div class="form-group">
								<label for="card_year">Year</label>
								<select class="custom-select" name="card_year" id="card_year">
									<option selected>Seleccionar</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
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