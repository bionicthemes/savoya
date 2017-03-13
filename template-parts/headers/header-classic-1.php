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
	   $custom_header_logo_light_activate;

	   $stickyHeader = '';

		if ( $custom_header_logo_light_activate === '1' ) {

			$custom_header_logo = $custom_header_logo_light;
		} 

		if ( $custom_header_sticky == 1 ) {
			$stickyHeader = 'header-sticky';
			} else {
			$stickyHeader = '';
		}


?>



<?php get_template_part( 'template-parts/includes/header', 'top-bar' ); ?>

<!-- Search -->
	
<div class="header-search">
	<?php get_search_form(); ?>
</div>


<header 
	class="header-classic header-classic-1 site-header <?php echo $stickyHeader; ?>">

	<!-- Header Navigation -->


	<div class="header-container">

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

		<!-- OffCanvas Menu Open Icon -->

		<div class="offcanvas-menu-icon hide-for-large">
			
		</div>

		<!-- Main Navigation -->

		<nav class="main-navigation show-for-large align_right">

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
						
						<!-- <span class="icon-search"></span> -->
						<span id="search" class="icon-search"></span>

						
					</li>

				<?php endif; ?>

			</ul>
		
  	  </div>


	  	  <?php if ( $custom_header_widget == 1 ) {

	            dynamic_sidebar('header-widget-area'); 	
			}

			?>




	<!-- end Header Container -->

</header>

<!-- end Site Header -->