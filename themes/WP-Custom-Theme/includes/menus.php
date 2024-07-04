<?php 

/**
 * Register new menus
 */
add_action( 'init', 'ct_menu' );
function ct_menu() {
	register_nav_menus( [
		'header_menu' => __( 'Header Menu', 'additional' ),
	] );
}