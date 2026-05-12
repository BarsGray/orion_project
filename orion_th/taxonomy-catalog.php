<?php
get_header();
show_title_box();
?>

<div class="content">
	<div class="container">
		<?php
		the_field("text_before");
		the_content();

		if (have_posts()): ?>
			<?php
			echo '<div class="catalog_box">';
				while (have_posts()): the_post();
					// $cats = get_the_terms(get_the_ID(), 'catalog');
				?>
					<div class="catalog_item">
						<a>
							<span class="catalog_item_img"><?php the_post_thumbnail('full'); ?></span>
							<span class="catalog_item_name"><?php the_title(); ?></span>
						</a>
						<a data-fancybox data-src="#popup_box" href="<?php the_permalink(); ?>" class="catalog_item_btn">Заказать</a>
					</div>
				<?php endwhile;
			echo '</div>';
			?>

			<?php
			$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
			global $wp_query;
			if($wp_query->max_num_pages > $current_page):
				$next_link = get_next_posts_page_link();
			?>
				<a class="load_more_btn" href="<?php echo esc_url($next_link); ?>">Загрузить ещё</a>
			<?php endif;

			wp_pagenavi();
		endif;

		the_field("text_after");
		?>
	</div>
</div>

<?php
if (!is_page(109))
	show_map();

get_footer();
?>
