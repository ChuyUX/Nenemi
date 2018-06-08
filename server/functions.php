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

    wp_register_script('Bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0'); 
    wp_enqueue_script('Bootstrap-js');

    wp_register_script('slick.min', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.0.0'); 
    wp_enqueue_script('slick.min');  

    wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); 
    wp_enqueue_script('scripts'); 
}
add_action('wp_footer', 'footer_scripts');

function menus() {
  register_nav_menu('main_menu',__( 'Main Menu' ));
  register_nav_menu('footer_menu',__( 'Footer Menu' ));
}
add_action( 'init', 'menus' );


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

?>