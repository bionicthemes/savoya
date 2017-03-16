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



/**
	THE PAGE TITLE
**/
if( !function_exists( 'savoya_get_the_page_title' ) ) {
	function savoya_get_the_page_title( $args = array() ) {
		$output = $title = $subtitle = $image = $background = $size = $layout = false;
		extract( $args );
		$layout = $layout ? $layout : 'center';
		switch ( $layout ) {
			case 'center': $background = false; $image = false; $layout = 'center'; break;
			case 'center-large': $background = false; $image = false; $size = 'large'; $layout = 'center'; break;
			case 'center-bg': $background = 'image-bg overlay'; $layout = 'center'; break;
			case 'center-bg-large': $background = 'image-bg overlay'; $size = 'large'; $layout = 'center'; break;
			case 'center-parallax': $background = 'image-bg overlay parallax'; $layout = 'center'; break;
			case 'center-parallax-large': $background = 'image-bg overlay parallax'; $size = 'large'; $layout = 'center'; break;
			case 'left': $background = false; $image = false; $layout = 'left'; break;
			case 'left-large': $background = false; $image = false; $size = 'large'; $layout = 'left'; break;
			case 'left-bg': $background = 'image-bg overlay'; $layout = 'left'; break;
			case 'left-bg-large': $background = 'image-bg overlay'; $size = 'large'; $layout = 'left'; break;
			case 'left-parallax': $background = 'image-bg overlay parallax'; $layout = 'left'; break;
			case 'left-parallax-large': $background = 'image-bg overlay parallax'; $size = 'large'; $layout = 'left'; break;
			default: break;
		}
		if ( 'center' == $layout ) {
			$output = '<section class="page-title page-title-'.( 'large' == $size ? 'large-center' : 'center'  ).' '. esc_attr($background) .'">'.
							($image ? '<div class="background-content">'. $image .'</div>' : '').'
							<div class="container"><div class="row"><div class="col-sm-12 text-center">
					        	<h2 class="heading-title mb0">'. $title .'</h2>
					        	<p class="lead fade-color mb0">'. $subtitle .'</p>
							</div></div></div>'. savoya_breadcrumbs() .'</section>';
		} elseif ( 'left' == $layout ) {
			$output = '<section class="page-title page-title-'.( 'large' == $size ? 'large' : 'basic'  ).' '. esc_attr($background) .'">'.
							($image ? '<div class="background-content">'. $image .'</div>' : '').'
							<div class="container"><div class="row">
								<div class="col-md-6">
					        		<h2 class="heading-title mb0">'. $title .'</h2>
					        		<p class="lead fade-color mb0">'. $subtitle .'</p>
								</div>
								<div class="col-md-6 text-right pt8">'. savoya_breadcrumbs() .'</div>
							</div></div></section>';
		}
		return $output;
	}
}






if( !function_exists('savoya_register_required_plugins') ) {
	function savoya_register_required_plugins() {
		$plugins = array(
			array( 
				'name' => esc_html__( 'TLG Framework', 'savoya' ), // The plugin name.
				'slug' => 'tlg_framework', // The plugin slug.
				'source' => get_template_directory() . '/plugins/tlg_framework.zip', // The plugin source.
				'required' => true, // If false, the plugin is only 'recommended' instead of required.
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'version' => '2.0.1', // If set, the active plugin must be this version or higher.
			),
			array( 
				'name' => esc_html__( 'Visual Composer', 'savoya' ), // The plugin name.
				'slug' => 'js_composer', // The plugin slug.
				'source' => get_template_directory() . '/plugins/js_composer.zip', // The plugin source.
				'required' => true, // If false, the plugin is only 'recommended' instead of required.
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'version' => '5.0.1', // If set, the active plugin must be this version or higher.
			),
			// Plugins from the WordPress Repository
			array( 
				'name' => esc_html__( 'Contact Form 7', 'savoya' ), 
				'slug' => 'contact-form-7', 
				'required' => false,
				'force_activation' => false,
				'force_deactivation' => false,
			),
			array( 
				'name' => esc_html__( 'WooCommerce', 'savoya' ), 
				'slug' => 'woocommerce', 
				'required' => false,
				'force_activation' => false,
				'force_deactivation' => false,
			),
		);
		tgmpa( $plugins, array( 'is_automatic' => true ) );
	}
	add_action( 'tgmpa_register', 'savoya_register_required_plugins' );
}

