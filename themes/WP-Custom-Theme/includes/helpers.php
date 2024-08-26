<?php 

/** 
 * Custom Fragment
 */
function ct_include_fragment( $fragment, $args ) {
	extract($args);

	require get_template_directory() . '/fragments/' . $fragment . '.php';
}

/**
 * Transform acf link to button
 */

function ct_render_button( $button, $classes = 'btn', $styles = '' ) {
	if ( empty( $button['title'] ) && empty( $button['url'] ) ) {
		return;
	}

	ct_render_link( $button['title'] , $button['url'], $classes, $styles, $button['target'] );
}

/**
 * Add link that support no-follow for SEO
 */
function ct_render_link( $title, $href, $class = '' , $style = '', $target = '') {
	$compact_attributes = compact('href', 'class', 'style', 'target');
	$attributes = array_filter($compact_attributes, function( $value, $key ) {
		return ! empty( $value );
	}, ARRAY_FILTER_USE_BOTH);

	array_walk($attributes, function(&$value, $key) {
        $value = $key . '="' . $value . '"';
    });

	if( ! str_contains($href, home_url()) && str_starts_with( $href , 'http')) {
		$attributes[] = 'rel="nofollow"';
	};
    
	echo '<a ' . implode( ' ' , $attributes ) . '>' . $title . '</a>';
}


/**
 * Get contact link from content
 */
function ct_get_contact_link( $content ) {
	$regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'; 
	$google_maps = 'https://www.google.com/maps/search/?api=1&query=';

	if( str_starts_with($content, '+') ) {
		return 'tel:' . str_replace(['+', ' '] , '', $content);
	}

	if( preg_match($regex, $content) ) {
		return 'mailto:' . $content;
	}

	return $google_maps . str_replace(' ', '+', $content);
}