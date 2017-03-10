<?php



// =============================================================================

// Settings

// =============================================================================



// DO NOT MODIFY

define("THEME_SLUG", 'savoya'); 
define("THEME_NAME", 'savoya');


// Paths

define( 'SAVOYA_THEME_PATH', trailingslashit( get_template_directory() ) );
define( 'SAVOYA_THEME_DIRECTORY', trailingslashit( get_template_directory_uri() ) );




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



require_once( SAVOYA_THEME_PATH		 		. '/includes/kirki/kirki.php' );

require_once( SAVOYA_THEME_PATH 				. '/functions/helpers.php' );

// require_once( $framework_path 				. '/functions/ajax-setup.php' );









// // =============================================================================

// // Theme Functions

// // =============================================================================



// // Body Classes

require_once( SAVOYA_THEME_PATH 					. '/functions/body-classes.php' );







require_once( SAVOYA_THEME_PATH 					. '/functions/custom_posts.php' );

require_once( SAVOYA_THEME_PATH 					. '/functions/shortcodes.php' );
// require_once( SAVOYA_THEME_PATH 					. '/functions/metaboxes.php' );



// // Customiser

// require_once( SAVOYA_THEME_PATH 					. '/inc/customiser/customiser-backend.php' );

// require_once( SAVOYA_THEME_PATH 					. '/inc/customiser/customiser.php' );



// // Theme Setup

require_once( SAVOYA_THEME_PATH 					. '/functions/theme-setup.php' );



// // Enqueue Styles & Scripts

// //require_once( SAVOYA_THEME_PATH 					. '/functions/enqueue-font-awesome.php' );

// require_once( SAVOYA_THEME_PATH 					. '/functions/enqueue-default-fonts.php' );

require_once( SAVOYA_THEME_PATH 					. '/functions/enqueue-google-fonts.php' );
require_once( SAVOYA_THEME_PATH 					. '/functions/enqueue-custom-fonts.php' );

// require_once( SAVOYA_THEME_PATH 					. '/functions/enqueue-theme-icon-fonts.php' );

require_once( SAVOYA_THEME_PATH 					. '/functions/enqueue-styles.php' );

require_once( SAVOYA_THEME_PATH 					. '/functions/enqueue-scripts.php' );


// from wanium test


require_once( SAVOYA_THEME_PATH 					. '/includes/layouts.php' );
require_once( SAVOYA_THEME_PATH 					. '/includes/menus.php' );



// // WP


// require_once( SAVOYA_THEME_PATH 					. '/functions/wp/filters.php' );

// require_once( SAVOYA_THEME_PATH 					. '/functions/wp/empty_menu_fallback.php' );

// require_once( SAVOYA_THEME_PATH 					. '/functions/wp/post-meta.php' );

// //require_once( SAVOYA_THEME_PATH 					. '/functions/wp/post-footer.php' );

// //require_once( SAVOYA_THEME_PATH 					. '/functions/wp/post-navigation-single.php' );

// //require_once( SAVOYA_THEME_PATH 					. '/functions/wp/post-navigation-archive.php' );

// require_once( SAVOYA_THEME_PATH 					. '/functions/wp/comments.php' );

// require_once( SAVOYA_THEME_PATH 					. '/functions/wp/archive-title.php' );

// require_once( SAVOYA_THEME_PATH 					. '/functions/wp/single-share.php' );



// // WC

// require_once( SAVOYA_THEME_PATH 					. '/functions/wc/actions.php' );

// require_once( SAVOYA_THEME_PATH 					. '/functions/wc/filters.php' );

// require_once( SAVOYA_THEME_PATH 					. '/functions/wc/add-to-cart-fragments.php' );

// require_once( SAVOYA_THEME_PATH 					. '/functions/wc/single-product-share.php' );

// require_once( SAVOYA_THEME_PATH 					. '/functions/wc/quick-view.php' );

// require_once( SAVOYA_THEME_PATH 					. '/functions/wc/products-per-page.php' );



// // VC

// //require_once( SAVOYA_THEME_PATH 					. '/functions/vc/init.php' );

// //require_once( SAVOYA_THEME_PATH 					. '/functions/vc/filters.php' );

// //require_once( SAVOYA_THEME_PATH 					. '/functions/vc/remove-frontend-links.php' );



// // Shortcodes

// //require_once( SAVOYA_THEME_PATH 					. '/inc/shortcodes/shortcodes.php' );



// // Widgets Areas

require_once( SAVOYA_THEME_PATH 					    . '/includes/widgets/widget-areas.php' );

require_once( SAVOYA_THEME_PATH 					    . '/includes/metaboxes/metaboxes.php' );

require_once( SAVOYA_THEME_PATH 					    . '/includes/metaboxes/metaboxes-slides.php' );



// // Meta Boxes

// //require_once( SAVOYA_THEME_PATH 					. '/inc/metaboxes/page.php' );

// //require_once( SAVOYA_THEME_PATH 					. '/inc/metaboxes/post.php' );



// // Ajax

// require_once( SAVOYA_THEME_PATH 					. '/functions/wc/refresh-dynamic-contents.php' );



// // Addons

//require_once( SAVOYA_THEME_PATH 					. '/includes/addons/photo-swipe.php' );







// =============================================================================

// Backend

// =============================================================================



//if ( is_admin() ) require_once( SAVOYA_THEME_PATH . '/backend/index.php' );







//require get_template_directory() . '/inc/customizer.php';







// Include Kirki



	// require_once get_template_directory() . '/includes/include-kirki.php';



	// // Include Kirki Theme Class



	// require_once get_template_directory() . '/includes/wordpress-theme-kirki.php';



// Include Customizer Backend Options

require_once get_template_directory() . '/includes/customizer-backend.php';



require_once get_template_directory() . '/includes/customizer.php';