/**
	CHECK IF PLUGINS IS ACTIVATED
**/
if( !function_exists( 'savoya_is_plugin_active' ) ) {
	function savoya_is_plugin_active( $plugin ) {
		include_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		$activated = is_plugin_active( $plugin );
	    if( ! $activated ) {
	    	$activated = is_plugin_active_for_network( $plugin );
	    }
	    return $activated;
	}
}
	

/**
	THE PAGE TITLE
**/
if( !function_exists( 'savoya_get_the_page_title' ) ) {
	function savoya_get_the_page_title( $args = array() ) {
		$output = $title = $subtitle = $image = $background = $size = $layout = false;
		extract( $args );
		$layout = $layout ? $layout : 'center';
		switch ( $layout ) {
			case 'center': $background = false; $image = false; $layout = 'center'; break;
			case 'center-large': $background = false; $image = false; $size = 'large'; $layout = 'center'; break;
			case 'center-bg': $background = 'image-bg overlay'; $layout = 'center'; break;
			case 'center-bg-large': $background = 'image-bg overlay'; $size = 'large'; $layout = 'center'; break;
			case 'center-parallax': $background = 'image-bg overlay parallax'; $layout = 'center'; break;
			case 'center-parallax-large': $background = 'image-bg overlay parallax'; $size = 'large'; $layout = 'center'; break;
			case 'left': $background = false; $image = false; $layout = 'left'; break;
			case 'left-large': $background = false; $image = false; $size = 'large'; $layout = 'left'; break;
			case 'left-bg': $background = 'image-bg overlay'; $layout = 'left'; break;
			case 'left-bg-large': $background = 'image-bg overlay'; $size = 'large'; $layout = 'left'; break;
			case 'left-parallax': $background = 'image-bg overlay parallax'; $layout = 'left'; break;
			case 'left-parallax-large': $background = 'image-bg overlay parallax'; $size = 'large'; $layout = 'left'; break;
			default: break;
		}
		if ( 'center' == $layout ) {
			$output = '<section class="page-title page-title-'.( 'large' == $size ? 'large-center' : 'center'  ).' '. esc_attr($background) .'">'.
							($image ? '<div class="background-content">'. $image .'</div>' : '').'
							<div class="container"><div class="row"><div class="col-sm-12 text-center">
					        	<h2 class="heading-title mb0">'. $title .'</h2>
					        	<p class="lead fade-color mb0">'. $subtitle .'</p>
							</div></div></div>'. savoya_breadcrumbs() .'</section>';
		} elseif ( 'left' == $layout ) {
			$output = '<section class="page-title page-title-'.( 'large' == $size ? 'large' : 'basic'  ).' '. esc_attr($background) .'">'.
							($image ? '<div class="background-content">'. $image .'</div>' : '').'
							<div class="container"><div class="row">
								<div class="col-md-6">
					        		<h2 class="heading-title mb0">'. $title .'</h2>
					        		<p class="lead fade-color mb0">'. $subtitle .'</p>
								</div>
								<div class="col-md-6 text-right pt8">'. savoya_breadcrumbs() .'</div>
							</div></div></section>';
		}
		return $output;
	}
}


/**
	GET BODY LAYOUT
**/
if( !function_exists('savoya_get_body_layout') ) {
	function savoya_get_body_layout() {
		global $post;
		$layout = isset( $_GET['layout'] ) ? $_GET['layout'] : false;
		if( $layout ) {
			if( 'boxed' ==  $layout || 'boxed-layout' ==  $layout ) $layout = 'boxed-layout';
			elseif( 'border' ==  $layout || 'frame-layout' ==  $layout ) $layout = 'frame-layout';
			else $layout = 'normal-layout';
		} else {
			$layout = isset( $post->ID ) ? get_post_meta( $post->ID, '_tlg_layout_override', 1 ) : false;
			if( ! $layout || 'default' == $layout ) {
				$layout = get_option( 'savoya_site_layout', 'normal-layout' );
			}
		}
		return $layout;
	}
}

