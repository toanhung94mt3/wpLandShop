<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Power_Magazine
 */

?><?php
	/**
	 * Hook - power_magazine_action_doctype.
	 *
	 * @hooked power_magazine_doctype -  10
	 */
	do_action( 'power_magazine_action_doctype' );
?>

<head>
	<?php
	/**
	 * Hook - power_magazine_action_head.
	 *
	 * @hooked power_magazine_head -  10
	 */
	do_action( 'power_magazine_action_head' );
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} ?>
	<?php
	/**
	 * Hook - power_magazine_action_before.
	 *
	 * @hooked power_magazine_page_start - 10
	 * 
	 */
	do_action( 'power_magazine_action_before' );

	/**
	 * Hook - power_magazine_action_before_header
	 *
	 * @hooked power_magazine_site_branding -10
	 * @hooked power_magazine_main_navigation -15
	 * @hooked power_magazine_header_information -20
	 *
	 */
	do_action( 'power_magazine_action_before_header' );

	/**
	 * Hook - power_magazine_action_header
	 *
	 * @hooked power_magazine_site_branding -10
	 *
	 */
	do_action( 'power_magazine_action_header' );

	/**
	 * Hook - power_magazine_action_after_header
	 *
	 * @hooked power_magazine_header_end -10
	 *
	 */
	do_action( 'power_magazine_action_after_header' );

	/**
	 * Hook - power_magazine_action_before_content
	 *
	 * @hooked power_magazine_content_start -10
	 *
	 */
	do_action( 'power_magazine_action_before_content' );

