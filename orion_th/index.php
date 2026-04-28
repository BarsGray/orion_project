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
					<button class="catalog_tubs_btn catalog_tubs_btn_prev"></button>
					<ul class="catalog_tubs_row">
						<li class="catalog_tub_item catalog_tub_item_mix active" data-filter="all"><a href="#">Все</a></li>
						<?php $categories = get_categories(['hide_empty' => true]);
						foreach ($categories as $category): ?>
							<li class="catalog_tub_item catalog_tub_item_mix" data-filter=".cat-<?php echo $category->slug; ?>">
								<a href="#"><?php echo esc_html($category->name); ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
					<button class="catalog_tubs_btn catalog_tubs_btn_next"></button>
				</div>
				<div class="catalog_box catalog_box_mix">
					<?php
					$query = new WP_Query([
						'post_type' => 'post',
						'posts_per_page' => -1
					]);
					while ($query->have_posts()):
						$query->the_post();
						$cats = get_the_category();
						$classes = '';
						foreach ($cats as $cat) {
							$classes .= ' cat-' . $cat->slug;
						}
						?>
						<div class="catalog_item mix<?php echo $classes; ?>">
							<a href="<?php the_permalink(); ?>">
								<span class="catalog_item_img"><?php the_post_thumbnail('medium'); ?></span>
								<span class="catalog_item_name"><?php the_title(); ?></span>
							</a>
							<a href="<?php the_permalink(); ?>" class="catalog_item_btn">Заказать</a>
						</div>
					<?php endwhile;
					wp_reset_postdata(); ?>
				</div>
				<a href="<?php echo get_post_type_archive_link('post'); ?>" class="main_btn catalog_main_btn">Смотреть весь каталог</a>
			</div>
		</section>
		
		<?php if (get_field('foto')): ?>
			<section class="carusel">
				<div class="container carusel_container_top">
					<p class="main_title carusel_title">Изготовление памятников любой сложности</p>
					<div class="carusel__arrow carusel__prev"></div>
					<div class="carusel__arrow carusel__next"></div>
				</div>
				<div class="carusel__slider_main_wrapper">
					<div class="swiper carusel__slider-wrapper">
						<div class="swiper-wrapper carusel__slider">
							<?php foreach(get_field('foto') as $item): ?>
								<div class="swiper-slide carusel__slide">
									<a data-fancybox="gallery" href="<?php echo $item['url']; ?>"><img src="<?php echo $item['url']; ?>" alt="<?php echo $item['alt']; ?>"></a>
								</div>
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