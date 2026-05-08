jQuery(function ($) {

	// ++++++++++++++++++++++++++++ tubs ++++++++++++++++++++++++++++++++++++++++++++
	const tubs_row 	= document.querySelector('.catalog_tubs_row');
	const btn_prev 	= document.querySelector('.catalog_tubs_btn_prev');
	const btn_next 	= document.querySelector('.catalog_tubs_btn_next');
	
	if (tubs_row) {
		const activeTab = tubs_row.querySelector('.active');

		tubs_row.addEventListener('wheel', (e) => {
			e.preventDefault();
			const direction = e.deltaY > 0 ? 1 : -1;
      const scrollStep = tubs_row.clientWidth - 200;

			tubs_row.scrollBy({ left: direction * scrollStep, behavior: 'smooth' });
		}, { passive: false });

		btn_prev.onclick = () => {tubs_row.scrollBy({ left: -tubs_row.clientWidth - 200, behavior: 'smooth' })};
		btn_next.onclick = () => {tubs_row.scrollBy({ left: tubs_row.clientWidth - 200, behavior: 'smooth' })};

		function updadteBtn() {
			const scrollLeft = tubs_row.scrollLeft;
			const maxScroll = tubs_row.scrollWidth - tubs_row.clientWidth;

			btn_prev.disabled = scrollLeft <= 0;
			btn_next.disabled = scrollLeft >= maxScroll - 3;
		}

		tubs_row.addEventListener('scroll', updadteBtn);

		updadteBtn();
		
		if (activeTab) { tubs_row.scrollBy({ left: activeTab.offsetLeft - 200, behavior: 'smooth' }) }
	}


	let containerEl = document.querySelector('.catalog_box_mix');
	if (containerEl) {

		let mixer = mixitup(containerEl, {
			selectors: {target: '.mix'},
			animation: {duration: 400,effects: 'fade scale(0.9) translateY(20px)'},
			load: {filter: '.cat-angel'}
		});

		$('.catalog_tub_item_mix').on('click', function (e) {
			e.preventDefault();

			$('.catalog_tub_item_mix').removeClass('active');
			$(this).addClass('active');

			let filter = $(this).data('filter');

			mixer.filter(filter);
		});
	}


	// ++++++++++++++++++++++++++++ carusel ++++++++++++++++++++++++++++++++++++++++++++
	const swiper = new Swiper('.swiper', {
		loop: true,
		slidesPerView: 1,
		centeredSlides: true,
		slidesPerGroup: 1,
		pagination: { el: '.carusel__pagination', clickable: true, },
		navigation: { nextEl: '.carusel__next', prevEl: '.carusel__prev', },
		breakpoints: {
			1350: { slidesPerView: 5.1, slidesPerGroup: 1, },
			800: { slidesPerView: 3.5, slidesPerGroup: 1, },
			540: { slidesPerView: 2.4, slidesPerGroup: 1, },
			440: { slidesPerView: 1.6, slidesPerGroup: 1, },
			300: { centeredSlides: false, slidesPerView: 1, slidesPerGroup: 1 },
		},
	});



	// ++++++++++++++++++++++++++++ menu, popup ++++++++++++++++++++++++++++++++++++++++++++
	const menuButton = document.querySelector('.burger_menu_btn');
	const headerMenu = document.querySelector('.row_menu');
	const overlay = document.querySelector('.overlay');


	function openMenu() {
		document.querySelector('body').classList.toggle('scroll-nane');
		menuButton.classList.toggle('burger_menu_btn--active');
		headerMenu.classList.toggle('row_menu--visible');
		overlay.classList.toggle('overlay--visible');
	}

	function overlayReset() {
		document.querySelector('body').classList.remove('scroll-nane');
		menuButton.classList.remove('burger_menu_btn--active');
		headerMenu.classList.remove('row_menu--visible');
		overlay.classList.remove('overlay--visible');
	}

	overlay.addEventListener('click', overlayReset);
	menuButton.addEventListener('click', openMenu);



	// ++++++++++++++++++++++++++++ validate input  ++++++++++++++++++++++++++++++++++++++++++++
	const allForms = document.querySelectorAll('.wpcf7-form');

	allForms.forEach(form => {
		const phoneInput = form.querySelector('input[type="tel"]');
		const submitButton = form.querySelector('button[type="submit"]');
		const checkbox = form.querySelector('input[type="checkbox"][name^="acceptance"]');

		// деактивируем кнопку
		submitButton.disabled = true;

		checkbox.addEventListener('change', () => {
			if (phoneInput.value.length == 18) { submitButton.disabled = !checkbox.checked; }
		});

		phoneInput.addEventListener('focus', () => {
			if (!phoneInput.value) { phoneInput.value = '+7 '; }
			if (phoneInput.value.length < 18) { phoneInput.classList.remove('wpcf7-not-valid'); }
		});

		phoneInput.addEventListener('blur', () => {
			if (phoneInput.value === '+7 ') { phoneInput.value = ''; phoneInput.classList.remove('wpcf7-not-valid'); }
			if (phoneInput.value.length < 18 && phoneInput.value.length > 3) { phoneInput.classList.add('wpcf7-not-valid'); }
		});

		phoneInput.addEventListener('input', (e) => {
			let input = e.target.value.replace(/\D/g, '');
			let formatted = '';

			if (['7', '8', '9'].includes(input[0])) {
				if (input[0] === '9') input = '7' + input;
				input = input.substring(1);
			}

			formatted = '+7 ';

			if (input.length > 0) { formatted += '(' + input.substring(0, 3); }
			if (input.length >= 4) { formatted += ') ' + input.substring(3, 6); }
			if (input.length >= 7) { formatted += '-' + input.substring(6, 8); }
			if (input.length >= 9) { formatted += '-' + input.substring(8, 10); }

			e.target.value = formatted;

			// делаетм кнопку активной, не активной
			if (phoneInput.value.length == 18 && checkbox.checked) {
				submitButton.disabled = false;
			} else {
				submitButton.disabled = true;
			}
		});

		phoneInput.addEventListener('keydown', (e) => {
			if (e.target.value.length <= 4 && e.keyCode === 8) { e.preventDefault(); }
		});

		form.addEventListener('submit', (e) => {
			if (phoneInput.value.length < 18) {
				// alert('Пожалуйста, введите номер телефона полностью');
				e.preventDefault();
				phoneInput.classList.add('wpcf7-not-valid');
				e.stopImmediatePropagation();
				return false;
			} else {
				phoneInput.classList.remove('wpcf7-not-valid');
			}
		}, true);
	});



	// ++++++++++++++++++++++++++++ fancybox gallery  ++++++++++++++++++++++++++++++++++++++++++++
	$('[data-fancybox="gallery"]').fancybox({ arrows: false, infobar: false, buttons: [], clickContent: false, backFocus: false, loop: true, });



	// ++++++++++++++++++++++++++++ loadMore gallery  ++++++++++++++++++++++++++++++++++++++++++++
	const services_items = document.querySelectorAll('.gallery_works_item');
	const galleryWorkBtn = document.querySelector('.gallery_works_btn');
	let servicesItemsPreviose = 12;

	let iShow = servicesItemsPreviose;

	if (!services_items.length == 0) {

		function galleryCounter() {
			for (let i = 0; i < iShow && i < services_items.length; i++) {
				services_items[i].style.display = 'block';
				setTimeout(() => { services_items[i].classList.add('works_visible'); }, 10);
			}
		}

		galleryCounter();

		galleryWorkBtn.addEventListener('click', function (e) {
			e.preventDefault();

			if (iShow === services_items.length) {
				return;
			}
			else if (iShow + servicesItemsPreviose > services_items.length) {
				iShow += services_items.length - iShow;
				galleryWorkBtn.style.display = 'none';
			}
			else {
				iShow += servicesItemsPreviose;
				if (iShow >= services_items.length) { galleryWorkBtn.style.display = 'none'; }
			}

			galleryCounter();
		});
	}


	// ++++++++++++++++++++++++++++ show more content  ++++++++++++++++++++++++++++++++++++++++++++

	const hideContainer = document.querySelector('.hide_text');
	const btnMore = document.querySelector('.more');

	if (btnMore) {
		btnMore.addEventListener('click', () => {
			hideContainer.classList.toggle('active');

			if (hideContainer.classList.contains('active')) {
				btnMore.innerHTML = 'Cвернуть';
			} else {
				btnMore.innerHTML = 'Подробнее';
			}
		});
	}












});