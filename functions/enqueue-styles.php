<?php



// =============================================================================

// Enqueue Styles (Front-end)

// =============================================================================



if ( ! function_exists('savoya_enqueue_styles') ) :

function savoya_enqueue_styles() {		


    wp_enqueue_style('jquery.mmenu-all-css', get_template_directory_uri() . '/css/plugins/jquery.mmenu.all.css', array(), '1.0', 'all');
    wp_enqueue_style('savoyastarter_styles-styles', get_template_directory_uri() . '/css/application.css', array(), '1.0', 'all');
    wp_enqueue_style('savoya-icons', get_template_directory_uri() . '/includes/assets/fonts/font-awesome.min.css', array(), '4.7');
    wp_enqueue_style('savoya-themify', get_template_directory_uri() . '/includes/assets/fonts/themify-icons.css', array(), '4.7');


}

add_action( 'wp_enqueue_scripts', 'savoya_enqueue_styles' );

endif;