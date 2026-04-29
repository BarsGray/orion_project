<?php
/*
Plugin Name: My Custom Functions
*/

if (!defined('ABSPATH')) {
	exit;
}

if (!defined('_S_VERSION')) {
	define('_S_VERSION', '1.0.4');
}

if (!defined('FRONT_PAGE')) {
	define('FRONT_PAGE', get_option('page_on_front'));
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


function breadcrumbs($sep = ' / ', $args = array(), $l10n = array())
{
	static $inst;
	if (!$inst)
		$inst = new Breadcrumbs();
	if (is_array($sep)) {
		$args = $sep;
		$sep = isset($args['sep']) ? $args['sep'] : ' / ';
	}
	echo $inst->get_crumbs($sep, $l10n, $args);
}


function merge_numbers($num)
{
	return str_replace([' ', '-', '(', ')'], '', $num);
}


function register_orion_content()
{

	$post_labels = array(
		'name' => 'Товары',
		'singular_name' => 'Товар',
		'add_new' => 'Добавить новый',
		'add_new_item' => 'Добавить новый товар',
		'edit_item' => 'Редактировать товар',
		'menu_name' => 'Товары'
	);

	$post_args = array(
		'labels' => $post_labels,
		'public' => false,
		'show_ui' => true,
		'has_archive' => 'catalog',
		'menu_position' => 5,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title', 'editor', 'thumbnail'),
		'rewrite' => array('slug' => 'catalog'),
		'show_in_rest' => true,
		'capability_type' => 'post',
		'taxonomies' => array('or_category'),
	);

	register_post_type('or_product', $post_args);

	$tax_labels = array(
		'name' => 'Категории товаров',
		'singular_name' => 'Категория',
		'menu_name' => 'Категории',
		'all_items' => 'Все категории',
		'add_new_item' => 'Добавить новую категорию',
		'edit_item' => 'Изменить категорию',
	);

	$tax_args = array(
		'hierarchical' => true,
		'labels' => $tax_labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'catalog-cat'),
		'show_in_rest' => true,
	);

	register_taxonomy('or_category', array('or_product'), $tax_args);
}

add_action('init', 'register_orion_content');



function register_orion_services()
{

	$post_labels = array(
		'name' => 'Услуги',
		'singular_name' => 'Услуга',
		'add_new' => 'Добавить новую',
		'add_new_item' => 'Добавить новую услугу',
		'edit_item' => 'Редактировать услугу',
		'menu_name' => 'Услуги'
	);

	$post_args = array(
		'labels' => $post_labels,
		'public' => true,
		'has_archive' => 'services',
		'menu_position' => 5,
		'menu_icon' => 'dashicons-admin-post',
		'supports' => array('title', 'editor', 'thumbnail'),
		'rewrite' => array('slug' => 'services'),
		'show_in_rest' => true,
		'capability_type' => 'post',
	);

	register_post_type('or_service', $post_args);
}

add_action('init', 'register_orion_services');