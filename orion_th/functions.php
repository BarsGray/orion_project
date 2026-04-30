<?php


function show_title_box()
{
  ?>
  <div class="title_box">
    <div class="container">
      <p class="title main_title"><?php the_title(); ?></p>
      <?php breadcrumbs(); ?>
    </div>
  </div>
  <?php if (is_page(41)) : ?>
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
					<div class="contacts_titles">Адреса</div>
					<?php if (get_field('adres_1', FRONT_PAGE)): ?>
						<div class="top_row_adress_1"><p class="top_row_text"><?php the_field('adres_1', FRONT_PAGE) ?></p></div>
					<?php endif; ?>
					<?php if (get_field('adres_2', FRONT_PAGE)): ?>
						<div class="top_row_adress_2"><p class="top_row_text"><?php the_field('adres_2', FRONT_PAGE) ?></p></div>
					<?php endif; ?>
				</div>
				<div class="contacts_tels">
					<div class="contacts_titles">Телефоны</div>
					<?php if (get_field('number_1', FRONT_PAGE)): ?>
						<div class="top_row_contacts_tel_1">
							<a href="tel:<?php merge_numbers(get_field('number_1', FRONT_PAGE)); ?>" class="contacts_tel"><?php the_field('number_1', FRONT_PAGE) ?></a>
						</div>
					<?php endif; ?>
					<?php if (get_field('number_2', FRONT_PAGE)): ?>
						<div class="top_row_contacts_tel_2">
							<a href="tel:<?php merge_numbers(get_field('number_2', FRONT_PAGE)); ?>" class="contacts_tel"><?php the_field('number_2', FRONT_PAGE) ?></a>
						</div>
					<?php endif; ?>
				</div>
				<div class="contacts_email">
					<div class="contacts_titles">Электронная почта</div>
					<?php if (get_field('email', FRONT_PAGE)): ?>
						<div class="map_info_list_item_inner">
							<a class="map_info_list_link" href="mailto:9507620621@mail.ru"><?php the_field('email', FRONT_PAGE) ?></a>
						</div>
					<?php endif; ?>
				</div>
				<div class="contacts_social">
					<div class="contacts_titles">Социальные сети</div>
					<?php if (get_field('vk_link', FRONT_PAGE) || get_field('max_link', FRONT_PAGE)): ?>
						<div class="contacts_socials">
							<?php if (get_field('vk_link', FRONT_PAGE)): ?>
								<a href="<?php the_field('vk_link', FRONT_PAGE) ?>" class="contacts_socials_link"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/frame4382vk.svg" alt=""></a>
							<?php endif; ?>
							<?php if (get_field('max_link', FRONT_PAGE)): ?>
								<a href="<?php the_field('max_link', FRONT_PAGE) ?>" class="contacts_socials_link"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/logo_MAX2.svg" alt=""></a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="form">
			
			<div class="form_box">
				<div class="top_box">
					<p class="form_title">Оставить заявку</p>
					<p class="form_text">Оставьте свои контакты и наш специалист перезвонит вам в ближайшее время.</p>
				</div>
					<form method="POST">
						<input type="text" id="name" name="user_name" placeholder="Имя (опционально)" required>
						<input type="tel" id="tel" name="tel" placeholder="Телефон" required>
						<button type="submit">Отправить</button>
					</form>
			</div>

		</div>
	</div>

	<?php
	show_map();
}

function show_map()
{
  ?>
		<section class="section_map">
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
								<p class="map_info_list_item_inner">
									<a class="map_info_list_link" href="tel:<?php merge_numbers(get_field('number_1', FRONT_PAGE)); ?>">
										<?php the_field('number_1', FRONT_PAGE) ?>
									</a>
								</p>
							</li>
						<?php endif; ?>
						<?php if (get_field('number_2', FRONT_PAGE)): ?>
							<li class="map_info_list_item map_info_list_item_mobile_number">
								<p class="map_info_list_item_inner">
									<a class="map_info_list_link" href="tel:<?php merge_numbers(get_field('number_2', FRONT_PAGE)); ?>">
										<?php the_field('number_2', FRONT_PAGE) ?>
									</a>
								</p>
							</li>
						<?php endif; ?>
						<?php if (get_field('email', FRONT_PAGE)): ?>
							<li class="map_info_list_item map_info_list_item_mail">
								<p class="map_info_list_item_inner">
									<a class="map_info_list_link" href="mailto:9507620621@mail.ru"><?php the_field('email', FRONT_PAGE) ?></a>
								</p>
							</li>
						<?php endif; ?>
					</ul>
					<?php if (get_field('vk_link', FRONT_PAGE) || get_field('max_link', FRONT_PAGE)): ?>
						<div class="map_socials">
							<?php if (get_field('vk_link', FRONT_PAGE)): ?>
								<a href="<?php the_field('vk_link', FRONT_PAGE) ?>" class="socials_link"><img src="<?php bloginfo('template_url') ?>/assets/img/vk_map.svg" alt=""></a>
							<?php endif; ?>
							<?php if (get_field('max_link', FRONT_PAGE)): ?>
								<a href="<?php the_field('max_link', FRONT_PAGE) ?>" class="socials_link"><img src="<?php bloginfo('template_url') ?>/assets/img/max_map.svg" alt=""></a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="map_inner">
				<script async
					src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A293ef0d12dff9ee1fc34f4d334ac805b4a9289ad72c69c4738a8cb68ce61a50a&amp;lang=ru_RU&amp;scroll=true">
					</script>
			</div>
		</section>
  <?php
}


