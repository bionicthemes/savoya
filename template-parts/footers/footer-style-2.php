<?php
    global 	$custom_footer_text,
    		$custom_footer_credit_card_icons;
?>

<footer class="site-footer">

	<div class="trigger-footer-widget-area">
		<i class="icon-gb icon-gb-triangle-down"></i>
	</div>

    <div class="footer-style-2">

    	<div class="row">

	    	<div class="widget-area">

		        <?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
	                <?php dynamic_sidebar( 'footer-widget-area' ); ?>
	            <?php endif; ?>
			                
		    </div>

	    </div>

    	<div class="row">        
	        
	        <div class="large-6 columns">
	        	<div class="footer-text">
		            <?php echo $custom_footer_text; ?>
		        </div>
	        </div>

	        <div class="large-6 columns">
		        <div class="footer-payment">
		        	<img src="<?php echo $custom_footer_credit_card_icons; ?>" alt="">
		        </div>
	        </div>

	    </div>

    </div>

</footer>