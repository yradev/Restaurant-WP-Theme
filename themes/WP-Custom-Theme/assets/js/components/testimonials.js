import slider from '../utils/testimonials-slider'

slider({
    container: '.js-testimonials',
    slide: '.js-testimonial',
    width: '500',
    spaceBetween: '20',
    duration: '20',
    breakpoints: [
        {
            breakpoint: 767,
            width: 200,
        }
    ]
});