/**
	GET HEADER LAYOUT
**/
if( !function_exists('savoya_get_header_layout') ) {
	function savoya_get_header_layout() {
		global $post;
		$default_header = get_option( 'savoya_header_layout', 'standard' );
		$header = isset ($_GET['nav'] ) ? $_GET['nav'] : false;
		if( $header ) {
			return $header;
		}
		if( class_exists('Woocommerce') ) {
			if( is_shop() || is_product_category() || is_product_tag() ) {
				$shop_header = get_option( 'savoya_shop_menu_layout', 'default' );
				if( $shop_header && 'default' != $shop_header ) {
					return $shop_header;
				}
			}
		}
		if( is_home() || is_archive() || is_search() || ! isset( $post->ID ) ) {
			return $default_header;
		}
		$header = isset( $post->ID ) ? get_post_meta( $post->ID, '_tlg_header_override', 1 ) : false;
		if( ! $header || 'default' == $header ) {
			$header = $default_header;
		}
		return $header;	
	}
}

/**
	GET FOOTER LAYOUT
**/
if( !function_exists('savoya_get_footer_layout') ) {
	function savoya_get_footer_layout() {
		global $post;
		if( ! isset( $post->ID ) ) {
			return get_option( 'savoya_footer_layout', 'standard' );
		}
		$footer = isset( $post->ID ) ? get_post_meta( $post->ID, '_tlg_footer_override', 1 ) : false;
		if( ! $footer || 'default' == $footer ) {
			$footer = get_option( 'savoya_footer_layout', 'standard' );
		}
		return $footer;	
	}
}

/**
	GET SINGLE SIDEBAR LAYOUT
**/
if( !function_exists('savoya_get_single_sidebar_layout') ) {
	function savoya_get_single_sidebar_layout() {
		global $post;
		$sidebar = isset ($_GET['sb'] ) ? $_GET['sb'] : false;
		if( $sidebar ) return $sidebar;

		if( ! isset( $post->ID ) ) {
			return get_option( 'savoya_post_layout', 'sidebar-none' );
		}
		$sidebar = isset( $post->ID ) ? get_post_meta( $post->ID, '_tlg_single_sidebar_override', 1 ) : false;
		if( ! $sidebar || 'default' == $sidebar ) {
			$sidebar = get_option( 'savoya_post_layout', 'sidebar-none' );
		}
		return $sidebar;	
	}
}

/**
	GET POSTS CATEGORY
**/
if( !function_exists('savoya_get_posts_category') ) {
	function savoya_get_posts_category( $taxonomy = 'category' ) {
		$cats = array( esc_html__( 'Show all categories', 'savoya' ) => 'all' );
		$post_cats = get_categories( array( 'orderby' => 'name', 'hide_empty' => 0, 'hierarchical' => 1, 'taxonomy' => $taxonomy ) );
		if( is_array( $post_cats ) && count( $post_cats ) ) {
			foreach( $post_cats as $cat ) {
				if ( isset( $cat->name ) && isset( $cat->term_id ) ) {
					$cats[$cat->name] = $cat->term_id;
				}
			}
		}
		return $cats;
	}
}

