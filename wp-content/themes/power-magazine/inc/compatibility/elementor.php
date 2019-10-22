<?php
/**
 * Elementor Compatibility File.
 *
 * @package Political
 */
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// If plugin - 'Elementor' not exist then return.
if ( ! class_exists( '\Elementor\Plugin' ) || ! class_exists( 'Header_Footer_Elementor' ) ) {
	return;
}

/**
 * Elementor Compatibility
 */
if ( ! class_exists( 'Power_Magazine_Elementor' ) ) :

	/**
	 * Elementor Compatibility
	 *
	 * @since 1.0.0
	 */
	class Power_Magazine_Elementor {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			// Add Theme Support for Header Footer Elementor
			add_action( 'after_setup_theme', array( $this, 'theme_support' ) );

			// Override Header  and Footer templates.
			add_action( 'init', array( $this, 'support' ) );
			
		}
		public function theme_support() {
			add_theme_support( 'header-footer-elementor' );
		}

		/**
		 * Add header and footer support
		 */
		public function support() {
			if ( hfe_header_enabled() ) {
				remove_action( 'power_magazine_action_header', 'power_magazine_middle_header', 15 );
				remove_action( 'power_magazine_action_header', 'power_magazine_main_navigation', 20 );
				add_action( 'political_action_header', 'hfe_render_header' );
			}
			if ( hfe_footer_enabled() ) {
				remove_action( 'power_magazine_action_footer', 'power_magazine_footer_widget', 10 );
				remove_action( 'power_magazine_action_footer', 'power_magazine_footer_copyright', 20 );
				add_action( 'political_action_footer', 'hfe_render_footer' );
			}
		}			

	}
Power_Magazine_Elementor::get_instance();	

endif;


