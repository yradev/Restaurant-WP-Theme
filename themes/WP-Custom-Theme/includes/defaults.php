<?php

add_action( 'init', 'ct_add_theme_support', 0 );
function ct_add_theme_support() {
	add_theme_support('post-thumbnails');
}

/**
 * Force redirection to https
 */

 add_action ( 'template_redirect' , 'ct_domain_redirect' , 999 );
 function ct_domain_redirect() {
	if( ! is_ssl() || str_starts_with($_SERVER['HTTP_HOST'], 'www.')) {
		wp_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301);
		exit();
	}
 }