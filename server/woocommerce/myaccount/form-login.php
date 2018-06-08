<?php
if( isset($_GET['action']) == 'register' ) {
    wc_get_template( 'myaccount/form-register.php' );
} else {
    wc_get_template( 'myaccount/form-login-single.php' );
}