<?php 





function slider_custom_shortcode( $atts ) {



     extract(shortcode_atts(array(

      'width' => 1000,

      'height' => 400,

   ), $atts));



	// The Query



	$args = array( 'post_type' => 'slides', 'posts_per_page' => 10 );



	$the_query = new WP_Query( $args );



	// The Loop



	$output_sliders = "";

	if ( $the_query->have_posts() ) {

		$output_sliders .= '<div class="slider-container">';



			while ( $the_query->have_posts() ) {

				$the_query->the_post();

				global $post;

				$output_sliders .= '<div style="position: relative;">' . get_the_post_thumbnail() . 

				get_the_content() . '</div>';	
			}

			$output_sliders .= '</div>';



			return $output_sliders;

			

		/* Restore original Post Data */

		wp_reset_postdata();

	} else {

		// no posts found

	}

  

}

add_shortcode('slider-shortcode', 'slider_custom_shortcode');







function products_custom_shortcode( $atts, $content = null ) {

 // Attributes

  	extract(shortcode_atts(array(
            'category'  => '',
            'items' => '',
            'col' => '',
            ), $atts));


  	if ( $items )
  	{
		$items = $atts['items'];
  	}



  	if ( $col )
  	{
		$col = $atts['col'];
  	} else{
  		$col = 3;
  	}


  	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;


    $options = array(
        'post_type' => 'products',
        'order' => 'ASC',
        'posts_per_page' => $items,
        'paged'             =>  $paged,

        'tax_query' => array(
            array(
                'taxonomy' => 'categories',
                'field' => 'slug',
                'terms' => array( $category ),
            ),
        ));

	$the_query = new WP_Query( $options );


	$content = '';

	if ( $the_query->have_posts() ) {

			$content .= '<div class="products-container">';

				while ( $the_query->have_posts() ) {
		
					$the_query->the_post();

					$content .= '<div class="large-'. $col .' columns"><div class="product-image boxshadow"><a data-lightbox="products" rel="lightbox" data-title="  ' . get_the_title() . '  " href=" ' . get_the_post_thumbnail_url() .  ' ">' . get_the_post_thumbnail( $post = null, $size = 'full' ) . ' </a><p class="title"><a href=" ' . get_post_permalink() .  ' "> '. get_the_title() .'</a></p></div></div>';


				}

				$content .= '</div>';


				global $wp_query;


	  		 	 $args_pagi = array(
	            'base' => add_query_arg( 'paged', '%#%' ),
	            'total' => $the_query->max_num_pages,
	            'current' => $paged
	            );
	                        $content .= '<div class="post-nav">';
	                         $content .= paginate_links( $args_pagi);

	                        //    $output .= '<div class="next-page">' . get_next_posts_link( "Older Entries »", 3 ) . '</div>';

                        $content .= '</div>';




			/* Restore original Post Data */

			wp_reset_postdata();


			return $content;

		} else {

			// no posts found
		}



}

add_shortcode('products-shortcode', 'products_custom_shortcode');