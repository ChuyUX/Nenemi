<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>


  <main class="login-page" id="theme-my-login<?php $template->the_instance(); ?>">
    <!-- BEGIN: Login Form -->
    <div class="pt-5 pb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="text-center">
              <h2 class="mb-3"><?php _e('Login', 'nenemi_login'); ?></h2>
              <?php $template->the_errors(); ?>
            </div>
            <div class="container-wrapper pt-5 pb-5 pr-5 pl-5">
              <div class="row mb-4">
                <div class="col-sm-6"><a href="#" class="btn btn-fb btn-sm btn-block" onclick="login_button_click('facebook','http://nenemi.com/')">Registrate con Facebook</a></div>
                <div class="col-sm-6"><a href="#" class="btn btn-wc btn-sm btn-block" onclick="login_button_click('wechat','http://nenemi.com/')">Registrate con We Chat</a></div>
              </div>
              <form class="login-form" name="loginform" id="loginform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login', 'login_post' ); ?>" method="post">
                <div class="form-group">
                  <label for="email"><?php _e('Email', 'nenemi_form_labels'); ?></label>
                  <input type="text" name="log" id="user_login<?php $template->the_instance(); ?>" class="form-control" id="user_login<?php $template->the_instance(); ?>" value="<?php $template->the_posted_value( 'log' ); ?>" >
                </div>
                <div class="form-group">
                  <label for="pass"><?php _e('Password', 'nenemi_form_labels'); ?></label>
                  <input type="password" class="form-control" name="pwd" id="user_pass<?php $template->the_instance(); ?>" value="" autocomplete="off">
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" name="rememberme" type="checkbox" id="rememberme<?php $template->the_instance(); ?>" value="forever">
                  <label class="form-check-label" for="rememberme"><?php _e('Forgot password?', 'nenemi_login'); ?></label>
                </div>
                <button type="submit" class="btn btn-primary btn-block"><?php _e('Login', 'nenemi_login'); ?></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Login Form -->
  </main>




