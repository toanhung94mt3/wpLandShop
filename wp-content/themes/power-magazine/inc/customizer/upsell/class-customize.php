<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 * @package Power_Magazine
 */
final class Power_Magazine_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once trailingslashit( get_template_directory() ) . 'inc/customizer/upsell/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Power_Magazine_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Power_Magazine_Customize_Section_Pro(
				$manager,
				'power_magazine_upsell',
				array(
					'title'    => esc_html__( 'Power Magazine Pro', 'power-magazine' ),
					'pro_text' => esc_html__( 'Go Pro',         'power-magazine' ),
					'pro_url'  => 'https://theme404.com/downloads/power-magazine-pro/',
					'priority'   => 5,
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'power-magazine-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/upsell/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'power-magazine-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/upsell/customize-controls.css' );
	}
}

// Doing this customizer thang!
Power_Magazine_Customize::get_instance();
