<?php
/**
 * Load files
 *
 * @package Power_Magazine
 */

/**
 * Include default theme options.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/customizer/default.php';

require_once trailingslashit( get_template_directory() ) . 'inc/customizer/upsell/class-customize.php';

/**
 * Load Hooks.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/hook/structure.php';
require_once trailingslashit( get_template_directory() ) . 'inc/hook/custom.php';


/**
 * Implement the Custom Header feature.
 */
require trailingslashit( get_template_directory() ) . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require trailingslashit( get_template_directory() ) . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require trailingslashit( get_template_directory() ) . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require trailingslashit( get_template_directory() ) . '/inc/jetpack.php';
}

/**
 * Add Meta Box.
 */
require trailingslashit( get_template_directory() ) . '/inc/meta-box.php';

/**
 * Featured Slider.
 */
require trailingslashit( get_template_directory() ). '/inc/widget/featured-slider.php';

/**
 * Mixed Style.
 */
require trailingslashit( get_template_directory() ). '/inc/widget/mixed.php';

/**
 * List Style.
 */
require trailingslashit( get_template_directory() ). '/inc/widget/list.php';

/**
 * Grid Style.
 */
require trailingslashit( get_template_directory() ). '/inc/widget/grid.php';

/**
 * Grid Style.
 */
require trailingslashit( get_template_directory() ). '/inc/widget/masonry.php';

/**
 * Popular Style.
 */
require trailingslashit( get_template_directory() ). '/inc/widget/popular.php';

/**
 * Latest/Popular Style.
 */
require trailingslashit( get_template_directory() ). '/inc/widget/latest-popular.php';

/** 
 * Add the Elementor compatibility file 
 */
require_once trailingslashit( get_template_directory() ) . '/inc/compatibility/elementor-pro.php';


/** 
 * Add the Header Footer Elementor compatibility file 
 */
require_once trailingslashit( get_template_directory() ) . '/inc/compatibility/elementor.php';

/**
 * Implement the Beaver Themer Hook.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/compatibility/beaver-themer.php';
/**
 * Plugin Activation Section.
 */
require trailingslashit( get_template_directory() ) . '/inc/class-tgm-plugin-activation.php';