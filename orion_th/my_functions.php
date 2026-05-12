<?php /* Plugin Name: My Custom Functions */

if (!defined('ABSPATH')) { exit; }
if (!defined('_S_VERSION')) { define('_S_VERSION', '1.0.6'); }
if (!defined('FRONT_PAGE')) { define('FRONT_PAGE', get_option('page_on_front')); }

add_theme_support('post-thumbnails');
register_nav_menus();

add_action('wp_enqueue_scripts', 'orion_th_scripts_style');
function orion_th_scripts_style()
{
	wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper-bundle.min.js', array('jquery'), null, true);
	wp_enqueue_script('fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), null, true);
	wp_enqueue_script('mixitup', get_template_directory_uri() . '/js/mixitup.min.js', array('jquery'), null, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), _S_VERSION, true);

	wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/css/swiper-bundle.min.css', array(), null, 'all');
	wp_enqueue_style('fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css', array(), null, 'all');
	wp_enqueue_style('orion_th-style', get_stylesheet_uri(), array(), _S_VERSION);
}

add_filter('site_transient_update_plugins','filter_plugin_updates');
function filter_plugin_updates($value){
	unset($value->response['all-in-one-seo-pack/all_in_one_seo_pack.php']);
	return $value;
}

add_action('template_redirect','template_redirect');
function template_redirect(){
	if((is_post_type_archive() || is_category(1) || is_attachment())){ wp_redirect('/',301); exit; }
}

add_action('admin_head','admin_head');
function admin_head(){
	echo '<style type="text/css">#wpwrap #edittag{max-width:100%;}.term-description-wrap{display:none;}</style>';
}

// function breadcrumbs($sep = ' / ', $args = array(), $l10n = array())
// {
// 	static $inst;
// 	if (!$inst)
// 		$inst = new Breadcrumbs();
// 	if (is_array($sep)) {
// 		$args = $sep;
// 		$sep = isset($args['sep']) ? $args['sep'] : ' / ';
// 	}
// 	echo $inst->get_crumbs($sep, $l10n, $args);
// }

function breadcrumbs($sep = ' / '){
	$kb=new Breadcrumbs();
	echo $kb->get_crumbs($sep);
}

add_action('kama_breadcrumbs_home_after','add_tax_custom',10,5);
function add_tax_custom($false,$linkpatt,$sep,$ptype,$q_obj){
	if(!is_search()){
		$data_taxs=array(
			'service' => 42,
			'product' => 41,
		);
		foreach($data_taxs as $post_type=>$id_page){
			if(isset($ptype->name) && $ptype->name==$post_type){
				$page=get_post($id_page);
				if($q_obj->name==$post_type)
					return $home_after=sprintf($linkpatt,get_permalink($page),$page->post_title); 
				else
					return $home_after=sprintf($linkpatt,get_permalink($page),$page->post_title) . $sep;
			}
		}
	}
}


function merge_numbers($num) { return str_replace([' ', '-', '(', ')'], '', $num); }


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
		'public' => true,
		'show_ui' => true,
		'has_archive' => 'product',
		'menu_position' => 5,
		'menu_icon' => 'dashicons-clipboard',
		'supports' => array('title', 'editor', 'thumbnail'),
		'rewrite' => array('slug' => 'product'),
		'show_in_rest' => true,
		'capability_type' => 'post',
		'taxonomies' => array('catalog'),
	);

	register_post_type('product', $post_args);

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
		'rewrite' => array('slug' => 'catalog'),
		'show_in_rest' => true,
	);

	register_taxonomy('catalog', array('product'), $tax_args);
}

add_action('init', 'register_orion_content');



function register_orion_services()
{

	$post_labels = array(
		'name' => 'Наши услуги',
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
		'menu_icon' => 'dashicons-hammer',
		'supports' => array('title', 'editor', 'thumbnail'),
		'rewrite' => array('slug' => 'services'),
		'show_in_rest' => true,
		'capability_type' => 'post',
	);

	register_post_type('service', $post_args);
}

add_action('init', 'register_orion_services');
