<?php
get_header();
show_title_box();
?>

<div class="content">
	<div class="container">
		<?php
		the_content();

		if (is_page(109))
			show_contacty();

		if (is_page(45))
			show_works();

		if (is_page(42))
			show_services();

		if (is_page(41))
			show_products($args = [
				'post_type' => 'or_product',
				'posts_per_page' => 3,
				'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
				'tax_query' => [['taxonomy' => 'or_category', 'field' => 'slug', 'terms' => isset($_GET['cat']) ? sanitize_text_field($_GET['cat']) : '']]
			]);
		?>
	</div>
</div>

<?php
if (!is_page(109))
	show_map();

get_footer();
?>