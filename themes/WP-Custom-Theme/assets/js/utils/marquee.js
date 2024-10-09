import $ from 'jquery';
import { $win } from './globals';

const wrapperName = 'marquee';
let container = 1;
let slide;
let slideWidth;
let gap;
let duration;
let reverseStart;
let slidesCount;
let containerWidth = 0;
let visibleElementsCount;
let $container = $('');
let breakpoints = {};
let $clones = [];

/**
 * Marquee with functionalities to stop on hover
 * 
 * @argument container - slider's container
 * @argument slide - slide container
 * @argument width - slide width
 * @argument spaceBetween - space between
 * @argument duration - duration of one cicle (depends on slides)
 * @argument reverseStart - marquee will start from the right
 * @argument breakpoints - Array with objects of breakpoints
 * * @argument breakpoint - The breakpoint width
 * * @argument width - slide width
 * * @argument spaceBetween - spaceBetween
 * * @argument duration - spaceBetween
 */

export default function marquee( args ) {
	container = args?.container ?? '';
	slide = args?.slide ?? '';
	slideWidth = args?.width ?? 0;
	gap = args?.spaceBetween ?? 0;
	duration = args?.duration ?? 0;
	reverseStart = args?.reverseStart ?? false;
	breakpoints = args?.breakpoints ?? 0;
	
    if( breakpoints.length > 0 ) {
        breakpoints.forEach( breakpoint => {
            const breakpointWidth = breakpoint?.breakpoint;

            if(breakpointWidth != undefined && $(window).width() <= breakpointWidth) { 
                if( breakpoint.width !== undefined ) {
                    slideWidth = breakpoint.width;
                }

                if( breakpoint.spaceBetween !== undefined ) {
                    gap = breakpoint.spaceBetween;
                }

                if( breakpoint.duration !== undefined ) {
                    duration = breakpoint.duration;
                }
            }
        } )
    }

	$(container).each( function( index, element ) {
		$container = $(element);

		appendDublicates();
		addBaseStyles();
		startAnimation();
	} );
}

/**
 * Append Dublicates
 */

function appendDublicates() {
	cleanUpClones();

	const $slides = $container.find(slide);
    slidesCount = $slides.length;

    containerWidth = slidesCount * slideWidth + ( slidesCount * gap );

	if( containerWidth < $win.width() * 2) {
		const $clonesNumber = Math.round((($win.width() * 2) / containerWidth));
		
		for( let i = 1; i<=$clonesNumber; i++ ) {
			const $clonedSlides = $slides.slice(0, $slides.length).clone(true);

			$clones.push($clonedSlides);

			$container.append($clonedSlides);
		}

		slidesCount = $container.find(slide).length;
		containerWidth = slidesCount * slideWidth + ( slidesCount * gap );
	} else {
		containerWidth = slidesCount * slideWidth + ( slidesCount * gap );
	}

    visibleElementsCount = Math.ceil($(window).width() / slideWidth);
    const $clonedSlides = $container.find(slide).slice(0, visibleElementsCount).clone(true);
   
	$clones.push($clonedSlides);

    slidesCount += visibleElementsCount;

    $container.css('--slides-count' , slidesCount);

    $container.append($clonedSlides);
}

/**
 * Cleanup clones on resize
 */
function cleanUpClones() {
	$clones.forEach( (clones, index) => {
		clones.remove();
	} )
}
  
/**
 * Add base styles
 */
function addBaseStyles() {
	const $container = $(container);
	$container.addClass(wrapperName);

    $container.css('--container-width' , containerWidth + 'px');
    $container.css('--slide-width', slideWidth + 'px');
    $container.css('--gap', gap + 'px');
    $container.css('--duration', duration + 's');
}

/**
 * Start animation
 */
function startAnimation(){
    let movingPixels = containerWidth - $(window).width();
    let visibleElementHiddenWidth = ( visibleElementsCount * slideWidth + visibleElementsCount * (gap - 1) ) - $(window).width();
    movingPixels -= visibleElementHiddenWidth;
	movingPixels -= visibleElementsCount;


	if( reverseStart ) {

		const pixelsPerSecond = movingPixels / duration;
		const durationFirstAnimation =  ($win.width() + movingPixels) / pixelsPerSecond ;

		$container.css('--start-pixels' , $win.width() + 'px');
		$container.css('--first-animation-duration' , durationFirstAnimation + 's');
		$container.addClass('marquee--right');
	}

    $container.css('--moving-pixels' , '-' + movingPixels + 'px');
}