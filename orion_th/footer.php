<footer>
	<div class="container">
		<div class="row_logo">
			<a class="" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url') ?>/assets/img/logo.svg" alt=""></a>
		</div>
		<div class="row_menu">

			<?php wp_nav_menu('menu=top_menu&container=nav&container_class=nav_menu&menu_class=main-menu');?>

			<a href="#" data-fancybox data-src="#popup_box" class="footer_btn top_btn">Получить консультацию</a>
		</div>
	</div>
</footer>

<div id="popup_box" class="popup_box">
	<div class="top_box">
		<p class="popup_title">Оставить заявку</p>
		<p class="popup_text">Оставьте свои контакты и наш специалист перезвонит вам в ближайшее время.</p>
	</div>
	<form method="POST">
		<input type="text" id="name" name="user_name" placeholder="Имя (опционально)" required>
		<input type="tel" id="tel" name="tel" placeholder="Телефон" required>
		<button type="submit">Отправить</button>
	</form>

</div>

<?php wp_footer(); ?>

</body>

</html>