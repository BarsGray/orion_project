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
					<?php if (get_field('adres_1', FRONT_PAGE)): ?>
						<div class="top_row_adress_1"><p class="top_row_text"><?php the_field('adres_1', FRONT_PAGE) ?></p></div>
					<?php endif; ?>
					<?php if (get_field('adres_2', FRONT_PAGE)): ?>
						<div class="top_row_adress_2"><p class="top_row_text"><?php the_field('adres_2', FRONT_PAGE) ?></p></div>
					<?php endif; ?>
				</div>
				<div class="top_row_contacts">
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
		<div class="menu_row">
			<div class="container">
				<div class="row_logo">
					<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url') ?>/assets/img/logo.svg" alt="Логотип"></a>
				</div>
				<div class="row_menu">

					<?php wp_nav_menu('menu=top_menu&container=nav&container_class=nav_menu&menu_class=main-menu');?>

					<a href="#" data-fancybox data-src="#popup_box" class="header_btn top_btn">Получить консультацию</a>
					<div class="mobile_menu_info">
						<?php if (get_field('number_1', FRONT_PAGE)): ?>
							<div class="top_rowmobile_menu_info_contacts_tel_2">
								<a href="tel:<?php merge_numbers(get_field('number_1', FRONT_PAGE)); ?>" class="contacts_tel">
									<?php the_field('number_1', FRONT_PAGE) ?>
								</a>
							</div>
						<?php endif; ?>
						<?php if (get_field('number_2', FRONT_PAGE)): ?>
							<div class="top_rowmobile_menu_info_contacts_tel_1">
								<a href="tel:<?php merge_numbers(get_field('number_2', FRONT_PAGE)); ?>" class="contacts_tel">
									<?php the_field('number_2', FRONT_PAGE) ?>
								</a>
							</div>
						<?php endif; ?>
						<?php if (get_field('adres_1', FRONT_PAGE)): ?>
							<div class="mobile_menu_info_adress_1">
								<div class="top_rowmobile_menu_info_text"><?php the_field('adres_1', FRONT_PAGE) ?></div>
							</div>
						<?php endif; ?>
						<?php if (get_field('adres_2', FRONT_PAGE)): ?>
							<div class="top_rowmobile_menu_info_adress_2">
								<div class="top_rowmobile_menu_info_text"><?php the_field('adres_2', FRONT_PAGE) ?></div>
							</div>
						<?php endif; ?>
						<div class="contacts_socials">
							<?php if (get_field('vk_link', FRONT_PAGE)): ?>
								<a href="/" class="contacts_socials_link"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/mobile_vk.svg" alt=""></a>
							<?php endif; ?>
							<?php if (get_field('max_link', FRONT_PAGE)): ?>
								<a href="/" class="contacts_socials_link"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/mobile_max.svg" alt=""></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="mobile_box_btns">
					<?php if (get_field('number_1', FRONT_PAGE)): ?>
						<a href="tel:<?php merge_numbers(get_field('number_1', FRONT_PAGE)); ?>" class="phone_mobile_btn"></a>
					<?php endif; ?>
					<a class="burger_menu_btn"></a>
				</div>
			</div>
		</div>
	</header>