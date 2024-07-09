/**
 * Init google map
 */

const $maps = $('.js-map');

function initMap( element ) {
	const $element = $(element);
	const lat = $element.data('lat');
	const lng = $element.data('lng');

	if( lat == undefined || lng == undefined) {
		return;
	}

	const location = {lat, lng};

	const map = new google.maps.Map(element, {
		zoom: 11,
		center: location
	});
	
	const marker = new google.maps.Marker({
		position: location,
		map: map
	});
}

$maps.each( function( key, element ) {
	console.log(element);
	initMap(element);
} );
