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
}


/**
 * Get posttype args
 */

 function ct_get_posttype_labels( $name , $names ) {
	$labels = [
		'name'                => ct__( $name , 'ct' ),
        'singular_name'       => ct__( $name, 'ct' ),
        'menu_name'           => ct__( $name, 'ct' ),
        'all_items'           => ct__( 'All ' . $names, 'ct' ),
        'view_item'           => ct__( 'View' . $name, 'ct' ),
        'add_new_item'        => ct__( 'Add New ' . $name, 'ct' ),
        'add_new'             => ct__( 'Add New', 'ct' ),
        'edit_item'           => ct__( 'Edit' . $name, 'ct' ),
        'update_item'         => ct__( 'Update' . $name, 'ct' ),
        'search_items'        => ct__( 'Search' . $name, 'ct' ),
		'new_item'            => ct__( 'New' . $name, 'ct' ),
        'not_found'           => ct__( 'Not Found', 'ct' ),
        'not_found_in_trash'  => ct__( 'Not found in Trash', 'ct' )
	];
    
    // Register for backend translate
    if( function_exists( 'pll_register_string' ) ) {
        foreach( $labels as $key => $value ) {
            pll_register_string($key, $value, 'ct');
        }
    }

    return $labels;
 }