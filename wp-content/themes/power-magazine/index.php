<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
					<div class="heading">
						<header class="entry-header">
							<h3 class="entry-title page-title screen-reader-text"><?php single_post_title(); ?></h3>
						</header>
					</div>
					<?php
				endif;
				?>
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
