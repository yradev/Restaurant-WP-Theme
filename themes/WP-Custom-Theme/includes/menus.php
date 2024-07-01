<?php 

/**
 * Register new menus
 */
add_action( 'init', 'my_custom_menu' );
function my_custom_menu() {
	register_nav_menus( [
		'header_menu' => __( 'Header Menu', 'additional' ),
	] );
}