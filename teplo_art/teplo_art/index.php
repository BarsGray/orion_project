<?php /* Template Name: Главная */ get_header();?>

	<div class="sec_1">
		<div class="data">
			<?php foreach(get_field('home_slider') as $item){ ?>
				<div class="item" style="background-image:url(<?php echo $item['img']['url']; ?>);">
					<span class="wr_item">
						<span class="data_item">
							<span class="name"><?php echo $item['title']; ?></span>
							<span class="descr"><?php echo $item['descr']; ?></span>
						</span>
					</span>
				</div>
			<?php } ?>
		</div>
		<div class="wr_slider">
			<div>
				<div class="arrows"><span class="slick-prev"></span><span class="slick-next"></span></div>
				<div class="slider_num"></div>
			</div>
		</div>
	</div>
	
	<div class="sec_2">
		<div class="wr">
			<p class="title">Каталог</p>
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
			<div class="wr_slider">
				<a class="more" href="<?php echo get_page_link(18);?>">Смотреть каталог продукции</a>
				<div>
					<div class="arrows"><span class="slick-prev"></span><span class="slick-next"></span></div>
					<div class="slider_num"></div>
				</div>
			</div>
		</div>
	</div>
	
	<?php $catalog_hit = get_field('catalog_hit');?>
	<?php if($catalog_hit){ ?>
		<div class="sec_3">
			<div class="wr">
				<p class="title"><span>Хиты</span> продаж</p>
				<div class="products">
					<?php foreach( $catalog_hit as $hit){ ?>
						<?php $img_s_news=has_post_thumbnail($hit) ? get_the_post_thumbnail($hit,'img_cat') : '<img src="'.NO_IMG_340x419.'" alt="">';?>
						<a class="item" href="<?php echo get_permalink($hit); ?>">
							<span class="img"><?php echo $img_s_news; ?></span>
							<p class="name"><?php echo get_the_title($hit); ?></p>
							<?php
								if(!empty(get_field('price', $hit))){
									echo'<span class="price">'.cost_format(get_field('price', $hit)).' <span class="rub">₽</span></span>';
								} else {
									echo'<span class="price">Цена: по запросу</span>';
								}
							?>
						</a>
					<?php } ?>
				</div>
				<div class="wr_slider">
					<a class="more" href="<?php echo get_page_link(18);?>">Смотреть каталог продукции</a>
					<div>
						<div class="arrows"><span class="slick-prev"></span><span class="slick-next"></span></div>
						<div class="slider_num"></div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	
	<div class="sec_3_1">
		<div class="wr">
			<div class="sale">
				<div class="left">
					<p class="sal">акция</p>
					<p class="text_1">Бесплатная доставка</p>
					<p class="text_2">При заказе <span>от 40 000 ₽</span></p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="sec_4">
		<div class="wr">
			<div class="data">
				<div class="left">
					<p class="title">Дополнительные <span>услуги</span></p>
					<p class="descr">Помимо продажи строительных материалов мы также предлагаем нашим клиентам дополнительные услуги.</p>
					<a class="feedback" href="#feedback" data-fancybox>Получить консультацию</a>
				</div>
				<div class="right">
					<?php
						$services=get_posts(array('post_type' => 'services','numberposts' => 10,));
						view_services($services);
					?>
					<div class="wr_slider">
						<div>
							<div class="arrows"><span class="slick-prev"></span><span class="slick-next"></span></div>
							<div class="slider_num"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="sec_5">
		<div class="wr">
			<div class="data">
				<div class="left">
					<p class="title"><span>Продаем</span> материалы высокого качества от производителя.</p>
					<p class="title"><span>Выполняем</span> строительные работы.</p>
				</div>
				<div class="right">
					<div class="text">
						<p>ТЕПЛО-АРТ - перспективная компания, которая ценит своих клиентов, поэтому предлагает высокий уровень качества продукции. Для своих клиентов мы всегда выбираем лучшие строительные материалы от проверенных производителей.</p>
						<p>При оказании строительных услуг наша компания опирается на профессионализм. Мы ответственно подходим к делу и гарантируем высокое качество выполненных работ.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="sec_6">
		<div class="wr">
			<div class="sec_6_1">
				<div class="title">
					<p class="left">Продукция напрямую от производителя</p>
					<p class="right">Мы поставляем продукцию напрямую от заводов-производителей, что позволяет сделать наиболее привлекательные цены на товары для наших покупателей.</p>
				</div>
				<div class="manufacturers">
					<?php foreach(get_field('manufacturers') as $item){ ?>
						<div><div class="item"><img src="<?php echo $item['img']['url']; ?>" alt="<?php echo $item['img']['alt']; ?>"></div></div>
					<?php } ?>
				</div>
				<div class="wr_slider">
					<a class="more" href="<?php echo get_page_link(18);?>">Смотреть каталог продукции</a>
					<div>
						<div class="arrows"><span class="slick-prev"></span><span class="slick-next"></span></div>
						<div class="slider_num"></div>
					</div>
				</div>
			</div>
			<div class="sec_6_2">
				<p class="title">Продукция напрямую от производителя</p>
				<div class="advantages">
					<?php foreach(get_field('advantages') as $item){ ?>
						<div class="item">
							<p class="name"><?php echo $item['name']; ?></p>
							<p class="descr"><?php echo $item['descr']; ?></p>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="sec_7">
		<div class="wr">
			<p class="title">Статьи</p>
			<div class="blog">
				<?php $news = get_posts(array('cat' => 4, 'numberposts' => 10 )); ?>
				<?php foreach($news as $s_news){ ?>
					<?php $img_s_news=has_post_thumbnail($s_news) ? get_the_post_thumbnail($s_news,'img_gallery') : '<img src="'.NO_IMG_370x370.'" alt="">'; ?>
					<a class="item" href="<?php the_permalink($s_news); ?>">
						<span class="img"><?php echo $img_s_news; ?></span>
						<p class="date"><?php echo get_the_date('d.m.Y',$s_news); ?></p>
						<p class="name"><?php echo exp_text($s_news->post_title,50); ?></p>
					</a>
				<?php } ?>
			</div>
			<div class="wr_slider">
				<a class="more" href="<?php echo get_category_link(4);?>">Перейти в раздел Блог</a>
				<div>
					<div class="arrows"><span class="slick-prev"></span><span class="slick-next"></span></div>
					<div class="slider_num"></div>
				</div>
			</div>
		</div>
	</div>
	
	<?php if(!empty(get_the_content())){ ?>
		<div id="content" class="home_content">
			<div class="wr text">
				<?php the_content(); ?>
			</div>
		</div>
	<?php } ?>
	
	<div class="sec_8">
		<div class="wr">
			<p class="title"><span>Поможем</span> в выборе продукции.</p>
			<p class="title last"><span>Ответим</span> на все вопросы.</p>
			<div class="form">
				<p class="name">Оставьте заявку и мы свяжемся с вами</p>
				<?php echo do_shortcode('[contact-form-7 id="e69a164" title="Заказать звонок"]');?>
			</div>
		</div>
	</div>

<?php get_footer();?>