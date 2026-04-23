<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google-site-verification" content="IkT5psb_v6tMDYNahboFb0jKqHSRGUq9MB5P5d_Rf3Q" />
	<meta name="yandex-verification" content="82b5d46a01b297bd" />
	<link rel="icon" href="<?php echo THEME; ?>/img/favicon.png" type="image/png">
	<link rel="shortcut icon" href="<?php echo THEME; ?>/img/favicon.png" type="image/png">
	<title><?php echo wp_get_document_title();?></title>
	<?php wp_head();?>
</head>
<body>
	<div class="over"></div>
	<div class="mobile_menu">
		<span></span>
		<div class="close"></div>
		<?php wp_nav_menu('menu=top_menu&container=false&menu_class=menu_comp');?>
		<div class="info">
			<div class="item">
				<p>Адрес:</p>
				<p><?php the_field('adres', MAIN_PAGE);?></p>
			</div>
			<div class="item">
				<p>Телефон Воронеж:</p>
				<p><a href="tel:<?php echo clear_tel(get_field('tel', MAIN_PAGE));?>"><?php the_field('tel', MAIN_PAGE);?></a></p>
			</div>
			<div class="item">
				<p>E-mail:</p>
				<p><a href="mailto:<?php the_field('mail', MAIN_PAGE);?>"><?php the_field('mail', MAIN_PAGE);?></a></p>
			</div>
		</div>
	</div>
	<header>
		<div class="wr">
			<div class="data">
				<div class="left">
					<a class="logo" href="/"><img src="<?php echo THEME; ?>/img/logo.png" alt="ТЕПЛО-АРТ"><span>поставщик<br>строительных<br>материалов<br>от производителя</span></a>
					<a class="catalog_link" href="<?php echo get_page_link(18);?>">Каталог</a>
					<nav class="menu"><?php wp_nav_menu('menu=top_menu&container=false&menu_class=menu_comp');?></nav>
				</div>
				<div class="contact">
					<div class="block">
						<a class="tel" href="tel:<?php echo clear_tel(get_field('tel', MAIN_PAGE));?>"><span>Воронеж - </span><?php the_field('tel', MAIN_PAGE);?></a>
						<a class="tel" href="tel:<?php echo clear_tel(get_field('tel_2', MAIN_PAGE));?>"><span>Липецк - </span><?php the_field('tel_2', MAIN_PAGE);?></a>
						<a class="feedback" href="#feedback" data-fancybox>заказать звонок</a>
					</div>
					<a class="tg" href="https://wa.me/<?php the_field('whats', MAIN_PAGE);?>" rel="nofollow" target="_blank"></a>
					<div class="search_block">
						<form class="search_form" action="/">
							<input type="text" placeholder="Поиск по каталогу" name="s" />
							<input type="submit" value="Найти" />
						</form>
						<a class="search" href="#"></a>
					</div>
					<a class="mob_icon_menu" href="#"><span></span><span></span><span></span></a>
				</div>
			</div>
		</div>
	</header>