/**
	GET FONTS SETTING
**/
if( !function_exists('savoya_get_logo') ) {
	function savoya_get_logo() {
		global $post;
		$logo = get_option('savoya_custom_logo', savoya_THEME_DIRECTORY . 'assets/img/logo-dark.png');
		if( isset( $post->ID ) && get_post_meta( $post->ID, '_tlg_logo', true ) ) {
		    $logo = get_post_meta( $post->ID, '_tlg_logo', true );
		}
		$logo_light = get_option('savoya_custom_logo_light', savoya_THEME_DIRECTORY . 'assets/img/logo-light.png');
		if( isset( $post->ID ) && get_post_meta( $post->ID, '_tlg_logo_light', true ) ) {
		    $logo_light = get_post_meta( $post->ID, '_tlg_logo_light', true );
		}
		$site_logo = get_option( 'savoya_site_logo', 'image' ); 
        $logo_text = get_option( 'savoya_logo_text', '' );
		return array(
			'logo' 			=> $logo,
			'logo_light' 	=> $logo_light,
			'site_logo' 	=> $site_logo,
			'logo_text' 	=> $logo_text,
		);
	}
}
/**
	GET FONTS SETTING
**/
if( !function_exists('savoya_get_fonts') ) {
	function savoya_get_fonts() {
		global $post;
		$body_font 		= savoya_parsing_fonts( get_option('savoya_font'), 'Roboto', 400 );
		if( isset( $post->ID ) && get_post_meta( $post->ID, '_tlg_font_override', true ) ) {
		    $body_font = savoya_parsing_fonts( get_post_meta( $post->ID, '_tlg_font_override', true ), 'Roboto', 400 );
		}
		$heading_font 	= savoya_parsing_fonts( get_option('savoya_header_font'), 'Montserrat', 500 );
		if( isset( $post->ID ) && get_post_meta( $post->ID, '_tlg_header_font_override', true ) ) {
		    $heading_font = savoya_parsing_fonts( get_post_meta( $post->ID, '_tlg_header_font_override', true ), 'Montserrat', 500 );
		}
		$subtitle_font 	= savoya_parsing_fonts( get_option('savoya_subtitle_font'), 'Poppins', 400 );
		if( isset( $post->ID ) && get_post_meta( $post->ID, '_tlg_subtitle_font_override', true ) ) {
		    $subtitle_font = savoya_parsing_fonts( get_post_meta( $post->ID, '_tlg_subtitle_font_override', true ), 'Poppins', 400 );
		}
		$menu_font 		= savoya_parsing_fonts( get_option('savoya_menu_font'), 'Poppins', 400 );
		if( isset( $post->ID ) && get_post_meta( $post->ID, '_tlg_menu_font_override', true ) ) {
		    $menu_font = savoya_parsing_fonts( get_post_meta( $post->ID, '_tlg_menu_font_override', true ), 'Poppins', 400 );
		}
		$button_font 	= savoya_parsing_fonts( get_option('savoya_button_font'), 'Poppins', 400 );
		if( isset( $post->ID ) && get_post_meta( $post->ID, '_tlg_button_font_override', true ) ) {
		    $button_font = savoya_parsing_fonts( get_post_meta( $post->ID, '_tlg_button_font_override', true ), 'Poppins', 400 );
		}
		return array(
			'body_font' 	=> $body_font,
			'heading_font' 	=> $heading_font,
			'subtitle_font' => $subtitle_font,
			'menu_font' 	=> $menu_font,
			'button_font' 	=> $button_font,
		);
	}
}

/**
	PARSING GOOGLE FONTS
**/
if( !function_exists('savoya_parsing_fonts') ) {
	function savoya_parsing_fonts( $gg_font = false, $default_font = '', $default_weight = 400 ) {
		$font = array(
			'name' 		=> $default_font,
			'weight' 	=> $default_weight,
			'style' 	=> 'normal',
			'url' 		=> false,
			'family' 	=> $default_font.':'.$default_weight.',100,300,400,400italic,600,700',
		);
		if ( $gg_font ) {
	        $parsing_font 	= explode( ':tlg:', $gg_font );
	        $font_style 	= isset($parsing_font[2]) ? $parsing_font[2] : '400';
	        if ( 'regular' == $font_style ) $font_style = '400';
	        if ( 'italic'  == $font_style ) $font_style = '400italic';
	        if ( isset($parsing_font[0]) && isset($parsing_font[1]) ) {
	        	$font = array(
					'name' 		=> $parsing_font[0],
					'url' 		=> $parsing_font[1],
					'weight' 	=> intval( $font_style ),
					'style' 	=> strpos( $font_style, 'italic' ) ? 'italic' : 'normal',
					'family' 	=> $parsing_font[0].':'.$font_style.',100,300,400,600,700',
				);
	        }
	    }
	    return $font;
	}
}

