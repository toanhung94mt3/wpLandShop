<?php
/**
 * This Template is used to display front page.
 * Template Name: Home
 *
 * @package Power_Magazine
 */
get_header();
?>
<div class="container">
	<div class="row">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php dynamic_sidebar( 'home-content' ); ?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar( 'home' );?>
	</div>
</div>
<?php
get_footer();