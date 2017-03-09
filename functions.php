<?php



// =============================================================================

// Settings

// =============================================================================



// DO NOT MODIFY

define("THEME_SLUG", 'savoya'); 

define("THEME_NAME", 'savoya');



// Configs



// Paths



$theme_path 			= get_template_directory();

$framework_path 		= $theme_path . '/framework';





// Order Posts

function change_category_order( $query ) {
    if ( $query->is_category('5') && $query->is_main_query() ) {
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'change_category_order' );





// =============================================================================

// Framework Functions

// =============================================================================



require_once( $theme_path		 		. '/includes/kirki/kirki.php' );

require_once( $theme_path 				. '/functions/helpers.php' );

// require_once( $framework_path 				. '/functions/ajax-setup.php' );









// // =============================================================================

// // Theme Functions

// // =============================================================================



// // Body Classes

require_once( $theme_path 					. '/functions/body-classes.php' );







require_once( $theme_path 					. '/functions/custom_posts.php' );

require_once( $theme_path 					. '/functions/shortcodes.php' );
// require_once( $theme_path 					. '/functions/metaboxes.php' );



// // Customiser

// require_once( $theme_path 					. '/inc/customiser/customiser-backend.php' );

// require_once( $theme_path 					. '/inc/customiser/customiser.php' );



// // Theme Setup

require_once( $theme_path 					. '/functions/theme-setup.php' );



// // Enqueue Styles & Scripts

// //require_once( $theme_path 					. '/functions/enqueue-font-awesome.php' );

// require_once( $theme_path 					. '/functions/enqueue-default-fonts.php' );

require_once( $theme_path 					. '/functions/enqueue-google-fonts.php' );
require_once( $theme_path 					. '/functions/enqueue-custom-fonts.php' );

// require_once( $theme_path 					. '/functions/enqueue-theme-icon-fonts.php' );

require_once( $theme_path 					. '/functions/enqueue-styles.php' );

require_once( $theme_path 					. '/functions/enqueue-scripts.php' );


// from wanium test


require_once( $theme_path 					. '/includes/layouts.php' );
require_once( $theme_path 					. '/includes/menus.php' );



// // WP


// require_once( $theme_path 					. '/functions/wp/filters.php' );

// require_once( $theme_path 					. '/functions/wp/empty_menu_fallback.php' );

// require_once( $theme_path 					. '/functions/wp/post-meta.php' );

// //require_once( $theme_path 					. '/functions/wp/post-footer.php' );

// //require_once( $theme_path 					. '/functions/wp/post-navigation-single.php' );

// //require_once( $theme_path 					. '/functions/wp/post-navigation-archive.php' );

// require_once( $theme_path 					. '/functions/wp/comments.php' );

// require_once( $theme_path 					. '/functions/wp/archive-title.php' );

// require_once( $theme_path 					. '/functions/wp/single-share.php' );



// // WC

// require_once( $theme_path 					. '/functions/wc/actions.php' );

// require_once( $theme_path 					. '/functions/wc/filters.php' );

// require_once( $theme_path 					. '/functions/wc/add-to-cart-fragments.php' );

// require_once( $theme_path 					. '/functions/wc/single-product-share.php' );

// require_once( $theme_path 					. '/functions/wc/quick-view.php' );

// require_once( $theme_path 					. '/functions/wc/products-per-page.php' );



// // VC

// //require_once( $theme_path 					. '/functions/vc/init.php' );

// //require_once( $theme_path 					. '/functions/vc/filters.php' );

// //require_once( $theme_path 					. '/functions/vc/remove-frontend-links.php' );



// // Shortcodes

// //require_once( $theme_path 					. '/inc/shortcodes/shortcodes.php' );



// // Widgets Areas

require_once( $theme_path 					    . '/includes/widgets/widget-areas.php' );

require_once( $theme_path 					    . '/includes/metaboxes/metaboxes.php' );

require_once( $theme_path 					    . '/includes/metaboxes/metaboxes-slides.php' );



// // Meta Boxes

// //require_once( $theme_path 					. '/inc/metaboxes/page.php' );

// //require_once( $theme_path 					. '/inc/metaboxes/post.php' );



// // Ajax

// require_once( $theme_path 					. '/functions/wc/refresh-dynamic-contents.php' );



// // Addons

//require_once( $theme_path 					. '/includes/addons/photo-swipe.php' );







// =============================================================================

// Backend

// =============================================================================



//if ( is_admin() ) require_once( $theme_path . '/backend/index.php' );







//require get_template_directory() . '/inc/customizer.php';







// Include Kirki



	// require_once get_template_directory() . '/includes/include-kirki.php';



	// // Include Kirki Theme Class



	// require_once get_template_directory() . '/includes/wordpress-theme-kirki.php';



// Include Customizer Backend Options

require_once get_template_directory() . '/includes/customizer-backend.php';



require_once get_template_directory() . '/includes/customizer.php';







