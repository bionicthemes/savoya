<?php


if ( ! function_exists ('savoya_theme_option') ) {
	function savoya_theme_option( $name, $default ) {
		global $presets;
		return (!empty($presets['mods'][$name])) ? $presets['mods'][$name] : get_theme_mod( $name, $default );
	} 
} 

if ( ! function_exists ('theme_custom_styles') ) {
	function theme_custom_styles() {	

	global $custom_header_layout,
		   $custom_header_logo,
		   $custom_header_search_state,
		   $custom_header_cart,
		   $custom_header_widget,
		   $custom_header_sticky,
		   $custom_header_background_color,
		   $custom_header_text_color,
		   $custom_header_links_color,
		   $custom_header_font_size,
		   $custom_header_size,
		   $custom_header_height,
		   $custom_header_sticky_background_color,
		   $custom_header_sticky_text_color,
		   $custom_header_sticky_links_color,
		   $custom_header_sticky_height,
		   $custom_header_transparent,
		   $custom_header_transparent_scheme,
		   $custom_header_transparent_light_color,
		   $custom_header_transparent_light_logo,
		   $custom_header_transparent_dark_color,
		   $custom_header_transparent_dark_logo,
		   $custom_header_top_bar_activate,

		   // Top Bar
		   $custom_header_top_bar_background_color,
		   $custom_header_top_bar_links_color,
		   $custom_header_top_bar_text_color,
		   $custom_header_top_bar_hover_color,
		   $custom_header_top_bar_phone,
		   $custom_header_top_bar_email,
		   $custom_header_top_bar_address,
		   $custom_header_top_social_media,
		   $custom_header_top_bar_text,
		   $custom_header_top_bar_font_size,
		   $custom_header_top_bar_paddingTB,
		   $custom_header_top_bar_paddingRL,


			$fa_facebook,
			$fa_twitter,
			$fa_pinterest,
			$fa_linkedin,
			$fa_googleplus,
			$fa_rss,
			$fa_tumblr,
			$fa_instagram,
			$fa_youtube,
			$fa_vimeo,
			$fa_behance,
			$fa_dribbble,
			$fa_flickr,
			$fa_git,
			$fa_skype,
			$fa_weibo,
			$fa_foursquare,
			$fa_soundcloud,


			//footer

			$custom_footer_layout,
			$custom_footer_background_color,
			$custom_footer_font_color,
			$custom_footer_links_color,
			$custom_footer_text,
			$custom_footer_credit_card_icons,
			$custom_footer_font_size,


			$custom_css,
			$custom_header_js,
			$custom_footer_js,


			$custom_font_size,
			$custom_default_theme_fonts,
			$custom_main_font,
			$custom_secondary_font,
			$custom_main_font_test,
			$custom_secondary_font_test,


		   // WP

		   $base_font_size;

			$custom_header_layout          			 = savoya_theme_option('header_layout', 'style-1');
			$custom_header_logo            			 = savoya_theme_option('header_logo', get_template_directory_uri() . '/includes/assets/logo.png');
			$custom_header_sticky           		 = savoya_theme_option('header_sticky', 1);
			$custom_header_search_state          	 = savoya_theme_option('header_search', 1);
			$custom_header_cart                      = savoya_theme_option('header_cart', 0);
			$custom_header_widget      	             = savoya_theme_option('header_widget', 1);
			$custom_header_background_color 		 = savoya_theme_option('header_background_color', '#FFF');
			$custom_header_text_color    		 	 = savoya_theme_option('header_text_color', '#757575');
			$custom_header_links_color               = savoya_theme_option('header_links_color', '#212121');
			$custom_header_font_size                 = savoya_theme_option('header_font_size', '12');
			$custom_header_size            			 = savoya_theme_option('header_size', 'wide');
			$custom_header_height          			 = savoya_theme_option('header_height', '100');
			$custom_header_sticky_background_color   = savoya_theme_option('header_sticky_background_color', '#085477');
			$custom_header_sticky_text_color     	 = savoya_theme_option('header_sticky_text_color', '#FFFFFF');
			$custom_header_sticky_links_color      	 = savoya_theme_option('header_sticky_links_color', '#169099');
			$custom_header_sticky_height          	 = savoya_theme_option('header_sticky_height', '65');

			// footer

			$custom_footer_layout 					= savoya_theme_option( 'footer_layout', 					'style-1' );
			$custom_footer_background_color 		= savoya_theme_option( 'footer_background_color', 			'#067B82' );
			$custom_footer_font_color 				= savoya_theme_option( 'footer_font_color', 				'#ff3939' );
			$custom_footer_links_color 				= savoya_theme_option( 'footer_links_color', 				'#FFF' );
			$custom_footer_text 					= savoya_theme_option( 'footer_text', '© 2016 savoya Wordpress Theme by <a href="https://www.adriansavoya.ro" target="_blank">savoya</a>.' );
			$custom_footer_links_color 			= savoya_theme_option( 'footer_links_color', 				'#169099' );
			$custom_footer_font_size 			    = savoya_theme_option( 'footer_font_size', 				'14' );

			

			$custom_header_transparent 				= savoya_theme_option( 'header_transparent', 				0 );
			$custom_header_transparent_scheme		= savoya_theme_option( 'header_transparent_scheme', 		'dark' );
			$custom_header_transparent_light_color	= savoya_theme_option( 'header_transparent_light_color', 	'#FFFFFF' );
			$custom_header_transparent_light_logo	= savoya_theme_option( 'header_transparent_light_logo', 	'' );
			$custom_header_transparent_dark_color	= savoya_theme_option( 'header_transparent_dark_color', 	'#000000' );
			$custom_header_transparent_dark_logo	= savoya_theme_option( 'header_transparent_dark_logo', 		'' );

			// Top Bar

			$custom_header_top_bar_background_color = savoya_theme_option('header_top_bar_background_color', '#05F9DF');
			$custom_header_top_bar_text_color       = savoya_theme_option('header_top_bar_text_color', '#7f8c8d');
			$custom_header_top_bar_links_color      = savoya_theme_option('header_top_bar_links_color', '#37474F');
			$custom_header_top_bar_hover_color      = savoya_theme_option('header_top_bar_hover_color', '#546E7A');
			$custom_header_top_bar_phone            = savoya_theme_option( 'header_top_bar_phone', '+1-202-555-0121');
		    $custom_header_top_bar_email            = savoya_theme_option( 'header_top_bar_email', 'website@website.com');
		    $custom_header_top_bar_address          = savoya_theme_option( 'header_top_bar_address', '6 Poplar Way, Cranford, NJ, 07016');
		    $custom_header_top_bar_text          	= savoya_theme_option( 'header_top_bar_text', 'This is a dummy text');
		    $custom_header_top_bar_activate			= savoya_theme_option( 'header_top_bar_activate', 0);


		    $custom_header_top_bar_font_size		= savoya_theme_option( 'header_top_bar_font_size', '11');

		    $custom_header_top_bar_paddingTB		= savoya_theme_option( 'header_top_bar_paddingTB', 0);
		    $custom_header_top_bar_paddingRL		= savoya_theme_option( 'header_top_bar_paddingRL', '10');


		    // Top Bar Social MEdia
		    $custom_header_top_social_media         = savoya_theme_option( 'header_top_social_media', 0);
		    $custom_top_bar_text                    = savoya_theme_option( 'top_bar_text', 0);
	    	$fa_facebook							= savoya_theme_option( 'facebook_link', 					'#' );
			$fa_twitter 							= savoya_theme_option( 'twitter_link', 						'#' );
			$fa_pinterest 							= savoya_theme_option( 'pinterest_link', 					'#' );
			$fa_linkedin 							= savoya_theme_option( 'linkedin_link', 					'#' );
			$fa_googleplus 							= savoya_theme_option( 'googleplus_link', 					'#' );
			$fa_rss									= savoya_theme_option( 'rss_link', 							'#' );
			$fa_tumblr 								= savoya_theme_option( 'tumblr_link', 						'' );
			$fa_instagram							= savoya_theme_option( 'instagram_link', 					'' );
			$fa_youtube 							= savoya_theme_option( 'youtube_link', 						'' );
			$fa_vimeo 								= savoya_theme_option( 'vimeo_link', 						'' );
			$fa_behance 							= savoya_theme_option( 'behance_link', 						'' );
			$fa_dribbble 							= savoya_theme_option( 'dribbble_link', 					'' );
			$fa_flickr								= savoya_theme_option( 'flickr_link', 						'' );
			$fa_git_link 							= savoya_theme_option( 'git_link', 							'' );
			$fa_skype 								= savoya_theme_option( 'skype_link', 						'' );
			$fa_weibo 								= savoya_theme_option( 'weibo_link', 						'' );
			$fa_foursquare 							= savoya_theme_option( 'foursquare_link', 					'' );
			$fa_soundcloud 							= savoya_theme_option( 'soundcloud_link', 					'' );

			$base_font_size                         = savoya_theme_option('font_size', '14');



			$custom_font_size 						= savoya_theme_option( 'font_size', 						'17' );
			$custom_default_theme_fonts				= savoya_theme_option( 'default_theme_fonts', 			'default_fonts' );
			$custom_main_font 						= savoya_theme_option( 'main_font', 						'Work Sans' );
			$custom_secondary_font 					= savoya_theme_option( 'secondary_font', 					'' );
			$custom_main_font_test					= savoya_theme_option( 'main_font_test', 					'adahybrid' );
			$custom_secondary_font_test				= savoya_theme_option( 'secondary_font_test', 			'adahybrid' );


			// custom code

			
			$custom_css 							= savoya_theme_option( 'custom_css', 						'' );
			$custom_header_js 						= savoya_theme_option( 'header_js', 						'' );
			$custom_footer_js 						= savoya_theme_option( 'footer_js', 						'' );


			// footer

		


			// body

			$custom_body_layout 					= savoya_theme_option( 'body_layout', 						'boxed' );

			

			?>

	<style>


		/***********************************
		/********** HEADER *****************
		/**********************************/

		/* Header Typography Color */

		<?php

		


		function header_colors($color_scheme, $text_color, $links_color) {

			$text_color_ultra_light = 'rgba('.savoya_hex2rgb($text_color).', 0.08)';

			$header_colors_classes = '

				' . $color_scheme . ' .site-header.header-style-1 .header-container .header-branding .site-title a,
				' . $color_scheme . ' .site-header.header-style-1 .header-container .header-icons-mobile > li > a,
				' . $color_scheme . ' .site-header.header-style-1 .header-container .main-navigation > ul > li > a,
				' . $color_scheme . ' .site-header.header-style-1 .header-container .header-tools > ul > li > a,
				' . $color_scheme . ' .site-header.header-style-1 .header-container .main-navigation ul > li:hover > a,
				' . $color_scheme . ' .site-header.header-style-1 .header-container .header-widget,
				' . $color_scheme . ' .site-header.header-style-1 .header-container .offcanvas-menu-icon a,

				' . $color_scheme . ' .site-header.header-style-2 .header-container .header-branding .site-title a,
				' . $color_scheme . ' .site-header.header-style-2 .header-container .header-icons-mobile > li > a,
				' . $color_scheme . ' .site-header.header-style-2 .header-container .main-navigation > ul > li > a,
				' . $color_scheme . ' .site-header.header-style-2 .header-container .header-tools > ul > li > a,
				' . $color_scheme . ' .site-header.header-style-2 .header-container .main-navigation ul li:hover > a,
				' . $color_scheme . ' .site-header.header-style-2 .header-container .header-widget,
				' . $color_scheme . ' .site-header.header-style-2 .header-container .offcanvas-menu-icon a,

				' . $color_scheme . ' .site-header.header-style-3 .header-container .header-branding .site-title a,
				' . $color_scheme . ' .site-header.header-style-3 .header-container .header-icons-mobile > li > a,
				' . $color_scheme . ' .site-header.header-style-3 .header-container .main-navigation > ul > li > a,
				' . $color_scheme . ' .site-header.header-style-3 .header-container .header-tools > ul > li > a,
				' . $color_scheme . ' .site-header.header-style-3 .header-container .main-navigation ul li:hover > a,
				' . $color_scheme . ' .site-header.header-style-3 .header-container .header-widget,
				' . $color_scheme . ' .site-header.header-style-3 .header-container .offcanvas-menu-icon a
				{
					color: ' . $text_color . ';
				}

				' . $color_scheme . ' .site-header:not(.header-sticky.active) .header-tools .shopping_bag_items_number,
				' . $color_scheme . ' .site-header:not(.header-sticky.active) .main-navigation > ul > li.current-menu-item > a
				{
					color: ' . $links_color . ' !important;
				}

				' . $color_scheme . ' .site-header.header-style-1 .header-container .main-navigation > ul > li:hover
				{
					color: ' . $text_color . ' !important;
				}


			';

			echo $header_colors_classes;

		}


		header_colors('', $custom_header_text_color, $custom_header_links_color);
		header_colors('.header-transparent-light', $custom_header_transparent_light_color,	$custom_header_links_color);
		header_colors('.header-transparent-dark ', $custom_header_transparent_dark_color, 	$custom_header_links_color);


		?>




		/*******************************************************
		/******** Customizing Elements *****************
		/*******************************************************/


		/*******************************************************
		/******** Customizing Elements *****************/

		.header-top-bar
		{
			background: <?php echo $custom_header_top_bar_background_color; ?>;
			color: <?php echo $custom_header_top_bar_text_color; ?>;
			font-size: <?php echo $custom_header_top_bar_font_size .'px'; ?>;

			padding-top: <?php echo $custom_header_top_bar_paddingTB .'px'; ?>;
			padding-bottom: <?php echo $custom_header_top_bar_paddingTB .'px'; ?>;

			padding-left: <?php echo $custom_header_top_bar_paddingRL .'px'; ?>;
			padding-right: <?php echo $custom_header_top_bar_paddingRL .'px'; ?>;
			

		}

		.header-top-bar a
		{
			color: <?php echo $custom_header_top_bar_links_color; ?>;
		}

		.header-top-bar a:hover
		{
			color: <?php echo $custom_header_top_bar_hover_color; ?>;
		}


		

		/***********************************
		/********** HEADER *****************
		/**********************************/

	

		.site-header
		{
			background-color: <?php echo $custom_header_background_color; ?>;         /* Header Background Color */
			height: <?php echo $custom_header_height .'px !important';  ?>;                      /* Header Height */
		}		


		.site-header.header-style-1 .header-container .main-navigation > ul > li > a,
		.site-header.header-style-1 .header-container .header-branding .site-title a,
		.site-header.header-style-1 .header-container .header-icons-mobile > li > a,
		.site-header.header-style-1 .header-container .header-tools > ul > li > a,
		.site-header.header-style-1 .header-container .header-widget

		.site-header.header-style-2 .header-container .main-navigation > ul > li > a,
		.site-header.header-style-2 .header-container .header-branding .site-title a,
		.site-header.header-style-2 .header-container .header-icons-mobile > li > a,
		.site-header.header-style-2 .header-container .header-tools > ul > li > a,
		.site-header.header-style-2 .header-container .header-widget

		.site-header.header-style-3 .header-container .main-navigation > ul > li > a,
		.site-header.header-style-3 .header-container .header-branding .site-title a,
		.site-header.header-style-3 .header-container .header-icons-mobile > li > a,
		.site-header.header-style-3 .header-container .header-tools > ul > li > a,
		.site-header.header-style-3 .header-container .header-widget,

		.header-search form input
		{
			font-size: <?php echo $custom_header_font_size . 'px'; ?>;                /* Header Font-Size */
			color: <?php echo $custom_header_text_color; ?>;                       /* Header Color */

		}


		.site-header .header-container .main-navigation > ul > li:not(.menu-item-btn) > a
		{
			line-height: <?php echo $custom_header_height .'px !important';  ?>; 
			height: <?php echo $custom_header_height .'px !important';  ?>;    
		}


		.site-header.header-sticky.active
		{
			background-color: <?php echo $custom_header_sticky_background_color; ?>;
			height: <?php echo $custom_header_sticky_height .'px !important';  ?>;   
		}

		.site-header.header-sticky.active .header-container .main-navigation > ul > li > a
		{
			line-height: <?php echo $custom_header_sticky_height .'px !important';  ?>; 
			height: <?php echo $custom_header_sticky_height .'px !important';  ?>;    
		}

		.site-header.header-style-1.active .header-container .header-branding .logo img
		{
			max-height: <?php echo $custom_header_sticky_height .'px !important';  ?>;
		} 


		.site-header.header-sticky.active .header-container .header-branding .site-title a,
		.site-header.header-sticky.active .header-container .header-icons-mobile > li > a,
		.site-header.header-sticky.active .header-container .header-tools > ul > li > a,
		.site-header.header-sticky.active .header-container .main-navigation > ul > li > a,
		.site-header.header-sticky.active .header-container .header-widget

		{
			color: <?php echo $custom_header_sticky_text_color;?>;
		}

		.site-header.header-sticky.active .header-tools .header-icons li a .shopping_bag_items_number,
		.site-header.header-sticky.active .main-navigation > ul > li.current-menu-item > a

		{
			background-color: <?php echo $custom_header_sticky_links_color;?>;
		}





		/***********************************
		/********** BODY *****************
		/**********************************/


		body 
		{
			font-size: <?php echo $base_font_size . 'px';?>;
		}


		/***************************************************************/
		/* Fonts *******************************************************/
		/***************************************************************/
		
		h1, h2, h3, h4, h5, h6,
		[type='text'],
		[type='password'],
		[type='date'],
		[type='datetime'],
		[type='datetime-local'],
		[type='month'],
		[type='week'],
		[type='email'],
		[type='number'],
		[type='search'],
		[type='tel'],
		[type='time'],
		[type='url'],
		[type='color'],
		[type="submit"],
		select,
		textarea,
		table > thead > tr > th,
		dl dt,
		button,
		.button,
		.site-header ul.header-tools,
		.main-navigation > ul > li > a,
		.main-navigation > ul > li.mega-menu > ul > li > a,
		.header-branding,
		.site-header .header-mobiles,
		.site-footer,
		.blog-listing article .entry-meta,
		.blog-listing article .more-link,
		.blog-listing .posts-navigation .nav-links,
		.comments-area .comment-list .comment-body .comment-text .comment-reply,
		.comments-area .comment-list .comment-body .comment-text .comment-edit-link,
		.comments-area .comment-list .comment-body .author-info,
		.widget-area .widget ul li span.count, .widget-area .widget ul li span.post_count,
		.widget-area .widget.widget_recent_entries li .post-date,
		.widget-area .widget.widget_recent_comments .comment-author-link,
		.widget-area .widget.widget_rss li .rss-date,
		.widget-area .widget.widget_rss li cite,
		.header-top-bar,
		.header-top-bar a
		{
			font-family: 
			<?php echo "'" . $custom_main_font . "'," ?>
			sans-serif;
		}


			/* Body Layout ******************************************************/
		/********************************************************************/

		<?php if ($custom_body_layout == "full_width") : ?>
			.site-content {max-width: 100%;}
		<?php else: ?>
 			.site-content {max-width: 1200px; margin: 0 auto;}
		<?php endif; ?>


		
		/***********************************
		/********** FOOTER *****************
		/**********************************/

		
		.site-footer
		{
			background-color: <?php echo $custom_footer_background_color; ?>; 
			font-size: <?php echo $custom_footer_font_size . 'px ';  ?>;
		}
		
		.site-footer a
		{
			color: <?php echo $custom_footer_font_color; ?>;
			font-size: <?php echo $custom_footer_font_size . 'px '; ?>;
		}

		.site-footer .footer-text
		{
			color: <?php echo $custom_footer_links_color; ?>;
			font-size: <?php echo $custom_footer_font_size .'px '; ?>;
		}

		.site-footer a:hover
		{
			color: <?php echo $custom_footer_links_color; ?>;
		}
		

		/********************************************************************/
		/* Custom CSS *******************************************************/
		/********************************************************************/
		
		<?php echo $custom_css ?>
	

	</style>


 <!-- ******************************************************************** -->
	<!-- * Custom Header JavaScript Code ************************************ -->
	<!-- ******************************************************************** -->
    
    <?php if ( (isset($custom_header_js)) && ($custom_header_js != "") ) : ?>
        <?php echo $custom_header_js; ?>
    <?php endif; ?>

<?php
$content = ob_get_clean();
$content = str_replace(array("\r\n", "\r"), "\n", $content);
$lines = explode("\n", $content);
$new_lines = array();
foreach ($lines as $i => $line) { if(!empty($line)) $new_lines[] = trim($line); }
echo implode($new_lines);
} //function
} //if
add_action( 'wp_head', 'theme_custom_styles', 99 );