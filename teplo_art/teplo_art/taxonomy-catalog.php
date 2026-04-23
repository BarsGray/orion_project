<?php
	get_header();
	$qo=get_queried_object();
	$text_before=get_field('text_before',$qo);
	$text_after=get_field('text_after',$qo);
	$tx_terms=get_terms(array(
		'taxonomy' => $qo->taxonomy,
		'hide_empty' => false,
		'parent' => $qo->term_id
	));
	
	// $data_posts=array();
	// foreach($tx_terms as $tx_term){
		// $sort_posts=get_posts(array(
			// 'tax_query' => array(array(
				// 'taxonomy' => $tx_term->taxonomy,
				// 'terms' => $tx_term->term_id,
			// )),
			// 'post_type' => 'product',
			// 'nopaging' => true
		// ));
		// foreach($sort_posts as $sort_post)
			// $data_posts[]=$sort_post->ID;
	// }
	
	$tx_posts=query_posts(array(
		'tax_query' => array(array(
			'taxonomy' => $qo->taxonomy,
			'field' => 'id',
			'terms' => $qo->term_id,
		)),
		// 'orderby' => 'date',
		// 'order' => 'DESC',
		'paged' => get_query_var('paged') ? get_query_var('paged') : 0
	));
	
?>

	<div id="content">
		<div class="wr text clr">
			<?php
				bread_crumbs();
				cat_title();
				
				if(!empty($text_before)) echo fc($text_before);
				
				if(!empty($tx_terms)){
					echo '<div class="cat_list">';
						foreach($tx_terms as $tx_term){
							echo'<a class="item" href="'.get_term_link($tx_term).'">'.$tx_term->name.'</a>';
						}
					echo '</div>';
				}
				
				if(have_posts()){
					view_products($tx_posts);
					wp_pagenavi();
				}
				
				if(!is_paged() && !empty($text_after)) echo fc($text_after);
			?>
		</div>
	</div>

<?php get_footer(); ?>