<?php
get_header();
show_title_box();
?>

<div class="content">
	<div class="container">
		<?php
		if (is_page(109))
			show_contacty();

		the_content(); ?>
	</div>
</div>

<?php
if (!is_page(109))
	show_map();

get_footer();
?>