<?php
 
/**********************************************
 *********** Savoya Theme Customizer **********
 *********************************************/
       


//remove default wordpress customizer options
add_action('customize_register','savoya');
function savoya( $wp_customize ) {
    // Remove Sections
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('header_image');
    // Remove Control
    $wp_customize->remove_control('display_header_text');

}

Kirki::add_config( 'savoya', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
    'option_name'   => 'savoya',
    'disable_output'    => true ,
) );


// Remove Customize Pages

add_action('admin_menu', 'remove_customize_pages');
function remove_customize_pages(){
    global $submenu;
    unset($submenu['themes.php'][15]); // remove Header link
    unset($submenu['themes.php'][20]); // remove Background link
}



/**********************************************
 *********** Add Panels ***********************
 *********************************************/
Kirki::add_panel( 'header_panel_styles', array(
    'priority'    => 10,
    'title'       => __( 'Header Settings', 'savoya' ),
    'description' => __( 'Here is the settings for header', 'savoya' ),
) );


Kirki::add_panel( 'general_panel_styles', array(
    'priority'    => 10,
    'title'       => __( 'Savoya Options', 'savoya' ),
    'description' => __( 'Savoya General Options', 'savoya' ),
) );


/**********************************************
 * Add Sections
 *********************************************/


// General Settings

