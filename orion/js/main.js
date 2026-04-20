$(function () {

	const tubs_row = document.querySelector('.catalog_tubs_row');
	const btn_prev = document.querySelector('.catalog_tubs_btn_prev');
	const btn_next = document.querySelector('.catalog_tubs_btn_next');


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





	const swiper = new Swiper('.swiper', {
		loop: true,
		slidesPerView: 3,
		centeredSlides: true,
		slidesPerGroup: 1,
		pagination: {
			el: '.carusel__pagination',
			// dynamicBullets: true,
			clickable: true,
		},
		navigation: {
			nextEl: '.carusel__next',
			prevEl: '.carusel__prev',
		},
		breakpoints: {
			// 1001: {
			// 	slidesPerView: 3,
			// },
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




	const menuButton = document.querySelector('.burger_menu_btn');
	const svgMenuButton = document.querySelector('.burger_menu_btn .ham');
	const headerMenu = document.querySelector('.row_menu');
	const overlay = document.querySelector('.overlay');

	menuButton.addEventListener('click', openMenu);

	function openMenu() {
		document.querySelector('body').classList.toggle('scroll-nane');

		menuButton.classList.toggle('burger_menu_btn--active');
		svgMenuButton.classList.toggle('active');
		headerMenu.classList.toggle('row_menu--visible');
		overlay.classList.toggle('overlay--visible');

		if (menuButton.closest('.burger_menu_btn--active')) {
			overlay.addEventListener('click', openMenu, true)
		} else {
			overlay.removeEventListener('click', openMenu)
		}
	}
});