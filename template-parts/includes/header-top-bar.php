<?php

	global	
	$custom_header_top_bar_phone,
	$custom_header_top_bar_email,	
	$custom_header_top_bar_address,	
	$custom_header_top_social_media,
	$custom_header_top_bar_text,
	$custom_header_top_bar_activate,
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
	$fa_soundcloud;

?>

<!-- Header Top Bar -->


<?php if ( $custom_header_top_bar_activate != "0" )   : ?>

	<div class="header-top-bar hide-for-small-only">
		<div class="header-topbar-content">
			<div class="header-topbar-info">
				<ul>
					<?php if ( !empty($custom_header_top_bar_phone )) : ?>
					<li class="phone">
						<a href="tel: <?php echo esc_html($custom_header_top_bar_phone); ?> "> <i class="fa fa-phone-square" aria-hidden="true"></i><?php echo esc_html($custom_header_top_bar_phone); ?></a>

					</li>

					<?php endif; ?>

					<?php if ( !empty($custom_header_top_bar_email )) : ?>
					<li class="email">
						<a href="mailto: <?php echo $custom_header_top_bar_email; ?> "><i class="fa fa-envelope" aria-hidden="true"></i>
						<?php echo esc_html($custom_header_top_bar_email); ?></a>
					</li>

					<?php endif; ?>

					<?php if ( !empty($custom_header_top_bar_address )) : ?>
					<li class="address">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
						<?php echo esc_html($custom_header_top_bar_address); ?>
					</li>

					<?php endif; ?>
				</ul>
			</div>

			<div class="header-topbar-social">

				<ul>
				
					<?php if ( $fa_facebook ) : ?>
					<li class="facebook">
					<a target="_blank" href="<?php echo esc_html( $fa_facebook ); ?>">
	            		<i class="fa fa-facebook"></i>
            		</a>
        			</li>
					<?php endif; ?>

					<?php if ( $fa_twitter ) : ?>
					<li class="twitter">
					<a target="_blank" href="<?php echo esc_html( $fa_twitter ); ?>">
	            		<i class="fa fa-twitter"></i>
            		</a>
        			</li>
        			<?php endif; ?>
					
					<?php if ( $fa_pinterest ) : ?>
					<li class="pinterest">
					<a target="_blank" href="<?php echo esc_html( $fa_pinterest ); ?>">
	            		<i class="fa fa-pinterest"></i>
            		</a>
        			</li>
        			<?php endif; ?>

        			<?php if ( $fa_linkedin ) : ?>
					<li class="linkedin">
					<a target="_blank" href="<?php echo esc_html( $fa_linkedin ); ?>">
	            		<i class="fa fa-linkedin"></i>
            		</a>
        			</li>
        			<?php endif; ?>

        			<?php if ( $fa_googleplus ) : ?>
					<li class="googleplus">
					<a target="_blank" href="<?php echo esc_html( $fa_googleplus ); ?>">
	            		<i class="fa fa-googleplus"></i>
            		</a>
        			</li>
        			<?php endif; ?>

        			<?php if ( $fa_rss ) : ?>
					<li class="rss">
					<a target="_blank" href="<?php echo esc_html( $fa_rss ); ?>">
	            		<i class="fa fa-rss"></i>
            		</a>
        			</li>
        			<?php endif; ?>

        			<?php if ( $fa_tumblr ) : ?>
					<li class="tumblr">
					<a target="_blank" href="<?php echo esc_html( $fa_tumblr ); ?>">
	            		<i class="fa fa-tumblr"></i>
            		</a>
        			</li>
        			<?php endif; ?>

    				<?php if ( $fa_instagram ) : ?>
					<li class="instagram">
					<a target="_blank" href="<?php echo esc_html( $fa_instagram ); ?>">
	            		<i class="fa fa-instagram"></i>
            		</a>
        			</li>
        			<?php endif; ?>

        			<?php if ( $fa_youtube ) : ?>
					<li class="youtube">
					<a target="_blank" href="<?php echo esc_html( $fa_youtube ); ?>">
	            		<i class="fa fa-youtube"></i>
            		</a>
        			</li>
        			<?php endif; ?>

        			<?php if ( $fa_vimeo) : ?>
					<li class="vimeo">
					<a target="_blank" href="<?php echo esc_html( $fa_vimeo ); ?>">
	            		<i class="fa fa-vimeo"></i>
            		</a>
        			</li>
        			<?php endif; ?>

        			<?php if ( $fa_behance ) : ?>
					<li class="behance">
					<a target="_blank" href="<?php echo esc_html( $fa_behance ); ?>">
	            		<i class="fa fa-behance"></i>
            		</a>
        			</li>
        			<?php endif; ?>

        			<?php if ( $fa_dribbble ) : ?>
					<li class="dribbble">
					<a target="_blank" href="<?php echo esc_html( $fa_dribbble ); ?>">
	            		<i class="fa fa-dribbble"></i>
            		</a>
        			</li>
        			<?php endif; ?>

        			<?php if ( $fa_flickr ) : ?>
					<li class="flickr">
					<a target="_blank" href="<?php echo esc_html( $fa_flickr ); ?>">
	            		<i class="fa fa-flickr"></i>
            		</a>
        			</li>
        			<?php endif; ?>

        			<?php if ( $fa_git ) : ?>
					<li class="git">
					<a target="_blank" href="<?php echo esc_html( $fa_git ); ?>">
	            		<i class="fa fa-git"></i>
            		</a>
        			</li>
        			<?php endif; ?>

        			<?php if ( $fa_skype ) : ?>
					<li class="skype">
					<a target="_blank" href="<?php echo esc_html( $fa_skype ); ?>">
	            		<i class="fa fa-skype"></i>
            		</a>
        			</li>
        			<?php endif; ?>

        			<?php if ( $fa_weibo ) : ?>
					<li class="weibo">
					<a target="_blank" href="<?php echo esc_html( $fa_weibo ); ?>">
	            		<i class="fa fa-weibo"></i>
            		</a>
        			</li>
        			<?php endif; ?>

        			<?php if ( $fa_foursquare ) : ?>
					<li class="foursquare">
					<a target="_blank" href="<?php echo esc_html( $fa_foursquare ); ?>">
	            		<i class="fa fa-foursquare"></i>
            		</a>
        			</li>
        			<?php endif; ?>

        			<?php if ( $fa_soundcloud ) : ?>
					<li class="soundcloud">
					<a target="_blank" href="<?php echo esc_html( $fa_soundcloud ); ?>">
	            		<i class="fa fa-soundcloud"></i>
            		</a>
        			</li>
        			<?php endif; ?>

				</ul>

			</div>

		
				
		</div>	
	</div>


<?php endif; ?>

<!-- end Header Top Bar -->