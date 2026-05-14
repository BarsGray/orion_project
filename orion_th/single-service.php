<?php
get_header();
show_title_box();
?>

<div class="content">
	<div class="container">
		<div class="user_content">
			<?php
				the_field("text_before");
				the_content();
				show_gellary_services();
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
</div>

<?php
show_map();
get_footer();
?>
