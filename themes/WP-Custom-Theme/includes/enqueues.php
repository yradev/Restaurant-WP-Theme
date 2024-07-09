<?php
/**
 * Add custom scripts
 */
 add_action( 'wp_enqueue_scripts', 'ct_custom_scripts' , 0 );
 function ct_custom_scripts() {
	$google_api_key = get_field( 'ct_google_maps_key' , 'option' );
	wp_enqueue_script("jquery");
	wp_enqueue_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key=' . $google_api_key);
 }

 add_action( 'wp_enqueue_scripts', 'add_enqueues_from_dist' , 1);
/**
 * Add enqueues from dist folder to WP
 */
function add_enqueues_from_dist() {
	$manifest_path =  get_template_directory() . DIST_PATH . MANIFEST_PATH;
	$template_dist_path = get_template_directory_uri() . DIST_PATH;

	if( file_exists($manifest_path) ) {	
		$manifests = json_decode( file_get_contents( $manifest_path ), true );

		foreach($manifests as $manifest) {
			$file = $manifest['file'];

			if( str_ends_with( $file , '.js') ) {
				wp_enqueue_script('bundle', $template_dist_path . $file, array('jquery'));
			} else if ( str_ends_with( $file , '.css' ) ) {
				wp_enqueue_style('main' , $template_dist_path .  $file);
			}
		}
	}
}


 /**
 * Async scripts
 */

add_filter('script_loader_tag', 'change_type_to_module', 10, 3);
function change_type_to_module($tag, $handle, $source){
$script_names = [
    'bundle',
  ];

  if( in_array( $handle, $script_names ) ) {
	return $tag = '<script type="module" src="'. esc_url($source).'"></script>';
  } else {
	return $tag;
  }
}
