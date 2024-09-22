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

/**
 * Add enqueues from dist folder to WP
 */
add_action( 'wp_enqueue_scripts', 'add_enqueues_from_dist' , 1);
function add_enqueues_from_dist() {
	$manifest_path = get_template_directory() . '/dist/.vite/manifest.json';
	$template_dist_path = get_template_directory_uri() . '/dist/';
	$main_scss_path = get_template_directory() . '/assets/scss/main.scss';
	$dev_url = "http://localhost:8500";
	$dev_bundle_path = "$dev_url/assets/js/main.js";
	$dev_js_path = "$dev_url/assets/js/dev.js";


	if ( ct_is_development() ) {
		wp_enqueue_script('dev-bundle', $dev_bundle_path, [], null, true);
		wp_enqueue_script('dev-js', $dev_js_path, [], null, true);
		wp_localize_script('dev-js', 'wpAjax', ['admin_url' => admin_url('admin-ajax.php')]);
	} else {
		if( file_exists($manifest_path) ) {	
			$manifests = json_decode( file_get_contents( $manifest_path ), true );

				foreach($manifests as $manifest) {
					$file = $manifest['file'];

					if( str_ends_with( $file , '.js') ) {
						wp_enqueue_script('bundle', $template_dist_path . $file, ['jquery']);
						wp_localize_script('bundle', 'wpAjax', ['admin_url' => admin_url('admin-ajax.php')]);
					} else if ( str_ends_with( $file , '.css' ) ) {
						wp_enqueue_style('main' , $template_dist_path .  $file);
					}
				}
		}
	}
}


 /**
 * Scripts to module
 */

add_filter('script_loader_tag', 'change_type_to_module', 10, 3);
function change_type_to_module($tag, $id, $src){
$script_names = [
    'bundle',
	'dev-js',
	'dev-bundle',
  ];

  if( in_array( $id, $script_names ) ) {
	$after = wp_scripts()->get_data($id, 'after');
	$before = wp_scripts()->get_data($id, 'before');

	if ( ! empty($before)) {
		$tag .= "\n<script>" . $before[1] . '</script>';
	}

	$tag = '<script id="' . esc_attr($id) . '" type="module" src="'. $src.'"></script>';

	if ( ! empty($after)) {
		$tag .= "\n<script>" . $after[1] . '</script>';
	}

	return $tag;
  } else {
	return $tag;
  }
}
