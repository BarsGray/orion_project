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



<body>

		<header>
			<div class="overlay"></div>
			<div class="top_row">
				<div class="container">
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
			<div class="menu_row">
				<div class="container">
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
		</header>