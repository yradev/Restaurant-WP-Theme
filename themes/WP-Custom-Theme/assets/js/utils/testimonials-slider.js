import $ from 'jquery';

const wrapperName = 'testimonials-slider';
let container = 1;
let slide;
let slideWidth;
let gap;
let duration;
let slidesCount;
let containerWidth = 0;
let visibleElementsCount;
let $container = $('');
let breakpoints = {};

/**
 * Infinity slider with functionalities to stop on hover
 * 
 * @argument container - slider's container
 * @argument slide - slide container
 * @argument width - slide width
 * @argument spaceBetween - space between
 * @argument duration - duration of one cicle
 * @argument breakpoints - Array with objects of breakpoints
 * * @argument breakpoint - The breakpoint width
 * * @argument width - slide width
 * * @argument spaceBetween - spaceBetween
 * * @argument duration - spaceBetween
 */

export default function slider( args ) {
	container = args?.container ?? '';
	slide = args?.slide ?? '';
	slideWidth = args?.width ?? 0;
	gap = args?.spaceBetween ?? 0;
	duration = args?.duration ?? 0;
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
    slidesCount = $container.find(slide).length;
    visibleElementsCount = Math.ceil($(window).width() / slideWidth);
    const $clonedSlides = $(slide).slice(0, visibleElementsCount).clone();
   
    slidesCount += visibleElementsCount;

    $container.css('--slides-count' , slidesCount);

    $container.append($clonedSlides);
}
  
/**
 * Add base styles
 */
function addBaseStyles() {
	const $container = $(container);
	$container.addClass(wrapperName);

    containerWidth = slidesCount * slideWidth + ( slidesCount - 1 ) * gap;

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
    let visibleElementHiddenWidth = ( visibleElementsCount * slideWidth + visibleElementsCount * (gap - 1) ) - $(window).width() - 15;
    movingPixels -= visibleElementHiddenWidth;

    $container.css('--moving-pixels' , '-' + movingPixels + 'px');
}