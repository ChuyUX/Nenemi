<?php 

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//Validate fields
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) { 
    if ( isset( $_POST['first_name'] ) && empty( $_POST['first_name'] ) ) {
        $validation_errors->add( 'first_name_error', __( 'El nombre es requerido!', 'woocommerce' ) );
    }

    if ( isset( $_POST['last_name'] ) && empty( $_POST['last_name'] ) ) {
        $validation_errors->add( 'last_name_error', __( 'El apellido es requerido!', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
        $validation_errors->add( 'billing_phone_error', __( 'El teléfono es requerido!', 'woocommerce' ) );
    }

    if ( isset( $_POST['birthday'] ) && empty( $_POST['birthday'] ) ) {
        $validation_errors->add( 'birthday_error', __( 'La fecha de nacimiento es requerida!', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_country'] ) && empty( $_POST['billing_country'] ) ) {
        $validation_errors->add( 'billing_country_error', __( 'El país es requerido!', 'woocommerce' ) );
    }
    return $validation_errors;
}
add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );  


function wooc_save_extra_register_fields( $customer_id ) {
    if ( isset( $_POST['first_name'] ) ) {
        update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['first_name'] ) );
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['first_name'] ) );
    }

    if ( isset( $_POST['last_name'] ) ) {
        update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['last_name'] ) );
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['last_name'] ) );
    }

    if ( isset( $_POST['billing_phone'] ) ) {
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    }

    if ( isset( $_POST['birthday'] ) ) {
        $_POST['birthday'] = date('d-m-Y', strtotime($_POST['birthday']));
        add_user_meta( $customer_id, 'birthday', $_POST['birthday'] );
    }

    if ( isset( $_POST['billing_country'] ) ) {
        update_user_meta( $customer_id, 'billing_country', sanitize_text_field( $_POST['billing_country'] ) );
    }
}
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );


function my_woocommerce_save_account_details( $user_id ) {
update_user_meta( $user_id, 'birthday', htmlentities( $_POST[ 'birthday' ] ) );
update_user_meta( $user_id, 'billing_phone', htmlentities( $_POST[ 'billing_phone' ] ) );
update_user_meta( $user_id, 'billing_country', htmlentities( $_POST[ 'billing_country' ] ) );
}
add_action( 'woocommerce_save_account_details', 'my_woocommerce_save_account_details' );

//Function for Star Ratings markup. Based on a product ID it displays the markup for its rating in stars.
function wc_rating_star_markup( $product_id ){
    if(get_post_type($product_id) == 'product'){
        $rating = get_post_meta( $product_id, '_wc_average_rating', true );
        $rating = floor($rating);
        
        for($star = 0; $star < $rating; $star++) {                 
            echo '<svg class="rating rating--active list-item__meta-icon icon"><use xlink:href="' . get_template_directory_uri() . '/img/symbol-defs.svg#icon-star"></use></svg>';
        }                    
        
        for($star = $rating; $star < 5; $star++){  
            echo '<svg class="rating list-item__meta-icon icon"><use xlink:href="' . get_template_directory_uri() . '/img/symbol-defs.svg#icon-star"></use></svg>';
        }
    }
} 

//Function for displaying correct information for a price (symbol and currency)
function wc_currency_display_text($quantity){
    echo get_woocommerce_currency_symbol() . (int)$quantity . ' ' . get_woocommerce_currency();
}

/**
 * @snippet       WooCommerce Remove "What is PayPal?" @ Checkout
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=21186
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.4.2
 */
 add_filter( 'woocommerce_gateway_icon', 'bbloomer_remove_what_is_paypal', 10, 2 );
 
function bbloomer_remove_what_is_paypal( $icon_html, $gateway_id ) {
    // the apply_filters comes with 2 parameters: $icon_html, $this->id
    // hence we declare 2 parameters within the function
    // and the hook above takes the "2" as we decided to pass 2 variables
     
    if( 'paypal' == $gateway_id ) {
    // we use one of the passed variables to make sure we only
    // run this function for the gateway ID == 'paypal'
     
    $icon_html = '<img src="/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png" alt="PayPal Acceptance Mark">';
    // in here we define our own $icon_html
    // note there is no mention of the "What is PayPal"
    // all we want is to repeat the part with the paypal logo
     
    }
    // endif
     
    return $icon_html;
    // we send the $icon_html variable back to the system
    // if PayPal, the system will use our custom $icon_html
    // if not, the system will use the original $icon_html
}
add_filter('woocommerce_checkout_fields', 'custon_override_checkout_fields');

function custon_override_checkout_fields($fields) {
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);

    return $fields;
}  

function add_date_to_cart_item( $cart_item_data, $product_id, $variation_id ) {
    $date_value = $_POST['date'];
 
    if ( empty( $date_value ) ) {
        return; 
    }
    else{
        $cart_item_data['booking-date'] = $date_value;
    }

    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'add_date_to_cart_item', 10, 3 );

