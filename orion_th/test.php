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