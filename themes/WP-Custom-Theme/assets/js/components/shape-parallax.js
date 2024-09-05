import $ from 'jquery'
import gsap from 'gsap'
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { $win } from '../utils/globals';

gsap.registerPlugin(ScrollTrigger);

const sectionName = '.js-shape-parallax'
const $sections = $(sectionName);

/**
 * Left and right shape parallax
 */
function shapeParallax() {
	$sections.each( ( i, section ) => {
		const $section = $(section);
		const shapeLeft = $section.find('.js-shape-left')[0];
		const shapeRight = $section.find('.js-shape-right')[0];
		
		gsap.to( [shapeLeft, shapeRight], {
			top: "80%",
			scrollTrigger: {
				trigger: section,
				start: "top-=300 top",
				scrub: true,
			}
		} )
	} )
}

$win.on('load', function() {
	shapeParallax();
});

