import gsap from 'gsap';
import $ from 'jquery';
import { $body, $header, $win, $doc, $main } from '../utils/globals';
import { slider } from './hero-slider';

const wrapper = '.js-hero-large';
const $wrapper = $(wrapper);

/**
 * Hero large animation
 */
function heroLargeAnimation() {
	const animation = $wrapper.find('.js-hero-animation')[0];
	const nextSectionButton = $wrapper.find('.js-hero-next-section')[0];
	const sliderOverlay = $wrapper.find('.js-hero-slider-overlay')[0];
	const sliderContent = $wrapper.find('.js-slider-slide-content')[0];
	const sliderImages = $wrapper.find('.js-slider-slide-images')[0];
	const sliderNext =  $wrapper.find('.js-slider-next')[0];
	const sliderPrev = $wrapper.find('.js-slider-prev')[0];
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
	if( $doc.scrollTop() == 0 && $main.children().first().hasClass(wrapper.substring(1, wrapper.length))) {
		heroLargeAnimation();
	}
})