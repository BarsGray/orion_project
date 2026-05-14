<?php
// 1. Получаем все категории вашей кастомной таксономии (например, 'product_cat')
$categories = get_terms([
    'taxonomy'   => 'category', // Замените на название вашей таксономии, если она кастомная
    'hide_empty' => true,      // Выводить только те, где есть записи
]);

if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :
    foreach ( $categories as $cat ) : ?>

        <section class="category-section">
            <h2><?php echo $cat->name; ?></h2>

            <div class="grid-container">
                <?php
                // 2. Делаем запрос записей для текущей категории
                $args = [
                    'post_type'      => 'your_post_type', // ЗАМЕНИТЕ на имя вашего кастомного типа записи
                    'posts_per_page' => 12,
                    'tax_query'      => [
                        [
                            'taxonomy' => 'category', // Имя таксономии еще раз
                            'field'    => 'term_id',
                            'terms'    => $cat->term_id,
                        ],
                    ],
                ];

                $query = new WP_Query( $args );

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                        
                        <div class="grid-item">
                            <div class="image-wrapper">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                            <h3><?php the_title(); ?></h3>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata(); // Обязательно сбрасываем данные после цикла
                else : ?>
                    <p>Записей нет.</p>
                <?php endif; ?>
            </div>
        </section>

    <?php endforeach;
endif; ?>





<?php
get_header();
show_title_box();
$term = get_queried_object();

// Изменяем глобальный запрос: добавляем сортировку по алфавиту и сохраняем пагинацию
global $wp_query;
$args = array_merge( $wp_query->query_vars, array(
    'orderby' => 'title', // Сортировка по названию (заголовку)
    'order'   => 'ASC'    // Направление: от А до Я
) );
query_posts( $args );
?>

<div class="content">
	<div class="container">
		<div class="user_content"><?php the_field("text_before", $term); the_content(); ?></div>
		<?php
		if (have_posts()): ?>
			<?php
			echo '<div class="catalog_box">';
				while (have_posts()): the_post();
					// $cats = get_the_terms(get_the_ID(), 'catalog');
				?>
					<div class="catalog_item">
						<a data-fancybox data-src="#popup_box" href="#">
							<span class="catalog_item_img"><?php the_post_thumbnail('full'); ?></span>
							<span class="catalog_item_name"><?php the_title(); ?></span>
						</a>
						<a data-fancybox data-src="#popup_box" href="#" class="catalog_item_btn">Заказать</a>
					</div>
				<?php endwhile;
			echo '</div>';
			?>

			<?php
			$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
			// Перезапускаем глобальную переменную, чтобы кнопки "Загрузить ещё" и "wp_pagenavi" видели новые данные
			global $wp_query;
			if($wp_query->max_num_pages > $current_page):
				$next_link = get_next_posts_page_link();
			?>
				<a class="load_more_btn" href="<?php echo esc_url($next_link); ?>">Загрузить ещё</a>
			<?php endif;

			wp_pagenavi();
		endif;
		
		// Сбрасываем кастомный запрос, чтобы не нарушать работу footer.php и других блоков ниже
		wp_reset_query();
		?>
		<div class="user_content"><?php the_field("text_after", $term); ?></div>
	</div>
</div>

<?php
if (!is_page(109))
	show_map();

get_footer();
?>