/**
	SANITIZE CUSTOMIZER OPTION
**/
if( !function_exists('savoya_sanitize') ) {
    function savoya_sanitize( $input ) {
        return force_balance_tags( $input );
    }
}

/**
	SANITIZE TITLE
**/
if( !function_exists( 'savoya_sanitize_title' ) ) {
	function savoya_sanitize_title($string) {
		$string = strtolower(str_replace(' ', '-', $string));
		$string = preg_replace('/[^A-Za-z\-]/', '', $string);
		return preg_replace('/-+/', '-', $string);
	}
}

/**
	CHECK BLOG PAGES
**/
if( !function_exists('savoya_is_blog_page') ) {
	function savoya_is_blog_page() {
	    global $post;
	    if ( ( is_home() || is_archive() || is_single() ) && 'post' == get_post_type($post) ) {
	    	return true;
	    }
	   	return false;
	}
}

/**
	GET PAGE CLASS
**/
if( !function_exists('savoya_the_page_class') ) {
	function savoya_the_page_class() {
	    echo !savoya_is_shop_page() ? esc_attr( 'post-content' ) : esc_attr( 'shop-content'.(savoya_is_cart_empty() ? ' text-center' : '') );
	}
}

/**
	CHECK SHOP PAGES
**/
if( !function_exists('savoya_is_shop_page') ) {
	function savoya_is_shop_page() {
	    if( class_exists('Woocommerce') ) {
		    if ( is_shop() || is_product_category() || is_product_tag() || is_product() || is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url() || is_woocommerce() ) {
		    	return true;
		    }
		}
	   	return false;
	}
}

/**
	CHECK CART EMPTY
**/
if( !function_exists('savoya_is_cart_empty') ) {
	function savoya_is_cart_empty() {
	    if( class_exists('Woocommerce') ) {
	    	global $woocommerce;
		    if( is_cart() && !$woocommerce->cart->get_cart_contents_count() ) return true;
		}
	   	return false;
	}
}

/**
	CHECK MOBILE DEVICES
**/
if( !function_exists('savoya_is_mobile') ) {
	function savoya_is_mobile() {
		if( isset($_SERVER['HTTP_USER_AGENT']) ) {
			$ua = strtolower( $_SERVER['HTTP_USER_AGENT'] );
			$mobiles = array( "android", "iphone", "ipod", "ipad", "blackberry", "palm", "mobile", "mini", "kindle" );
			foreach( $mobiles as $mobile ) {
				if( strpos( $ua, $mobile) ) return true;
			}
		}
		return false;
	}
}

/**
	ALLOWED HTML TAGS
**/
if( !function_exists('savoya_allowed_tags') ) {
	function savoya_allowed_tags() {
		return array( 'a' => array( 'href' => array(), 'title' => array(), 'class' => array(), 'target' => array() ), 'br' => array(), 'em' => array(), 'i' => array(), 'u' => array(), 'strong' => array(), 'p' => array( 'class' => array() ) );	
	}
}

/**
	DISPLAY HEADER SOCIAL ICONS
**/
if( !function_exists('savoya_header_social_icons') ) { 
	function savoya_header_social_icons() {
		$output = false;
		for( $i = 1; $i < 11; $i++ ) {
			if( get_option("savoya_header_social_url_$i") ) {
				$output .= '<li><a href="' . esc_url(get_option("savoya_header_social_url_$i")) . '" target="_blank">'.
						   '<i class="' . esc_attr(get_option("savoya_header_social_icon_$i")) . '"></i></a></li>';
			}
		} 
		return $output;
	}
}

/**
	DISPLAY FOOTER SOCIAL ICONS
**/
if( !function_exists('savoya_footer_social_icons') ) { 
	function savoya_footer_social_icons() {
		$output = false;
		for( $i = 1; $i < 11; $i++ ) {
			if( get_option("savoya_footer_social_url_$i") ) {
				$output .= '<li><a href="' . esc_url(get_option("savoya_footer_social_url_$i")) . '" target="_blank">'.
						   '<i class="' . esc_attr(get_option("savoya_footer_social_icon_$i")) . '"></i></a></li>';
			}
		} 
		return $output;
	}
}

