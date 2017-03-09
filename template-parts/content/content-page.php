<?php



global $page_title_chk;





?>


<div class="row">
	<div class="large-12 columns">

	<?php
		 if (is_front_page()) {

	echo '';

	} else {

		if ( function_exists('yoast_breadcrumb') ) {

			yoast_breadcrumb('<p id="breadcrumbs">','');

		}

	} 

	?>
	</div>
</div>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	

	<?php if ( isset($_POST['page_title_meta_box_check']) == 'on' ) : ?>

		<header class="entry-header">



			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		

		</header><!-- .entry-header -->

	<?php endif; ?>



	<div class="entry-content">

		<?php

			the_content();



			wp_link_pages( array(

				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'savoya' ),

				'after'  => '</div>',

			) );

		?>

	</div><!-- .entry-content -->

	

</article><!-- #post-## -->

