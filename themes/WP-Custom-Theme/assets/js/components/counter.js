import counterUp from 'counterup2';
import $ from 'jquery';

const handleIntersection = (entries, observer) => {
	entries.forEach(entry => {
		if (entry.isIntersecting) {
			const $counters = $(entry.target).find('.js-counter');

			$counters.each(function(key, element) {
				counterUp(element, {
					delay: 10,
					time: 1000
				});
			})

			observer.unobserve(entry.target);
		}
	});
};

const observer = new IntersectionObserver(handleIntersection, {
	root: null, 
	rootMargin: '0px',
	threshold: 0.1
});

$('.js-counter-section').each( function( key, element ) {
	observer.observe(element);
} )