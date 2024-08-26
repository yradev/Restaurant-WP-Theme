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
 * Add choices to ct_day select
*/
add_action('init', function() {
	global $day_of_week;
	$day_of_week = [
		ct__('Monday' , 'ct') => ct__('Monday' , 'ct'), 
		ct__('Tuesday' , 'ct') => ct__('Tuesday' , 'ct'), 
		ct__('Wednesday' , 'ct') => ct__('Wednesday' , 'ct'), 
		ct__('Thursday' , 'ct') => ct__('Thursday' , 'ct'), 
		ct__('Friday' , 'ct') => ct__('Friday' , 'ct'), 
		ct__('Saturday ' , 'ct') => ct__('Saturday ' , 'ct'), 
		ct__('Sunday' , 'ct') => ct__('Sunday' , 'ct') 
	];


	/**
	 * Load Days
	 */
	add_filter('acf/load_field', 'ct_load_days');
	function ct_load_days( $field ) {
		global $day_of_week;
		if ( $field['name'] == 'ct_day' ) {
			$field['choices'] = $day_of_week;
		}    

		return $field;
	}

	/**
	 * Add Translations
	 */
	if( function_exists( 'pll_register_string' ) ) {
		foreach( $day_of_week as $key => $value ) {
			pll_register_string($key, $value, 'ct');
		}
	}
});
