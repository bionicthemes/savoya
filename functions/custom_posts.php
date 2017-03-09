<?php 





/*

* Creating a function to create our CPT

*/





// Our custom post type function

function create_posttype() {



	register_post_type( 'slides',

	// CPT Options

		array(

			'labels' => array(

				'name' => __( 'Slides' ),

				'singular_name' => __( 'Slide' )

			),

			'public' => true,

			'has_archive' => true,

			'rewrite' => array('slug' => 'slides'),

		)

	);





	register_post_type( 'products',

	// CPT Options

		array(

			'labels' => array(

				'name' => __( 'Products' ),

				'singular_name' => __( 'Product' )

			),

			'public' => true,

			'has_archive' => true,

			'rewrite' => array('slug' => 'products'),

		)

	);

}

// Hooking up our function to theme setup

add_action( 'init', 'create_posttype' );





function slider_post_type() {



// Set UI labels for Custom Post Type

	$labels = array(

		'name'                => _x( 'Slides', 'Post Type General Name', 'savoya' ),

		'singular_name'       => _x( 'Slide', 'Post Type Singular Name', 'savoya' ),

		'menu_name'           => __( 'Slides', 'savoya' ),

		'parent_item_colon'   => __( 'Parent Slide', 'savoya' ),

		'all_items'           => __( 'All Slides', 'savoya' ),

		'view_item'           => __( 'View Slide', 'savoya' ),

		'add_new_item'        => __( 'Add New Slide', 'savoya' ),

		'add_new'             => __( 'Add New', 'savoya' ),

		'edit_item'           => __( 'Edit Slide', 'savoya' ),

		'update_item'         => __( 'Update Slide', 'savoya' ),

		'search_items'        => __( 'Search Slide', 'savoya' ),

		'not_found'           => __( 'Not Found', 'savoya' ),

		'not_found_in_trash'  => __( 'Not found in Trash', 'savoya' ),

	);

	

// Set other options for Custom Post Type

	

	$args = array(

		'label'               => __( 'slides', 'savoya' ),

		'description'         => __( 'Slides', 'savoya' ),

		'labels'              => $labels,

		// Features this CPT supports in Post Editor

		'supports'            => array( 'title', 'excerpt', 'thumbnail'),

		'hierarchical'        => false,

		'public'              => true,

		'show_ui'             => true,

		'show_in_menu'        => false,

		'show_in_nav_menus'   => false,

		'show_in_admin_bar'   => false,

		'menu_position'       => 5,

		'can_export'          => false,

		'has_archive'         => false,

		'exclude_from_search' => true,

		'publicly_queryable'  => true,

		'capability_type'     => 'page',

	);

	

	// Registering your Custom Post Type

	register_post_type( 'slides', $args );


}



add_action( 'init', 'slider_post_type', 0 );



function products_post_type() {



// Set UI labels for Custom Post Type

	$labels = array(

		'name'                => _x( 'Products', 'Post Type General Name', 'savoya' ),

		'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'savoya' ),

		'menu_name'           => __( 'Products', 'savoya' ),

		'parent_item_colon'   => __( 'Parent Products', 'savoya' ),

		'all_items'           => __( 'All Products', 'savoya' ),

		'view_item'           => __( 'View Products', 'savoya' ),

		'add_new_item'        => __( 'Add New Product', 'savoya' ),

		'add_new'             => __( 'Add New Product', 'savoya' ),

		'edit_item'           => __( 'Edit Product', 'savoya' ),

		'update_item'         => __( 'Update Product', 'savoya' ),

		'search_items'        => __( 'Search Product', 'savoya' ),

		'not_found'           => __( 'Not Found', 'savoya' ),

		'not_found_in_trash'  => __( 'Not found in Trash', 'savoya' ),

	);

	

// Set other options for Custom Post Type

	

	$args = array(

		'label'               => __( 'products', 'savoya' ),

		'description'         => __( 'products', 'savoya' ),

		'labels'              => $labels,

		// Features this CPT supports in Post Editor

		'supports'            => array( 'title', 'excerpt', 'thumbnail'),

		'hierarchical'        => false,

		'public'              => true,

		'show_ui'             => true,

		'show_in_menu'        => true,

		'show_in_nav_menus'   => true,

		'show_in_admin_bar'   => true,

		'menu_position'       => 5,

		'can_export'          => false,

		'has_archive'         => true,

		'exclude_from_search' => true,

		'publicly_queryable'  => true,

		'capability_type'     => 'page',

	);

	

	// Registering your Custom Post Type

	register_post_type( 'products', $args );




  	register_taxonomy( 'categories', array('products'), array(
        'hierarchical' => true, 
        'label' => 'Categories', 
        'singular_label' => 'Category', 
        'rewrite' => array( 'slug' => 'categories', 'with_front'=> false )
        )
    );

    register_taxonomy_for_object_type( 'categories', 'products' ); // Better be safe than so



}



/* Hook into the 'init' action so that the function

* Containing our post type registration is not 

* unnecessarily executed. 

*/



add_action( 'init', 'products_post_type', 0 );