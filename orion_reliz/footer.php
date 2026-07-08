<footer>
	<div class="container">
		<div class="row_logo">
			<a class="" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url') ?>/img/logo.svg" alt=""></a>
		</div>
		<div class="row_menu">
			<?php wp_nav_menu('menu=top_menu&container=nav&container_class=nav_menu&menu_class=main-menu');?>
			<a href="#" data-fancybox data-src="#popup_box" class="footer_btn top_btn">Получить консультацию</a>
		</div>
	</div>
	<div class="container">
		<div class="polit">
			<?php echo the_privacy_policy_link(); ?>
			<p><a href="<?php echo get_page_link(3880); ?>">Политика использования файлов cookie</a></p>
			<p><a href="<?php echo get_page_link(3882); ?>">Согласие на обработку персональных данных</a></p>
		</div>
	</div>
</footer>

<?php
	if(!isset($_COOKIE['gdpr_site']))
		echo '<div class="gdpr"><p>Продолжая использовать наш веб-сайт, вы соглашаетесь на использование файлов cookie в соответствии с нашей <a href="'.get_privacy_policy_url().'" target="_blank">политикой конфиденциальности</a>.</p><a href="#">Хорошо</a></div>';
?>

<div id="popup_box" class="popup_box">
	<div class="top_box">
		<p class="popup_title">Оставить заявку</p>
		<p class="popup_text">Оставьте свои контакты и наш специалист перезвонит вам в ближайшее время.</p>
	</div>
	<?php echo do_shortcode('[contact-form-7 id="5e383e4" title="Contact form"]'); ?>
</div>
<?php if (get_field('max_link', FRONT_PAGE)): ?>
	<div class="callback_bt">
		<a class="text-call" rel="nofollow" target="_blank" href="<?php the_field('max_link', FRONT_PAGE) ?>"></a>
	</div>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>