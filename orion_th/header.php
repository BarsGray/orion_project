<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php bloginfo('name'); ?></title>

	<link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/assets/img/sizesmall.svg" type="image/x-icon">

	<?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>
	<div class="wrapper">

		<header>
			<div class="overlay"></div>
			<div class="header_wrapper">
				<div class="top_row">
					<div class="container">
						<div class="top_row_content">
							<div class="top_row_place">
								<?php if (get_field('adres_1', 'option')): ?>
									<div class="top_row_adress_1"><p class="top_row_text"><?php the_field('adres_1', 'option') ?></p></div>
								<?php endif; ?>
								<?php if (get_field('adres_2', 'option')): ?>
									<div class="top_row_adress_2"><p class="top_row_text"><?php the_field('adres_2', 'option') ?></p></div>
								<?php endif; ?>
							</div>
							<div class="top_row_contacts">
								<?php if (get_field('city_number', 'option')): ?>
									<div class="top_row_contacts_tel_1">
										<a href="tel:<?php echo str_replace([' ', '-', '(', ')'], '', get_field('city_number', 'option')); ?>" class="contacts_tel"><?php the_field('city_number', 'option') ?></a>
									</div>
								<?php endif; ?>
								<?php if (get_field('mobile_number', 'option')): ?>
									<div class="top_row_contacts_tel_2">
										<a href="tel:<?php echo str_replace([' ', '-', '(', ')'], '', get_field('mobile_number', 'option')); ?>" class="contacts_tel"><?php the_field('mobile_number', 'option') ?></a>
									</div>
								<?php endif; ?>
								<?php if (get_field('vk_link', 'option') || get_field('max_link', 'option')): ?>
									<div class="contacts_socials">
										<?php if (get_field('vk_link', 'option')): ?>
											<a href="<?php the_field('vk_link', 'option') ?>" class="contacts_socials_link"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/frame4382vk.svg" alt=""></a>
										<?php endif; ?>
										<?php if (get_field('max_link', 'option')): ?>
											<a href="<?php the_field('max_link', 'option') ?>" class="contacts_socials_link"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/logo_MAX2.svg" alt=""></a>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="menu_row">
					<div class="container">
						<div class="row_content">
							<div class="row_logo">
								<?php if (get_field('logotipe', 'option')): ?>
									<a href="<?php bloginfo('home'); ?>"><img src="<?php the_field('logotipe', 'option'); ?>" alt=""></a>
								<?php endif; ?>
							</div>
							<div class="row_menu">
								<?php
								wp_nav_menu([
									'theme_location' => 'header_menu',
									'container' => 'nav',
									'container_class' => 'nav_menu',
									'menu_class' => 'main-menu',
								]);
								?>
								<a href="#" data-fancybox data-src="#popup_box" class="header_btn top_btn">Получить консультацию</a>
								<div class="mobile_menu_info">
									<?php if (get_field('mobile_number', 'option')): ?>
										<div class="top_rowmobile_menu_info_contacts_tel_2">
											<a href="tel:<?php echo str_replace([' ', '-', '(', ')'], '', get_field('mobile_number', 'option')); ?>" class="contacts_tel">
												<?php the_field('mobile_number', 'option') ?>
											</a>
										</div>
									<?php endif; ?>
									<?php if (get_field('city_number', 'option')): ?>
										<div class="top_rowmobile_menu_info_contacts_tel_1">
											<a href="tel:<?php echo str_replace([' ', '-', '(', ')'], '', get_field('city_number', 'option')); ?>" class="contacts_tel">
												<?php the_field('city_number', 'option') ?>
											</a>
										</div>
									<?php endif; ?>
									<?php if (get_field('adres_1', 'option')): ?>
										<div class="mobile_menu_info_adress_1">
											<div class="top_rowmobile_menu_info_text"><?php the_field('adres_1', 'option') ?></div>
										</div>
									<?php endif; ?>
									<?php if (get_field('adres_2', 'option')): ?>
										<div class="top_rowmobile_menu_info_adress_2">
											<div class="top_rowmobile_menu_info_text"><?php the_field('adres_2', 'option') ?></div>
										</div>
									<?php endif; ?>
									<div class="contacts_socials">
										<?php if (get_field('vk_link', 'option')): ?>
											<a href="/" class="contacts_socials_link"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/mobile_vk.svg" alt=""></a>
										<?php endif; ?>
										<?php if (get_field('max_link', 'option')): ?>
											<a href="/" class="contacts_socials_link"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/mobile_max.svg" alt=""></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="mobile_box_btns">
								<?php if (get_field('mobile_number', 'option')): ?>
									<a href="tel:<?php echo str_replace([' ', '-', '(', ')'], '', get_field('mobile_number', 'option')); ?>" class="phone_mobile_btn"></a>
								<?php endif; ?>
								<a class="burger_menu_btn"></a>
							</div>
						</div>
					</div>
				</div>
				<div class="bottom_row">
					<div class="bottom_row_content_box">
						<div class="container">
							<div class="bottom_row_content">
								<p class="bottom_row_content_title main_title"><?php the_field('zagolovok_na_glavnoy', 'options'); ?></p>
								<p class="bottom_row_content_text"><?php the_field('description_on_glavnoy', 'options'); ?></p>
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
					</div>
				</div>
			</div>
		</header>