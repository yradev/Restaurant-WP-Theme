import $ from 'jquery';

const $body = $('body');
const $win = $('window');
const $navTrigger = $('.js-nav-trigger');
const navTriggerActive = 'nav-trigger--active'
const openMenuClass = 'has-open-menu';

/**
* Open-Close hamburger menu
*/

function navTrigger() {
	$(this).toggleClass(navTriggerActive);

	$body.toggleClass(openMenuClass);
}

/** 
* Close menu  when event is triggered
*/

function navClose(event) {
	$body.removeClass(openMenuClass);
	$navTrigger.removeClass(navTriggerActive);
}

/**
 * Add is-active on tablet
 */

function slideOnClick( event ) {
	$(this)
		.addClass('is-active')
		.siblings()
		.removeClass('is-active')
		.find('.sub-menu')
		.slideUp();

	$(this).find('.sub-menu').slideDown();
}

/** Event */

$navTrigger.on('click', navTrigger);
$('.nav li.menu-item-has-children').on('click', slideOnClick);
$('.nav a').on('click', navClose);