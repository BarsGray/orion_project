<?php
	get_header();
	$qo=get_queried_object();
	query_posts(array(
		'cat' => $cat,
		'paged' => get_query_var('paged') ? get_query_var('paged') : 0
	));
	
	
?>

	<div id="content">
		<div class="wr text">
			<?php
			bread_crumbs();
			cat_title();
			the_field("text_do", $qo);

			if(have_posts()){
				// blog
				if(is_category(4)){
					echo '<div class="blog">';
						while(have_posts()){
							the_post();
							$img_post=has_post_thumbnail($post) ? get_the_post_thumbnail($post,'img_gallery') : '<img src="'.NO_IMG_370x370.'" alt="">';
							?>
							<a class="item" href="<?php the_permalink($post); ?>">
								<span class="img">
								
								<?php echo $img_post; ?>
								</span>
								<p class="date"><?php echo get_the_date('d.m.Y',$post); ?></p>
								<p class="name"><?php echo exp_text($post->post_title,50); ?></p>
							</a>
							<?php
						}
					echo '</div>';
				} else {
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
				}
				wp_pagenavi();
			} else echo '<p>Раздел не заполнен</p>';

			the_field("text_posle", $qo);
			?>
		</div>
	</div>

<?php get_footer(); ?>