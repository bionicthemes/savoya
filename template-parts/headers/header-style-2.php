<!-- Site Header Version 2 -->

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
	class="header-style-2 site-header <?php if ( $custom_header_sticky == 1 ) : ?> header-sticky<?php endif; ?> ">

	<!-- Header Navigation -->

	<div class="header-container">

		<!-- Header Search -->

		<div class="header-search">
			<form action="/">
				<input type="search" placeholder="type to search...">
				<a href="#" class="close-btn" id="searchClose"></a>
			</form>
			
		</div>	

		<!-- Site Logo -->

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
    	
            <ul class="header-icons">

                <?php if (  $header_search_state == '1' ) : ?>
                 	<li>
						<a href="" class="shopping_bag_items_number">
							<i class="fa fa-shopping-bag" aria-hidden="true"></i>
							<sup class="shopping_bag_items_number">10</sup>
						</a>
					</li>	
				<?php endif; ?>

				<?php if (  $custom_header_cart == '1' ) : ?>
					<li href="#" class="search-icon">
						<a href=""><i class="fa fa-search" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>

			</ul>
		
  	  </div>

  	  <!-- OffCanvas Menu Open Icon -->

		<div class="offcanvas-menu-icon">
			<a class="offcanvas-icon-open" href="#">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</a>
		</div>



	  	  <?php if ( $custom_header_widget == 1 ) {

	            dynamic_sidebar('header-widget-area'); 	
			}

			?>




	<!-- end Header Container -->

</header>

<!-- end Site Header -->