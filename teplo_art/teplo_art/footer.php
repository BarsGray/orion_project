	<footer>
		<div class="wr">
			<div class="data">
				<a class="logo" href="/"><img src="<?php echo THEME; ?>/img/logo.png" alt="ТЕПЛО-АРТ"></a>
				<div class="info">
					<p>Сайт не является публичной офертой. Цены представлены для ознакомления.</p>
					<p><a href="<?php echo get_page_link(668); ?>">Пользовательское соглашение</a></p>
					<?php echo the_privacy_policy_link(); ?>
					<p><a class="cop" href="https://vzh.ru/?from=<?php echo $_SERVER['HTTP_HOST']; ?>" target="_blank">Создание сайта</a> -  веб-студия "Аспект"</p>
				</div>
			</div>
		</div>
	</footer>
	
	<?php
	if(!isset($_COOKIE['gdpr_site']))
		echo '<div class="gdpr"><p>Продолжая использовать этот сайт, вы даете согласие на обработку файлов cookie. Если вы не хотите, чтобы ваши данные обрабатывались, измените соответствующие настройки своего браузера или покиньте сайт.</p><a href="#">Хорошо</a></div>';
	?>
	
	<!--modal_form-->
	<div class="modal_form" id="feedback">
		<p class="h3">Заказать звонок</p>
		<?php echo do_shortcode('[contact-form-7 id="e69a164" title="Заказать звонок"]');?>
	</div>
<?php wp_footer();?>
	<!-- Yandex.Metrika counter -->
	<script>
	   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
	   m[i].l=1*new Date();
	   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
	   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
	   ym(99113079, "init", {
			clickmap:true,
			trackLinks:true,
			accurateTrackBounce:true,
			webvisor:true
	   });
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/99113079" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
</body>
</html>