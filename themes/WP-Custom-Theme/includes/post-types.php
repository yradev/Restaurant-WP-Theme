<?php

/** Create post types */
add_action( 'init', 'create_post_type', 0 );
function create_post_type() {
    register_post_type( 
        'ct_item',
        [
            'labels' => ct_get_posttype_labels( 'Item' , 'Items'),
            'public' => true,
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

    register_post_type( 
        'ct_feedback',
        [
            'labels' => ct_get_posttype_labels( 'Feedback' , 'Feedbacks'),
            'public' => true,
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
		'name'                => ct__( 'Name', $name),
        'singular_name'       => ct__( 'Singular name', $name ),
        'menu_name'           => ct__( 'Menu name', $name ),
        'all_items'           => ct__( 'All items', 'All ' . $names ),
        'view_item'           => ct__( 'View item', 'View ' . $name),
        'add_new_item'        => ct__( 'Add new Item', 'Add New ' . $name),
        'add_new'             => ct__( 'Add new' , 'Add New', ),
        'edit_item'           => ct__( 'Edit item', 'Edit ' . $name),
        'update_item'         => ct__( 'Update item', 'Update ' . $name ),
        'search_items'        => ct__( 'Search items', 'Search ' . $name ),
		'new_item'            => ct__( 'New item', 'New ' . $name ),
        'not_found'           => ct__( 'Not found', 'Not Found' ),
        'not_found_in_trash'  => ct__( 'Not found in trash', 'Not found in Trash' )
	];
 }