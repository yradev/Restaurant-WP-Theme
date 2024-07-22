<?php

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'    => 'Theme General Settings',
		'menu_title'    => 'Theme Settings',
		'menu_slug'     => 'theme-general-settings',
		'redirect'      => false
	));

	acf_add_options_page(array(
		'page_title'    => 'Footer Settings',
		'menu_title'    => 'Footer Settings',
		'menu_slug'     => 'footer-settings',
		'redirect'      => true
	));

	$languages = pll_languages_list();

	foreach( $languages as $lang ) {
		acf_add_options_page(array(
			'page_title'    => 'Theme Settings - ' . strtoupper($lang),
			'menu_title'    => 'Theme Settings - ' . strtoupper($lang),
			'menu_slug'     => 'theme-settings-' . $lang,
			'parent_slug'   => 'theme-general-settings',
			'post_id' => $lang,
			'redirect'      => false
		));
	}

	foreach( $languages as $lang ) {
		acf_add_options_page(array(
			'page_title'    => 'Footer Settings - ' . strtoupper($lang),
			'menu_title'    => 'Footer Settings - ' . strtoupper($lang),
			'menu_slug'     => 'footer-settings-' . $lang,
			'parent_slug'   => 'footer-settings',
			'post_id' => $lang,
			'redirect'      => false
		));
	}
}

/**
 * Update acf settings to watch from /acf folder 
 */
add_filter('acf/settings/save_json', 'ct_acf_save_point');
function ct_acf_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf';
    return $path;
}


/**
 * Update acf settings to watch from /acf folder 
 */
add_filter('acf/settings/load_json', 'ct_acf_load_point');
function ct_acf_load_point( $paths ) {
    unset($paths[0]);

    $paths[] = get_stylesheet_directory() . '/acf-folder';
    return $paths;
}
