<?php
function show_title_box()
{
  ?>
  <div class="title_box">
    <div class="container">
			<?php
				$title = '';
				if (is_tax()) {
					$title = (get_field('alt_zag')) ? get_field('alt_zag') : single_term_title();
				} elseif(is_category()) {
					$title = (get_field('alt_zag')) ? get_field('alt_zag') : single_cat_title('', false);
				} elseif(is_404()) {
					$title = 'Ошибка 404!';
				} else {
					$title = (get_field('alt_zag')) ? get_field('alt_zag') : get_the_title();
				}
			?>
      <h1 class="title main_title"><?php echo $title; ?></h1>
      <?php breadcrumbs(); ?>
    </div>
  </div>
  <?php if (is_page(41) || is_tax()) : ?>
	<div class="catalog_tubs_box catalog_tubs_box_catalog">
		<div class="container">
			<?php show_category_prod(); ?>
		</div>
	</div>
	<?php endif;
}

function show_contacty()
{
	?>
  <div class="contacts_form_box">
		<div class="contacts">
			<p class="title_contacts main_title">Мы всегда готовы помочь и ответить на любые вопросы</p>
			<div class="contacts_inner">
				<div class="contacts_adresa">
					<p class="contacts_titles">Адреса</p>
					<?php if (get_field('adres_1', FRONT_PAGE)): ?>
						<div class="top_row_adress_1"><p class="top_row_text"><?php the_field('adres_1', FRONT_PAGE) ?></p></div>
					<?php endif; ?>
					<?php if (get_field('adres_2', FRONT_PAGE)): ?>
						<div class="top_row_adress_2"><p class="top_row_text"><?php the_field('adres_2', FRONT_PAGE) ?></p></div>
					<?php endif; ?>
				</div>
				<div class="contacts_tels">
					<p class="contacts_titles">Телефоны</p>
					<?php if (get_field('number_1', FRONT_PAGE)): ?>
						<a href="tel:<?php echo merge_numbers(get_field('number_1', FRONT_PAGE)); ?>" class="contacts_tel contacts_tel_1"><?php the_field('number_1', FRONT_PAGE) ?></a>
					<?php endif; ?>
					<?php if (get_field('number_2', FRONT_PAGE)): ?>
						<a href="tel:<?php echo merge_numbers(get_field('number_2', FRONT_PAGE)); ?>" class="contacts_tel contacts_tel_2"><?php the_field('number_2', FRONT_PAGE) ?></a>
					<?php endif; ?>
				</div>
				<div class="contacts_email">
					<p class="contacts_titles">Электронная почта</p>
					<?php if (get_field('email', FRONT_PAGE)): ?>
						<div class="map_info_list_item_inner">
							<a class="map_info_list_link" href="mailto:<?php the_field('email', FRONT_PAGE) ?>"><?php the_field('email', FRONT_PAGE) ?></a>
						</div>
					<?php endif; ?>
				</div>
				<div class="contacts_social">
					<p class="contacts_titles">Социальные сети</p>
					<?php socials_show(); ?>
				</div>
			</div>
		</div>
		<div class="form">
			<div class="form_box">
				<div class="top_box">
					<p class="form_title">Оставить заявку</p>
					<p class="form_text">Оставьте свои контакты и наш специалист перезвонит вам в ближайшее время.</p>
				</div>
					<?php echo do_shortcode('[contact-form-7 id="5e383e4" title="Contact form"]'); ?>
			</div>
		</div>
	</div>
	<?php
	show_map();
}

