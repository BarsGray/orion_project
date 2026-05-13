<?php
get_header();
show_title_box();
?>

<div class="content">
	<div class="container">
		<?php
		the_field("text_before");
		the_content();

		if (is_page(109))
			show_contacty();

		if (is_page(45))
			show_works();

		if (is_page(42))
			show_services();

		if (is_page(41))
			show_products(['post_type' => 'product', 'posts_per_page' => 25, 'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1]);
		?>
		<?php if (get_field('text_after')) : ?>
			<div class="hide_text">
				<?php the_field("text_after"); ?>
			</div>	
			<?php if (mb_strlen(get_field('text_after'), 'UTF-8') > 100) : ?>
				<a class="more">Подробнее</a>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>

<?php
if (!is_page(109))
	show_map();

get_footer();
?>