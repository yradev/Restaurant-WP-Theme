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
		'name'              => ct__( 'Name', $name ),
		'singular_name'     => ct__( 'Singular name', $name ),
		'search_items'      => ct__( 'Search items', 'Search ' . $names ),
		'all_items'         => ct__( 'All items', 'All ' . $names ),
		'parent_item'       => ct__( 'Parent item', 'Parent ' . $name ),
		'parent_item_colon' => ct__( 'Parent item colon', 'Parent ' . $name . ':' ),
		'edit_item'         => ct__( 'Edit item', 'Edit ' . $name ),
		'update_item'       => ct__( 'Update item', 'Update ' . $name ),
		'add_new_item'      => ct__( 'Add new item', 'Add New ' . $name ),
		'new_item_name'     => ct__( 'New item name', 'New ' . $name . ' Name', ),
		'menu_name'         => ct__( 'Menu name', $name ),
	];
 }