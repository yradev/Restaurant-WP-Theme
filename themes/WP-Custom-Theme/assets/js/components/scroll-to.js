import { $win, $header, $adminBar, hasFixedHeader } from '../utils/globals';
import $ from 'jquery';

/**
 * Check for # on load
 */
$win.on('load', (event) => {
	const hash = window.location.hash;

	if(!hash.length) {
		return;
	}

	scrollToElement(hash);
});

/**
 * Check on # on a
 */
$('a[href*="#"]:not([href="#"])').on('click', function(event) {
	const href = $(this).attr('href');

	if( ! href.includes('#') ) {
		return;
	} 

	if( href.charAt(0) !== '#' ) {
		let cleanHref = href
		.split('/')
		.filter( (value, index) => value.charAt(0) != '#' && index !== 0)
		.join('/');

		if (!cleanHref.endsWith('/')) {
			cleanHref += '/';
		  }
	
		let currentURL = window.location.href
		  .split('/')
		  .filter( (value, index) => value.charAt(0) != '#' && index !== 0)
		  .join('/');
  
		  if (!currentURL.endsWith('/')) {
			currentURL += '/';
		  }


		if( currentURL != cleanHref ) {
			return;
		}
	}

	const anchor = href
		.split('/')
		.filter( a => a.charAt(0) == '#' );
		
	event.preventDefault();
    event.stopPropagation();

	scrollToElement(anchor[0]);
});

/**
 * Smooth scroll to element
 */
export function scrollToElement(element) {
	const $element = $(element);
	const scrollDuration = 700;
	const elementTop = $element.first().offset().top;

	const elementMarginTop = parseInt($element.css('margin-top'));
	const headerHeight = ! hasFixedHeader && $header.length > 0 ? $header.innerHeight() : 0;
	const adminBarHeight =  $adminBar.length > 0 ? $adminBar.innerHeight() : 0;

	let scrollTop = elementTop - elementMarginTop - headerHeight - adminBarHeight;

	if(scrollTop < 0) {
		scrollTop = 0;
	}

	$('html, body').stop().animate({
		scrollTop,
	}, scrollDuration);
}
