<?php
/**
 * Elementor Compatibility File.
 *
 * @package Power_Magazine
 */
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// If plugin - 'Elementor' not exist then return.
if ( ! class_exists( '\Elementor\Plugin' ) || ! class_exists( 'ElementorPro\Modules\ThemeBuilder\Module' ) ) {
	return;
}
namespace ElementorPro\Modules\ThemeBuilder\ThemeSupport;
use ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager;
use ElementorPro\Modules\ThemeBuilder\Module;

/**
 * Elementor Compatibility
 */
if ( ! class_exists( 'Power_Magazine_Elementor_Pro' ) ) :

	/**
	 * Elementor Compatibility
	 *
	 * @since 1.0.0
	 */
	class Power_Magazine_Elementor_Pro {

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

			// Add locations.
			add_action( 'elementor/theme/register_locations', array( $this, 'register_locations' ) );
			// Override Header  templates.
			add_action( 'political_action_header', array( $this, 'do_header' ), 0 );

			// Override Footer Templates.
			add_action( 'political_action_footer', array( $this, 'do_footer' ), 0 );

			add_action( 'political_action_404_page', array( $this, 'do_template_part_404' ), 0 );

		}
		/**
		 * Register Locations
		 *
		 * @since 1.0.0
		 * @param object $manager Location manager.
		 * @return void
		 */
		public function register_locations( $manager ) {
			$manager->register_all_core_location();
		}		
		
		/**
		 * Header Support
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function do_header() {
			$did_location = Module::instance()->get_locations_manager()->do_location( 'header' );
			if ( $did_location ) {
				remove_action( 'power_magazine_action_header', 'power_magazine_middle_header', 15 );
				remove_action( 'power_magazine_action_header', 'power_magazine_main_navigation', 20 );
			}
		}

		/**
		 * Footer Support
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function do_footer() {
			$did_location = Module::instance()->get_locations_manager()->do_location( 'footer' );
			if ( $did_location ) {
				remove_action( 'power_magazine_action_footer', 'power_magazine_footer_widget', 10 );
				remove_action( 'power_magazine_action_footer', 'power_magazine_footer_copyright', 20 );
			}
		}		
		
	}

endif;
Power_Magazine_Elementor_Pro::get_instance();	