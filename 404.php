<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="row">

				<div class="large-12 columns">

					<section class="error-404 not-found">
						
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'savoya' ); ?></h1>
						</header>

						<div class="page-content">
							<div class="error-404-description"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'savoya' ); ?></div>
							<div class="error-404-searchform"><?php get_search_form(); ?>
								<i class="icon-gb icon-gb-search"></i>
							</div>
						</div>

					</section>

					<h1 class="text404">404</h1>

				</div>

			</div>

		</main>
	</div>

<?php
get_footer();