function show_map()
{
  ?>
		<div class="section_map">
			<?php if(!is_page(109)) : ?>
				<div class="map_info_content_box">
					<p class="map_info_title main_title">Как нас найти</p>
					<ul class="map_info_list">
						<?php if (get_field('adres_1', FRONT_PAGE)): ?>
							<li class="map_info_list_item map_info_list_item_place">
								<p class="map_info_list_item_inner"><?php the_field('adres_1', FRONT_PAGE) ?></p>
							</li>
						<?php endif; ?>
						<?php if (get_field('adres_2', FRONT_PAGE)): ?>
							<li class="map_info_list_item map_info_list_item_place">
								<p class="map_info_list_item_inner"><?php the_field('adres_2', FRONT_PAGE) ?></p>
							</li>
						<?php endif; ?>
						<?php if (get_field('number_1', FRONT_PAGE)): ?>
							<li class="map_info_list_item map_info_list_item_home_number">
								<a class="map_info_list_link" href="tel:<?php echo merge_numbers(get_field('number_1', FRONT_PAGE)); ?>"><?php the_field('number_1', FRONT_PAGE) ?></a></li>
						<?php endif; ?>
						<?php if (get_field('number_2', FRONT_PAGE)): ?>
							<li class="map_info_list_item map_info_list_item_mobile_number">
								<a class="map_info_list_link" href="tel:<?php echo merge_numbers(get_field('number_2', FRONT_PAGE)); ?>"><?php the_field('number_2', FRONT_PAGE) ?></a></li>
						<?php endif; ?>
						<?php if (get_field('email', FRONT_PAGE)): ?>
							<li class="map_info_list_item map_info_list_item_mail">
								<a class="map_info_list_link" href="mailto:<?php the_field('email', FRONT_PAGE) ?>"><?php the_field('email', FRONT_PAGE) ?></a></li>
						<?php endif; ?>
					</ul>
					<?php if (get_field('vk_link', FRONT_PAGE) || get_field('max_link', FRONT_PAGE)): ?>
						<div class="map_socials">
							<?php socials_show('map'); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="map_inner">
				<?php if (get_field('map', FRONT_PAGE)): ?>
					<?php echo get_field('map', FRONT_PAGE); ?>
				<?php endif; ?>
			</div>
		</div>
  <?php
}

function show_works() {
	if (get_field('gallery_works')): ?>
		<div class="gallery_works">
			<?php foreach(get_field('gallery_works') as $item): ?>
				<div class="gallery_works_item">
					<a data-fancybox="gallery" href="<?php echo $item['url']; ?>"><img src="<?php echo $item['sizes']['custom-gallery-thumb_4_3']; ?>" alt="<?php echo $item['alt']; ?>"></a>
				</div>
			<?php endforeach; ?>
			<a class="gallery_works_btn" href="#">Показать ещё</a>
		</div>
	<?php
	endif;
}

function show_gellary_services() {
	if (get_field('gellary_services')): ?>
		<div class="gallery_works">
			<?php foreach(get_field('gellary_services') as $item): ?>
				<div class="gallery_works_item">
					<a data-fancybox="gallery" href="<?php echo $item['url']; ?>"><img src="<?php echo $item['sizes']['custom-gallery-thumb_4_3']; ?>" alt="<?php echo $item['alt']; ?>"></a>
				</div>
			<?php endforeach; ?>
			<a class="gallery_works_btn" href="#">Показать ещё</a>
		</div>
	<?php
	endif;
}

function show_services()
{
	$query = new WP_Query([
		'post_type' => 'service',
		'posts_per_page' => 10,
		'paged' => (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1)
	]);

	if ($query->have_posts()):
		?>
		<div class="services_page">
			<?php while ($query->have_posts()): $query->the_post(); ?>
				<div class="services_page_item">
					<div class="services_page_item_img">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('custom-gallery-thumb_4_3'); ?></a>
					</div>
					<div class="services_page_item_rigth">
						<p class="services_page_item_name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
						<p class="services_page_item_description"><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
						<a class="services_page_item_btn" href="<?php the_permalink(); ?>">Узнать больше</a>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<?php
		wp_pagenavi(['query' => $query]);
		wp_reset_postdata();
	endif;
}

function show_services_on_front()
{
	$query = new WP_Query([
		'post_type' => 'service',
		'posts_per_page' => 6,
		'paged' => (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1),
		'order'   => 'ASC'
	]);
	if ($query->have_posts()):
	?>
		<div class="section services">
			<div class="container">
				<p class="services_title main_title">Наши услуги</p>
				<div class="services_box">
					<?php while ($query->have_posts()): $query->the_post(); ?>
					<a href="<?php the_permalink(); ?>" class="services_item">
						<span class="services_img"><img class="" src="<?php echo (get_field('ikonka_uslugi')) ? get_field('ikonka_uslugi')['url'] : bloginfo('template_url') . '/img/kombi.svg'; ?>" alt="icon"></span>
						<span class="services_text"><?php the_title() ?></span>
					</a>
					<?php endwhile; ?>
				</div>
				<a href="<?php echo get_permalink(42); ?>" class="services_main_btn main_btn">Узнать больше</a>
			</div>
		</div>
	<?php 
	endif;
}


