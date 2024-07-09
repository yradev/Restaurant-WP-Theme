import Swiper from 'swiper/bundle';
let slider = new Swiper('.js-slider-gallery .swiper', {
    loop: true,
	slidesPerView: 1,
	autoplay: {
        delay: 7000,
        disableOnInteraction: false,
    },
    effect: "fade",
    fadeEffect: { crossFade: true },
    navigation: {
        nextEl: ".js-slider-next",
        prevEl: ".js-slider-prev",
      },
});

$('.js-slider-gallery-image').on('click' , function(event) {
    event.preventDefault();

    slider.slideTo($(this).data('id'));
    const scrollTop = 0;

    $('html, body').stop().animate({
		scrollTop,
	}, 1000);
})