/**
	PORTFOLIO UNLIMITED
**/
if( !function_exists( 'savoya_portfolio_unlimited' ) ) {
	function savoya_portfolio_unlimited( $query ) {
	    if ( !is_admin() && $query->is_main_query() && ( is_post_type_archive('portfolio') || is_tax('portfolio_category') ) ) {
	        $query->set( 'posts_per_page', '-1' );
	    }    
	    return;
	}
	add_action( 'pre_get_posts', 'savoya_portfolio_unlimited' );
}

/**
	PORTFOLIO TAXONOMY TERMS
**/
if( !function_exists( 'savoya_the_terms' ) ) {
	function savoya_the_terms( $cat, $sep, $value, $args = array() ) {	
		global $post;
		$terms = get_the_terms( $post->ID, $cat, '', $sep, '' );
		if( is_array($terms) ) {
			foreach( $terms as $term ) {
				$args[] = $value;	
			}
			$terms = array_map( 'savoya_get_term_name', $terms, $args );
			return implode( $sep, $terms);
		}
	}
}

/**
	PORTFOLIO GET TAXONOMY TERMS
**/
if( !function_exists('savoya_get_term_name') ) {
	function savoya_get_term_name( $term, $value ) { 
		if( 'slug' == $value ) {
			return $term->slug;
		} elseif( 'link' == $value ) {
			return '<a href="'.get_term_link( $term, 'portfolio_category' ).'">'.$term->name.'</a>';
		} else {
			return $term->name; 
		}
	}
}


/**
	BREADCRUMBS
**/
if( !function_exists('savoya_breadcrumbs') ) { 
	function savoya_breadcrumbs() {
		if ( is_front_page() || is_search() || 'no' == get_option( 'tlg_framework_show_breadcrumbs', 'yes' ) ) return;
		global $post;
		$post_type 	= get_post_type();
		$ancestors 	= array_reverse( get_post_ancestors( $post->ID ) );
		$before 	= '<ol class="breadcrumb breadcrumb-style">';
		$after 		= '</ol>';
		$home 		= '<li><a href="' . esc_url( home_url( "/" ) ) . '" class="home-link" rel="home">' . esc_html__( 'Home', 'savoya' ) . '</a></li>';
		if( 'portfolio' == $post_type ) {
			$home  .= '<li class="active"><a href="' . esc_url( home_url( "/portfolio/" ) ) . '">' . esc_html__( 'Portfolio', 'savoya' ) . '</a></li>';
		}
		if( 'team' == $post_type ) {
			$home  .= '<li class="active"><a href="' . esc_url( home_url( "/team/" ) ) . '">' . esc_html__( 'Team', 'savoya' ) . '</a></li>';
		}
		if( 'product' == $post_type && !(is_archive()) ) {
			$home  .= '<li class="active"><a href="' . esc_url( get_permalink( woocommerce_get_page_id( 'shop' ) ) ) . '">' . esc_html__( 'Shop', 'savoya' ) . '</a></li>';
		} elseif( 'product' == $post_type && is_archive() ) {
			$home  .= '<li class="active">' . esc_html__( 'Shop', 'savoya' ) . '</li>';
		}
		$breadcrumb = '';
		if ( $ancestors ) {
			foreach ( $ancestors as $ancestor ) {
				$breadcrumb .= '<li><a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a></li>';
			}
		}
		if( savoya_is_blog_page() && is_single() ) {
			$breadcrumb .= '<li><a href="' . esc_url( get_permalink( get_option( 'page_for_posts' ) ) ) . '">' . esc_html( get_option( 'blog_title', esc_html__( 'Our Blog', 'savoya' ) ) ) . '</a></li><li class="active">' . esc_html( get_the_title( $post->ID ) ) . '</li>';
		} elseif( savoya_is_blog_page() ) {
			$breadcrumb .= '<li class="active">' . get_option( 'blog_title', esc_html__( 'Our Blog', 'savoya' ) ) . '</li>';
		} elseif( is_post_type_archive('product') || is_archive() ) {
			// nothing
		} else {
			$breadcrumb .= '<li class="active">' . esc_html( get_the_title( $post->ID ) ) . '</li>';
		}
		if( 'team' == get_post_type() ) {
			rewind_posts();
		}
		return $before . $home . $breadcrumb . $after;
	}
}

