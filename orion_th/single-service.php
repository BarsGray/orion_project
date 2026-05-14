<?php
get_header();
show_title_box();
?>

<div class="content">
	<div class="container">
		<div class="user_content">
			<?php the_content(); ?>
		</div>
	</div>
</div>

<?php
show_map();
get_footer();
?>
