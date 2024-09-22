import '../scss/main.scss';

/**
 * Redirect to dev server from wordpress link
 */
function redirectOnWPLink(event){	
	const href = event.currentTarget.href;

	const hrefArray = href.split('/');

	hrefArray.splice(3,1);
	hrefArray[2] = hrefArray[2] + ':8500';

	if(href.startsWith('http://localhost/')) {
		event.currentTarget.href = hrefArray.join('/');
	} 
}

/**
 * Events
 */

document.querySelectorAll('a').forEach(a=>a.addEventListener('click', redirectOnWPLink));