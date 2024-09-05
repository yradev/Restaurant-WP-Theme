import $ from 'jquery';
import gsap from 'gsap';
import { $win } from '../utils/globals';
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin( ScrollTrigger );

const sectionName = '.js-two-images-content';
const $sections = $(sectionName);


/**
 * Two images content on scroll animation
 */
function twoImagesContentAnimation() {
	$sections.each( (i, section) => {
		const $section = $(section);
		const $images = $section.find('.js-images img');
		const $content = $section.find('.js-content');

		const timeline = gsap.timeline({
			scrollTrigger: {
				trigger: section,
				pin: true,
				start: 'top top',
				scrub: true,
				end: '+=700', 
				snap: {
					snapTo: 'labelsDirectional',
					duration: .4,
					ease: 'none'
				}
			}
		});
		
		timeline
			.addLabel('Start');

		$images.each( (i, element) => {
			timeline
				.addLabel('Image' + i)
					.fromTo(element, {opacity: 0, width: "5%"}, {opacity: 1, width:"100%"}
				);
		});

		timeline
			.addLabel('Content')
				.fromTo($content[0], {opacity:0, xPercent: 200}, {opacity: 1, xPercent: 0})
		timeline
			.addLabel("End");
	} )
}

/*
* Events
*/

$win.on('load', function() {
	if( $win.width() >= 768 ) {
		twoImagesContentAnimation();
	}
})

