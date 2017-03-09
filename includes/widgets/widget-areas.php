<?php



/******************************************************************************/

/* Register Widget Areas ******************************************************/

/******************************************************************************/



if ( ! function_exists('savoya_theme_widgets_init') ) :

function savoya_theme_widgets_init() {

	

	register_sidebar( array(

		'name'          => __('Blog Sidebar', 'savoya'),

		'id'            => 'blog-widget-area',

		'description'   => '',

		'before_widget' => '<aside class="widget %2$s">',

		'after_widget'  => '</aside>',

		'before_title'  => '<h4 class="widget-title">',

		'after_title'   => '</h4>',

	) );



	register_sidebar( array(

		'name'          => __( 'Shop Sidebar', 'savoya' ),

		'id'            => 'shop-widget-area',

		'description'   => '',

		'before_widget' => '<aside class="widget %2$s">',

		'after_widget'  => '</aside>',

		'before_title'  => '<h4 class="widget-title">',

		'after_title'   => '</h4>',

	) );



	$sidebars_widgets = wp_get_sidebars_widgets();	

	$footer_area_widgets_counter = 0;	

	if (isset($sidebars_widgets['footer-widget-area'])) $footer_area_widgets_counter  = count($sidebars_widgets['footer-widget-area']);

	

	switch ($footer_area_widgets_counter) {

		case 0:

			$footer_area_widgets_columns ='large-12 columns';

			break;

		case 1:

			$footer_area_widgets_columns ='large-12 columns';

			break;

		case 2:

			$footer_area_widgets_columns ='medium-6';

			break;

		case 3:

			$footer_area_widgets_columns ='large-4';

			break;

		case 4:

			$footer_area_widgets_columns ='large-3';

			break;

		default:

			$footer_area_widgets_columns ='large-3';

	}



	$search_area_widgets_counter = 0;	

	if (isset($sidebars_widgets['search-widget-area'])) $search_area_widgets_counter  = count($sidebars_widgets['search-widget-area']);

	

	switch ($search_area_widgets_counter) {

		case 0:

			$search_area_widgets_columns ='large-12 columns';

			break;

		case 1:

			$search_area_widgets_columns ='large-12 columns';

			break;

		case 2:

			$search_area_widgets_columns ='medium-6';

			break;

		case 3:

			$search_area_widgets_columns ='large-4';

			break;

		case 4:

			$search_area_widgets_columns ='large-3';

			break;

		default:

			$search_area_widgets_columns ='large-3';

	}



	register_sidebar( array(

		'name'          => __( 'Footer Widget Area', 'savoya' ),

		'id'            => 'footer-widget-area',

		'description'   => '',

		'before_widget' => '<div class="' . $footer_area_widgets_columns . ' columns"><aside class="widget %2$s">',

		'after_widget'  => '</aside></div>',

		'before_title'  => '<h4 class="widget-title">',

		'after_title'   => '</h4>',

	) );



	// Search Widget Area

	register_sidebar( array(

		'name'          => __( 'Search Widget Area', 'savoya' ),

		'id'            => 'search-widget-area',

		'description'   => '',

		'before_widget' => '<div class="' . $search_area_widgets_columns . ' columns"><aside class="widget %2$s">',

		'after_widget'  => '</aside></div>',

		'before_title'  => '<h4 class="widget-title">',

		'after_title'   => '</h4>',

		)

	);





	// Header Widget Area

	register_sidebar( array(

		'name'          => __( 'Header Widget Area', 'savoya' ),

		'id'            => 'header-widget-area',

		'description'   => '',

		'before_widget' => '<div class="header-widget %2$s">',

		'after_widget'  => '</div>',

		'before_title'  => '<h4 class="widget-title">',

		'after_title'   => '</h4>',

		)

	);





	// Header Widget Area

	register_sidebar( array(

		'name'          => __( 'Header Top Bar Widget Area', 'savoya' ),

		'id'            => 'header_top_bar_widget_area',

		'description'   => '',

		'before_widget' => '<div class="header-top-bar-widget">',

		'after_widget'  => '</div>',

		'before_title'  => '',

		'after_title'   => '',

		)

	);



}

endif;

add_action( 'widgets_init', 'savoya_theme_widgets_init' );