<?php

/** Create post types */
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 
        'ct_item',
        [
            'labels' => ct_get_posttype_labels( 'Item' , 'Items'),
            'public' => false,
            'exclude_from_search' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'items'),
            'show_in_rest' => false,
            'show_ui'           => true,
			'menu_icon' => 'dashicons-category',
            'supports' => [ 'title', 'excerpt', 'thumbnail', 'editor' ],
            'taxonomies'  => ['ct_item_category']
        ]
    );
}


/**
 * Get posttype args
 */

 function ct_get_posttype_labels( $name , $names ) {
	return [
		'name'                => __( $name , 'ct' ),
        'singular_name'       => __( $name, 'ct' ),
        'menu_name'           => __( $name, 'ct' ),
        'all_items'           => __( 'All ' . $names, 'ct' ),
        'view_item'           => __( 'View' . $name, 'ct' ),
        'add_new_item'        => __( 'Add New ' . $name, 'ct' ),
        'add_new'             => __( 'Add New', 'ct' ),
        'edit_item'           => __( 'Edit' . $name, 'ct' ),
        'update_item'         => __( 'Update' . $name, 'ct' ),
        'search_items'        => __( 'Search' . $name, 'ct' ),
		'new_item'            => __( 'New' . $name, 'ct' ),
        'not_found'           => __( 'Not Found', 'ct' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'ct' )
	];
 }