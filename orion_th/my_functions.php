<?php
/*
Plugin Name: My Custom Functions
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.2' );
}

add_theme_support('post-thumbnails');

register_nav_menus();

add_action('wp_enqueue_scripts', 'orion_th_scripts_style');
function orion_th_scripts_style()
{
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), null, true);
	wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array('jquery'), null, true);
	wp_enqueue_script('mixitup', get_template_directory_uri() . '/assets/js/mixitup.min.js', array('jquery'), null, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), _S_VERSION, true);
	
	wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), null, 'all');
	wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), null, 'all');
	wp_enqueue_style('orion_th-style', get_stylesheet_uri(), array(), _S_VERSION);
}



function breadcrumbs ( $sep = ' / ', $args = array(), $l10n = array() ){
    static $inst; 
    if( ! $inst ) $inst = new Breadcrumbs();    
    if( is_array($sep) ){
        $args = $sep;
        $sep = isset($args['sep']) ? $args['sep'] : ' / ';
    }
    echo $inst->get_crumbs( $sep, $l10n, $args );
}

function merge_numbers($num) {
	return str_replace([' ', '-', '(', ')'], '', $num);
}
