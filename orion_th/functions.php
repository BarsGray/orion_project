<?php

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
add_action('after_setup_theme', 'orion_th_setup');




function orion_th_scripts_style()
{

	// wp_deregister_script('jquery');
	// wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery-4.0.0.min.js', array(), null, true);
	// wp_enqueue_script('jquery');
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), null, true);
	// wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/js/fancybox.umd.js', array('jquery'), null, true );
	wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array('jquery'), null, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);

	wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), null, 'all');
	// wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/css/fancybox.css', array('orion_th-style'), null, 'all');
	wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), null, 'all');
	wp_enqueue_style('orion_th-style', get_stylesheet_uri(), array(), null);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'orion_th_scripts_style');


// ======================================================================================================================



// ======================================================================================================================


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




















