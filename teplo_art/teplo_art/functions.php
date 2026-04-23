<?php
	add_shortcode('contact','contact_post');
	function contact_post(){
		ob_start();
		?>
		<div class="contact_block">
			<div class="left">
				<p><?php the_field('adres', MAIN_PAGE);?></p>
				<p class="mail"><a href="mailto:<?php the_field('mail', MAIN_PAGE);?>"><?php the_field('mail', MAIN_PAGE);?></a></p>
				<p class="tel"><a href="tel:<?php echo clear_tel(get_field('tel', MAIN_PAGE));?>"><span>Воронеж - </span> <?php the_field('tel', MAIN_PAGE);?></a></p>
				<p class="tel"><a href="tel:<?php echo clear_tel(get_field('tel_2', MAIN_PAGE));?>"><span>Липецк - </span><?php the_field('tel_2', MAIN_PAGE);?></a></p>
				<div class="block">
					<a class="tg" href="https://t.me/<?php the_field('tg', MAIN_PAGE);?>" rel="nofollow" target="_blank"></a>
					<a class="feedback" href="#feedback" data-fancybox>Заказать звонок</a>
				</div>
			</div>
			<div class="right"><?php echo get_field('map', MAIN_PAGE);?></div>
		</div>
		<?php
		$buffer=ob_get_contents();
		ob_end_clean();
		return $buffer;
	}

	function view_cat_products($tx_terms){
		if(!empty($tx_terms)){
			foreach($tx_terms as $tx_term){
				$img_cat=get_field('img_cat',$tx_term);
				$cat_img=$img_cat ? $img_cat['sizes']['img_cat'] : NO_IMG_340x419;
				?>
				<a class="item" href="<?php echo get_term_link($tx_term); ?>">
					<span class="img"><img src="<?php echo $cat_img; ?>" alt="<?php echo $img_cat['alt']; ?>"></span>
					<p class="name"><?php echo $tx_term->name; ?></p>
				</a>
				<?php
			}
		}
	}
	
	function view_products($tx_posts){
		if(!empty($tx_posts)){
			echo '<div class="products">';
				foreach($tx_posts as $tx_post){
					$img_tx_post=has_post_thumbnail($tx_post) ? get_the_post_thumbnail($tx_post,'img_product') : '<img src="'.NO_IMG_340x419.'" alt="">';
					?>
						<a class="item" href="<?php echo get_permalink($tx_post); ?>">
							<span class="img"><?php echo $img_tx_post; ?></span>
							<p class="name"><?php echo get_the_title($tx_post); ?></p>
							<?php
								if(!empty(get_field('price', $tx_post))){
									echo'<span class="price">'.cost_format(get_field('price', $tx_post)).' <span class="rub">₽</span></span>';
								} else {
									echo'<span class="price">Цена: по запросу</span>';
								}
							?>
						</a>
					<?php
				}
			echo '</div>';
		}
	}
	
	function view_services($services){
		if(!empty($services)){
			echo '<div class="servis">';
				foreach($services as $service){
					$img_serv=has_post_thumbnail($service) ? get_the_post_thumbnail_url($service,'img_serv') : NO_IMG_370x370;
					?>
					<a class="item" href="<?php the_permalink($service); ?>">
						<span class="fon" style="background: #4168a3 url(<?php echo $img_serv;?>) center top / auto 100% no-repeat;">
							<span class="name"><?php echo $service->post_title; ?></span>
						</span>
					</a>
					<?php
				}
			echo '</div>';
		}
	}
	
	function view_certificates($certificates){
		if(!empty($certificates)){
			echo '<div class="certificates">';
				foreach($certificates as $cert){
					// $img_serv=has_post_thumbnail($cert) ? get_the_post_thumbnail_url($cert,'img_serv') : NO_IMG_370x370;
					?>
					<a class="item" href="<?php the_permalink($cert); ?>"><?php echo $cert->post_title; ?></a>
					<?php
				}
			echo '</div>';
		}
	}
	
?>