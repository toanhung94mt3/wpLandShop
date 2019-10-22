<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Power_Magazine
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses power_magazine_header_style()
 */
function power_magazine_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'power_magazine_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1300,
		'height'                 => 120,
		'flex-height'            => true,
		'wp-head-callback'       => 'power_magazine_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'power_magazine_custom_header_setup' );

function power_magazine_header_style() {
	wp_enqueue_style( 'power-magazine-style', get_stylesheet_uri() );
	$header_text_color 	= get_header_textcolor();	
	$logo_width  		= power_magazine_get_option( 'logo_width' );
	$primary_color  	= power_magazine_get_option( 'primary_color' );
	$header_image       = get_header_image();

	$position = "absolute";
	$custom_css = '';
	$clip ="rect(1px, 1px, 1px, 1px)";
	if ( ! display_header_text() ) {
		$custom_css .= '.site-title, .site-description{
			position: '.$position.';
			clip: '.$clip.'; 
		}';
	} else{

		$custom_css .= '.site-title a, .site-description {
			color: #' . esc_attr($header_text_color) . ';			
		}';
	}

	$custom_css .= 'img.custom-logo{
		max-width: ' . esc_attr($logo_width) . 'px;

	}';

	if ( !empty( $header_image ) ){
		$custom_css .= '.site-header-middle{
						background-image: url( '.esc_url( $header_image ).');
						}';
	}

	$custom_css .= '.site-header .search-toggle, 
					.site-header .search-section form input[type=submit],
					button, 
					input[type="button"], 
					input[type="reset"], input[type="submit"], 
					a.button{
						background-color: ' . esc_attr($primary_color) . ';
	}';
	$custom_css .= 'button, 
	input[type="button"], 
	input[type="reset"],
	input[type="submit"], 
	a.button{
		border-color: '.esc_attr( $primary_color ).';
	} ';
	$custom_css .= 'button:hover, 
	input[type="button"]:hover, 
	input[type="reset"]:hover, 
	input[type="submit"]:hover, 
	a.button:hover,
	.entry-meta > div, 
	.entry-meta > div a,
	.author-info-wrap .author-info a{
		color: '.esc_attr( $primary_color ).';
	} ';

	wp_add_inline_style( 'power-magazine-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'power_magazine_header_style' );
