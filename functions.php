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
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); 
        wp_enqueue_script('conditionizr'); 

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1');
        wp_enqueue_script('modernizr'); 

        wp_register_script('Bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0'); 
        wp_enqueue_script('Bootstrap-js');

        wp_register_script('jQuery', get_template_directory_uri() . '/js/jquery.min.js', array('jquery'), '1.0.0'); 
        wp_enqueue_script('jQuery');        

        wp_register_script('scripts-min', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); 
        wp_enqueue_script('scripts-min');          

        wp_register_script('slick.min', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.0.0'); 
        wp_enqueue_script('slick.min');                 

        wp_register_script('bootstrap_map', get_template_directory_uri() . '/js/bootstrap.min.js.map', array('jquery'), '1.0.0'); 
        wp_enqueue_script('bootstrap_map');       
    }
}
add_action('init', 'header_scripts'); 


function experiencias_custom_posttype()
{
    register_taxonomy_for_object_type('category', 'experiences'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'experiences');
    register_post_type('experiences', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Experiences', 'html5blank'), // Rename these to suit
            'singular_name' => __('Experience', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New Experience', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Experience', 'html5blank'),
            'new_item' => __('New Experience', 'html5blank'),
            'view' => __('View Experience', 'html5blank'),
            'view_item' => __('View Experience', 'html5blank'),
            'search_items' => __('Search Experiences', 'html5blank'),
            'not_found' => __('No Experiences found', 'html5blank'),
            'not_found_in_trash' => __('No Experiences found in Trash', 'html5blank')
        ),
        'menu_icon' => 'dashicons-universal-access-alt',
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}
add_action('init', 'experiencias_custom_posttype');

function menus() {
  register_nav_menu('main_menu',__( 'Main Menu' ));
  register_nav_menu('footer_menu',__( 'Footer Menu' ));
}
add_action( 'init', 'menus' );


?>