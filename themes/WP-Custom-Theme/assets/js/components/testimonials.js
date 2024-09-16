import slider from '../utils/testimonials-slider'
import {$win} from '../utils/globals'

$win.on('load resize', function() {
    slider({
        container: '.js-testimonials',
        slide: '.js-testimonial',
        width: 400,
        spaceBetween: 50,
        duration: 80,
        breakpoints: [
            {
                breakpoint: 767,
                width: 300,
                spaceBetween: 20,
            }
        ]
    });
})