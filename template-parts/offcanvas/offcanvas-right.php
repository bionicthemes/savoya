<?php



// Offcanvas Right

global $custom_header_logo,	
	   $custom_header_top_bar_email,
	   $custom_header_top_bar_phone;




?>

	<!-- OffCanvas Menu -->



	<div class="offcanvas-right">



		<div class="offcanvas_close"><i class="fa fa-times-circle" aria-hidden="true"></i></div>



		<!-- OffCanvas Menu Content (  Header + Navigation  ) -->



		<div class="offcanvas-menu-content">

				<div class="offcanvas-header">
					<ul>
						
						<?php if ( !empty($custom_header_top_bar_email )) : ?>
						<li class="email">
							<a href="mailto: <?php echo $custom_header_top_bar_email; ?> "><i class="fa fa-envelope" aria-hidden="true"></i>
							<?php echo esc_html($custom_header_top_bar_email); ?></a>
						</li>
						<?php endif; ?>
						
						<li class="cta">
							<a class="free-quote" href="#">Free Project Quote</a>
							<a href="tel: <?php echo $custom_header_top_bar_phone; ?> "> <?php echo $custom_header_top_bar_phone; ?></a>

						</li>


					</ul>
				</div>


			<nav class="offcanvas-navigation">

				<?php 

                wp_nav_menu(array(

                    'theme_location' => 'primary',

                    'fallback_cb'    => 'savoya_empty_menu_fallback',

                    'container'      => false,

                    'items_wrap'     => '<ul class="%1$s">%3$s</ul>',

                ));

         	   ?>

			</nav>



		</div>



	<!-- OffCanvas Menu Content (  Footer  ) -->



	</div>



	<!-- end OffCanvas Menu -->