<?php
	get_header();
	the_post();
	$img_src=has_post_thumbnail() ? get_the_post_thumbnail($post, 'img_single_product') : '<img src="'.NO_IMG_370x370.'" alt="">';
	$img_product = get_field('foto_tovar');
?>
	<div id="content">
		<div class="wr text clr">
			<?php bread_crumbs();?>
			<div class="single_product">
				<div class="left">
					<?php if (has_post_thumbnail()){?>
						<div class="slider_for slider">
							<a class="item" href="<?php the_post_thumbnail_url( 'full' );?>" data-fancybox="img_tovar"><?php echo $img_src; ?></a>
							<?php if( $img_product ){ ?>
								<?php foreach( $img_product as $image ){ ?>
									<a class="item" href="<?php echo $image['url']; ?>" data-fancybox="img_tovar">
										<img src="<?php echo $image['sizes']['img_single_product']; ?>" alt="<?php echo $image['alt'];?>">
									</a>
								<?php } ?>
							<?php } ?>
						</div>
						<?php if( $img_product ){ ?>
							<div class="slider_nav slider">
								<?php the_post_thumbnail('thumbnail') ?>
								<?php foreach( $img_product as $image ): ?>
									<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt'];?>"/>
								<?php endforeach; ?>
							</div>
						<?php } ?>
					<?php } else { ?>
						<?php echo $img_src; ?>
					<?php } ?>
				</div>
				<div class="right">
					<?php
						post_title();
						if(!empty(get_field('price'))){
							echo'<p class="price">Цена: '.cost_format(get_field('price')).' <span class="rub">₽</span></p>';
						} else {
							echo'<p class="price">Цена: по запросу</p>';
						}
						if(!empty(get_field('characteristics'))){
							echo'<div class="characteristics">';
								echo'<p class="title h1">Характеристики</p>';
								echo'<div class="text">'. get_field('characteristics') .'</div>';
							echo'</div>';
						}
					?>
					<a class="feedback" href="#feedback" data-fancybox >Оставить заявку</a>
				</div>
				<?php if(!empty(get_the_content())){ ?>
					<div class="bottom">
						<p class="title h1">Описание</p>
						<div class="text"><?php the_content();?></div>
					</div>
				<?php } ?>
			</div>
			
			<?php
				$post_cat=get_the_terms($post,'catalog');
				$related_prod=get_posts(array(
					'tax_query' => array(array(
						'taxonomy' => 'catalog',
						'field' => 'id',
						'terms' => $post_cat[0]->term_id
					)),
					'post_type' => 'product',
					'numberposts' => 15,
					'orderby' => 'rand',
					'exclude' => $post->ID
				));
				if(!empty($related_prod)){
					echo '<div class="sec_3"><p class="h1">Похожие товары</p>';
						view_products($related_prod,true);
						echo '<div class="wr_slider">';
							echo '<a class="more" href="'. get_page_link(18). '">Смотреть каталог продукции</a>';
							echo '<div>';
								echo '<div class="arrows"><span class="slick-prev"></span><span class="slick-next"></span></div>';
								echo '<div class="slider_num"></div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			?>
			
		</div>
	</div>
	
	<!--modal_form-->
	<div class="modal_form" id="feedback" >
		<p class="h3">Оформить заказ</p>
		<?php echo do_shortcode('[contact-form-7 id="e69a164" title="Заказать звонок"]');?>
	</div>
<?php get_footer();?>