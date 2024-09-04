import Swiper from 'swiper/bundle';

let slider = new Swiper('.js-hero-slider .swiper', {
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

slider.autoplay.stop();

export { slider } ;