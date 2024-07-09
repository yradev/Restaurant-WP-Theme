<?php 

/**
 * Register new menus
 */
add_action( 'init', 'ct_menu', 0 );
function ct_menu() {
	register_nav_menus( [
		'header_menu' => __( 'Header Menu', 'additional' ),
	] );
}