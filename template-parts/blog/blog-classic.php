
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="blog-listing masonry-layout">

			<div class="row">

				<?php if ( ! is_home() ) : ?>

					<header class="archive-title-wrapper">

						<h1 class="archive-title"><?php the_archive_title(); ?></h1>

					</header>

				<?php endif; ?>					
	
				<div id="masonry_grid" class="blog-articles index-layout-2c masonry_columns_2" data-columns>

					<?php
					
					if ( have_posts() ) :

						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content/content', 'masonry-hover' );

						endwhile;

					else :

						get_template_part( 'template-parts/content/content', 'none' );

					endif;

					?>

				</div>
	
				<?php
					the_posts_navigation(array(
						'prev_text' => __( '&larr; Older posts', 'getbowtied' ),
						'next_text' => __( 'Newer posts &rarr;', 'getbowtied' ),
					));
				?>

			</div>

		</div>

	</main><!-- #main -->
</div><!-- #primary -->
