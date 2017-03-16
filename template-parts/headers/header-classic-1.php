<!-- Site Header Version 1 -->

<?php 



global $custom_header_logo,
	   $custom_header_search_state,
	   $custom_header_cart,
	   $custom_header_widget,
	   $custom_header_sticky,
	   $custom_header_sticky_logo,
	   $custom_header_top_bar_phone,
	   $custom_header_transparent,
	   $custom_header_logo_light,
	   $custom_header_logo_light_activate,
	   $custom_align_menu_class;

	   $stickyHeader = '';

	   $header_classes = array();

		if ( $custom_header_logo_light_activate === '1' ) {

			$custom_header_logo = $custom_header_logo_light;
		} 

		if ( $custom_header_sticky == 1 ) {
			$stickyHeader = 'header-sticky';
			$header_classes[0] = "header-sticky";
			} else {
				$header_classes[0] = '';
			$stickyHeader = '';
		}

		switch ($custom_align_menu_class) {
			case 'align_left':
				$custom_align_menu_class = 'align_left';
				break;
			case 'align_center':
				$custom_align_menu_class = 'align_center';
				break;
			case 'align_right':
				$custom_align_menu_class = 'align_right';
				break;
			
			default:
				$custom_align_menu_class = 'align_right';
				break;
		}

		$header_classes[1] = $custom_align_menu_class;

		$header_class = implode(" ", $header_classes);


?>



<?php get_template_part( 'template-parts/includes/header', 'top-bar' ); ?>



<header 
	class="header-classic header-classic-1 site-header <?php echo $header_class; ?>">

	<!-- Header Navigation -->


	<div class="header-container">


		<div class="header-search">
			<?php get_search_form(); ?>
		</div>

		<!-- Site Logo -->
		<div class="header-branding">

            <?php if ( ! empty( $custom_header_logo ) ) : ?>
                            
                <div class="logo">
	                <a class="logo_img" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( $custom_header_logo ); ?>" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>">
	                </a>

	                 <a class="sticky_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( $custom_header_sticky_logo ); ?>" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>">
	                </a>
	                
                </div>
            
            <?php else : ?>

                <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></div>

            <?php endif; ?>

		</div>


		<!-- Main Navigation -->

		<nav class="main-navigation show-for-large">

			  <?php 
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '<ul class="%1$s">%3$s</ul>',
                    'fallback_cb'       => 'savoya_Nav_Walker::fallback',
    		        'walker'            => new savoya_Nav_Walker()
                ));
         	   ?>
		</nav>

	
	  <div class="header-tools">
    	
            <ul class="header-icons">

				<!-- here should be another if woocommerce class exists! -->

            	<?php if (class_exists( 'Woocommerce' ) && $custom_header_cart == 1 ) : ?>
					<li>
						<a href="" class="shopping_bag_items_number">
							<i class="fa fa-shopping-bag" aria-hidden="true"></i>
							<sup class="shopping_bag_items_number">10</sup>
						</a>
					</li>	
				<?php endif; ?>

                <?php if (  $custom_header_search_state == 1 ) : ?>
                	
                	<li class="search-icon">
						
						<span id="search" class="icon-search"></span>
						
					</li>

				<?php endif; ?>

			</ul>
		
  	  </div>

	<!-- end Header Container -->

</header>

<!-- end Site Header -->