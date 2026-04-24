<?php get_header(); ?>

<main id="primary" class="site-main">

	<div class="main_wrapper">

		<section class="services">
			<div class="container">
				<p class="services_title main_title">Наши услуги</p>
				<div class="services_box">
					<div class="services_item">
						<div class="services_img"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/granit.svg" alt=""></div>
						<p class="services_text">Гранитные памятники</p>
					</div>
					<div class="services_item">
						<div class="services_img"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/mramor.svg" alt=""></div>
						<p class="services_text">Мраморные памятники</p>
					</div>
					<div class="services_item">
						<div class="services_img"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/kombi.svg" alt=""></div>
						<p class="services_text">Комбинированные памятники</p>
					</div>
					<div class="services_item">
						<div class="services_img"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/memorial.svg" alt=""></div>
						<p class="services_text">Мемориальные комплексы</p>
					</div>
					<div class="services_item">
						<div class="services_img"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/blago.svg" alt=""></div>
						<p class="services_text">Благоустройство захоронения</p>
					</div>
					<div class="services_item">
						<div class="services_img"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/gravi.svg" alt=""></div>
						<p class="services_text">Художественная гравировка</p>
					</div>
				</div>
				<a href="#" class="services_main_btn main_btn">Узнать больше</a>
			</div>
		</section>

		<section class="catalog">
			<div class="catalog_wrapper">
				<div class="container">
					<p class="catalog_title main_title">Каталог</p>
					<div class="catalog_tubs_box">
						<button class="catalog_tubs_btn catalog_tubs_btn_prev"></button>
						<ul class="catalog_tubs_row">
							<li class="catalog_tub_item active"><a href="">Ангелы</a></li>
							<li class="catalog_tub_item"><a href="">Ветви</a></li>
							<li class="catalog_tub_item"><a href="">Военные</a></li>
							<li class="catalog_tub_item"><a href="">Деревья</a></li>
							<li class="catalog_tub_item"><a href="">Детские</a></li>
							<li class="catalog_tub_item"><a href="">Иконы</a></li>
							<li class="catalog_tub_item"><a href="">Колосья</a></li>
							<li class="catalog_tub_item"><a href="">Кресты</a></li>
							<li class="catalog_tub_item"><a href="">Лоза</a></li>
							<li class="catalog_tub_item"><a href="">Пламя</a></li>
							<li class="catalog_tub_item"><a href="">Кресты</a></li>
						</ul>
						<button class="catalog_tubs_btn catalog_tubs_btn_next"></button>
					</div>
					<div class="catalog_box">
						<div class="catalog_item">
							<a href="catalog_item_link">
								<span class="catalog_item_img"><img src="<?php bloginfo('template_url') ?>/assets/img/angel-003.jpg" alt=""></span>
								<span class="catalog_item_name">Label-001</span>
							</a>
							<a href="" class="catalog_item_btn">Заказать</a>
						</div>
					</div>
					<a href="#" class="main_btn catalog_main_btn">Смотреть весь каталог</a>
				</div>
			</div>
		</section>


		<?php if (have_rows('slides', 'option')): ?>
			<section class="carusel">
				<div class="container carusel_container_top">
					<p class="main_title carusel_title"><?php the_field('title_slider', 'option'); ?></p>
					<div class="carusel__arrow carusel__prev"></div>
					<div class="carusel__arrow carusel__next"></div>
				</div>
				<div class="carusel__slider_main_wrapper">
					<div class="container">
						<div class="swiper carusel__slider-wrapper">
							<div class="swiper-wrapper carusel__slider">
								<?php while (have_rows('slides', 'option')):
									the_row(); ?>
									<div class="swiper-slide carusel__slide">
										<a data-fancybox="gallery" href="<?php the_sub_field('foto'); ?>"><img src="<?php the_sub_field('foto'); ?>" alt="<?php the_sub_field('description'); ?>"></a>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-pagination carusel__pagination"></div>
			</section>
		<?php endif; ?>

		<section class="section_map">
			<div class="map">
				<div class="map_info_content_box">
					<p class="map_info_title main_title">Как нас найти</p>
					<ul class="map_info_list">
						<?php if (get_field('adres_1', 'option')): ?>
							<li class="map_info_list_item map_info_list_item_place">
								<p class="map_info_list_item_inner"><?php the_field('adres_1', 'option') ?></p>
							</li>
						<?php endif; ?>
						<?php if (get_field('adres_2', 'option')): ?>
							<li class="map_info_list_item map_info_list_item_place">
								<p class="map_info_list_item_inner"><?php the_field('adres_2', 'option') ?></p>
							</li>
						<?php endif; ?>
						<?php if (get_field('city_number', 'option')): ?>
							<li class="map_info_list_item map_info_list_item_home_number">
								<p class="map_info_list_item_inner">
									<a class="map_info_list_link" href="tel:<?php echo str_replace([' ', '-', '(', ')'], '', get_field('city_number', 'option')); ?>">
										<?php the_field('city_number', 'option') ?>
									</a>
								</p>
							</li>
						<?php endif; ?>
						<?php if (get_field('mobile_number', 'option')): ?>
							<li class="map_info_list_item map_info_list_item_mobile_number">
								<p class="map_info_list_item_inner">
									<a class="map_info_list_link" href="tel:<?php echo str_replace([' ', '-', '(', ')'], '', get_field('mobile_number', 'option')); ?>">
										<?php the_field('mobile_number', 'option') ?>
									</a>
								</p>
							</li>
						<?php endif; ?>
						<?php if (get_field('email', 'option')): ?>
							<li class="map_info_list_item map_info_list_item_mail">
								<p class="map_info_list_item_inner">
									<a class="map_info_list_link" href="mailto:9507620621@mail.ru"><?php the_field('email', 'option') ?></a>
								</p>
							</li>
						<?php endif; ?>
					</ul>
					<?php if (get_field('vk_link', 'option') || get_field('max_link', 'option')): ?>
						<div class="map_socials">
							<?php if (get_field('vk_link', 'option')): ?>
								<a href="<?php the_field('vk_link', 'option') ?>" class="socials_link"><img src="<?php bloginfo('template_url') ?>/assets/img/vk_map.svg" alt=""></a>
							<?php endif; ?>
							<?php if (get_field('max_link', 'option')): ?>
								<a href="<?php the_field('max_link', 'option') ?>" class="socials_link"><img src="<?php bloginfo('template_url') ?>/assets/img/max_map.svg" alt=""></a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="map_inner">
					<script async
						src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A293ef0d12dff9ee1fc34f4d334ac805b4a9289ad72c69c4738a8cb68ce61a50a&amp;lang=ru_RU&amp;scroll=true">
						</script>
				</div>
			</div>
		</section>


	</div>

</main>

<?php get_footer(); ?>