import marquee from '../utils/marquee'
import {$win} from '../utils/globals'

$win.on('load resize', function() {
    marquee({
        container: '.js-testimonials',
        slide: '.js-testimonial',
        width: 400,
        spaceBetween: 50,
        duration: 60,
        breakpoints: [
            {
                breakpoint: 767,
                width: 300,
                spaceBetween: 20,
            }
        ]
    });
})