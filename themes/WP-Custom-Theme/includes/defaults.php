<?php

/**
 * Check is it development or production environment
 */
function ct_is_development() {
	return isset($_SERVER['HTTP_DEV_MODE']) && $_SERVER['HTTP_DEV_MODE'] && $_SERVER['HTTP_HOST'] === "localhost";
}

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

/**
 * Override dev admin url
 */
add_filter('admin_url', 'ct_dev_admin_url', 10, 2);
 function ct_dev_admin_url($url, $path) {
	if ( ct_is_development() && $path === 'admin-ajax.php') {
        return 'http://localhost:8500/wp-admin/admin-ajax.php';
    }
    
    return $url;
}