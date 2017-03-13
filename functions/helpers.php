<?php



// -----------------------------------------------------------------------------

// Define Constants

// -----------------------------------------------------------------------------



define( 'savoya_WOOCOMMERCE_IS_ACTIVE', 	class_exists( 	'WooCommerce' ) );

define( 'savoya_VISUAL_COMPOSER_IS_ACTIVE', defined( 		'WPB_VC_VERSION' ) );

define( 'savoya_REV_SLIDER_IS_ACTIVE', 		class_exists( 	'RevSlider' ) );

define( 'savoya_WPML_IS_ACTIVE', 			defined( 		'ICL_SITEPRESS_VERSION' ) );





// -----------------------------------------------------------------------------

// String to Slug

// -----------------------------------------------------------------------------



if ( ! function_exists( 'savoya_string_to_slug' ) ) :

function savoya_string_to_slug($str) {

	$str = strtolower(trim($str));

	$str = preg_replace('/[^a-z0-9-]/', '_', $str);

	$str = preg_replace('/-+/', "_", $str);

	return $str;

}

endif;





// -----------------------------------------------------------------------------

// Theme Name

// -----------------------------------------------------------------------------



if ( ! function_exists( 'savoya_theme_name' ) ) :

function savoya_theme_name() {

	$savoya_theme = wp_get_theme();

	return $savoya_theme->get('Name');

}

endif;





// -----------------------------------------------------------------------------

// Theme Slug

// -----------------------------------------------------------------------------



if ( ! function_exists( 'savoya_theme_slug' ) ) :

function savoya_theme_slug() {

	$savoya_theme = wp_get_theme();

	return savoya_string_to_slug( $savoya_theme->get('Name') );

}

endif;





// -----------------------------------------------------------------------------

// Theme Author

// -----------------------------------------------------------------------------



if ( ! function_exists( 'savoya_theme_author' ) ) :

function savoya_theme_author() {

	$savoya_theme = wp_get_theme();

	return $savoya_theme->get('Author');

}

endif;





// -----------------------------------------------------------------------------

// Theme Description

// -----------------------------------------------------------------------------



if ( ! function_exists( 'savoya_theme_description' ) ) :

function savoya_theme_description() {

	$savoya_theme = wp_get_theme();

	return $savoya_theme->get('Description');

}

endif;





// -----------------------------------------------------------------------------

// Theme Version

// -----------------------------------------------------------------------------



if ( ! function_exists( 'savoya_theme_version' ) ) :

function savoya_theme_version() {

	$savoya_theme = wp_get_theme();

	return $savoya_theme->get('Version');

}

endif;





// -----------------------------------------------------------------------------

// Convert hex to rgb

// -----------------------------------------------------------------------------


function savoya_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   // return $rgb; // returns an array with the rgb values
}



// -----------------------------------------------------------------------------

// Page ID

// -----------------------------------------------------------------------------



function savoya_page_id() {	

	$page_id = "";

	if ( is_single() || is_page() ) {

	    $page_id = get_the_ID();

	} else if ( is_home() ) {

	    $page_id = get_option('page_for_posts');

	}

	return $page_id;

}



// -----------------------------------------------------------------------------

// Get SVG

// -----------------------------------------------------------------------------



function savoya_svg_get_contents ($url) {



	$url_get_contents_data = false;



	$response = wp_remote_get($url);

	

	if ( ! is_wp_error($response) )

	{

		$url_get_contents_data = $response['body'];

	}



	if (function_exists('file_get_contents') && ($url_get_contents_data == false))

    {

        $url_get_contents_data = file_get_contents($url);

    }



    if (function_exists('fopen') && function_exists('stream_get_contents') && ($url_get_contents_data == false))

    {

        $handle = fopen ($url, "r");

        $url_get_contents_data = stream_get_contents($handle);

    }



	return $url_get_contents_data;

} 





function show_transparent_logo() {



	if (  $custom_header_transparent  == 1 ) {


		echo $custom_header_logo_light;

	}



}

