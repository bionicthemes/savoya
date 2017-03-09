<?php



    global  $custom_header_logo,

    		$custom_footer_text;



?>



<footer class="site-footer">



    <div class="footer-style-1">


          
    <?php dynamic_sidebar( 'footer-widget-area' ); ?> 




        <div class="row">

	        <div class="large-12 columns">


		        <div class="footer-text">

		           <?php echo $custom_footer_text; ?>

		        </div>

	        </div>

        </div>



    </div>



</footer>