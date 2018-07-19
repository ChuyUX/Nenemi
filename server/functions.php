<?php 
require_once('class-wp-bootstrap-navwalker.php');
require_once('functions-woocommerce.php');
require_once('wc-template-functions.php');


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

add_image_size( 'slider-thumbnail', $width = 600, $height = 400, $crop = true );

add_image_size( 'home-thumbnail', 400, 400, array( 'center', 'center' ) );

add_image_size( 'woocommerce-custom', 300, 170, array( 'center', 'center' ) );

function settings_query_vars( $vars ) {
    $vars[] = 'settings';
    return $vars;
}
add_filter( 'query_vars', 'settings_query_vars', 0 );

function settings_rewrite_rules() {
    flush_rewrite_rules();
}
add_action( 'wp_loaded', 'settings_rewrite_rules' );



?>