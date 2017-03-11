<?php



// =============================================================================

// Enqueue Scripts

// =============================================================================



if ( ! function_exists('savoya_scripts') ) :

function savoya_scripts() {	



	wp_enqueue_script('modernizr-custom', get_template_directory_uri() . '/js/modernizr.custom.js', array('jquery'), '1.0', TRUE);
	wp_enqueue_script('jquery-mm-menu', get_template_directory_uri() . '/js/jquery.mmenu.all.min.js', array('jquery'), '1.0', TRUE);
	wp_enqueue_script('admin', get_template_directory_uri() . '/js/admin.js', array('jquery'), '1.0', TRUE);
	wp_enqueue_script('savoya-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', TRUE);


	// Send wp variables to js

	// $wp_js_vars = array(

		

	// 	'ajax_load_more_locale' 	=> __( 'Load More Items', 'savoya' ),

	// 	'ajax_loading_locale' 		=> __( 'Loading', 'savoya' ),

	// 	'ajax_no_more_items_locale' => __( 'No more items available.', 'savoya' ),



	// 	'blog_pagination_type' 		=> savoya_theme_option( 'blog_pagination', 'infinite_scroll' ),



	// 	'shop_pagination_type' 		=> savoya_theme_option( 'shop_pagination', 'infinite_scroll' ),



	// );

	

	// if (is_singular() && comments_open() && get_option( 'thread_comments')) {

	// 	wp_enqueue_script('comment-reply');

	// }

}


if( !function_exists('savoya_admin_load_scripts') ) {
	function savoya_admin_load_scripts() {
		// # FONT - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -		
		// wp_enqueue_style( 'wanium-fonts', WANIUM_THEME_DIRECTORY . 'assets/css/fonts.css' );
		// # CSS - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -		
		wp_enqueue_style( 'savoya-admin-css', SAVOYA_THEME_DIRECTORY . 'css/admin.css' );
		// $custom_css = '';
		// if( 'no' == get_option( 'wanium_enable_portfolio', 'yes' ) ) {
		// 	$custom_css .= '#menu-posts-portfolio,[data-element="tlg_portfolio"]{display:none!important;}';
		// }
		// if( 'no' == get_option( 'wanium_enable_team', 'yes' ) ) {
		// 	$custom_css .= '#menu-posts-team,[data-element="tlg_team"]{display:none!important;}';
		// }
		// if( 'no' == get_option( 'wanium_enable_client', 'yes' ) ) {
		// 	$custom_css .= '#menu-posts-client,[data-element="tlg_clients"]{display:none!important;}';
		// }
		// if( 'no' == get_option( 'wanium_enable_testimonial', 'yes' ) ) {
		// 	$custom_css .= '#menu-posts-testimonial,[data-element="tlg_testimonial"]{display:none!important;}';
		// }
		// if( $custom_css ) {
		// 	wp_add_inline_style( 'wanium-admin-css', $custom_css );
		// }
		# JS - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -		
		wp_enqueue_script( 'savoya-admin-js', SAVOYA_THEME_DIRECTORY . 'js/admin.js', array('jquery'), false, true );
	}
	add_action( 'admin_enqueue_scripts', 'savoya_admin_load_scripts', 200 );
}








add_action( 'wp_enqueue_scripts', 'savoya_scripts' );

endif;