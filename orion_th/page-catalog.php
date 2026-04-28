<?php
/**
 * Template Name: Catalog
 */
get_header();
$selected_cat = isset($_GET['cat']) ? sanitize_text_field($_GET['cat']) : '';
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
show_title_box();
?>

<div class="catalog_tubs_box catalog_tubs_box_catalog">
	<div class="container">
		<button class="catalog_tubs_btn catalog_tubs_btn_prev"></button>
		<ul class="catalog_tubs_row">
			<?php $categories = get_categories(['hide_empty' => true]);
			foreach ($categories as $category): ?>
				<li class="catalog_tub_item<?php echo ($selected_cat == $category->slug) ? ' active' : ''; ?>">
					<a
						href="<?php echo get_permalink() ?>?cat=<?php echo $category->slug; ?>"><?php echo esc_html($category->name); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
		<button class="catalog_tubs_btn catalog_tubs_btn_next"></button>
	</div>
</div>

<section class="catalog catalog_page">
	<div class="container">
		<div class="catalog_box">
			<?php
			$query = new WP_Query([
				'post_type' => 'post',
				'posts_per_page' => 6,
				'paged' => $paged,
				'category_name' => $selected_cat
			]);
			while ($query->have_posts()):
				$query->the_post();
				$cats = get_the_category();
				$classes = '';
				foreach ($cats as $cat) {
					$classes .= ' cat-' . $cat->slug;
				}
				?>
				<div class="catalog_item<?php echo $classes; ?>">
					<a href="<?php the_permalink(); ?>">
						<span class="catalog_item_img"><?php the_post_thumbnail('medium'); ?></span>
						<span class="catalog_item_name"><?php the_title(); ?></span>
					</a>
					<a href="<?php the_permalink(); ?>" class="catalog_item_btn">Заказать</a>
				</div>
			<?php endwhile;
			wp_reset_postdata();
			?>
		</div>
		<?php
		$next_link = get_next_posts_page_link($query->max_num_pages);
		if ($next_link): ?>
			<a class="load_more_btn" href="<?php echo esc_url($next_link); ?>">Загрузить ещё</a>
			<?php
		endif;
		wp_pagenavi(['query' => $query]);
		?>
	</div>
</section>

<?php get_footer(); ?>