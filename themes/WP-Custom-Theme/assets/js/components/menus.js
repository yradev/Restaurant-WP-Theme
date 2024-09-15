import $ from 'jquery';
import gsap from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { $win } from '../utils/globals';

gsap.registerPlugin(ScrollTrigger);

const section = '.js-menus';
const $paginationNext = $('.js-menus .js-menu-next');
const $paginationPrev = $('.js-menus .js-menu-prev');
const $menuPageContent = $('.js-menu-description');

/**
 * Menus book animation
 */
function onScrollMenusAnimation() {
	const $menus = $('.js-menu');

	const timeline = gsap.timeline({
		scrollTrigger: {
			trigger: section,
			pin: true,
			start: 'top-=50 top',
			end: '+=5000', 
			scrub: true,
			snap: {
				snapTo: 'labelsDirectional',
				duration: 0.4,
				ease: 'power1.inOut'
			}
		}
	});
	
	timeline
		.addLabel('start');
		
	for( let i = $menus.length - 1; i>=0; i-- ) {
		let page = $menus.eq( i );
		let z = ( ($menus.length - 1) - i ) + 2;
		let front = $(page).find('.js-page-front');
		let back = $(page).find('.js-page-back');

		timeline
			.addLabel( 'page' + i )
			.to( page, {rotateY: 90, zIndex: z} )
			.to( front, {display: 'none', duration: 0.1} )
			.to( back, {position: 'static', pointerEvents: 'auto', rotateY: 180, opacity: 1, duration: 0.1}, '<'  )
			.to( page, {rotateY: 180} )
	}

	timeline
		.addLabel('end');
	
}

/**
 * Add extending icon
 */
function extendingContentIcon() {
	const $menuEntry = $('.js-menu-entry');

	$menuEntry.each( function (index, element) {
		if($(element).height() >=50 ){
			$(element).siblings('i').addClass('is-active');
		}
	} )
}

/**
 * Tablet menu animation
*/
function onTabletMenusAnimationNext(event) {
	event.preventDefault();

	let $page = $(event.target).closest('.js-menu');
	let z = $page.data('z') != undefined ? $page.data('z') : 3;
	
	$page.prev().data('z', z + 1);

	let front = $page.find('.js-page-front')[0];
	let back = $page.find('.js-page-back')[0];

	const timeline = gsap.timeline({})

	timeline.to( $page[0], {rotateY: 90, zIndex: z, duration: .4} );
	timeline.to( front, {display: 'none', duration: 0.1} );
	timeline.to( back, {position: 'static', pointerEvents: 'auto', rotateY: 180, opacity: 1, duration: 0.1}, '<'  );
	timeline.to( $page[0], {rotateY: 180, duration: .4} );
}

function onTabletMenusAnimationPrev(event) {
	event.preventDefault();

	console.log('catched');
	let $page = $(event.target).closest('.js-menu');
	let front = $page.find('.js-page-front')[0];
	let back = $page.find('.js-page-back')[0];

	const timeline = gsap.timeline({})

	timeline.to( $page[0], {rotateY: 90, duration: .4});
	timeline.to( front, {display: 'flex', duration: 0.1} );
	timeline.to( back, {position: 'absolute', pointerEvents: 'none', rotateY: 0, opacity: 0, duration: 0.1}, '<'  );
	timeline.to( $page[0], {rotateY: 0, duration: .4, zIndex: 2} );
}

/**
 * Mobile next menu page animation
*/
function onMobileMenusAnimationNext(event) {
	event.preventDefault();

	let $page = $(event.target).closest('.js-menu');

	let z = $page.data('z') != undefined ? $page.data('z') : 3;
	
	$page.prev().data('z', z + 1);

	const timeline = gsap.timeline({})

	timeline.to( $page[0], {rotateY: 120, filter: 'blur(5px)', zIndex: z, duration: .4} );
}


/**
 * Mobile prev menu page animation
*/
function onMobileMenusAnimationPrev(event) {
	event.preventDefault();

	let $page = $(event.target).closest('.js-menu');

	const timeline = gsap.timeline({})

	timeline.to( $page.next()[0], {filter: 'blur(0)', duration: .1} );
	timeline.to( $page.next()[0], {rotateY: 0, zIndex: 2, duration: .4} );
}

/**
 * Function Dublicate Menu pages on mobile
 */
function dublicateMenuPages() {
	$('.js-menu').each( function( index, element ) {
		const $element = $(element);

		if( ! $element.hasClass('menu-page--front') ) {
			const $clonedPage = $element.clone(true);
			const $frontPage = $element.find('.js-page-front');
			const $backPage = $element.find('.js-page-back');
			const $prevButton = $backPage.find('.js-menu-prev').clone(true);
			const $nextButton = $frontPage.find('.js-menu-next').clone(true);

			$frontPage
				.find('.js-menu-pagination')
				.append($prevButton);

			$frontPage.addClass('is-active');

			$clonedPage
				.find('.js-page-back')
				.addClass('is-active')
				.find('.js-menu-pagination')
				.append($nextButton);

			$element.before($clonedPage);
		}
	} );
}

/**
 * Extending content handler
 */
function extendingContent(event) {
	$(event.currentTarget).toggleClass('is-active');
}

/**
 * Events
 */
$win.on('load' , function() {
	if( $win.width() >= 1024 ) {
		onScrollMenusAnimation();
	}

	if( $win.width() <= 767 ) {
		dublicateMenuPages();
	}
	
	extendingContentIcon();
});

/*
* Pagination Next - Tablet, Mobile
*/

$paginationNext.on('click', function (event) {
	if( $win.width() > 767 && $win.width() < 1024 ) {
		onTabletMenusAnimationNext(event);
	}

	if( $win.width() <= 767  ) {
		onMobileMenusAnimationNext(event);
	}
} );

/**
 * Pagination Prev - Tablet, Mobile
 */

$paginationPrev.on('click', function (event) {
	if( $win.width() > 767 && $win.width() < 1024 ) {
		onTabletMenusAnimationPrev(event);
	}

	if( $win.width() <= 767 ) {
		onMobileMenusAnimationPrev(event);
	}
} );

/**
 * Extended content tablet, mobile
 */

$menuPageContent.on('click', function(event) {
	if( $win.width() < 1024 ) {
		extendingContent(event);
	}
});