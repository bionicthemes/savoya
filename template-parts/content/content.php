
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>

		<div class="entry-thumbnail">

           <a href="<?php echo esc_url( the_post_thumbnail_url() ); ?>" rel="lightbox"><?php the_post_thumbnail('medium'); ?></a>

        </div>

	</header>


	<div class="entry-content">

		<?php the_content(sprintf(__( 'Read more &rarr;', 'savoya'))) ?>

		<?php

			wp_link_pages( array(

				'before' => '<div class="page-links">',

				'after'  => '</div>',

			) );

		?>


	</div>

</article>






