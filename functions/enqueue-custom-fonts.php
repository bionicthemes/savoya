<?php

// =============================================================================
// Enqueue Embed Fonts
// =============================================================================

if ( ! function_exists('savoya_custom_theme_fonts') ) :
function savoya_custom_theme_fonts() {

	wp_enqueue_style( 'savoya-default-fonts', get_template_directory_uri() . '/includes/assets/fonts/custom-theme-fonts.css', array(), NULL );
}
add_action( 'wp_enqueue_scripts', 'savoya_custom_theme_fonts', 100 );
endif;

