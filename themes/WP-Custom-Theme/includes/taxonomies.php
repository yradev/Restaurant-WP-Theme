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
	return [
		'name'              => __( $name, 'ct' ),
		'singular_name'     => __( $name, 'ct' ),
		'search_items'      => __( 'Search ' . $names, 'ct' ),
		'all_items'         => __( 'All ' . $names, 'ct' ),
		'parent_item'       => __( 'Parent ' . $name, 'ct' ),
		'parent_item_colon' => __( 'Parent ' . $name . ':', 'ct' ),
		'edit_item'         => __( 'Edit ' . $name, 'ct' ),
		'update_item'       => __( 'Update ' . $name, 'ct' ),
		'add_new_item'      => __( 'Add New ' . $name, 'ct' ),
		'new_item_name'     => __( 'New ' . $name . ' Name', 'ct' ),
		'menu_name'         => __( $name, 'ct' ),
	];
 }