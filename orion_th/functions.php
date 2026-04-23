<?php
/**
 * orion_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package orion_theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.1');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function orion_th_setup()
{

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header_menu' => esc_html__('Primary', 'orion_th'),
			'header_menu' => 'Меню в шапке',
			'footer_menu' => 'Меню в подвале',
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action('after_setup_theme', 'orion_th_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function orion_th_content_width()
{
	$GLOBALS['content_width'] = apply_filters('orion_th_content_width', 640);
}
add_action('after_setup_theme', 'orion_th_content_width', 0);



// ======================================================================================================================

// ======================================================================================================================

require get_template_directory() . '/inc/enqueue_script_style.php';


add_filter('upload_mimes', 'svg_upload_allow');
function svg_upload_allow($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{
	if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
		$dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
	} else {
		$dosvg = ('.svg' === strtolower(substr($filename, -4)));
	}
	if ($dosvg) {
		if (current_user_can('manage_options')) {
			$data['ext'] = 'svg';
			$data['type'] = 'image/svg+xml';
		} else {
			$data['ext'] = false;
			$data['type'] = false;
		}
	}
	return $data;
}




// ++++++++++++++++++++++++++++ ajax product on home ++++++++++++++++++++++++++++++++++++++++++++

add_action('wp_ajax_filter_products', 'ajax_product_filter_handler');
add_action('wp_ajax_nopriv_filter_products', 'ajax_product_filter_handler');

function ajax_product_filter_handler()
{
	$category = $_POST['category'];

	$args = [
		'post_type' => 'product',
		'posts_per_page' => 8,
	];

	if (!empty($category)) {
		$args['tax_query'] = [
			[
				'taxonomy' => 'product_cat',
				'field' => 'slug',
				'terms' => $category,
			]
		];
	}

	$query = new WP_Query($args);

	if ($query->have_posts()):
		while ($query->have_posts()):
			$query->the_post();
			// Вывод карточки товара
			// (стандартный шаблон Woo) wc_get_template_part('content', 'product');
			?>
			<div class="catalog_item">
				<a href="<?php the_permalink(); ?>" class="catalog_item_link">
					<span class="catalog_item_img">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
					</span>
					<span class="catalog_item_name">
						<?php the_title(); ?>
					</span>
				</a>
				<a href="" class="catalog_item_btn">Заказать</a>
			</div>
			<?php
		endwhile;
	else:
		echo 'Товаров не найдено.';
	endif;

	wp_reset_postdata();
	die(); // Обязательно для завершения AJAX-запроса
}

// ++++++++++++++++++++++++++++ ajax product on home ++++++++++++++++++++++++++++++++++++++++++++




















