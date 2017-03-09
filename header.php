<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<?php global $custom_header_layout ?>
<html <?php language_attributes(); ?>>

<head>
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">

	<?php wp_head(); ?>



</head>

<body <?php body_class(); ?>>

    <?php get_template_part( 'template-parts/headers/header', $custom_header_layout ); ?>

	<?php if ( is_front_page() ) {
			echo do_shortcode('[slider-shortcode]');

		}

		?>		

        <div class="page-wrapper">                

        	<div class="site-content">