function show_works() {
	if (get_field('gallery_works')): ?>
		<div class="gallery_works">
			<?php foreach(get_field('gallery_works') as $item): ?>
				<div class="gallery_works_item">
					<a data-fancybox="gallery" href="<?php echo $item['url']; ?>"><img src="<?php echo $item['url']; ?>" alt="<?php echo $item['alt']; ?>"></a>
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
		'post_type' => 'or_service',
		'posts_per_page' => -1
	]);

	if ($query->have_posts()):
		?>
		<div class="services_page">
			<?php while ($query->have_posts()): $query->the_post(); ?>
				<div class="services_page_item">
					<div class="services_page_item_img">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
					</div>
					<div class="services_page_item_rigth">
						<p class="services_page_item_name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
						<p class="services_page_item_description"><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
						<a class="services_page_item_btn" href="<?php the_permalink(); ?>">Узнать больше</a>
					</div>
				</div>
			<?php endwhile;
			wp_reset_postdata(); ?>
		</div>

		<?php
	endif;
	
}


function show_category_prod()
{
	$categories = get_terms([
		'taxonomy'   => 'or_category',
		'hide_empty' => true,
	]);
	?>
		<button class="catalog_tubs_btn catalog_tubs_btn_prev"></button>

		<ul class="catalog_tubs_row">
		<?php
			foreach ($categories as $category): ?>
				<li class="catalog_tub_item<?php echo ($selected_cat == $category->slug) ? ' active' : ''; ?>">
					<a href="<?php echo get_permalink() ?>?cat=<?php echo $category->slug; ?>"><?php echo esc_html($category->name); ?></a>
				</li>
			<?php endforeach; ?>

		<!-- <ul class="catalog_tubs_row">
			<li class="catalog_tub_item catalog_tub_item_mix active" data-filter="all"><a href="#">Все</a></li>
			<?php foreach ($categories as $category): ?>
				<li class="catalog_tub_item catalog_tub_item_mix" data-filter=".cat-<?php echo $category->slug; ?>">
					<a href="#"><?php echo esc_html($category->name); ?></a>
				</li>
			<?php endforeach; ?>
			</ul> -->
			</ul>
		<button class="catalog_tubs_btn catalog_tubs_btn_next"></button>
	<?php
}



function show_products($args)
{
	$query = new WP_Query($args);
	// $query = new WP_Query([
	// 	'post_type' => 'or_product',
	// 	'posts_per_page' => -1,
	// ]);

	if ($query->have_posts()): ?>
		<div class="catalog_box <?php echo (is_front_page()) ? 'catalog_box_mix' : '' ?>">
		<?php while ($query->have_posts()): $query->the_post();
			$cats = get_the_terms(get_the_ID(), 'or_category');
			$classes = '';
			if (is_front_page()) {
				foreach ($cats as $cat) {
					$classes .= ' cat-' . $cat->slug;
				}
			}
		?>
			<div class="catalog_item <?php echo (is_front_page()) ? 'mix' : '' ?><?php echo $classes; ?>">
				<a href="<?php the_permalink(); ?>">
					<span class="catalog_item_img"><?php the_post_thumbnail('medium'); ?></span>
					<span class="catalog_item_name"><?php the_title(); ?></span>
				</a>
				<a href="<?php the_permalink(); ?>" class="catalog_item_btn">Заказать</a>
			</div>
		<?php endwhile;
		wp_reset_postdata(); ?>
		</div>
	<?php
		if (!is_front_page())
			wp_pagenavi(['query' => $query]);
	endif;
}

function show_catalog_prod() {

}


