<?php 

/**
 * Force redirection to https
 */

//  add_action ( 'template_redirect' , 'ct_domain_redirect' , 999 );
//  function ct_domain_redirect() {
// 	if( ! is_ssl() || str_starts_with($_SERVER['HTTP_HOST'], 'www.')) {
// 		wp_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301);
// 		exit();
// 	}
//  }

/**
 * Add description to images if the image doesnt have description.
 */

 add_filter('wp_get_attachment_image_attributes' , 'ct_add_description_to_image' , 10 , 5);
	function ct_add_description_to_image( $attr ){
		if( empty( $attr['alt'] ) ) {
			$src_array = explode('/' , $attr['src']);
			$file_name = end($src_array);
			$base_name = explode( '.' , $file_name)[0];
			$alt_text = str_replace('-' , ' ', $base_name);

			$attr['alt'] = $alt_text;
		}

	return $attr;
 } 


/**
 * Add nofollow if the link is externel
 */
function ct_check_for_external_link( $href ) {
	if( ! str_contains($href, home_url()) && ! str_starts_with( $href , '#')) {
		echo 'rel="nofollow"';
	};
}