/**
	PAGINATION
**/
if( !function_exists('savoya_pagination') ) {
	function savoya_pagination( $pages = '', $range = 2 ) {
		global $paged, $wp_query;
		$showitems 	= ($range * 2)+1;
		$output 	= '';
		if( empty($paged) ) {
			$paged = 1;
		}
		if( $pages == '' ) {
			$pages = $wp_query->max_num_pages;
			if( !$pages ) {
				$pages = 1;
			}
		}
		if( 1 != $pages ) {
			$output .= "<div class='text-center mt40'><ul class='pagination'>";
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) {
				$output .= "<li><a href='".esc_url(get_pagenum_link(1))."' aria-label='". esc_html__( 'Previous', 'savoya' ) ."'><span aria-hidden='true'>&laquo;</span></a></li> ";
			}
			for ($i=1; $i <= $pages; $i++) {
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
					$output .= ($paged == $i)? "<li class='active'><a href='".esc_url(get_pagenum_link($i))."'>".$i."</a></li> ":"<li><a href='".esc_url(get_pagenum_link($i))."'>".$i."</a></li> ";
				}
			}
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) {
				$output .= "<li><a href='".esc_url(get_pagenum_link($pages))."' aria-label='". esc_html__( 'Next', 'savoya' ) ."'><span aria-hidden='true'>&raquo;</span></a></li> ";
			}
			$output.= "</ul></div>";
		}
		return $output;
	}
}

/**
	COMMENTS
**/
if( !function_exists('savoya_comment') ) {
	function savoya_comment( $comment, $args, $depth ) { 
		$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			<div class="entry-data mb--6">
				<figure class="entry-data-author">
					<?php echo get_avatar( $comment->comment_author_email, 40 ); ?>
				</figure>
				<div class="entry-data-summary">
					<span class="inline-block author-name"><?php echo get_comment_author_link() ?></span>
					<div class="display-block">
						<span class="inline-block"><?php echo get_comment_date( 'M d, Y' ) ?></span>
						<span class="middot-divider dot"></span>
						<span class="inline-block"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
					</div>
				</div>
			</div>
			<div class="comment-content">
				<?php echo wpautop( get_comment_text() ); ?>
				<?php if ( $comment->comment_approved == '0' ) : ?>
				<p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'savoya' ) ?></em></p>
				<?php endif; ?>	
			</div>
		<?php
	}
}

/**
	PINGS
**/
if( !function_exists('savoya_pings') ) {
	function savoya_pings($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment; ?>
	   <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	   		<div class="entry-data mb--6">
				<div class="entry-data-summary">
					<span class="inline-block author-name"><?php echo get_comment_author_link() ?></span>
					<div class="display-block">
						<span class="inline-block"><?php echo get_comment_date( 'M d, Y' ) ?></span>
					</div>
				</div>
			</div>
			<div class="comment-content">
				<?php echo wpautop( get_comment_text() ); ?>
				<?php if ( $comment->comment_approved == '0' ) : ?>
				<p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'savoya' ) ?></em></p>
				<?php endif; ?>	
			</div>
		<?php
	}
}

