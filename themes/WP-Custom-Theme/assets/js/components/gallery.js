import Swiper from 'swiper/bundle';
import $ from 'jquery';

let slider = new Swiper('.js-slider-gallery .swiper', {
    loop: true,
	slidesPerView: 1,
    effect: "fade",
    fadeEffect: { crossFade: true },
    navigation: {
        nextEl: ".js-slider-next",
        prevEl: ".js-slider-prev",
      },
});

$('.js-slider-gallery-image').on('click' , function(event) {
    event.preventDefault();

    const $slides = $(slider.slides);
    const imageId = $(this).data('id');
    const sliderId = $slides.filter( function (index,element) {
        return $(element).data('swiper-slide-index') == imageId;
    } );

    slider.slideTo(sliderId.index());
    const scrollTop = 0;

    $('html, body').stop().animate({
		scrollTop,
	}, 1000);
})