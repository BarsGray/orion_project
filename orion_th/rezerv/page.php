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

		?>
	</div>
</div>

<?php
if (!is_page(109))
	show_map();

get_footer();
?>