function add_date_order_items( $item, $cart_item_key, $values, $order ) {
    if ( empty( $values['booking-date'] ) ) {
        return;    
    }
 
    $item->add_meta_data( 'Date', $values['booking-date'] );
}
add_action( 'woocommerce_checkout_create_order_line_item', 'add_date_order_items', 10, 4 );

function product_sold_count() {
    global $product;
    $units_sold = get_post_meta( $product->get_id(), 'total_sales', true );
    if ( $units_sold>0 ){
      echo sprintf( __( '%s booked', 'woocommerce' ), $units_sold );  
    }else{
        return false;
    }
}

function variation_lowest_price($variations){
    $lowest_price = 999999;
    foreach ($variations as $variation) {
        if($variation[display_price] < $lowest_price){
            $lowest_price = $variation[display_price];
            $lowest_regular_price = $variation[display_regular_price];
        }
    }
    return array($lowest_price, $lowest_regular_price );
}

//Remove Sales Flash
add_filter('woocommerce_sale_flash', 'woo_custom_hide_sales_flash');
function woo_custom_hide_sales_flash()
{
    return false;
}

// array of filters (field key => field name)
$GLOBALS['my_query_filters'] = array( 
    'field_1'   => 'city'
);


// action
add_action('pre_get_posts', 'my_pre_get_posts', 10, 1);

function my_pre_get_posts( $query ) {
    
    // bail early if is in admin
    if( is_admin() ) return;
    
    
    // bail early if not main query
    // - allows custom code / plugins to continue working
    if( !$query->is_main_query() ) return;
    
    
    // get meta query
    $meta_query = $query->get('meta_query');

    
    // loop over filters
    foreach( $GLOBALS['my_query_filters'] as $key => $name ) {
        
        // continue if not found in url
        if( empty($_GET[ $name ]) ) {
            
            continue;
            
        }
        
        
        // get the value for this filter
        // eg: http://www.website.com/events?city=melbourne,sydney
        $value = explode(',', $_GET[ $name ]);
        
        
        // append meta query
        $meta_query[] = array(
            'key'       => $name,
            'value'     => $value,
            'compare'   => 'IN',
        );
        
    } 
    
    
    // update meta query
    $query->set('meta_query', $meta_query);

}

function settings_add_my_account_endpoint() {
    add_rewrite_endpoint( 'settings', EP_PAGES );
}
add_action( 'init', 'settings_add_my_account_endpoint' );

function settings_endpoint_content() {
    include 'woocommerce/myaccount/settings.php'; 
}
add_action( 'woocommerce_account_settings_endpoint', 'settings_endpoint_content' );

/**
 * Set the users language based upon their choice at settings
 */
add_action( 'wpml_language_has_switched', 'change_default_language' ); 
function change_default_language() {
    if ( is_user_logged_in() && get_user_meta(get_current_user_id(), 'language', false) ) {
        #update_user_meta( get_current_user_id(), 'language', ICL_LANGUAGE_CODE );
    }
}

add_action( 'init', 'set_user_default_language' );
function set_user_default_language() {
    if ( is_user_logged_in() &&  (isset($_POST['language']) || get_user_meta(get_current_user_id(), 'language', false) ) ) {
        /* Don't trust this
        if( isset($_POST['language']) ){
            if( get_user_meta( get_current_user_id(), 'language', true ) ){
                update_user_meta( get_current_user_id(), 'language', $_POST['language'] );    
            }
            else{
                add_user_meta( get_current_user_id(), 'language', $_POST['language'] ); 
            }
        }

        $get_language = get_user_meta( get_current_user_id(), 'language', true );
        
        if($get_language != ICL_LANGUAGE_CODE){
            $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
            $escaped_url = esc_url( $url );
            header('Location: ' . esc_url(apply_filters('wpml_permalink', $escaped_url, $get_language ) ) );
            do_action('wpml_switch_language', $get_language);
            #echo $escaped_url; 
        }
        */
    }
}


/**
 * Set the users currency based upon their choice at settings
 */
add_action( 'wcml_switch_currency', 'set_default_currency');
function set_default_currency($new_currency) {
    if ( is_user_logged_in() && get_user_meta(get_current_user_id(), 'currency', false) ) {
        update_user_meta( get_current_user_id(), 'currency', $new_currency ); 
    }
}

add_filter( 'wcml_client_currency', 'modify_client_currency', 10, 1 );
 function modify_client_currency( $currency ) {
    if ( is_user_logged_in() && get_user_meta(get_current_user_id(), 'currency', false) ) {
        return get_user_meta( get_current_user_id(), 'currency', true );
    }
    else {
        return $currency;
    }
}
?>