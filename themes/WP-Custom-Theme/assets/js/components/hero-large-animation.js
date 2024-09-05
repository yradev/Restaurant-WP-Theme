import gsap from 'gsap';
import $ from 'jquery';
import { $body, $header, $win, $doc, $main } from '../utils/globals';
import { slider } from './hero-slider';

const sectionName = '.js-hero-large';
const $section = $(sectionName);

/**
 * Hero large animation
 */
function heroLargeAnimation() {
	const animation = $section.find('.js-hero-animation')[0];
	const nextSectionButton = $section.find('.js-hero-next-section')[0];
	const sliderOverlay = $section.find('.js-hero-slider-overlay')[0];
	const sliderContent = $section.find('.js-slider-slide-content')[0];
	const sliderImages = $section.find('.js-slider-slide-images')[0];
	const sliderNext =  $section.find('.js-slider-next')[0];
	const sliderPrev = $section.find('.js-slider-prev')[0];
	const animationDuration = 0.8;
	const timeline = gsap.timeline(
		{
			repeat: 0,
			ease: 'none',
			defaults: {
				duration: animationDuration,
				ease: "none",
			},
			onComplete: function() {
				$body.removeClass('is-loading-homepage');
				slider.autoplay.start();
			}
		}
	);

	$body.addClass('is-loading-homepage');
	
	timeline.to(sliderOverlay, {height: 0});
	timeline.to(animation, {width: "100%"}, "<"); 
	timeline.to(animation, {width: "50%"});
	timeline.to(sliderContent, {x: 0}, "<");
	timeline.to(sliderImages, {scale: 1}, "<");
	timeline.to(animation, {width: "0"});
	timeline.to( [sliderNext, sliderPrev], {x: 0}, "<" );
	timeline.to( nextSectionButton, {bottom: 0}, "<");
	timeline.to( $header[0], {top: 0}, "<");
}

/**
 * Start hero large animation on load
 */
$win.on('load' , function() {
	if( $doc.scrollTop() == 0 && $main.children().first().hasClass(sectionName.substring(1, sectionName.length))) {
		heroLargeAnimation();
	}
})