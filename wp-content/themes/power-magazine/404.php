<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Power_Magazine
 */

get_header();
?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found" style="background-image: url(<?php echo esc_url(get_template_directory_uri() );?>/assets/img/error.jpg);">
				<h2><?php esc_html_e( '404', 'power-magazine' ); ?></h2>
				<h4>
					<?php esc_html_e( 'page not found', 'power-magazine' ); ?>
                </h4>
				<a class="button" href="<?php echo esc_url(home_url()); ?>">
					<?php echo esc_html__( 'BACK TO HOMEPAGE', 'power-magazine' );?>
				</a>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
