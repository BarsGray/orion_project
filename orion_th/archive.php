<?php get_header(); ?>

<main class="catalog">

    <h1>Каталог</h1>

    <!-- КАТЕГОРИИ -->
    <div class="catalog-categories">

        <a href="<?php echo home_url(); ?>/category/">Все</a>

        <?php
        $categories = get_categories();

        foreach ($categories as $cat) {
            echo '<a href="' . get_category_link($cat->term_id) . '">'
                . $cat->name .
            '</a> ';
        }
        ?>

    </div>

    <hr>

    <!-- ЗАПИСИ -->
    <div class="catalog-items">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <div class="catalog-item">
                    <h3><?php the_title(); ?></h3>
                    <div><?php the_excerpt(); ?></div>
                </div>

            <?php endwhile; ?>

            <?php the_posts_navigation(); ?>

        <?php else : ?>
            <p>Ничего не найдено</p>
        <?php endif; ?>

    </div>

</main>

<?php get_footer(); ?>