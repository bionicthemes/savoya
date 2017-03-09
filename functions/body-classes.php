<?php

// -----------------------------------------------------------------------------
// Body Class - Debug
// -----------------------------------------------------------------------------

function savoya_debug_is_on_fn($classes) {
    global $savoya_debug_is_on;
    if ( $savoya_debug_is_on ) $classes[] = 'savoya_debug_is_on';
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Header Sticky
// -----------------------------------------------------------------------------

// function savoya_header_sticky($classes) {
//     global $custom_header_sticky;
//     if ( 1 == $custom_header_sticky ) $classes[] = 'header-sticky';
//     return $classes;
// }

// -----------------------------------------------------------------------------
// Body Class - Header Layout
// -----------------------------------------------------------------------------

function savoya_header_layout($classes) {
    global $custom_header_layout;
    if      ( 'header_1' == $custom_header_layout ) $classes[] = 'header-layout-1';
    elseif  ( 'header_2' == $custom_header_layout ) $classes[] = 'header-layout-2';
    return $classes;
}


function savoya_header_top_bar_size($classes) {
    global $custom_header_top_bar_size;
    if        ( 'wide' == $custom_header_top_bar_size ) $classes[]  = 'top-bar-wide';
    elseif    ( 'boxed' == $custom_header_top_bar_size )  $classes[]  = 'top-bar-boxed';
    return $classes;
}


function savoya_header_size($classes) {
    global $custom_header_size;
    if        ( 'wide' == $custom_header_size ) $classes[]  = 'header-wide';
    elseif    ( 'boxed' == $custom_header_size )  $classes[]  = 'header-boxed';
    return $classes;
}


// -----------------------------------------------------------------------------
// Body Class - Footer Sticky
// -----------------------------------------------------------------------------

function savoya_footer_sticky($classes) {
    global $custom_footer_sticky;
    if ( 1 == $custom_footer_sticky ) $classes[] = 'footer-sticky';
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Catalog Mode
// -----------------------------------------------------------------------------

function savoya_catalog_mode($classes) {
    global $custom_catalog_mode;
    if ( 1 == $custom_catalog_mode ) $classes[] = 'catalog-mode';
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - No Animation
// -----------------------------------------------------------------------------

function savoya_no_animation($classes) {
    $classes[] = 'no-offcanvas-animation';
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Page Without Title
// -----------------------------------------------------------------------------

function savoya_page_title($classes) {
    
    $page_title_option_class            = '';
    $page_title_option_class_no_title   = 'page-without-title';

    if (get_post_meta( savoya_page_id(), 'page_title_meta_box_check', true )) {
        
        $page_title_option = get_post_meta( savoya_page_id(), 'page_title_meta_box_check', true );

        switch ( $page_title_option ) {     
            case "off":
                $page_title_option_class = $page_title_option_class_no_title;
                break;
        }

    }

    $classes[] = $page_title_option_class;
    return $classes;
}

// -----------------------------------------------------------------------------
// Body Class - Transparent Header
// -----------------------------------------------------------------------------

function savoya_header_transparent($classes) {
    
    global  $custom_header_transparent,
            $custom_header_transparent_scheme,
            $custom_shop_category_transparency;

    $header_transparent_class                   = '';
    $header_transparent_class_transparent       = 'header-transparent';

    $header_transparent_scheme_class            = '';
    $header_transparent_scheme_class_light      = 'header-transparent-light';
    $header_transparent_scheme_class_dark       = 'header-transparent-dark';

    // From Customizer

    switch ( $custom_header_transparent ) {    
        
        case 1:            
            
            $header_transparent_class = $header_transparent_class_transparent;

            switch ( $custom_header_transparent_scheme ) {        
                
                case "light":
                    $header_transparent_scheme_class = $header_transparent_scheme_class_light;
                    break;
                case "dark":
                    $header_transparent_scheme_class = $header_transparent_scheme_class_dark;
                    break;

            }

            break;
    }

    // Overwrite From Page

    if (get_post_meta( savoya_page_id(), 'page_header_transparency', true )) {
        
        $page_header_transparency = get_post_meta( savoya_page_id(), 'page_header_transparency', true );

        switch ( $page_header_transparency ) {        
            case "inherit":
                $header_transparent_class           = $header_transparent_class;
                $header_transparent_scheme_class    = $header_transparent_scheme_class;
                break;
            case "transparency_light":
                $header_transparent_class           = $header_transparent_class_transparent;
                $header_transparent_scheme_class    = $header_transparent_scheme_class_light;
                break;
            case "transparency_dark":
                $header_transparent_class           = $header_transparent_class_transparent;
                $header_transparent_scheme_class    = $header_transparent_scheme_class_dark;
                break;
            case "no_transparency":
                $header_transparent_class           = '';
                $header_transparent_scheme_class    = '';
                break;
            default:
                $header_transparent_class           = $header_transparent_class;
                $header_transparent_scheme_class    = $header_transparent_scheme_class;
                break;
        }

    }

    if (function_exists('woocommerce_get_header_image_url')) { $listing_header_src = woocommerce_get_header_image_url(); }

    if ( savoya_WOOCOMMERCE_IS_ACTIVE && is_product_category() && !empty($listing_header_src) ) {

        switch ( $custom_shop_category_transparency ) {        
            case "inherit":
                $header_transparent_class           = $header_transparent_class;
                $header_transparent_scheme_class    = $header_transparent_scheme_class;
                break;
            case "transparency_light":
                $header_transparent_class           = $header_transparent_class_transparent;
                $header_transparent_scheme_class    = $header_transparent_scheme_class_light;
                break;
            case "transparency_dark":
                $header_transparent_class           = $header_transparent_class_transparent;
                $header_transparent_scheme_class    = $header_transparent_scheme_class_dark;
                break;
            case "no_transparency":
                $header_transparent_class           = '';
                $header_transparent_scheme_class    = '';
                break;
            default:
                $header_transparent_class           = $header_transparent_class;
                $header_transparent_scheme_class    = $header_transparent_scheme_class;
                break;
        }

    }

    $classes[] = $header_transparent_class . " " . $header_transparent_scheme_class;
    return $classes;

}

// -----------------------------------------------------------------------------
// Print Body Classes
// -----------------------------------------------------------------------------
    
function savoya_custom_body_classes() {    

    add_filter( 'body_class', 'savoya_debug_is_on_fn' );
    add_filter( 'body_class', 'savoya_header_top_bar_size' );
    add_filter( 'body_class', 'savoya_header_size' );
    add_filter( 'body_class', 'savoya_header_layout' );
    add_filter( 'body_class', 'savoya_header_transparent' );
    add_filter( 'body_class', 'savoya_footer_sticky' );
    add_filter( 'body_class', 'savoya_catalog_mode' );
    add_filter( 'body_class', 'savoya_no_animation' );
    add_filter( 'body_class', 'savoya_page_title' );

}

add_action( 'wp_head', 'savoya_custom_body_classes', 100 );