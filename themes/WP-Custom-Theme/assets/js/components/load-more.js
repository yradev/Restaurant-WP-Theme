function loadMoreHandler( event ) {
	event.preventDefault();

	const href =  $(this).attr('href');
	const $section = $(this).closest('.js-posts');
	const $articles_list = $section.find('.js-posts-list');
	const $button = $(this);

	$section.find('.spinner').addClass('is-active');

	$.ajax(
		{
			url: href,
			method: 'GET', 
			success( result ) {
				const $result = $(result);
				const $new_articles = $result.find('.js-posts .js-posts-list > *');
				const $new_button = $result.find('.js-load-more');

				$articles_list.append( $new_articles );
				
				if( $new_button.length > 0 ) {
					$button.html( $new_button );
				} else {
					$button.remove();
				}
			},
		}
	)
}

/**
 * Events
 */
$('.js-load-more').on('click', loadMoreHandler);