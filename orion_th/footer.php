<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package orion_theme
 */

?>

<footer>
	<div class="map">
		<div class="map_info_box">
			<div class="map_info_box_container">
				<div class="map_info_content_box">
					<div class="map_info_title main_title">
						Как нас найти
					</div>
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
			</div>
		</div>
		<div class="map_inner">
			<script async
				src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A293ef0d12dff9ee1fc34f4d334ac805b4a9289ad72c69c4738a8cb68ce61a50a&amp;lang=ru_RU&amp;scroll=true">
				</script>
		</div>
	</div>
	<div class="menu_row">
		<div class="container">
			<div class="row_content">
				<div class="row_logo">
					<?php if (get_field('logotipe', 'option')): ?>
						<a class="" href="<?php bloginfo('home'); ?>">
							<img src="<?php the_field('logotipe', 'option'); ?>" alt="">
						</a>
					<?php endif; ?>
				</div>
				<div class="row_menu">

					<?php
					wp_nav_menu([
						'theme_location' => 'footer_menu',
						'container' => 'nav',
						'container_class' => 'nav_menu',
						'menu_class' => 'main-menu',
					]);
					?>
					<a href="#" data-fancybox data-src="#popup_box" class="footer_btn top_btn">Получить консультацию</a>
				</div>
			</div>
		</div>
	</div>
</footer>
<div id="popup_box" class="popup_box">
	<div class="popup_title">Оставить заявку</div>
	<p class="popup_text">Оставьте свои контакты и наш специалист перезвонит вам в ближайшее время.</p>

	<form method="POST">
		<input type="text" id="name" name="user_name" placeholder="Имя (опционально)" required>
		<input type="tel" id="tel" name="tel" placeholder="Телефон" required>
		<button type="submit">Отправить</button>
	</form>

</div>
<?php if (get_field('city_number', 'option') && get_field('mobile_number', 'option')): ?>
	<div id="popup_phone" class="popup_phone">
		<?php if (get_field('city_number', 'option')): ?>
			<div class="top_row_contacts_tel_1">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect width="24" height="24" rx="10" fill="#308D41" />
					<path
						d="M18.4712 14.7814C18.8098 15.121 19 15.5809 19 16.0604C19 16.54 18.8098 16.9999 18.4712 17.3395L17.9395 17.9524C13.1538 22.5338 1.50797 10.8918 6.01904 6.09122L6.69102 5.50693C7.03097 5.17779 7.48684 4.9957 7.96002 5.00008C8.4332 5.00445 8.88563 5.19493 9.21944 5.5303C9.23755 5.54842 10.3203 6.95481 10.3203 6.95481C10.6416 7.29231 10.8205 7.74064 10.8197 8.2066C10.8189 8.67256 10.6386 9.1203 10.3162 9.45675L9.63957 10.3075C10.014 11.2173 10.5646 12.0441 11.2596 12.7405C11.9547 13.4369 12.7805 13.9891 13.6896 14.3654L14.5456 13.6847C14.8822 13.3626 15.3299 13.1825 15.7957 13.1818C16.2616 13.1812 16.7098 13.36 17.0472 13.6812C17.0472 13.6812 18.4531 14.7633 18.4712 14.7814ZM17.6672 15.631C17.6672 15.631 16.2689 14.5553 16.2507 14.5372C16.1304 14.4178 15.9677 14.3509 15.7982 14.3509C15.6286 14.3509 15.466 14.4178 15.3456 14.5372C15.3298 14.5535 14.1512 15.4925 14.1512 15.4925C14.0718 15.5557 13.9773 15.5972 13.877 15.6127C13.7767 15.6283 13.674 15.6175 13.5792 15.5813C12.4014 15.1428 11.3317 14.4564 10.4424 13.5685C9.55305 12.6805 8.86498 11.6119 8.42474 10.4349C8.38571 10.3387 8.37298 10.2339 8.38787 10.1312C8.40276 10.0285 8.44473 9.93166 8.50947 9.85057C8.50947 9.85057 9.4485 8.67146 9.46427 8.65627C9.58363 8.5359 9.65061 8.37325 9.65061 8.20374C9.65061 8.03422 9.58363 7.87157 9.46427 7.7512C9.44616 7.73367 8.3704 6.33429 8.3704 6.33429C8.24821 6.22474 8.08875 6.16607 7.9247 6.17031C7.76064 6.17454 7.60442 6.24137 7.48805 6.35708L6.81607 6.94137C3.51925 10.9052 13.6113 20.4368 17.0852 17.1542L17.6175 16.5407C17.7422 16.4252 17.8172 16.2657 17.8264 16.0959C17.8357 15.9261 17.7786 15.7594 17.6672 15.631Z"
						fill="white" />
				</svg>
				<a href="tel:<?php echo str_replace([' ', '-', '(', ')'], '', get_field('city_number', 'option')); ?>"
					class="contacts_tel">
					<?php the_field('city_number', 'option') ?>
				</a>
			</div>
		<?php endif; ?>
		<?php if (get_field('mobile_number', 'option')): ?>
			<div class="top_row_contacts_tel_2">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect width="24" height="24" rx="10" fill="#308D41" />
					<path
						d="M14.7396 17.9359V19.3057H9.26038V17.9359H14.7396ZM16.1094 16.566V7.43396C16.1094 6.67743 15.4962 6.06415 14.7396 6.06415H9.26038C8.50385 6.06415 7.89056 6.67743 7.89056 7.43396V16.566C7.89056 17.3226 8.50385 17.9359 9.26038 17.9359V19.3057C7.74732 19.3057 6.52075 18.0791 6.52075 16.566V7.43396C6.52075 5.92091 7.74732 4.69434 9.26038 4.69434H14.7396C16.2527 4.69434 17.4792 5.92091 17.4792 7.43396V16.566C17.4792 18.0791 16.2527 19.3057 14.7396 19.3057V17.9359C15.4962 17.9359 16.1094 17.3226 16.1094 16.566Z"
						fill="white" />
					<path
						d="M13 16.3791C13 16.9314 12.5523 17.3791 12 17.3791C11.4477 17.3791 11 16.9314 11 16.3791C11 15.8268 11.4477 15.3791 12 15.3791C12.5523 15.3791 13 15.8268 13 16.3791Z"
						fill="white" />
				</svg>
				<a href="tel:<?php echo str_replace([' ', '-', '(', ')'], '', get_field('mobile_number', 'option')); ?>"
					class="contacts_tel">
					<?php the_field('mobile_number', 'option') ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>

</div>
<?php wp_footer(); ?>

</body>

</html>