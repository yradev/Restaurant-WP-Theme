<?php

add_action( 'init', 'ct_add_theme_support', 0 );
function ct_add_theme_support() {
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');
}

/**
 * Add favicon
 */
add_action( 'wp_head', 'ct_custom_favicon');
function ct_custom_favicon(){
    echo "<link rel='shortcut icon' href='" . get_stylesheet_directory_uri() . "/assets/images/favicon.ico' />" . "\n";
}