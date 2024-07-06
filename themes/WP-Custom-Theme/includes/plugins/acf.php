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
		'menu_slug'     => 'theme-footer-settings',
		'parent_slug'   => 'theme-general-settings',
		'redirect'      => false
	));
}

