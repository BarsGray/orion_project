// jQuery(function($){
jQuery(document).ready(function($){
	//menu
	$('.over,.mobile_menu .close').click(function(e){
		e.preventDefault();
		$('body').css('overflow','auto').find('.over').fadeOut().siblings('.mobile_menu').removeClass('active');
	});
	$('header a.mob_icon_menu').click(function(e){
		e.preventDefault();
		$('body').css('overflow','hidden').find('.over').fadeIn().siblings('.mobile_menu').addClass('active');
	});
	
	//Поиск
	$("header .contact a.search").click(function(e){
		e.preventDefault();
		$(".search_block").toggleClass("active");
	});
	
	// Слайдер в шапке
	$('.sec_1 .data').on('init',function(event, slick){
		totalPages=Math.ceil(slick.slideCount/slick.options.slidesToScroll);
		$('.sec_1 .wr_slider .slider_num').html('<span class="one">1</span> / <span class="two">'+totalPages+'</span>');
	});
	$(".sec_1 .data").slick({
		arrows: true,
		nextArrow: '.sec_1 .slick-next',
		prevArrow: '.sec_1 .slick-prev',
		dots: false,
		slidesToShow: 1,
		swipeToSlide: true,
	});
	$(".sec_1 .data").on('afterChange', function(event, slick, currentSlide){
		totalPages=Math.ceil(slick.slideCount/slick.options.slidesToScroll);
		currentPage=Math.ceil((currentSlide+1)/slick.options.slidesToScroll);
		$('.sec_1 .wr_slider .slider_num').html('<span class="one">'+currentPage+'</span> / <span class="two">'+totalPages+'</span>');
	});
		
	// Каталог
	$('.sec_2 .catalog').on('init',function(event, slick){
		totalPages=Math.ceil(slick.slideCount/slick.options.slidesToScroll);
		$('.sec_2 .wr_slider .slider_num').html('<span class="one">1</span> / <span class="two">'+totalPages+'</span>');
	});
	$(".sec_2 .catalog").slick({
		arrows: true,
		nextArrow: '.sec_2 .slick-next',
		prevArrow: '.sec_2 .slick-prev',
		dots: false,
		slidesToShow: 4,
		slidesToScroll: 4,
		swipeToSlide: true,
		responsive:[
			{ breakpoint: 1000,
				settings:{
					slidesToShow: 3,
					slidesToScroll: 3,
				}
			},
			{ breakpoint: 780,
				settings:{
					slidesToShow: 2,
					slidesToScroll: 2,
				}
			},
			{ breakpoint: 480,
				settings:{
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			},
		]
	});
	$(".sec_2 .catalog").on('afterChange', function(event, slick, currentSlide){
		totalPages=Math.ceil(slick.slideCount/slick.options.slidesToScroll);
		currentPage=Math.ceil((currentSlide+1)/slick.options.slidesToScroll);
		$('.sec_2 .wr_slider .slider_num').html('<span class="one">'+currentPage+'</span> / <span class="two">'+totalPages+'</span>');
	});
	
	// Хиты продаж
	$('.sec_3 .products').on('init',function(event, slick){
		totalPages=Math.ceil(slick.slideCount/slick.options.slidesToScroll);
		$('.sec_3 .wr_slider .slider_num').html('<span class="one">1</span> / <span class="two">'+totalPages+'</span>');
	});
	$(".sec_3 .products").slick({
		arrows: true,
		nextArrow: '.sec_3 .slick-next',
		prevArrow: '.sec_3 .slick-prev',
		dots: false,
		slidesToShow: 4,
		slidesToScroll: 4,
		swipeToSlide: true,
		responsive:[
			{ breakpoint: 1000,
				settings:{
					slidesToShow: 3,
					slidesToScroll: 3,
				}
			},
			{ breakpoint: 780,
				settings:{
					slidesToShow: 2,
					slidesToScroll: 2,
				}
			},
			{ breakpoint: 480,
				settings:{
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			},
		]
	});
	$(".sec_3 .products").on('afterChange', function(event, slick, currentSlide){
		totalPages=Math.ceil(slick.slideCount/slick.options.slidesToScroll);
		currentPage=Math.ceil((currentSlide+1)/slick.options.slidesToScroll);
		$('.sec_3 .wr_slider .slider_num').html('<span class="one">'+currentPage+'</span> / <span class="two">'+totalPages+'</span>');
	});
	
	// Услуги
	$('.sec_4 .right .servis').on('init',function(event, slick){
		totalPages=Math.ceil(slick.slideCount/slick.options.slidesToScroll);
		$('.sec_4 .wr_slider .slider_num').html('<span class="one">1</span> / <span class="two">'+totalPages+'</span>');
	});
	$(".sec_4 .right .servis").slick({
		arrows: true,
		nextArrow: '.sec_4 .slick-next',
		prevArrow: '.sec_4 .slick-prev',
		dots: false,
		slidesToShow: 2,
		slidesToScroll: 2,
		swipeToSlide: true,
		responsive:[
			{ breakpoint: 1000,
				settings:{
					slidesToShow: 2,
					slidesToScroll: 2,
				}
			},
			{ breakpoint: 480,
				settings:{
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			},
		]
	});
	$(".sec_4 .right .servis").on('afterChange', function(event, slick, currentSlide){
		totalPages=Math.ceil(slick.slideCount/slick.options.slidesToScroll);
		currentPage=Math.ceil((currentSlide+1)/slick.options.slidesToScroll);
		$('.sec_4 .wr_slider .slider_num').html('<span class="one">'+currentPage+'</span> / <span class="two">'+totalPages+'</span>');
	});
	
	// Производители
	$('.sec_6 .sec_6_1 .manufacturers').on('init',function(event, slick){
		totalPages=Math.ceil(slick.slideCount/slick.options.slidesToScroll);
		$('.sec_6 .sec_6_1 .wr_slider .slider_num').html('<span class="one">1</span> / <span class="two">'+totalPages+'</span>');
	});
	
	$(".sec_6 .sec_6_1 .manufacturers").slick({
		arrows: true,
		nextArrow: '.sec_6 .sec_6_1 .slick-next',
		prevArrow: '.sec_6 .sec_6_1 .slick-prev',
		dots: false,
		slidesToShow: 4,
		slidesToScroll: 4,
		swipeToSlide: true,
		responsive:[
			{ breakpoint: 1000,
				settings:{
					slidesToShow: 3,
					slidesToScroll: 3,
				}
			},
			{ breakpoint: 780,
				settings:{
					slidesToShow: 2,
					slidesToScroll: 2,
				}
			},
			{ breakpoint: 480,
				settings:{
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			},
		]
	});
	
	$(".sec_6 .sec_6_1 .manufacturers").on('afterChange', function(event, slick, currentSlide){
		totalPages=Math.ceil(slick.slideCount/slick.options.slidesToScroll);
		currentPage=Math.ceil((currentSlide+1)/slick.options.slidesToScroll);
		$('.sec_6 .sec_6_1 .wr_slider .slider_num').html('<span class="one">'+currentPage+'</span> / <span class="two">'+totalPages+'</span>');
	});
	
	// Блог
	$('.sec_7 .blog').on('init',function(event, slick){
		totalPages=Math.ceil(slick.slideCount/slick.options.slidesToScroll);
		$('.sec_7 .wr_slider .slider_num').html('<span class="one">1</span> / <span class="two">'+totalPages+'</span>');
	});
	
	$(".sec_7 .blog").slick({
		arrows: true,
		nextArrow: '.sec_7 .slick-next',
		prevArrow: '.sec_7 .slick-prev',
		dots: false,
		slidesToShow: 4,
		slidesToScroll: 4,
		swipeToSlide: true,
		responsive:[
			{ breakpoint: 1000,
				settings:{
					slidesToShow: 3,
					slidesToScroll: 3,
				}
			},
			{ breakpoint: 780,
				settings:{
					slidesToShow: 2,
					slidesToScroll: 2,
				}
			},
			{ breakpoint: 480,
				settings:{
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			},
		]
	});
	
	$(".sec_7 .blog").on('afterChange', function(event, slick, currentSlide){
		totalPages=Math.ceil(slick.slideCount/slick.options.slidesToScroll);
		currentPage=Math.ceil((currentSlide+1)/slick.options.slidesToScroll);
		$('.sec_7 .wr_slider .slider_num').html('<span class="one">'+currentPage+'</span> / <span class="two">'+totalPages+'</span>');
	});
	
	// gallery_single_product
	$('.slider_for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		adaptiveHeight: true,
		asNavFor: '.slider_nav',
	});
	$('.slider_nav').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		asNavFor: '.slider_for',
		dots: true,
		arrows: false,
		focusOnSelect: true,
		responsive:[
			{ breakpoint: 640,
				settings:{
					slidesToShow: 4,
				}
			},
		]
	});
	
});