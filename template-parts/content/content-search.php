
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	

	<header class="entry-header">

		

		<!-- <div class="entry-thumbnail">

           <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail(array(1024, 9999)); ?></a>

        </div> -->



		<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>



		<?php //if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">


			</div>

		<?php //endif; ?>



	</header>



</article>