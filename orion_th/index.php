<?php /* Template Name: Главная */ get_header(); ?>

		<section class="bunner">
			<div class="container">
				<div class="bottom_row_content">
					<p class="bottom_row_content_title main_title">Изготовление памятников любой сложности</p>
					<p class="bottom_row_content_text">Мемориальные комплексы, художественная гравировка, благоустройство захоронений. Более 15 лет опыта в Воронеже и области.</p>
					<a href="#" class="bottom_row_content_link main_btn">Выбрать памятник</a>
					<div class="header_advantages_row">
						<div class="header_advantages_item">
							<img src="<?php bloginfo('template_url') ?>/assets/img/shield.svg" alt="">
							<p class="header_advantages_item_text"><span>Гарантия</span>на памятник и установку</p>
						</div>
						<div class="header_advantages_item">
							<img src="<?php bloginfo('template_url') ?>/assets/img/coins.svg" alt="">
							<p class="header_advantages_item_text"><span>Рассрочка</span>на выгодных условиях</p>
						</div>
						<div class="header_advantages_item">
							<img src="<?php bloginfo('template_url') ?>/assets/img/money.svg" alt="">
							<p class="header_advantages_item_text"><span>Подбор</span>под ваш бюджет</p>
						</div>
					</div>
				</div>
			</div>
		</section>
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
			<div class="container">
				<p class="catalog_title main_title">Каталог</p>
					<div class="catalog_tubs_box">
						<?php show_category_prod(); ?>
					</div>
					<?php show_products($args = ['post_type' => 'or_product', 'posts_per_page' => -1]); ?>
				<a href="<?php echo get_post_type_archive_link('post'); ?>" class="main_btn catalog_main_btn">Смотреть весь каталог</a>
			</div>
		</section>
		
		<?php if (get_field('gallery_works', 45)): ?>
			<section class="carusel">
				<div class="container carusel_container_top">
					<p class="main_title carusel_title">Более 5000 памятников и мемориальных комплексов</p>
					<div class="carusel__arrow carusel__prev"></div>
					<div class="carusel__arrow carusel__next"></div>
				</div>
				<div class="carusel__slider_main_wrapper">
					<div class="swiper carusel__slider-wrapper">
						<div class="swiper-wrapper carusel__slider">

							<?php $gallery_works_count = 0; ?>
							<?php foreach(get_field('gallery_works', 45) as $item): ?>
								<?php if ($gallery_works_count > 9) break; ?>
								<div class="swiper-slide carusel__slide">
									<a data-fancybox="gallery" href="<?php echo $item['url']; ?>"><img src="<?php echo $item['url']; ?>" alt="<?php echo $item['alt']; ?>"></a>
								</div>
								<?php $gallery_works_count++; ?>
							<?php endforeach; ?>

						</div>
					</div>
				</div>
				<div class="swiper-pagination carusel__pagination"></div>
			</section>
		<?php  endif; ?>

<?php
show_map();
get_footer();
?>