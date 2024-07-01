<?php 

/** 
 * Custom Fragment
 */
function include_fragment( $fragment, $args ) {
	extract($args);

	require get_template_directory() . '/fragments/' . $fragment . '.php';
}