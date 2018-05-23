<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>

<main id="theme-my-login<?php $template->the_instance(); ?>">
	<!-- BEGIN: Login Form -->
	<div class="pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="text-center">
						<h2 class="mb-3">Registro</h2>
						<?php $template->the_errors(); ?>
					</div>
					<div class="container-wrapper pt-5 pb-5 pr-5 pl-5">
						<form class="mb-4" name="registerform" id="registerform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'register', 'login_post' ); ?>" method="post">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="user_login" id="user_login<?php $template->the_instance(); ?>"  value="<?php $template->the_posted_value( 'user_login' ); ?>">
							</div>
							<div class="form-group">
								<label for="birthday">Birthday</label>
								<input type="date" class="form-control" name="birthday" id="birthday<?php $template->the_instance();?>" value="<?php $template->the_posted_value( 'birthday' );?>">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="user_email" id="user_email<?php $template->the_instance(); ?>" value="<?php $template->the_posted_value( 'user_email' ); ?>">
							</div>
							<div class="form-group">
								<label for="pass">Password</label>
								<input type="password" autocomplete="off" class="form-control" name="pass1" id="pass1<?php $template->the_instance(); ?>" value="" >
							</div>
							<div class="form-group">
								<label for="confirm_pass">Confirm Password</label>
								<input type="password" class="form-control" autocomplete="off" name="pass2" id="pass2<?php $template->the_instance(); ?>" value="">
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="checkbox" name="rememberme" id="rememberme<?php $template->the_instance(); ?>" value="forever">
							  <label class="form-check-label" for="remember">Recordar contraseña</label>
							</div>
							<button type="submit" class="btn btn-primary btn-block" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Register', 'theme-my-login' ); ?>">Register</button>			
							<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'register' ); ?>" />
							<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
							<input type="hidden" name="action" value="register" />
						</form>
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

