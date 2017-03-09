<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package savoya
 * @subpackage savoya
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<header class="page-header">
		<h2 class="page-title"><?php _e( 'Posts', 'savoya' ); ?></h2>
	</header>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="blog-listing">

				<div class="row">

					<?php if ( ! is_home() ) : ?>

					<header class="archive-title-wrapper">

						<h1 class="archive-title"><?php the_archive_title(); ?></h1>
						<div class="archive-description"><?php the_archive_description(); ?></div>

					</header>

				<?php endif; ?>
					
					<div class="large-9 large-push-3 columns">
		
						<div class="blog-articles">

							<?php
							
							if ( have_posts() ) :

								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/content/content', get_post_format() );

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

				<div class="large-3 large-pull-9 columns">
					<?php get_sidebar(); ?>
				</div>				

			</div>

		</div>



			
		</main><!-- #main
	</div><!-- #primary -->
</div><!-- .wrap --> 

<?php get_footer();
