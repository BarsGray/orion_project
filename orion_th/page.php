<?php get_header(); ?>

<div class="title_box">
	<div class="container">
		<p class="title main_title"><?php the_title(); ?></p>
		<?php breadcrumbs(); ?>
	</div>
</div>

<div class="content">
	<div class="container">
		<?php the_content(); ?>
	</div>
</div>

<?php get_footer(); ?>