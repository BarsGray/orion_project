<footer>
	<div class="menu_row">
		<div class="container">
			<div class="row_content">
				<div class="row_logo">
					<?php if (get_field('logotipe', 'option')): ?>
						<a class="" href="<?php bloginfo('home'); ?>"><img src="<?php the_field('logotipe', 'option'); ?>" alt=""></a>
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

</div>
<?php wp_footer(); ?>

</body>

</html>