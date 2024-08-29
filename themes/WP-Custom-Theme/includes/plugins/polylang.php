<?php  

/**
 * Add echo string support for polylang
 */
function ct_e( $title, $content ) {
	if (function_exists('pll_register_string')) { 
		pll_e( $content , 'ct' );
		ct_update_translation_db($title, $content);
	} else {
		_e( $content, 'ct' );
	}
}

/**
 * Add return string support for polylang
 */
function ct__( $title, $content ) {
	if (function_exists('pll_register_string')) {
		pll__( $content );
		ct_update_translation_db($title, $content);	
	} else {
		return __( $content, 'ct' );
	}
}

/**
 * Add translation to db
 */

 function ct_update_translation_db( $title, $content ) {
	$option_name = "ct_translation";
	$translations = get_option($option_name, []);

	$translations[$title] = $content;

	update_option( $option_name, $translations );
 }


/**
 * Register translations
 */

 add_action('init', 'ct_register_translations' );
 function ct_register_translations() {
		if ( ! function_exists('pll_register_string')) {
		return;
	}

	$option_name = "ct_translation";
	$translations = get_option($option_name, []);

	foreach( $translations as $key => $value ) {
		pll_register_string($key, $value, 'Custom Theme');
	}
 }