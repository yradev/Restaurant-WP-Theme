import $ from 'jquery';
import gsap from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { $win } from '../utils/globals';

gsap.registerPlugin(ScrollTrigger)

const $wrapper = $('.js-features');


/**
 * Add animation to features section
 */
function featuresAnimation() {
	const $features = $wrapper.find('.js-feature');

	const timeline = gsap.timeline({
		scrollTrigger: {
			trigger: $wrapper[0],
			pin: true,
			start: 'top top',
			scrub: true,
			end: '+=1500', 
			snap: {
				snapTo: 'labelsDirectional',
				duration: .4,
				ease: 'power1.inOut'
			}
		}
	})
	
	timeline
		.addLabel('start');
	
	$features.each(  function ( i, feature ) {
		timeline.addLabel( 'feature' + i )
			.fromTo(feature, {scale:0}, {scale: 1})
	} );
	
	timeline.addLabel('end');
}

/**
 * Run animation if its not tablet
 */
$win.on('load resize', function() {
	if( $win.width() >= 768 ) {
		featuresAnimation();
	}
});