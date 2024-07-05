import { $doc, $win, getHeaderHeight, getAdminBarHeight, hasFixedHeader } from '../utils/globals';

$win.on('load', (event) => {
	const hash = window.location.hash;

	if(!hash.length) {
		return;
	}

	scrollById(hash);

});

$('a[href*="#"]:not([href="#"])').on('click', function(event) {
	event.preventDefault();
    event.stopPropagation(); 
	const href = $(this).attr('href');

	if( href.charAt(0) !== '#' ) {
		return;
	}

	scrollById(href);
});


export function scrollById(data, offset = -1) {
	if(!data) {
		return false;
	}

	const $data = $(`${data}`);

	if(!$data.length) {
		return;
	}

	scrollToElement($data, offset);
}

export function scrollToElement($elem, offset = -1) {
	if(!$elem.length) {
		return;
	}

	const dataTop = $elem.first().offset().top - parseInt($elem.css('margin-top')) + 1;

	scrollToPosition(dataTop, offset);
}

export function scrollToPosition(dataTop, offset = -1) {
	if(offset === -1) {
		offset = $win.height() * 0.03;
	}

	const top = $win.scrollTop();
	const scrollDifference = Math.abs(Math.round(top - dataTop));
	const scrollMultiplier = scrollDifference * .75;
	const headerHeight = hasFixedHeader ? getHeaderHeight() : 0;

	let scrollDuration = 0;
	let scrollTop = dataTop - headerHeight - getAdminBarHeight() - offset;

	if(scrollTop + $win.height() > $doc.height()) {
		scrollTop = $doc.height() - $win.height();
	}

	if(scrollTop < 0) {
		scrollTop = 0;
	}

	if(scrollDifference === 0) {
		scrollDuration = 10;
	}
	else if(scrollDifference <= 200) {
		scrollDuration = 150;
	}
	else {
		scrollDuration = Math.min(Math.max(300, scrollMultiplier), 600);
	}

	$('html, body').stop().animate({
		scrollTop,
	}, scrollDuration);
}