function show_category_prod()
{
	$selected_cat = get_queried_object()->slug;

	$categories = get_terms(['taxonomy' => 'catalog', 'hide_empty' => true,]);
	?>
		<button class="catalog_tubs_btn catalog_tubs_btn_prev"></button>
		<ul class="catalog_tubs_row">
		<?php
		if (is_front_page()) : ?>
			<?php $count = 0;
			foreach ($categories as $category): ?>
				<li class="catalog_tub_item catalog_tub_item_mix <?php echo ($count == 0) ? 'active' : '' ?>" data-filter=".cat-<?php echo $category->slug; ?>">
					<a href="#"><?php echo esc_html($category->name); ?></a>
				</li>
			<?php $count++;
				endforeach; ?>
		<?php else:
			foreach ($categories as $category): ?>
				<li class="catalog_tub_item<?php echo ($selected_cat == $category->slug) ? ' active' : ''; ?>">
					<a href="<?php echo get_term_link($category); ?>"><?php echo esc_html($category->name); ?></a>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
		</ul>
		<button class="catalog_tubs_btn catalog_tubs_btn_next"></button>
	<?php
}


function show_products($args)
{
	$cat_slug = isset($_GET['cat']) ? sanitize_text_field($_GET['cat']) : '';
	if (!empty($cat_slug)) $args['tax_query'] = [array('taxonomy' => 'catalog', 'field' => 'slug', 'terms' => $cat_slug )];
	$args['order'] = 'ASC';

	$query = new WP_Query($args);
	if ($query->have_posts()):
		echo (!is_front_page()) ? '<div class="catalog_box">' : '';

		while ($query->have_posts()): $query->the_post();
			$cats = get_the_terms(get_the_ID(), 'catalog');
			$classes = '';
			if (is_front_page()) {foreach ($cats as $cat) {$classes .= ' cat-' . $cat->slug;}}
		?>
			<div class="catalog_item <?php echo (is_front_page()) ? 'mix' : '' ?><?php echo $classes; ?>">
				<a data-fancybox href="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>">
					<span class="catalog_item_img"><?php the_post_thumbnail('full'); ?></span>
					<span class="catalog_item_name"><?php the_title(); ?></span>
				</a>
				<a data-fancybox data-src="#popup_box" href="#" class="catalog_item_btn">Заказать</a>
			</div>
		<?php endwhile;
		wp_reset_postdata(); ?>

		<?php  echo (!is_front_page()) ? '</div>' : '';
		if (!is_front_page()) {
			$next_link = ($query->max_num_pages) ? get_next_posts_page_link($query->max_num_pages) : 0;
			if ($next_link): ?>
				<a class="load_more_btn" href="<?php echo esc_url($next_link); ?>">Загрузить ещё</a>
		<?php
			endif;
			wp_pagenavi(['query' => $query]);
		}
	endif;
}


function socials_show($args = '')
{
	if (get_field('vk_link', FRONT_PAGE) || get_field('max_link', FRONT_PAGE)): ?>
		<div class="contacts_socials">
			<?php if (get_field('vk_link', FRONT_PAGE)): ?>
				<a rel="nofollow" target="_blank" href="<?php the_field('vk_link', FRONT_PAGE) ?>" class="<?php echo ($args === 'map' || $args === 'mobile') ? 'vk_link_map ' : 'vk_link contacts_'; ?>socials_link"></a>
			<?php endif; ?>
			<?php if (get_field('max_link', FRONT_PAGE)): ?>
				<a rel="nofollow" target="_blank" href="<?php the_field('max_link', FRONT_PAGE) ?>" class="<?php echo ($args === 'map' || $args === 'mobile') ? 'max_link_map ' : 'max_link contacts_'; ?>socials_link"></a>
			<?php endif; ?>
		</div>
	<?php endif;
}