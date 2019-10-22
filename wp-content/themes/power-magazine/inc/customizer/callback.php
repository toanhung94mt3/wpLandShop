<?php 
/**
 * Callback Function
 *
 * @package Power_Magazine
 */

/**
 * Active callback Top Header 
 */
if ( ! function_exists( 'power_magazine_callback_top_header' ) ) :

	function power_magazine_callback_top_header( $control ) { 

		if ( true == $control->manager->get_setting( 'theme_options[enable_top_header]' )->value() ) {
			return true;
		} else {
			return false;
		}
	}

endif;


/**
 * Active callback Header Address
 */
if ( ! function_exists( 'power_magazine_header_address' ) ) :

	function power_magazine_header_address( $control ) { 

		if ( 'address' == $control->manager->get_setting( 'theme_options[top_header_right]' )->value() || 'address' == $control->manager->get_setting( 'theme_options[top_header_left]' )->value() ) {
			return true;
		} else {
			return false;
		}
	}

endif;





















