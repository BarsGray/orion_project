<?php
	get_header();
	show_title_box();

	$qo=get_queried_object();
	query_posts(array(
		'cat' => $cat,
		'paged' => get_query_var('paged') ? get_query_var('paged') : 0
	));
	
?>

	<div class="content">
		<div class="container">
			<?php
			// bread_crumbs();
			// cat_title();
			the_field("text_before", $qo);

			if(have_posts()){
				echo '<div class="cat_view">';
				while(have_posts()){ the_post();
					?>
					<div>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<p><?php echo wp_trim_words( get_the_content(), 40);?></p>
					</div>
					<?php
				}
				echo '</div>';
				wp_pagenavi();
			} else echo '<p>Раздел не заполнен</p>';

			the_field("text_after", $qo);
			?>
		</div>
	</div>

<?php
show_map();
get_footer();
?>