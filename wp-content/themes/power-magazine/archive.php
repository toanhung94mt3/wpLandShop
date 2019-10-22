<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Power_Magazine
 */

get_header();
?>
<div class="container">
	<div class="row">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>
				<div class="heading">
					<header class="page-header">
						<?php
						the_archive_title( '<h3 class="page-title">', '</h3>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->
				</div>

				<div id="post-item-wrapper" class="post-item-wrapper">

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						do_action( 'power_magazine_action_navigation' );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar();?>
	</div>
</div>
<?php
get_footer();
