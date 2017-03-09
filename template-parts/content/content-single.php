<?php


 if (is_front_page()) {

	echo '';

} else {

	if ( function_exists('yoast_breadcrumb') ) {

		yoast_breadcrumb('<p id="breadcrumbs">','');

	}

} 
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	

	<header class="entry-header">



		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>



		<div class="entry-excerpt">

			<?php the_excerpt(); ?>

		</div>



	</header><!-- .entry-header -->



	<div class="entry-content">

	<?php the_content(); ?>



	<?php wp_link_pages( array(

					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'savoya' ),

					'after'  => '</div>',

				) );

				?>


	</div><!-- .entry-content -->





</article><!-- #post-## -->

