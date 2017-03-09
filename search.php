<?php get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

			<div class="blog-listing search">

				<div class="row">

					<div class="large-12 columns">

					<header class="archive-title-wrapper" style="text-align: center;">

						<h1 class="archive-title">

							<span>Blog  <i class="icon-gb icon-gb-arrow-right"></i></span>

						<?php printf( esc_html__( 'Search Results for: %s', 'savoya' ),'' ); ?></h1>

						<h1><?php  echo get_search_query() ?></h1>
				
					</header>

					</div>	

					<div class="large-12  columns">

						<div class="blog-articles">

							<?php

							if ( have_posts() ) :

								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/content/content', 'search' );

								endwhile;

								?>

								<?php

									the_posts_navigation(array(

										'prev_text' => __( '&larr; Older posts', 'savoya' ),

										'next_text' => __( 'Newer posts &rarr;', 'savoya' ),

									));

								?>

							<?php

							else :

								get_template_part( 'template-parts/content/content', 'none' );

							endif;

							?>

						</div>

					</div>

				</div>

			</div>

		</main><!-- #main -->

	</div><!-- #primary -->



<?php

get_footer();