if ( class_exists( 'Kirki' ) ) {


    // Logo
    Kirki::add_section( 'logo', array(
        'title'          => __( 'Logo', 'savoya'),
        'panel'          => 'header_panel_styles', // Not typically needed.
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ) );

    // Header Top Bar Contact Details
    Kirki::add_section( 'header_top_bar', array(
        'title'          => __( 'Header Top Bar', 'savoya' ),
        'panel'          => 'header_panel_styles', // Not typically needed.
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ) );

    // Header Styles 
    Kirki::add_section( 'header', array(
        'title'          => __( 'Header Styles', 'savoya' ),
        'panel'          => 'header_panel_styles', // Not typically needed.
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ) );

    // Header Layout 
    Kirki::add_section( 'header_section_layout', array(
        'title'          => __( 'Header Options', 'savoya' ),
        'panel'          => 'header_panel_styles', // Not typically needed.
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ) );

    // Header Elements
    Kirki::add_section( 'header_elements', array(
        'title'          => __( 'Header Elements', 'savoya' ),
        'panel'          => 'header_panel_styles', // Not typically needed.
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ) );

    // Header Stickiness
    Kirki::add_section( 'header_stickiness', array(
        'title'          => __( 'Header Sticky', 'savoya' ),
        'panel'          => 'header_panel_styles', // Not typically needed.
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ) );

    // Fonts
    Kirki::add_section( 'fonts', array(
        'title'          => esc_attr__( 'Fonts', 'savoya' ),
        'priority'       => 50,
        'capability'     => 'edit_theme_options',
    ) );


    // Custom Code Section

    Kirki::add_section( 'custom_code', array(
        'title'          => esc_attr__( 'Custom Code', 'savoya' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
    ) );


    // Footer
    Kirki::add_section( 'footer', array(
        'title'          => esc_attr__( 'Footer', 'savoya' ),
        'priority'       => 50,
        'capability'     => 'edit_theme_options',
    ) );


    // Styling
    Kirki::add_section( 'layout', array(
        'title'          => __( 'Layout', 'savoya'),
        'panel'          => 'header_panel_styles', // Not typically needed.
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ) );




    /**********************************************
     * Add Fields
     *********************************************/


    /*******************************************
    /********** Header Top Bar *****************
    /*******************************************/

    // Header Top Bar On/Off
    Kirki::add_field( '', array(
        'type'        => 'toggle',
        'section'     => 'header_top_bar',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_top_bar_activate',
        'label'       => __( 'Do you want to show Header Top Bar?', 'savoya' ),
        'priority'    => 10,
        'default'     => '0',
        
    ) );

    // Header Top Bar Background Transparent
    Kirki::add_field( '', array(
        'type'        => 'toggle',
        'section'     => 'header_top_bar',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_top_bar_background_transparent',
        'label'       => __( 'Transparent Background?', 'savoya' ),
        'priority'    => 10,
        'default'     => '1',
        'active_callback'    => array(
            array(
                'setting'  => 'header_top_bar_activate',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),

    ) );


    // Header Top Bar Background Color
    Kirki::add_field( '', array(
        'type'        => 'color',
        'section'     => 'header_top_bar',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_top_bar_background_color',
        'label'       => __( 'Header Top Bar Background Color', 'savoya' ),
        'priority'    => 10,
        'default'     => '#05F9DF',
        'active_callback'    => array(
            array(
                'setting'  => 'header_top_bar_activate',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),

    ) );


    // Header Top Bar Text Color
    Kirki::add_field( '', array(
        'type'        => 'color',
        'section'     => 'header_top_bar',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_top_bar_text_color',
        'label'       => __( 'Header Top Bar Text Color', 'savoya' ),
        'priority'    => 10,
        'default'     => '#757575',
         'active_callback'    => array(
            array(
                'setting'  => 'header_top_bar_activate',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),

    ) );


    // Header Top Bar Links Color
    Kirki::add_field( '', array(
        'type'        => 'color',
        'section'     => 'header_top_bar',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_top_bar_links_color',
        'label'       => __( 'Header Top Bar Links Color', 'savoya' ),
        'priority'    => 10,
        'default'     => '#37474F',
         'active_callback'    => array(
            array(
                'setting'  => 'header_top_bar_activate',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),
    ) );

    // Header Top Bar Hover Color
    Kirki::add_field( '', array(
        'type'        => 'color',
        'section'     => 'header_top_bar',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_top_bar_hover_color',
        'label'       => __( 'Header Top Bar Hover Color', 'savoya' ),
        'priority'    => 10,
        'default'     => '#546E7A',
         'active_callback'    => array(
            array(
                'setting'  => 'header_top_bar_activate',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),
    ) );

    // Header Top Bar Font Size
    Kirki::add_field( '', array(
        'type'        => 'slider',
        'section'     => 'header_top_bar',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_top_bar_font_size',
        'label'       => __( 'Header Top Bar Font Size', 'savoya' ),
        'description' => __( 'Set the Font Size', 'savoya' ),
        'priority'    => 10,
        'default'     => '11',
        'choices'     => array(
            'min'  => '10',
            'max'  => '16',
            'step' => 1,

        ),
        'active_callback'    => array(
            array(
                'setting'  => 'header_top_bar_activate',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),

    ) );


    // Header Top Bar Padding TOP & BOTTOM
    Kirki::add_field( '', array(
        'type'        => 'slider',
        'section'     => 'header_top_bar',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_top_bar_paddingTB',
        'label'       => __( 'Header Top Bar Height', 'savoya' ),
        'description' => __( 'Adjust the top & bottom padding, basically, increase the height', 'savoya' ),
        'priority'    => 10,
        'default'     => 0,
        'choices'     => array(
            'min'  => '0',
            'max'  => '20',
            'step' => 1,
        ),
        'active_callback'    => array(
            array(
                'setting'  => 'header_top_bar_activate',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),

    ) );


    // Header Top Bar Padding LEFT & RIGHT
    Kirki::add_field( '', array(
        'type'        => 'slider',
        'section'     => 'header_top_bar',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_top_bar_paddingRL',
        'label'       => __( 'Header Top Bar Left & Right Padding', 'savoya' ),
        'description' => __( 'Adjust the left & right padding', 'savoya' ),
        'priority'    => 10,
        'default'     => '10',
        'choices'     => array(
            'min'  => '10',
            'max'  => '200',
            'step' => 1,
        ),
        'active_callback'    => array(
            array(
                'setting'  => 'header_top_bar_activate',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),

    ) );



    // Header Top Bar Phone Number
    Kirki::add_field( '', array(
        'type'        => 'text',
        'setting'     => 'header_top_bar_phone',
        'label'       => __( 'Header Top Bar Phone', 'savoya' ),
        'section'     => 'header_top_bar',
        'priority'    => 10,
        'default'  => esc_attr__( '+1-202-555-0121', 'savoya' ),
        'active_callback'    => array(
            array(
                'setting'  => 'header_top_bar_activate',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),
    ) );

    // Header Top Bar Email
    Kirki::add_field( '', array(
        'type'        => 'text',
        'setting'     => 'header_top_bar_email',
        'label'       => __( 'Header Top Bar Email', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'  => esc_attr__( 'website@website.com', 'savoya' ),
        'priority'    => 10,
        'active_callback'    => array(
            array(
                'setting'  => 'header_top_bar_activate',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),
    ) );



    // Header Top Bar Custom Text
    Kirki::add_field( '', array(
        'type'        => 'text',
        'setting'     => 'header_top_bar_custom_text',
        'label'       => __( 'Header Top Bar Custom Text', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'  => esc_attr__( '6 Poplar Way, Cranford, NJ, 07016', 'savoya' ),
        'priority'    => 10,
        'active_callback'    => array(
            array(
                'setting'  => 'header_top_bar_activate',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),
    ) );




    /*******************************************
    /********** Header  ************************
    /*******************************************/

    // Logo
    Kirki::add_field( '', array(
        'type'        => 'image',
        'setting'     => 'header_logo',
        'label'       => __( 'Site Logo', 'savoya' ),
        'section'     => 'logo',
        'priority'    => 10,
        'default'     => get_template_directory_uri() . '/includes/assets/logo.png',
    ) );

    // Logo Height
    Kirki::add_field( '', array(
        'type'        => 'slider',
        'setting'     => 'header_logo_height',
        'label'       => __( 'Logo Height' , 'savoya' ),
        'description' => __( 'Increase or decrease logo Height in order to grow in Width'),
        'section'     => 'logo',
        'priority'    => 10,
        'default'     => '50',
        'choices'     => array(
            'min'  => '30',
            'max'  => '100',
            'step' => 1,
        ),
    ) );

    // Logo Light Checkbox
    Kirki::add_field( '', array(
        'type'        => 'toggle',
        'setting'     => 'header_logo_light_activate',
        'label'       => __( 'Light Logo?', 'savoya' ),
        'section'     => 'logo',
        'default'     => '0',
        'priority'    => 10,

    ) );

    // Logo Light Upload
    Kirki::add_field( '', array(
        'type'        => 'image',
        'setting'     => 'header_logo_light',
        'label'       => __( 'Upload Light Logo', 'savoya' ),
        'section'     => 'logo',
        'default'     => get_template_directory_uri() . '/includes/assets/logo-light.png',
        'priority'    => 10,
        'active_callback'    => array(
            array(
                'setting'  => 'header_logo_light_activate',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),
       
    ) );

    // Header Style
    Kirki::add_field( '', array(
        'type'        => 'radio-image',
        'setting'     => 'header_layout',
        'label'       => __( 'Header Version', 'savoya' ),
        'section'     => 'header_section_layout',
        'description' => 'Here you can change the header version',
        'priority'    => 10,
        'default'     => 'classic-1',
        'choices'     => array(
            'classic-1' => get_template_directory_uri() . '/images/customiser/header_style_1.png',
            'classic-2' => get_template_directory_uri() . '/images/customiser/header_style_2.png',
            'classic-3' => get_template_directory_uri() . '/images/customiser/header_style_3.png',
        ),

    ) );


    // Header Search Icon
    Kirki::add_field( '', array(
        'type'        => 'switch',
        'section'     => 'header_elements',
        'panel'       => 'header',
        'setting'     => 'header_search',
        'label'       => __( 'Enable / Disable Search Icon', 'savoya' ),
        'priority'    => 10,
        'default'     => true,

    ) );

    // Header Shopping Cart
    Kirki::add_field( '', array(
        'type'        => 'switch',
        'section'     => 'header_elements',
        'panel'       => 'header',
        'setting'     => 'header_cart',
        'label'       => __( 'Enable / Disable Shopping Cart Icon', 'savoya' ),
        'priority'    => 10,
        'default'     => false,
    ) );


    // Header Transparent
    Kirki::add_field( '', array(
        'type'        => 'toggle',
        'section'     => 'header',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_transparent',
        'label'       => __( 'Transparent Header?', 'savoya' ),
        'priority'    => 10,
        'default'     => '0',
    ) );

    // Header Background Color
    Kirki::add_field( '', array(
        'type'        => 'color',
        'section'     => 'header',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_background_color',
        'label'       => __( 'Background Color', 'savoya' ),
        'priority'    => 10,
        'default'     => '#FFFFFF',

    ) );


    // Header Text Color
    Kirki::add_field( '', array(
        'type'        => 'color',
        'section'     => 'header',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_text_color',
        'label'       => __( 'Text Color', 'savoya' ),
        'priority'    => 10,
        'default'     => '#757575',

    ) );

    // Header Links Color
    Kirki::add_field( '', array(
        'type'        => 'color',
        'section'     => 'header',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_links_color',
        'label'       => __( 'Links Color', 'savoya' ),
        'priority'    => 10,
        'default'     => '#169099',   
    ) );


    // Main Navigation Align
    Kirki::add_field( '', array(
        'type'        => 'radio-image',
        'section'     => 'header_section_layout',
        'panel'       => 'header_panel_styles',
        'setting'     => 'align_menu_class',
        'label'       => __( 'Main Navigation Align', 'savoya' ),
        'description' => __( 'Select Main Menu Alignement', 'savoya' ),
        'priority'    => 10,
        'default'     => 'align_right',
        'choices'     => array(
            'align_left'    => get_template_directory_uri() . '/images/customiser/body_full_width.png',
            'align_center'  => get_template_directory_uri() . '/images/customiser/body_boxed.png',
            'align_right'   => get_template_directory_uri() . '/images/customiser/body_boxed.png',
        ),

    ) );


    // Header Width
    Kirki::add_field( '', array(
        'type'        => 'slider',
        'section'     => 'header_section_layout',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_width',
        'label'       => __( 'Header Width', 'savoya' ),
        'description' => __( 'Set the Header Width in percents %, default: 100% ', 'savoya' ),
        'priority'    => 10,
        'default'     => '100',
        'choices'     => array(
            'min'  => '50',
            'max'  => '100',
            'step' => 1,
        ),

    ) );


    // Header Height
    Kirki::add_field( '', array(
        'type'        => 'slider',
        'section'     => 'header_section_layout',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_height',
        'label'       => __( 'Header Height', 'savoya' ),
        'priority'    => 10,
        'default'     => '100',
        'choices'     => array(
            'min'  => '0',
            'max'  => '250',
            'step' => 1,
        ),

    ) );


    // Header Spacing Top
    Kirki::add_field( '', array(
        'type'        => 'number',
        'section'     => 'header_section_layout',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_spacing_top',
        'label'       => __( 'Header Spacing Top', 'savoya' ),
        'description' => __( 'Spacing Above Header -  Default: 0px;', 'savoya' ),
        'priority'    => 10,
        'default'     => '0',
        'choices'     => array(
            'min'  => '0',
            'max'  => '50',
            'step' => 1,
        ),

    ) );

    // Header Spacing Bottom
    Kirki::add_field( '', array(
        'type'        => 'number',
        'section'     => 'header_section_layout',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_spacing_bottom',
        'label'       => __( 'Header Spacing Bottom', 'savoya' ),
        'description' => __( 'Spacing Below Header - Default 10', 'savoya' ),
        'priority'    => 10,
        'default'     => '10',
        'choices'     => array(
            'min'  => '0',
            'max'  => '50',
            'step' => 1,
        ),

    ) );


    // Header Stickiness
    Kirki::add_field( '', array(
        'type'        => 'toggle',
        'section'     => 'header_stickiness',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_sticky',
        'label'       => __( 'Enable / Disable Sticky Header', 'savoya' ),
        'priority'    => 10,
        'default'     => true,
       
    ) );

    // Header Font Size
    Kirki::add_field( '', array(
        'type'        => 'slider',
        'section'     => 'header',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_font_size',
        'label'       => __( 'Header Font Size', 'savoya' ),
        'priority'    => 10,
        'default'     => '12',
        'choices'     => array(
            'min'  => '10',
            'max'  => '32',
            'step' => 1,
        ),

    ) );

    // Main Menu - submenu background
    Kirki::add_field( '', array(
        'type'        => 'color',
        'section'     => 'header',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_sub_main_menu_bg_color',
        'label'       => __( 'Main Menu Submenu Background Color', 'savoya' ),
        'priority'    => 10,
        'default'     => '#373737',

    ) );

    // Main Menu - submenu text color
    Kirki::add_field( '', array(
        'type'        => 'color',
        'section'     => 'header',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_sub_main_menu_font_color',
        'label'       => __( 'Main Menu Submenu Text Color', 'savoya' ),
        'priority'    => 10,
        'default'     => '#FFFFFF',

    ) );


    /********************************************
    /********** Header Sticky *******************
    /*******************************************/


    // Header Sticky Background Transparent
    Kirki::add_field( '', array(
        'type'        => 'toggle',
        'section'     => 'header_stickiness',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_sticky_transparent',
        'label'       => __( 'Transparent Background?', 'savoya' ),
        'priority'    => 10,
        'default'     => '0',
        'active_callback'    => array(
            array(
                'setting'  => 'header_sticky',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),

    ) );

    // Header Sticky Logo
    Kirki::add_field( '', array(
        'type'        => 'image',
        'section'     => 'header_stickiness',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_sticky_logo',
        'label'       => __( 'Header Sticky Logo', 'savoya' ),
        'priority'    => 10,
        'default'     => get_template_directory_uri() . '/includes/assets/logo-light.png',
        'active_callback'    => array(
            array(
                'setting'  => 'header_sticky',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),

    ) );


    // Header Sticky Background Color
    Kirki::add_field( '', array(
        'type'        => 'color',
        'section'     => 'header_stickiness',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_sticky_background_color',
        'label'       => __( 'Header Sticky Background Color', 'savoya' ),
        'priority'    => 10,
        'default'     => '#085477',
        'active_callback'    => array(
            array(
                'setting'  => 'header_sticky',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),

    ) );

    // Header Sticky Text Color
    Kirki::add_field( '', array(
        'type'        => 'color',
        'section'     => 'header_stickiness',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_sticky_text_color',
        'label'       => __( 'Header Sticky Text Color', 'savoya' ),
        'priority'    => 10,
        'default'     => '#FFFFFF',
        'active_callback'    => array(
            array(
                'setting'  => 'header_sticky',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),

    ) );

    // Header Sticky Links Color
    Kirki::add_field( '', array(
        'type'        => 'color',
        'section'     => 'header_stickiness',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_sticky_links_color',
        'label'       => __( 'Header Sticky Links Color', 'savoya' ),
        'priority'    => 10,
        'default'     => '#169099',
        'active_callback'    => array(
            array(
                'setting'  => 'header_sticky',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),

    ) );

    // Header Sticky Height
    Kirki::add_field( '', array(
        'type'        => 'slider',
        'section'     => 'header_stickiness',
        'panel'       => 'header_panel_styles',
        'setting'     => 'header_sticky_height',
        'label'       => __( 'Header Sticky Height', 'savoya' ),
        'priority'    => 10,
        'default'     => '65',
        'choices'     => array(
            'min'  => '0',
            'max'  => '250',
            'step' => 1,

        ),
        'active_callback'    => array(
            array(
                'setting'  => 'header_sticky',
                'operator' => '==',
                'value'    => '1',     
            ),
        ),

    ) );



    /*******************************************
    /**********General Styling *****************
    /*******************************************/


    Kirki::add_section( 'styling', array(
        'title'          => esc_attr__( 'Styling', 'savoya' ),
        'priority'       => 50,
        'capability'     => 'edit_theme_options',
    ) );


        Kirki::add_field( '', array(
            'type'        => 'color',
            'settings'    => 'bg_color',
            'label'       => esc_attr__( 'Global Page Background Color', 'savoya' ),
            'section'     => 'styling',
            'default'     => '#f2f2f2',
            'priority'    => 10,
        ) );


        Kirki::add_field( '', array(
            'type'        => 'color',
            'settings'    => 'links_color',
            'label'       => esc_attr__( 'Links Color', 'savoya' ),
            'section'     => 'styling',
            'default'     => '#ff3939',
            'priority'    => 10,
        ) );


        Kirki::add_field( '', array(
            'type'        => 'color',
            'settings'    => 'text_color',
            'label'       => esc_attr__( 'Base Font Color', 'savoya' ),
            'section'     => 'styling',
            'default'     => '#000',
            'priority'    => 10,
        ) );


        Kirki::add_field( '', array(
            'type'        => 'radio-image',
            'settings'    => 'body_layout',
            'label'       => esc_attr__( 'Layout', 'savoya' ),
            'section'     => 'styling',
            'default'     => 'boxed',
            'priority'    => 10,
            'choices'     => array(
                'full_width'    => get_template_directory_uri() . '/images/customiser/body_full_width.png',
                'boxed'         => get_template_directory_uri() . '/images/customiser/body_boxed.png',
            ),
        ) );



    /********************************************
    /********** Fonts ***************************
    /*******************************************/


    Kirki::add_field( '', array(
        'type'        => 'slider',
        'settings'    => 'font_size',
        'label'       => __( 'Base Font Size', 'savoya' ),
        'help'        => esc_attr__( 'The Base Font Size refers to the size applied to the paragraph text. All other elements, such as headings, links, buttons, etc will adjusted automatically to keep the hierarchy of font sizes based on this one size. Easy-peasy!', 'savoya' ),
        'section'     => 'fonts',
        'default'     => 14,
        'priority'    => 10,
        'choices'     => array(
            'min'  => 8,
            'max'  => 32,
            'step' => 1
        ),
    ) );


    Kirki::add_field( '', array(
        'type'        => 'radio-buttonset',
        'settings'    => 'default_theme_fonts',
        'label'       => esc_attr__( 'Font Source', 'savoya' ),
        'section'     => 'fonts',
        'default'     => 'default_fonts',
        'priority'    => 10,
        'choices'     => array(
            'default_fonts' => esc_attr__( 'Theme Defaults', 'savoya' ),
            'google_fonts'  => esc_attr__( 'Google Webfonts', 'savoya' ),
        ),
    ) );


    Kirki::add_field( '', array(
        'type'     => 'select',
        'settings' => 'main_font',
        'label'    => esc_attr__( 'Main Font', 'savoya' ),
        'description' => __( 'Used for titles and Headings.', 'savoya' ),
        'section'  => 'fonts',
        'priority' => 10,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'default'     => 'serif',
        'active_callback'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'google_fonts',     
            ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'multicheck',
        'settings'    => 'main_font_variants',
        'label'    => esc_attr__( 'Main Font Variants', 'savoya' ),
        'section'     => 'fonts',
        'priority'    => 10,
        'choices'     => Kirki_Fonts::get_all_variants(),
        'default'     => array('regular', '700'),
        'active_callback'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'google_fonts',           
            ),
        ),
    ) );


    Kirki::add_field( '', array(
        'type'     => 'select',
        'settings' => 'secondary_font',
        'label'    => esc_attr__( 'Secondary Font', 'savoya' ),
        'description' => __( 'Used for body / paragraph text.', 'savoya' ),
        'section'  => 'fonts',
        'priority' => 10,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'default'     => 'serif',
        'active_callback'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'google_fonts',           
            ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'multicheck',
        'settings'    => 'secondary_font_variants',
        'label'    => esc_attr__( 'Secondary Font Variants', 'savoya' ),
        'section'     => 'fonts',
        'priority'    => 10,
        'choices'     => Kirki_Fonts::get_all_variants(),
        'default'     => array('regular', '700'),
        'active_callback'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'google_fonts',           
            ),
        ),
    ) );


    Kirki::add_field( '', array(
        'type'        => 'toggle',
        'settings'    => 'use_main_font_subsets',
        'label'       => __( 'Include Subsets', 'savoya' ),
        'section'     => 'fonts',
        'default'     => '0',
        'priority'    => 10,
        'active_callback'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'google_fonts',
            ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'multicheck',
        'settings'    => 'google_fonts_subsets',
        'label'       => __( 'Font Subsets', 'savoya' ),
        'section'     => 'fonts',
        'priority'    => 10,
        'choices'     => Kirki_Fonts::get_google_font_subsets(),
        'active_callback'    => array(
            array(
                'setting'  => 'use_main_font_subsets',
                'operator' => '==',
                'value'    => 1,           
            ),
        ),
    ) );



    /********************************************
    /********** Social Media ********************
    /*******************************************/


    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'facebook_link',
        'label'       => esc_attr__( 'Facebook', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '#',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,           
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'twitter_link',
        'label'       => esc_attr__( 'Twitter', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '#',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,           
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'pinterest_link',
        'label'       => esc_attr__( 'Pinterest', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '#',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,        
                ),
        ),
    ) );

    Kirki::add_field( '#', array(
        'type'        => 'text',
        'settings'    => 'linkedin_link',
        'label'       => esc_attr__( 'LinkedIn', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,          
                ),
        ),
    ) );

    Kirki::add_field( '#', array(
        'type'        => 'text',
        'settings'    => 'googleplus_link',
        'label'       => esc_attr__( 'Google+', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,          
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'rss_link',
        'label'       => esc_attr__( 'RSS', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,           
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'tumblr_link',
        'label'       => esc_attr__( 'Tumblr', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,          
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'instagram_link',
        'label'       => esc_attr__( 'Instagram', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,            
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'youtube_link',
        'label'       => esc_attr__( 'Youtube', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,           
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'vimeo_link',
        'label'       => esc_attr__( 'Vimeo', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,            
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'behance_link',
        'label'       => esc_attr__( 'Behance', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,           
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'dribbble_link',
        'label'       => esc_attr__( 'Dribbble', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,           
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'flickr_link',
        'label'       => esc_attr__( 'Flickr', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,            
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'git_link',
        'label'       => esc_attr__( 'Git', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,            
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'skype_link',
        'label'       => esc_attr__( 'Skype', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,           
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'weibo_link',
        'label'       => esc_attr__( 'Weibo', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,           
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'foursquare_link',
        'label'       => esc_attr__( 'Foursquare', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,            
                ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'text',
        'settings'    => 'soundcloud_link',
        'label'       => esc_attr__( 'Soundcloud', 'savoya' ),
        'section'     => 'header_top_bar',
        'default'     => '',
        'priority'    => 10,
        'active_callback'    => array(
                array(
                    'setting'  => 'header_top_bar_activate',
                    'operator' => '==',
                    'value'    => 1,           
                ),
        ),
    ) );




    /********************************************
    /********** Custom Code *********************
    /*******************************************/


    Kirki::add_field( '', array(
        'type'        => 'code',
        'settings'    => 'custom_css',
        'label'       => esc_attr__( 'Custom CSS', 'savoya' ),
        'section'     => 'custom_code',
        'default'     => '',
        'priority'    => 10,
        'choices'     => array(
            'language' => 'css',
            'theme'    => 'monokai',
            'height'   => 150,
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'code',
        'settings'    => 'header_js',
        'label'       => esc_attr__( 'Header JavaScript Code', 'savoya' ),
        'section'     => 'custom_code',
        'description' => 'Tracking code (e.g. Google analytics) or arbitrary JavaScript ',
        'default'     => '',
        'priority'    => 10,
        'choices'     => array(
            'language' => 'javascript',
            'theme'    => 'monokai',
            'height'   => 150,
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'code',
        'settings'    => 'footer_js',
        'label'       => esc_attr__( 'Footer JavaScript Code', 'savoya' ),
        'section'     => 'custom_code',
        'default'     => '',
        'priority'    => 10,
        'choices'     => array(
            'language' => 'javascript',
            'theme'    => 'monokai',
            'height'   => 150,
        ),
    ) );



/********************************************
/********** Footer **************************
/*******************************************/


  Kirki::add_field( '', array(
        'type'        => 'radio-image',
        'settings'    => 'footer_layout',
        'label'       => esc_attr__( 'Footer Layout', 'savoya' ),
        'section'     => 'footer',
        'default'     => 'style-1',
        'priority'    => 10,
        'choices'     => array(
            'style-1' => get_template_directory_uri() . '/images/customiser/footer_style_1.png',
            'style-2' => get_template_directory_uri() . '/images/customiser/footer_style_2.png',
            'style-3' => get_template_directory_uri() . '/images/customiser/footer_style_3.png',
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'color',
        'settings'    => 'footer_background_color',
        'label'       => esc_attr__( 'Background Color', 'savoya' ),
        'section'     => 'footer',
        'default'     => '#085477',
        'priority'    => 10,
    ) );


    Kirki::add_field( '', array(
        'type'        => 'color',
        'settings'    => 'footer_font_color',
        'label'       => esc_attr__( 'Text Color', 'savoya' ),
        'section'     => 'footer',
        'default'     => '#067B82',
        'priority'    => 10,
    ) );

    Kirki::add_field( '', array(
        'type'        => 'color',
        'settings'    => 'footer_links_color',
        'label'       => esc_attr__( 'Links Color', 'savoya' ),
        'section'     => 'footer',
        'default'     => '#FFF',
        'priority'    => 10,
    ) );


    Kirki::add_field( '', array(
        'type'        => 'color',
        'settings'    => 'footer_links_color',
        'label'       => esc_attr__( 'Links Color', 'savoya' ),
        'section'     => 'footer',
        'default'     => '#169099',
        'priority'    => 10,
    ) );


    Kirki::add_field( '', array(
        'type'     => 'textarea',
        'settings' => 'footer_text',
        'label'    => __( 'Footer Text', 'savoya' ),
        'section'  => 'footer',
        'default'  => __( '© 2016 savoya Wordpress Theme by <a href="https://www.adriansavoya.ro" target="_blank">Adrian savoya</a>.', 'savoya' ),
        'priority' => 10,
    ) );


       Kirki::add_field( '', array(
        'type'        => 'slider',
        'settings'    => 'footer_font_size',
        'label'       => esc_attr__( 'Font Size', 'savoya' ),
        'section'     => 'footer',
        'priority'    => 10,
        'default'     => '14',
        'choices'     => array(
            'min'  => '10',
            'max'  => '32',
            'step' => 1,
        ),
    ) );


}
 


?>