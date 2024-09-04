import gsap from 'gsap';
import { $body, $header, $win, $doc } from '../utils/globals';
import { slider } from './hero-slider';

const wrapper = '.js-hero-large';

/**
 * Hero large animation
 */
function heroLargeAnimation() {
	const animation = wrapper + ' .js-hero-animation';
	const nextSectionButton = wrapper + ' .js-hero-next-section';
	const sliderContainer = wrapper + ' .js-hero-slider';
	const sliderOverlay = sliderContainer + ' .js-hero-slider-overlay';
	const sliderContent = sliderContainer + ' .js-slider-slide-content';
	const sliderImages = sliderContainer + ' .js-slider-slide-images';
	const sliderNext = sliderContainer + ' .js-slider-next';
	const sliderPrev = sliderContainer + ' .js-slider-prev';
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
	timeline.to(animation, {width: "77.7%"});
	timeline.to(sliderContent, {x: 0}, "<");
	timeline.to(animation, {width: "33.3%"});
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
	if( $doc.scrollTop() == 0 ) {
		heroLargeAnimation();
	}
})