<?php
/**
 * Customizer custom controls
 *
 * @package Power_Magazine
 */
/**
 * Slider custom control
 *
 */
class Power_Magazine_Slider_Control extends WP_Customize_Control {
	/**
	 * Control type
	 *
	 * @var string
	 */
	public $type = 'slider_control';
	/**
	 * Control scripts and styles enqueue
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {
		wp_enqueue_script( 'power-magazine-custom-controls-js', get_template_directory_uri() . '/inc/customizer/js/custom-controls.js',array( 'jquery', 'jquery-ui-core' ), '1.0.0', true );
		wp_enqueue_style( 'power-magazine-custom-controls_css', get_template_directory_uri() . '/inc/customizer/css/custom-controls.css' );
	}
	/**
	 * Control method
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
	?>
		<div class="slider-custom-control">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> />
			<div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
		</div>
	<?php
	}
}