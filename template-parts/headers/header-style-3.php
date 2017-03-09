<!-- Site Header Version 1 -->

<?php 

global $custom_header_logo,
	   $header_search_state,
	   $custom_header_cart,
	   $custom_header_widget,
	   $custom_header_sticky,
	   $custom_header_transparent_scheme,
	   $custom_header_transparent,
	   $custom_header_transparent_light_logo,
	   $custom_header_transparent_dark_logo;


        /*******************************************/
        /********** Header Transparency Logo *******/
        /*******************************************/

        $original_logo = $custom_header_logo; 

        if ($custom_header_transparent == 1)
        {
            if ($custom_header_transparent_scheme == 'light')
            {
                $custom_header_logo = $custom_header_transparent_light_logo;
            }
            else 
            {
                $custom_header_logo = $custom_header_transparent_dark_logo;
            }
        }

?>

    <?php get_template_part( 'template-parts/includes/header', 'top-bar' ); ?>

<header 
	class="header-style-3 site-header <?php if ( $custom_header_sticky == 1 ) : ?> header-sticky<?php endif; ?> ">
	
		<div class="header-container">

			<!-- Header Search -->

		<!-- 	<div class="header-search">
				<form action="/">
					<input type="search" placeholder="type to search...">
					<a href="#" class="close-btn" id="searchClose"></a>
				</form>
				
			</div>	
 -->
			<!-- Site Logo -->

			<div class="header-search">
				
				<?php get_search_form(); ?>
				
			</div>


			<!-- OffCanvas Menu Open Icon -->

			<div class="offcanvas-menu-icon desktop">
				<a class="offcanvas-icon-open" href="#">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</a>
			</div>


			<div class="header-branding">

	            <?php if ( ! empty( $custom_header_logo ) ) : ?>
	                            
	                <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( $custom_header_logo ); ?>" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>"></a></div>
	            
	            <?php else : ?>

	                <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></div>

	            <?php endif; ?>

			</div>

			<!-- OffCanvas Menu Open Icon -->

			<div class="offcanvas-menu-icon hide-for-large">
				<a class="offcanvas-icon-open" href="#">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</a>
			</div>

		  <div class="header-tools">
	    	
	            <div class="header-icons">

	                <?php if (  $header_search_state == 1 ) : ?>
	                	
	                	<div class="header_icon_wrapper">

	                		<div class="header_icon">
							<span><i class="fa fa-phone" aria-hidden="true"></i></span>
							</div>

							<div class="icon_text">
								<span>Call Today:</span>
								<a class="info" href="tel:313-945-0500">(313) 945-0500 </a>
							</div>

	                	</div>
						

					<?php endif; ?>

					<?php if (  $custom_header_cart == 1 ) : ?>
					
						<div class="header_icon_wrapper">

							<div class="header_icon">
							<span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
							</div>

							<div class="icon_text">
								<span>Opening Hours:</span>
								<span class="info"> Daily: 9am-5pm</span>
							</div>

						</div>
						

					<?php endif; ?>

				</div>
			
	  	  </div>


		  	  <?php if ( $custom_header_widget == 1 ) {

		            dynamic_sidebar('header-widget-area'); 	
				}

				?>

		</div>


	<!-- end Header Container -->

</header>



  <div class="header-tools-mobile">
	
        <div class="header-icons-mobile">

            <?php if (  $header_search_state == 1 ) : ?>
            	
            	<div class="header_icon_wrapper">

            		<div class="header_icon">
					<span><i class="fa fa-phone" aria-hidden="true"></i></span>
					</div>

					<div class="icon_text">
						<span>Call Today:</span>
						<a class="info" href="tel:313-945-0500">(313) 945-0500 </a>
					</div>

					<a href="tel:313-945-0500" class="link"></a>

            	</div>
				

			<?php endif; ?>

			<?php if (  $custom_header_cart == 1 ) : ?>
			
				<div class="header_icon_wrapper">

					<div class="header_icon">
					<span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
					</div>

					<div class="icon_text">
						<span>Opening Hours:</span>
						<span class="info"> Daily: 9am-5pm</span>
					</div>

				</div>
				

			<?php endif; ?>

		</div>
	
	  </div>



<!-- Main Navigation -->
<div class="main-navigation-container">

	<nav class="main-navigation uppercase show-for-large">

	  <?php 
	    wp_nav_menu(array(
	        'theme_location' => 'primary',
	        'fallback_cb'    => 'savoya_empty_menu_fallback',
	        'container'      => false,
	        'items_wrap'     => '<ul class="%1$s">%3$s</ul>',
	    ));
		   ?>

	   <a id="hs3-search"><i class="fa fa-search" aria-hidden="true"></i></a>

	</nav>	

	

</div>	



<!-- end Site Header -->