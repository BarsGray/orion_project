jQuery(function ($) {

	// ++++++++++++++++++++++++++++ tubs ++++++++++++++++++++++++++++++++++++++++++++
	const tubs_row = document.querySelector('.catalog_tubs_row');
	const btn_prev = document.querySelector('.catalog_tubs_btn_prev');
	const btn_next = document.querySelector('.catalog_tubs_btn_next');

	if (tubs_row) {
		tubs_row.addEventListener('wheel', (e) => {
			e.preventDefault();
			tubs_row.scrollBy({ left: e.deltaY });
		});

		btn_prev.onclick = () => {
			tubs_row.scrollBy({ left: -150 });
		};
		btn_next.onclick = () => {
			tubs_row.scrollBy({ left: 150 });
		};

		function updadteBtn() {
			const scrollLeft = tubs_row.scrollLeft;
			const maxScroll = tubs_row.scrollWidth - tubs_row.clientWidth;

			btn_prev.disabled = scrollLeft <= 0;
			btn_next.disabled = scrollLeft >= maxScroll - 3;
		}

		tubs_row.addEventListener('scroll', updadteBtn);

		updadteBtn();
	}

	let containerEl = document.querySelector('.catalog_box_mix');
	if (containerEl) {

		let mixer = mixitup(containerEl, {
			selectors: {
				target: '.mix'
			},
			animation: {
				duration: 400,
				effects: 'fade scale(0.9) translateY(20px)'
			}
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
		pagination: {
			el: '.carusel__pagination',
			clickable: true,
		},
		navigation: {
			nextEl: '.carusel__next',
			prevEl: '.carusel__prev',
		},
		breakpoints: {
			1350: {
				slidesPerView: 5.1,
				slidesPerGroup: 1,
			},
			640: {
				slidesPerView: 3,
				slidesPerGroup: 1,
			},
			300: {
				centeredSlides: false,
				slidesPerView: 1,
				slidesPerGroup: 1,

			},
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
	const phoneInput = document.getElementById('tel');

	phoneInput.addEventListener('focus', () => {
		if (!phoneInput.value) {
			phoneInput.value = '+7 ';
		}
	});

	phoneInput.addEventListener('blur', () => {
		if (phoneInput.value === '+7 ') {
			phoneInput.value = '';
		}
	});

	phoneInput.addEventListener('input', (e) => {
		let input = e.target.value.replace(/\D/g, '');
		let formatted = '';

		if (['7', '8', '9'].includes(input[0])) {
			if (input[0] === '9') input = '7' + input;
			input = input.substring(1);
		}

		formatted = '+7 ';

		if (input.length > 0) {
			formatted += '(' + input.substring(0, 3);
		}
		if (input.length >= 4) {
			formatted += ') ' + input.substring(3, 6);
		}
		if (input.length >= 7) {
			formatted += '-' + input.substring(6, 8);
		}
		if (input.length >= 9) {
			formatted += '-' + input.substring(8, 10);
		}

		e.target.value = formatted;
	});

	phoneInput.addEventListener('keydown', (e) => {
		if (e.target.value.length <= 4 && e.keyCode === 8) {
			e.preventDefault();
		}
	});


	const form = document.querySelector('form');

	form.addEventListener('submit', (e) => {
		if (phoneInput.value.length < 18) {
			alert('Пожалуйста, введите номер телефона полностью');
			e.preventDefault();
		}
	});



	// ++++++++++++++++++++++++++++ fancybox gallery  ++++++++++++++++++++++++++++++++++++++++++++
	$('[data-fancybox="gallery"]').fancybox({
		arrows: false,
		infobar: false,
		buttons: [],
		clickContent: false,
		backFocus: false,
		loop: true,
	});



	// ++++++++++++++++++++++++++++ loadMore gallery  ++++++++++++++++++++++++++++++++++++++++++++
	const services_items = document.querySelectorAll('.gallery_services_item');
	let servicesItemsPreviose = 3;

	let iShow = servicesItemsPreviose;

	if (services_items) {
		// iShow = 3;

		function galleryCounter() {
			for (let i = 0; i < iShow && i < services_items.length; i++) {

				services_items[i].style.display = 'block';
				setTimeout(() => {
					services_items[i].classList.add('services_visible');
				}, 10);

			}
		}

		galleryCounter();

		document.querySelector('.gallery_services_btn').addEventListener('click', function (e) {
			e.preventDefault();

			if (iShow === services_items.length) {
				return;
			}
			else if (iShow + servicesItemsPreviose > services_items.length) {
				iShow += services_items.length - iShow;
			}
			else {
				iShow += servicesItemsPreviose;
			}

			galleryCounter();
		});
	}















});