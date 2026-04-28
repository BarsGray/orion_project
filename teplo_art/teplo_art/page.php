<?php
	get_header();
	the_post();
	$acf_fields=get_fields();
?>

	<div id="content">
		<div class="wr text">
			<?php
				bread_crumbs();
				post_title();
				the_content();
				
				// Каталог
				if(is_page(18)) {
					echo '<div class="catalog">';
						$tx_terms=get_terms(array(
							'taxonomy' => 'catalog',
							'hide_empty' => false,
							'parent' => 0
						));
						view_cat_products($tx_terms);
					echo '</div>';
				}
				
				// Услуги
				if(is_page(14)) {
					$services=get_posts(array('post_type' => 'services','numberposts' => -1,));
					view_services($services);
				}
				// Сертификаты
				if(is_page(886)) {
					$certificates=get_posts(array('post_type' => 'certificates','numberposts' => -1,));
					view_certificates($certificates);
				}
				
				if(isset($acf_fields['text_after']) && !empty($acf_fields['text_after']))
					echo fc($acf_fields['text_after']);
			?>
		</div>
	</div>

<?php get_footer(); ?>