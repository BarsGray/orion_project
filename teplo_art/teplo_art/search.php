<?php
	get_header();
	$query_posts=query_posts($query_string.'&post_type=product');
?>

	<div id="content">
		<div class="wr text clr">
			<?php 
				bread_crumbs();
				echo '<h1>Результаты поиска - '.$_GET['s'].'</h1>';
				if(have_posts() && !empty($_GET['s'])){
					view_products($query_posts);
					wp_pagenavi();
				} else echo '<p>Ничего не найдено</p>';
			?>
		</div>
	</div>
	
<?php get_footer(); ?>