<?php
/*

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function savoya_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'savoya_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gb_summer_2016_customize_preview_js() {
	wp_enqueue_script( 'savoya_customize_register', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'savoya_customize_preview_js' );
