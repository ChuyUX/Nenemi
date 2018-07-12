<?php 
require_once('class-wp-bootstrap-navwalker.php');

// Cargar estilos
function styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize');

    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('style');

    wp_register_style('nenemi', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
    wp_enqueue_style('nenemi');
}
add_action('wp_enqueue_scripts', 'styles');

// Load HTML5 Blank scripts (header.php)
function header_scripts()
{
    wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); 
    wp_enqueue_script('conditionizr'); 

    wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1');
    wp_enqueue_script('modernizr');
}
add_action('init', 'header_scripts'); 

function footer_scripts()
{
    wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); 
    wp_enqueue_script('conditionizr'); 

    wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1');
    wp_enqueue_script('modernizr'); 

    wp_register_script('jQuery', get_template_directory_uri() . '/js/jquery.min.js', array('jquery'), '1.0.0'); 
    wp_enqueue_script('jQuery');

    wp_register_script('popper-js', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), '1.0.0'); 
    wp_enqueue_script('popper-js');      

    wp_register_script('Bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0'); 
    wp_enqueue_script('Bootstrap-js');

    wp_register_script('slick.min', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.0.0'); 
    wp_enqueue_script('slick.min'); 

    wp_register_script('MagnificPopup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '1.0.0'); 
    wp_enqueue_script('MagnificPopup');

    wp_register_script('sharer-js', get_template_directory_uri() . '/js/sharer.min.js', array('jquery'), '1.0.0'); 
    wp_enqueue_script('sharer-js'); 

    wp_register_script('datepicker-js', get_template_directory_uri() . '/js/datepicker.min.js', array('jquery'), '1.0.0'); 
    wp_enqueue_script('datepicker-js'); 

    wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); 
    wp_enqueue_script('scripts'); 

    wp_register_script('wordpress-scripts', get_template_directory_uri() . '/js/wordpress-scripts.js', array('jquery'), '1.0.0'); 
    wp_enqueue_script('wordpress-scripts'); 
}
add_action('wp_footer', 'footer_scripts');

function menus() {
  register_nav_menu('main_menu',__( 'Main Menu' ));
  register_nav_menu('footer_menu',__( 'Footer Menu' ));
}
add_action( 'init', 'menus' );

function create_post_type(){
    register_post_type('ciudad', 
        array(
            'labels'    =>  array(
                'name'              =>  'Ciudades',
                'singular_name'     =>  'Ciudad',
            ),
            'public'    =>  true,
            'menu_icon' =>  'dashicons-admin-multisite'
    ));

    add_post_type_support( 'ciudad', 'thumbnail' );
}
add_action('init', 'create_post_type');


//Woocommerce
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

    
//Blog Sidebar Functions
function sidebar_widgets_init(){
    register_sidebar(array(
        'name'          =>  'Blog Sidebar Widgets',
        'id'            =>  'blog_widgets',
        'before_widget' =>  '<div class="widget">',
        'after_widget'  =>  '</div>',
        'before_title'  =>  '<h3 class="widget__title">',
        'after_title'   =>  '</h3>'
    ) );
}
add_action('widgets_init', 'sidebar_widgets_init');


//Blog Pagination
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    return paginate_links(array(
        'base'      =>  str_replace($big, '%#%', get_pagenum_link($big)),
        'format'    =>  '?paged=%#%',
        'current'   =>  max(1, get_query_var('paged')),
        'total'     =>  $wp_query->max_num_pages,
        'type'      =>  'array',
        'next_text' =>  '<span aria-hidden="true"><svg class="icon"><use xlink:href="' . get_template_directory_uri() . '/img/symbol-defs.svg#icon-arrow-right"></use></svg></span>',
        'prev_text' =>  '<span aria-hidden="true"><svg class="icon"><use xlink:href="' . get_template_directory_uri() . '/img/symbol-defs.svg#icon-arrow-left"></use></svg></span>'
    ));

}
add_action('init', 'html5wp_pagination');

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

//Function to know if right now is between to dates
function is_between_dates($date_prev, $date_post){
    $date_today = new DateTime();

    $date_prev = DateTime::createFromFormat('m/d/Y', $date_prev);
    $date_post = DateTime::createFromFormat('m/d/Y', $date_post);

    if($date_today <= $date_post && $date_today >= $date_prev){
        return true;
    }
    else { 
        return false;
    }
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

function dez_filter_chinese_excerpt( $output ) {
    global $post;

    //check if its chinese character input
    $chinese_output = preg_match_all("/\p{Han}+/u", $post->post_content, $matches);

    if($chinese_output) {
        $output = mb_substr( $output, 0, 50 ) . '...';
    }
    
    return $output;
}
add_filter( 'get_the_excerpt', 'dez_filter_chinese_excerpt' );

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

function settings_add_my_account_endpoint() {
 
    add_rewrite_endpoint( 'settings', EP_PAGES );
 
}
add_action( 'init', 'settings_add_my_account_endpoint' );

add_image_size( 'slider-thumbnail', $width = 600, $height = 400, $crop = true );

add_image_size( 'home-thumbnail', 400, 400, array( 'center', 'center' ) );

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
        echo get_woocommerce_currency_symbol() . $quantity . ' ' . get_woocommerce_currency();
    }

    //Function to know if right now is between to dates
    function is_between_dates($date_prev, $date_post){
        $date_today = new DateTime();

        $date_prev = DateTime::createFromFormat('m/d/Y', $date_prev);
        $date_post = DateTime::createFromFormat('m/d/Y', $date_post);

        if($date_today <= $date_post && $date_today >= $date_prev){
            return true;
        }
        else { 
            return false;
        }
    }   

?>