/**
	AUTHOR SOCIAL
**/
if( !function_exists('savoya_author_socials') ) {
	function savoya_author_socials( $contactmethods ) {
		$contactmethods['twitter'] 	= esc_html__( 'Twitter', 'savoya' );
		$contactmethods['googleplus'] = esc_html__( 'Google Plus', 'savoya' );
		$contactmethods['facebook'] = esc_html__( 'Facebook', 'savoya' );
		$contactmethods['instagram'] = esc_html__( 'Instagram', 'savoya' );
		$contactmethods['github'] = esc_html__( 'Github', 'savoya' );
		$contactmethods['vimeo'] = esc_html__( 'Vimeo', 'savoya' );
		$contactmethods['youtube'] = esc_html__( 'Youtube', 'savoya' );
		$contactmethods['linkedin'] = esc_html__( 'LinkedIn', 'savoya' );
		$contactmethods['tumblr'] = esc_html__( 'Tumblr', 'savoya' );
		$contactmethods['dribbble'] = esc_html__( 'Dribbble', 'savoya' );
		$contactmethods['pinterest'] = esc_html__( 'Pinterest', 'savoya' );
		return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'savoya_author_socials', 10, 1 );
}

/**
	LIKES
**/
if( !function_exists('savoya_like_setup') ) {
	function savoya_like_setup( $post_id ) {
        if( !is_numeric( $post_id ) ) return;
        add_post_meta( $post_id, '_tlg_likes', '0', true );
    }
    add_action( 'publish_post', 'savoya_like_setup' );
}
if( !function_exists('savoya_like_ajax_call') ) {
	function savoya_like_ajax_call( $post_id ) {
	    if( isset( $_POST['likes_id'] ) ) {
	        $post_id = str_replace( 'tlg-likes-', '', $_POST['likes_id'] );
	        echo savoya_get_like_count( $post_id, 'update' );
	    } else {
	        $post_id = str_replace( 'tlg-likes-', '', $_POST['post_id'] );
	        echo savoya_get_like_count( $post_id, 'get' );
	    }
	    exit;
	}
	add_action( 'wp_ajax_tlg-likes', 'savoya_like_ajax_call' );
	add_action( 'wp_ajax_nopriv_tlg-likes', 'savoya_like_ajax_call' );
}
if( !function_exists('savoya_get_like_count') ) {
    function savoya_get_like_count( $post_id, $action = 'get' ) {
        if( !is_numeric( $post_id ) ) return;
        switch( $action ) {
            case 'get':
                $likes = get_post_meta( $post_id, '_tlg_likes', true );
                if( !$likes ) {
                    $likes = 0;
                    add_post_meta( $post_id, '_tlg_likes', $likes, true );
                }
                $like_cap = esc_html__( ' like', 'savoya' );
                if ( $likes > 1 ) {
                	$like_cap = esc_html__( ' likes', 'savoya' );
                }
                return '<i class="ti-heart"></i><span class="like-share-name">'. $likes . '<span>' . $like_cap . '</span></span>';
                break;
            case 'update':
                $likes = get_post_meta( $post_id, '_tlg_likes', true );
                if( isset( $_COOKIE['tlg_likes_'. $post_id] ) ) return $likes;
                $likes++;
                update_post_meta( $post_id, '_tlg_likes', $likes );
                setcookie( 'tlg_likes_'. $post_id, $post_id, time()*20, '/' );
                $like_cap = esc_html__( ' like', 'savoya' );
                if ( $likes > 1 ) {
                	$like_cap = esc_html__( ' likes', 'savoya' );
                }
                return '<i class="ti-heart"></i><span class="like-share-name">'. $likes  . '<span>' . $like_cap . '</span></span>';
                break;
        }
    }
}
if( !function_exists('savoya_like_display') ) {
    function savoya_like_display( $custom_class = 'tlg-likes-normal' ) {
        global $post;
        $post_id = $post->ID;
        $class = 'tlg-likes';
        $title = 'Love this';
        if( isset($_COOKIE['tlg_likes_'. $post_id]) ) {
            $class = 'tlg-likes active';
            $title = esc_html__( 'You already love this!', 'savoya' );
        } ?>
        <div class="tlg-likes-button static-icon inline-block <?php echo esc_attr($custom_class) ?>">
        	<a href="#" class="<?php echo esc_attr($class) ?>" id="tlg-likes-<?php echo esc_attr($post_id) ?>" title="<?php echo esc_attr($title) ?>">
        		<?php echo savoya_get_like_count( $post_id ); ?>
        	</a>
        </div>
        <?php
    }
}