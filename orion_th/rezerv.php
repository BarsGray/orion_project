		<section class="catalog">
			<div class="container">
				<p class="catalog_title main_title">Каталог</p>

				<div class="catalog_tubs_box">
					<button class="catalog_tubs_btn catalog_tubs_btn_prev"></button>

					<ul class="catalog_tubs_row">
						<?php
						$current_cat = isset($_GET['cat']) ? sanitize_text_field($_GET['cat']) : '';

						$categories = get_categories([
							'hide_empty' => true,
						]);
						?>

						<!-- Все записи -->
						<li class="catalog_tub_item <?php echo empty($current_cat) ? 'active' : ''; ?>">
							<a href="<?php echo get_permalink(); ?>">Все</a>
						</li>

						<?php foreach ($categories as $category): ?>
							<li class="catalog_tub_item <?php echo ($current_cat === $category->slug) ? 'active' : ''; ?>">
								<a href="<?php echo add_query_arg('cat', $category->slug, get_permalink()); ?>">
									<?php echo esc_html($category->name); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>

					<button class="catalog_tubs_btn catalog_tubs_btn_next"></button>
				</div>

				<div class="catalog_box">
					<?php
					$args = [
						'post_type' => 'post',
						'posts_per_page' => 12,
					];

					if (!empty($current_cat)) {
						$args['category_name'] = $current_cat;
					}

					$posts_query = new WP_Query($args);

					if ($posts_query->have_posts()):
						while ($posts_query->have_posts()):
							$posts_query->the_post();
							?>
							<div class="catalog_item">
								<a href="<?php the_permalink(); ?>">
									<span class="catalog_item_img">
										<?php if (has_post_thumbnail()): ?>
											<?php the_post_thumbnail('medium'); ?>
										<?php else: ?>
											<img src="<?php bloginfo('template_url'); ?>/assets/img/no-image.jpg" alt="">
										<?php endif; ?>
									</span>
									<span class="catalog_item_name"><?php the_title(); ?></span>
								</a>

								<a href="" class="catalog_item_btn">
									Заказать
								</a>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>

				<a href="<?php echo get_post_type_archive_link('post'); ?>" class="main_btn catalog_main_btn">
					Смотреть весь каталог
				</a>
			</div>
		</section>