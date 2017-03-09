<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<div class="row">

		<div class="large-12 columns">
			
			<?php if ( have_comments() ) : ?>
				
				<h2 class="comments-title">
					<?php
						printf( // WPCS: XSS OK.
							esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'savoya' ) ),
							number_format_i18n( get_comments_number() ),
							'<span>' . get_the_title() . '</span>'
						);
					?>
				</h2>

			<?php endif; ?>

		</div>

	</div>

	<div class="row">

		<?php if ( have_comments() ) : ?>

			<div class="large-7 columns">

				<?php
				//if ( have_comments() ) : ?>
					
					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
						
						<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
							<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'savoya' ); ?></h2>
							<div class="nav-links">

								<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'savoya' ) ); ?></div>
								<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'savoya' ) ); ?></div>

							</div>
						</nav>

					<?php endif; ?>

					<ul class="comment-list">
						<?php
							wp_list_comments( array(
								'style'     	=> 'ul',
								'max_depth'     => 2,
								'short_ping' 	=> true,
								'callback' 		=> 'savoya_comments'
							) );
						?>
					</ul><!-- .comment-list -->

					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
						
						<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
							<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'savoya' ); ?></h2>
							<div class="nav-links">

								<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'savoya' ) ); ?></div>
								<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'savoya' ) ); ?></div>

							</div>
						</nav>

					<?php
					endif;

				//endif;


				// If comments are closed and there are comments, let's leave a little note, shall we?
				if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
					<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'savoya' ); ?></p>
				<?php endif; ?>
			
			</div>

			<div class="large-4 columns">

				<?php comment_form(); ?>

			</div>

		<?php else: ?>

			<div class="large-6 large-centered columns">

				<div class="comment_form_no_comments">

					<?php comment_form(); ?>

				</div>

			</div>

		<?php endif; ?>

	</div>

</div><!-- #comments -->
