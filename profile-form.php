<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>

	<main  class="tml tml-profile" id="theme-my-login<?php $template->the_instance(); ?>">
					<?php $template->the_action_template_message( 'profile' ); ?>
					<?php $template->the_errors(); ?>
		<div class="row no-gutters">
			<div class="col-md-3 col-lg-2 dashboard__sidebar">
				<div class="dashboard__sidebar-wrapper">
					<ul class="nav flex-column dashboard__nav">
					  <li class="nav-item">
					    <a class="nav-link dashboard__nav-item dashboard__nav-item--active" href="#">Profile</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link dashboard__nav-item" href="#">Wishlist</a>
					  </li>
						<li class="nav-item">
					    <a class="nav-link dashboard__nav-item" href="#">Bookings</a>
					  </li>
						<li class="nav-item">
					    <a class="nav-link dashboard__nav-item" href="#">Settings</a>
					  </li>
					</ul>
				</div>
			</div>
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
								<h4 class="text-white"><?php echo esc_attr( $profileuser->first_name . " " .  $profileuser->last_name); ?></h4>
							</div>
							<div class="js-profile-display">
								<div class="text-center text-white">
									<div class="mb-4">
										<p class="mb-2"><b>Email:</b></p>
										<h5 class="profile__field"><?php echo esc_attr( $profileuser->user_email ); ?></h5>
									</div>
									<?php if (get_user_meta($current_user->ID, 'birthday',true)): ?>
										<div class="mb-4">
											<p class="mb-2"><b>Birthday:</b></p>
											<h5 class="profile__field"><?php echo get_user_meta($current_user->ID, 'birthday',true); ?></h5>
										</div>											
									<?php endif ?>
									<?php if (get_user_meta($current_user->ID, 'phone',true)): ?>
										<div class="mb-4">
											<p class="mb-2"><b>Phone:</b></p>
											<h5 class="profile__field">123-345-00-00</h5>
										</div>										
									<?php endif ?>
									<?php if (get_user_meta($current_user->ID, 'country',true)): ?>
										<div class="mb-4">
											<p class="mb-2"><b>Country:</b></p>
											<h5 class="profile__field">México</h5>
										</div>										
									<?php endif ?>

									<a href="#" class="btn btn-primary js-toggle-profile-edit">Editar</a>
								</div>
							</div>
							<div class="js-profile-edit" style="display:none;">
								<form action="#">
									<div class="form-group">
										<label for="first_name" class="text-white">First Name</label>
										<input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo esc_attr( $profileuser->first_name ); ?>">
									</div>
									<div class="form-group">
										<label for="last_name" class="text-white">Last Name</label>
										<input type="text" class="form-control" name="last_name" id="last_name"  value="<?php echo esc_attr( $profileuser->last_name ); ?>" >
									</div>
									<div class="form-group">
										<label for="email" class="text-white">Email</label>
										<input type="email" class="form-control" name="email" id="email" value="<?php echo esc_attr( $profileuser->user_email ); ?>">
									</div>
									<div class="form-group">
										<label for="phone" class="text-white">Phone</label>
										<input type="phone" class="form-control" name="phone" id="phone"value="<?php echo esc_attr( get_user_meta($current_user->ID, 'phone',true) ); ?>">
									</div>
									<div class="form-group">
										<label for="country" class="text-white">Country</label>
										<select class="custom-select">
										  <option selected>Seleccionar</option>
										  <option value="1">Mexico</option>
										  <option value="2">Japan</option>
										  <option value="3">China</option>
											<option value="4">South Corea</option>
										</select>
									</div>
									<div class="form-group">
										<label for="pass1" class="text-white">New Password</label>
										<input type="password" class="form-control" name="pass1" id="pass1" value="" autocomplete="off">
									</div>	
									<div class="form-group">
										<label for="pass2" class="text-white">Repeat Password</label>
										<input type="password" class="form-control" name="pass2" id="pass2" value="" autocomplete="off">
									</div>			
									<input type="hidden" name="action" value="profile" />
									<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
									<input type="hidden" name="user_id" id="user_id" value="<?php echo esc_attr( $current_user->ID ); ?>" />
									<input type="submit" class="btn btn-primary btn-block" value="<?php esc_attr_e( 'Save', 'theme-my-login' ); ?>" name="submit" id="submit">Guardar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
