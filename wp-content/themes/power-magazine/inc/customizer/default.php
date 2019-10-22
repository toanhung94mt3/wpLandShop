<?php
/**
 * Default theme options.
 *
 * @package Power_Magazine
 */
if ( ! function_exists( 'power_magazine_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function power_magazine_get_default_theme_options() {

		$defaults = array();
		$defaults['site_identity']					= 'title-text';
		$defaults['logo_width']						= 100;
		$defaults['primary_color']					= '#ee3232';

		$defaults['enable_top_header']			    = false;
		$defaults['enable_current_date']			= true;
		$defaults['top_header_left']				= 'none';
		$defaults['top_header_right']				= 'none';
		$defaults['header_address']					= '';
		$defaults['header_email']					= '';
		$defaults['header_number']					= '';
		// Menu Section
		$defaults['enable_search']					= true;
		$defaults['enable_home_icon']				= true;
		// Archive Section
		$defaults['archive_layout']					= 'full-layout';
		$defaults['pagination_option']				= 'default';
		$defaults['enable_archive_author']			= true;
		$defaults['enable_archive_posted_on']		= true;
		$defaults['enable_archive_coment_count']	= true;
		$defaults['sidebar_layout']					= 'right-sidebar';
		$defaults['enable_sticky_sidebar']			= true;

		// Genearl Setting
		$defaults['site_layout']					= 'boxed-layout';
		$defaults['enable_author']					= true;
		$defaults['enable_posted_on']				= true;
		$defaults['enable_coment_count']			= true;	

		$defaults['enable_author_info']				= true;
		$defaults['enable_related_post']			= true;
		$defaults['releated_post_number']			= 2;
		$defaults['related_post_title']				= esc_html__( 'Releated', 'power-magazine');


		$defaults['copyright_text']					= '';
		$defaults['enable_scroll_to_top']			= true;

		// Pass through filter.
		$defaults = apply_filters( 'power_magazine_filter_default_theme_options', $defaults );

		return $defaults;
	}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'power_magazine_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function power_magazine_get_option( $key ) {

		$default_options = power_magazine_get_default_theme_options();

		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;