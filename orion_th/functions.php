<?php


function show_title_box()
{
  ?>
  <div class="title_box">
    <div class="container">
      <p class="title main_title"><?php the_title(); ?></p>
      <?php breadcrumbs(); ?>
    </div>
  </div>
  <?php
}

function show_contacty()
{
	?>
  <div class="contacts_form_box">
		<div class="contacts">
			<p class="title_contacts main_title">Мы всегда готовы помочь и ответить на любые вопросы</p>
			<div class="contacts_inner">
				<div class="contacts_adresa">
					<div class="contacts_titles">Адреса</div>
					<?php if (get_field('adres_1', FRONT_PAGE)): ?>
						<div class="top_row_adress_1"><p class="top_row_text"><?php the_field('adres_1', FRONT_PAGE) ?></p></div>
					<?php endif; ?>
					<?php if (get_field('adres_2', FRONT_PAGE)): ?>
						<div class="top_row_adress_2"><p class="top_row_text"><?php the_field('adres_2', FRONT_PAGE) ?></p></div>
					<?php endif; ?>
				</div>
				<div class="contacts_tels">
					<div class="contacts_titles">Телефоны</div>
					<?php if (get_field('number_1', FRONT_PAGE)): ?>
						<div class="top_row_contacts_tel_1">
							<a href="tel:<?php merge_numbers(get_field('number_1', FRONT_PAGE)); ?>" class="contacts_tel"><?php the_field('number_1', FRONT_PAGE) ?></a>
						</div>
					<?php endif; ?>
					<?php if (get_field('number_2', FRONT_PAGE)): ?>
						<div class="top_row_contacts_tel_2">
							<a href="tel:<?php merge_numbers(get_field('number_2', FRONT_PAGE)); ?>" class="contacts_tel"><?php the_field('number_2', FRONT_PAGE) ?></a>
						</div>
					<?php endif; ?>
				</div>
				<div class="contacts_email">
					<div class="contacts_titles">Электронная почта</div>
					<?php if (get_field('email', FRONT_PAGE)): ?>
						<div class="map_info_list_item_inner">
							<a class="map_info_list_link" href="mailto:9507620621@mail.ru"><?php the_field('email', FRONT_PAGE) ?></a>
						</div>
					<?php endif; ?>
				</div>
				<div class="contacts_social">
					<div class="contacts_titles">Социальные сети</div>
					<?php if (get_field('vk_link', FRONT_PAGE) || get_field('max_link', FRONT_PAGE)): ?>
						<div class="contacts_socials">
							<?php if (get_field('vk_link', FRONT_PAGE)): ?>
								<a href="<?php the_field('vk_link', FRONT_PAGE) ?>" class="contacts_socials_link"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/frame4382vk.svg" alt=""></a>
							<?php endif; ?>
							<?php if (get_field('max_link', FRONT_PAGE)): ?>
								<a href="<?php the_field('max_link', FRONT_PAGE) ?>" class="contacts_socials_link"><img class="" src="<?php bloginfo('template_url') ?>/assets/img/logo_MAX2.svg" alt=""></a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="form">
			
			<div class="form_box">
				<div class="top_box">
					<p class="form_title">Оставить заявку</p>
					<p class="form_text">Оставьте свои контакты и наш специалист перезвонит вам в ближайшее время.</p>
				</div>
					<form method="POST">
						<input type="text" id="name" name="user_name" placeholder="Имя (опционально)" required>
						<input type="tel" id="tel" name="tel" placeholder="Телефон" required>
						<button type="submit">Отправить</button>
					</form>
			</div>

		</div>
	</div>
	<?php
	show_map();
}

function show_map()
{
  ?>
		<section class="section_map">
			<?php if(!is_page(109)) : ?>
				<div class="map_info_content_box">
					<p class="map_info_title main_title">Как нас найти</p>
					<ul class="map_info_list">
						<?php if (get_field('adres_1', FRONT_PAGE)): ?>
							<li class="map_info_list_item map_info_list_item_place">
								<p class="map_info_list_item_inner"><?php the_field('adres_1', FRONT_PAGE) ?></p>
							</li>
						<?php endif; ?>
						<?php if (get_field('adres_2', FRONT_PAGE)): ?>
							<li class="map_info_list_item map_info_list_item_place">
								<p class="map_info_list_item_inner"><?php the_field('adres_2', FRONT_PAGE) ?></p>
							</li>
						<?php endif; ?>
						<?php if (get_field('number_1', FRONT_PAGE)): ?>
							<li class="map_info_list_item map_info_list_item_home_number">
								<p class="map_info_list_item_inner">
									<a class="map_info_list_link" href="tel:<?php merge_numbers(get_field('number_1', FRONT_PAGE)); ?>">
										<?php the_field('number_1', FRONT_PAGE) ?>
									</a>
								</p>
							</li>
						<?php endif; ?>
						<?php if (get_field('number_2', FRONT_PAGE)): ?>
							<li class="map_info_list_item map_info_list_item_mobile_number">
								<p class="map_info_list_item_inner">
									<a class="map_info_list_link" href="tel:<?php merge_numbers(get_field('number_2', FRONT_PAGE)); ?>">
										<?php the_field('number_2', FRONT_PAGE) ?>
									</a>
								</p>
							</li>
						<?php endif; ?>
						<?php if (get_field('email', FRONT_PAGE)): ?>
							<li class="map_info_list_item map_info_list_item_mail">
								<p class="map_info_list_item_inner">
									<a class="map_info_list_link" href="mailto:9507620621@mail.ru"><?php the_field('email', FRONT_PAGE) ?></a>
								</p>
							</li>
						<?php endif; ?>
					</ul>
					<?php if (get_field('vk_link', FRONT_PAGE) || get_field('max_link', FRONT_PAGE)): ?>
						<div class="map_socials">
							<?php if (get_field('vk_link', FRONT_PAGE)): ?>
								<a href="<?php the_field('vk_link', FRONT_PAGE) ?>" class="socials_link"><img src="<?php bloginfo('template_url') ?>/assets/img/vk_map.svg" alt=""></a>
							<?php endif; ?>
							<?php if (get_field('max_link', FRONT_PAGE)): ?>
								<a href="<?php the_field('max_link', FRONT_PAGE) ?>" class="socials_link"><img src="<?php bloginfo('template_url') ?>/assets/img/max_map.svg" alt=""></a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="map_inner">
				<script async
					src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A293ef0d12dff9ee1fc34f4d334ac805b4a9289ad72c69c4738a8cb68ce61a50a&amp;lang=ru_RU&amp;scroll=true">
					</script>
			</div>
		</section>
  <?php
}











