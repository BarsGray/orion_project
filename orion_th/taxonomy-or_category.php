<?php
get_header();
show_title_box();
$term = get_queried_object();
?>

<div class="category">

    <h1><?php echo esc_html($term->name); ?></h1>

    <?php if (term_description()) : ?>
        <div class="category-description">
            <?php echo term_description(); ?>
        </div>
    <?php endif; ?>

    <?php if (have_posts()) : ?>
        <div class="products">

            <?php while (have_posts()) : the_post(); ?>

                <article class="product">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                        <h2><?php the_title(); ?></h2>
                    </a>
                </article>

            <?php endwhile; ?>

        </div>

        <?php the_posts_pagination(); ?>

    <?php else : ?>
        <p>Товары не найдены</p>
    <?php endif; ?>

</div>

<?php
show_map();
get_footer();
?>