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

	echo "<a href='{$button['url']}' target='{$button['target']}' class='{$classes}' style = '{$styles}'>{$button['title']}</a>";
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