<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package orion_theme
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="main_wrapper">

		<section class="services">
			<div class="container">
				<p class="services_title main_title">Наши услуги</p>
				<div class="services_box">
					<div class="services_item">
						<div class="services_img">
							<img class="" src="<?php bloginfo('template_url') ?>/assets/img/granit.svg" alt="">
						</div>
						<p class="services_text">
							Гранитные памятники
						</p>
					</div>
					<div class="services_item">
						<div class="services_img">
							<img class="" src="<?php bloginfo('template_url') ?>/assets/img/mramor.svg" alt="">
						</div>
						<p class="services_text">
							Мраморные памятники
						</p>
					</div>
					<div class="services_item">
						<div class="services_img">
							<img class="" src="<?php bloginfo('template_url') ?>/assets/img/kombi.svg" alt="">
						</div>
						<p class="services_text">
							Комбинированные памятники
						</p>
					</div>
					<div class="services_item">
						<div class="services_img">
							<img class="" src="<?php bloginfo('template_url') ?>/assets/img/memorial.svg" alt="">
						</div>
						<p class="services_text">
							Мемориальные комплексы
						</p>
					</div>
					<div class="services_item">
						<div class="services_img">
							<img class="" src="<?php bloginfo('template_url') ?>/assets/img/blago.svg" alt="">
						</div>
						<p class="services_text">
							Благоустройство захоронения
						</p>
					</div>
					<div class="services_item">
						<div class="services_img">
							<img class="" src="<?php bloginfo('template_url') ?>/assets/img/gravi.svg" alt="">
						</div>
						<p class="services_text">
							Художественная гравировка
						</p>
					</div>
				</div>
				<a href="#" class="services_main_btn main_btn">Узнать больше</a>
			</div>
		</section>

		<section class="catalog">
			<div class="catalog_wrapper">
				<div class="container">
					<p class="catalog_title main_title">
						Каталог
					</p>
					<div class="catalog_tubs_box">
						<button class="catalog_tubs_btn catalog_tubs_btn_prev">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M15.2 4.80005L8.70706 11.2929C8.31653 11.6835 8.31653 12.3166 8.70706 12.7072L15.2 19.2"
									stroke="#C37437" stroke-width="2" />
							</svg>
						</button>




						<!-- ++++++++++++++++++++++++++++ ajax product on home ++++++++++++++++++++++++++++++++++++++++++++ -->

						<ul class="catalog_tubs_row">
							<?php
							$terms = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => true]);
							foreach ($terms as $term):
								?>
								<li class="catalog_tub_item">
									<a href="#" class="cat-tab" data-slug="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
								</li>
							<?php endforeach; ?>
						</ul>

						<button class="catalog_tubs_btn catalog_tubs_btn_next">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M9 5L15.4929 11.4929C15.8834 11.8834 15.8834 12.5166 15.4929 12.9071L9 19.4" stroke="#C37437"
									stroke-width="2" />
								<path d="M8.80127 4.80005L15.2942 11.2929C15.6847 11.6835 15.6847 12.3166 15.2942 12.7072L8.80127 19.2"
									stroke="#C37437" stroke-width="2" />
							</svg>
						</button>
					</div>
					<div id="ajax-products-container" class="catalog_box"></div>

					<!-- ++++++++++++++++++++++++++++ ajax product on home ++++++++++++++++++++++++++++++++++++++++++++ -->



				</div>
				<a href="#" class="main_btn catalog_main_btn">Смотреть весь каталог</a>
			</div>
		</section>

		<?php if (have_rows('slides', 'option')): ?>
			<section class="carusel">
				<div class="container carusel_container_top">
					<p class="main_title carusel_title"><?php the_field('title_slider', 'option'); ?></p>
					<div class="carusel__arrow carusel__prev">
						<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M23 6L11.7071 17.2929C11.3166 17.6834 11.3166 18.3166 11.7071 18.7071L23 30" stroke="#C37437"
								stroke-width="3" />
						</svg>
					</div>
					<div class="carusel__arrow carusel__next">
						<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M13 6L24.2929 17.2929C24.6834 17.6834 24.6834 18.3166 24.2929 18.7071L13 30" stroke="#C37437"
								stroke-width="3" />
						</svg>
					</div>
				</div>
				<div class="carusel__slider_main_wrapper">
					<div class="container">
						<div class="swiper carusel__slider-wrapper">
							<div class="swiper-wrapper carusel__slider">


								<?php while (have_rows('slides', 'option')):
									the_row();
									?>
									<div class="swiper-slide carusel__slide">
										<img data-fancybox="gallery" src="<?php the_sub_field('foto'); ?>"
											alt="<?php the_sub_field('description'); ?>">
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
					<p class="map_info_title main_title">
						Как нас найти
					</p>
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
									<a class="map_info_list_link"
										href="tel:<?php echo str_replace([' ', '-', '(', ')'], '', get_field('city_number', 'option')); ?>">
										<?php the_field('city_number', 'option') ?>
									</a>
								</p>
							</li>
						<?php endif; ?>
						<?php if (get_field('mobile_number', 'option')): ?>
							<li class="map_info_list_item map_info_list_item_mobile_number">
								<p class="map_info_list_item_inner">
									<a class="map_info_list_link"
										href="tel:<?php echo str_replace([' ', '-', '(', ')'], '', get_field('mobile_number', 'option')); ?>">
										<?php the_field('mobile_number', 'option') ?>
									</a>
								</p>
							</li>
						<?php endif; ?>
						<?php if (get_field('email', 'option')): ?>
							<li class="map_info_list_item map_info_list_item_mail">
								<p class="map_info_list_item_inner">
									<a class="map_info_list_link" href="mailto:9507620621@mail.ru">
										<?php the_field('email', 'option') ?>
									</a>
								</p>
							</li>
						<?php endif; ?>
					</ul>
					<?php if (get_field('vk_link', 'option') || get_field('max_link', 'option')): ?>
						<div class="map_socials">
							<?php if (get_field('vk_link', 'option')): ?>
								<a href="<?php the_field('vk_link', 'option') ?>" class="socials_link">
									<img src="<?php bloginfo('template_url') ?>/assets/img/vk_map.svg" alt="">
								</a>
							<?php endif; ?>
							<?php if (get_field('max_link', 'option')): ?>
								<a href="<?php the_field('max_link', 'option') ?>" class="socials_link">
									<img src="<?php bloginfo('template_url') ?>/assets/img/max_map.svg" alt="">
								</a>
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

</main><!-- #main -->

<?php
get_footer();
