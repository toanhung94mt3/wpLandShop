<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Power_Magazine
 */

if ( ! function_exists( 'power_magazine_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
	function power_magazine_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
	}
endif;

add_action( 'power_magazine_action_doctype', 'power_magazine_doctype', 10 );

if ( !function_exists( 'power_magazine_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
	function power_magazine_head() {
	?>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
	<?php
	}
endif;

add_action( 'power_magazine_action_head', 'power_magazine_head', 10 );

if ( ! function_exists( 'power_magazine_page_start' ) ) :
	/**
	 * Page Start.
	 *
	 * @since 1.0.0
	 */
	function power_magazine_page_start() {
	?>
    <div id="page" class="site">
    	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'power-magazine' ); ?></a>
    <?php
	}
endif;
add_action( 'power_magazine_action_before', 'power_magazine_page_start' );

if ( ! function_exists( 'power_magazine_page_end' ) ) :
	/**
	 * Page End.
	 *
	 * @since 1.0.0
	 */
	function power_magazine_page_end() {
	?></div><!-- #page --><?php
	}
endif;
add_action( 'power_magazine_action_after', 'power_magazine_page_end' );

if ( ! function_exists( 'power_magazine_content_start' ) ) :
	/**
	 * Content Start.
	 *
	 * @since 1.0.0
	 */
	function power_magazine_content_start() {
	?><div id="content" class="site-content"><?php
	}
endif;
add_action( 'power_magazine_action_before_content', 'power_magazine_content_start' );


if ( ! function_exists( 'power_magazine_content_end' ) ) :
	/**
	 * Content End.
	 *
	 * @since 1.0.0
	 */
	function power_magazine_content_end() {
	?></div><!-- #content --><?php
	}
endif;
add_action( 'power_magazine_action_after_content', 'power_magazine_content_end' );


if ( ! function_exists( 'power_magazine_header_start' ) ) :
	/**
	 * Header Start
	 *
	 * @since 1.0.0
	 */
	function power_magazine_header_start() {
	?>
	<header id="masthead" class="site-header"><!-- header starting from here --><div class="hgroup-wrap"><!-- hrgroup wrapper --><?php	
	}
endif;

add_action( 'power_magazine_action_before_header', 'power_magazine_header_start', 10 );


if ( ! function_exists( 'power_magazine_header_end' ) ) :
	/**
	 * Header End
	 *
	 * @since 1.0.0
	 */
	function power_magazine_header_end() {
	?></div><!-- hrgroup wrapper ends here --></header><!-- header ends here --><?php	
	}
endif;
add_action( 'power_magazine_action_after_header', 'power_magazine_header_end', 10 );

if ( ! function_exists( 'power_magazine_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function power_magazine_footer_start() {
	?><footer id="colophon" class="site-footer"> <!-- footer starting from here --> 
	<?php
	}
endif;
add_action( 'power_magazine_action_before_footer', 'power_magazine_footer_start' );


if ( ! function_exists( 'power_magazine_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function power_magazine_footer_end() {
	?></footer><!-- #colophon --><?php
	}
endif;
add_action( 'power_magazine_action_after_footer', 'power_magazine_footer_end' );