<?php

add_action('after_setup_theme', 'orion_th_setup');
function orion_th_setup()
{
	add_theme_support('post-thumbnails');

	register_nav_menus(
		array(
			'header_menu' => esc_html__('Primary', 'orion_th'),
			'header_menu' => 'Меню в шапке',
			'footer_menu' => 'Меню в подвале',
		)
	);
}



add_action('wp_enqueue_scripts', 'orion_th_scripts_style');
function orion_th_scripts_style()
{
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), null, true);
	wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array('jquery'), null, true);
	wp_enqueue_script('mixitup', get_template_directory_uri() . '/assets/js/mixitup.min.js', array('jquery'), null, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
	
	wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), null, 'all');
	wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), null, 'all');
	wp_enqueue_style('orion_th-style', get_stylesheet_uri(), array(), null);
}





















