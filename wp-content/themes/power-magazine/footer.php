<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Power_Magazine
 */

?>
<?php 
	/**
	 * Hook - power_magazine_action_after_content
	 *
	 * @hooked power_magazine_content_end -10
	 *
	 */
	do_action( 'power_magazine_action_after_content' );

	/**
	 * Hook - power_magazine_action_before_footer
	 *
	 * @hooked power_magazine_footer_start -10
	 *
	 */
	do_action( 'power_magazine_action_before_footer' );

	/**
	 * Hook - power_magazine_action_footer
	 *
	 * @hooked power_magazine_footer_copyright -10
	 *
	 */
	do_action( 'power_magazine_action_footer' );

	/**
	 * Hook - power_magazine_action_after_footer
	 *
	 * @hooked power_magazine_footer_end -10
	 *
	 */
	do_action( 'power_magazine_action_after_footer' );

	/**
	 * Hook - power_magazine_action_scroll
	 *
	 * @hooked power_magazine_footer_scroll -10
	 *
	 */
	do_action( 'power_magazine_action_scroll' );	

	/**
	 * Hook - power_magazine_action_after
	 *
	 * @hooked power_magazine_page_end -10
	 *
	 */
	do_action( 'power_magazine_action_after' );
?>

<?php wp_footer(); ?>

</body>
</html>
