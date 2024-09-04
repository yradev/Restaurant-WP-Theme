import { $body, $win } from '../utils/globals';

/**
 * Add is-loaded on load
 */

$win.on('load' , function() {
	$body.addClass('is-loaded');
})