<?php

/*
* Register taxonomy
*/
add_action( 'init', 'ct_register_taxonomies', 0 );
function ct_register_taxonomies() {
	register_taxonomy(
		'ct_item_category', 
		['ct_item'],
		[
			'label' => __('Category', 'ct'),
			'hierarchical'      => true,
			'labels' => ct_get_category_labels( 'Category', 'Categories' ),
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'item_category' ),
		],
		
	);
}


/**
 * Get taxonomy args
 */

 function ct_get_category_labels( $name , $names ) {
	$labels = [
		'name'              => ct__( $name, 'ct' ),
		'singular_name'     => ct__( $name, 'ct' ),
		'search_items'      => ct__( 'Search ' . $names, 'ct' ),
		'all_items'         => ct__( 'All ' . $names, 'ct' ),
		'parent_item'       => ct__( 'Parent ' . $name, 'ct' ),
		'parent_item_colon' => ct__( 'Parent ' . $name . ':', 'ct' ),
		'edit_item'         => ct__( 'Edit ' . $name, 'ct' ),
		'update_item'       => ct__( 'Update ' . $name, 'ct' ),
		'add_new_item'      => ct__( 'Add New ' . $name, 'ct' ),
		'new_item_name'     => ct__( 'New ' . $name . ' Name', 'ct' ),
		'menu_name'         => ct__( $name, 'ct' ),
	];

	// Register for backend translate
	if( function_exists( 'pll_register_string' ) ) {
		foreach( $labels as $key => $value ) {
			pll_register_string($key, $value, 'ct');
		}
	}

    return $labels;
 }