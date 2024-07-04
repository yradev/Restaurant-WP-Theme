<?php 

/** 
 * Custom Fragment
 */
function ct_include_fragment( $fragment, $args ) {
	extract($args);

	require get_template_directory() . '/fragments/' . $fragment . '.php';
}

function ct_render_button( $button, $classes = 'btn', $styles = '' ) {
	if ( empty( $button['title'] ) && empty( $button['url'] ) ) {
		return;
	}

	echo "<a href='{$button['url']}' target='{$button['target']}' class='{$classes}' style = '{$styles}'>{$button['title']}</a>";
}