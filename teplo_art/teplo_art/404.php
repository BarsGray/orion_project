<?php get_header();?>
	<div id="content">
		<div class="wr text">
			<?php bread_crumbs();?>
			<h1>Ошибка 404!</h1>
			<p>Страница не найдена... Вы можете вернуться на <a href="/">главную</a>.</p>
			
			<p class="h2">Каталог</p>
			<div class="catalog">
				<?php
					$tx_terms=get_terms(array(
						'taxonomy' => 'catalog',
						'hide_empty' => false,
						'parent' => 0
					));
					view_cat_products($tx_terms);
				?>
			</div>
		</div>
	</div>
<?php get_footer();?>