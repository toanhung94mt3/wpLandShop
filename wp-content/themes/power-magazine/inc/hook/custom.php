<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Power_Magazine
 */

if ( ! function_exists( 'power_magazine_top_header' ) ):
	/**
	 * Top header section
	 * 
	 * @since 1.0.0
	 */
	function power_magazine_top_header() { 
    $enable_top_header  = power_magazine_get_option( 'enable_top_header' );
    if ( false == $enable_top_header ){
        return;
    }
	?>
    <div class="header-info-bar">
        <div class="header-info-bar-left">
        	<?php $enable_current_date  = power_magazine_get_option( 'enable_current_date' );
        	if ( true == $enable_current_date ):  ?>
	            <div class="datetime">
	            	<?php echo esc_html( date(get_option('date_format') ) ); ?>
	            </div>
            <?php endif; ?>
            <?php $top_header_right  = power_magazine_get_option( 'top_header_right' );
                switch ( $top_header_right ) {

                    case 'address':
                        $header_address = power_magazine_get_option('header_address');
                        $header_number = power_magazine_get_option('header_number');
                        $header_email = power_magazine_get_option('header_email');?>
                        <div class="contact-info">
                            <?php if(!empty($header_address)):?>
                                <div class="contact-address">              
                                        <span class="icon">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </span>
                                    <?php echo esc_html( $header_address );?>
                                </div>
                            <?php endif;?>
                            <?php if(!empty($header_number)):?>
                                <div class="contact-phone">
                                    <a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( $header_number ) ); ?>">
                                        <span class="icon">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                        </span>
                                        <?php echo esc_attr($header_number);?></a>
                                </div>
                            <?php endif;?>

                            <?php if(!empty($header_email)):?>
                                <div class="contact-email">
                                    <a href="mailto:<?php echo esc_attr($header_email);?>">
                                        <span class="icon">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        </span>
                                        <?php echo esc_attr( antispambot( $header_email ) ); ?>
                                    </a>
                                </div>
                            <?php endif;?>                                  
                        </div>
                        <?php break;

                    case 'menu':
                        wp_nav_menu( array(
                            'theme_location'  => 'top-menu',
                            'container'       => false,                         
                            'depth'           => 1,
                            'fallback_cb'     => false,
                        ) ); 
                        break;

                    case 'social_media':
                        echo '<div class="social-links">';
                            wp_nav_menu( array(
                                'theme_location'  => 'social-media',
                                'container'       => false,                         
                                'depth'           => 1,
                                'fallback_cb'     => false,

                            ) ); 
                        echo '</div>';

                        break;

                    case 'none':    
                        break;    

                    default:
                        return;

                }
            ?>
        </div>
        <?php $top_header_left  = power_magazine_get_option( 'top_header_left' );
            switch ( $top_header_left ) {

                case 'address':
                    $header_address = power_magazine_get_option('header_address');
                    $header_number = power_magazine_get_option('header_number');
                    $header_email = power_magazine_get_option('header_email');?>
                    <div class="contact-info">
                        <?php if(!empty($header_address)):?>
                            <div class="contact-address">              
                                    <span class="icon">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </span>
                                <?php echo esc_html( $header_address );?>
                            </div>
                        <?php endif;?>
                        <?php if(!empty($header_number)):?>
                            <div class="contact-phone">
                                <a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( $header_number ) ); ?>">
                                    <span class="icon">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </span>
                                    <?php echo esc_html($header_number);?></a>
                            </div>
                        <?php endif;?>

                        <?php if(!empty($header_email)):?>
                            <div class="contact-email">
                                <a href="mailto:<?php echo esc_attr($header_email);?>">
                                    <span class="icon">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    </span>
                                    <?php echo esc_html( antispambot( $header_email ) ); ?>
                                </a>
                            </div>
                        <?php endif;?>                                  
                    </div>
                    <?php break;

                case 'menu':
                    wp_nav_menu( array(
                        'theme_location'  => 'top-menu',
                        'container'       => false,                         
                        'depth'           => 1,
                        'fallback_cb'     => false,
                    ) ); 
                    break;

                case 'social_media':
                    echo '<div class="social-links">';
                        wp_nav_menu( array(
                            'theme_location'  => 'social-media',
                            'container'       => false,                         
                            'depth'           => 1,
                            'fallback_cb'     => false,

                        ) ); 
                    echo '</div>';

                    break;

                case 'none':    
                    break;
                default:
                    return;

            }
        ?>
    </div>
	<?php }
endif;
add_action( 'power_magazine_action_header', 'power_magazine_top_header', 10 );

if ( ! function_exists( 'power_magazine_middle_header' ) ):
	/**
	 * Middle header section
	 * 
	 * @since 1.0.0
	 */
	function power_magazine_middle_header() { ?>
        <div class="site-header-middle">
            <div class="container ">
                <div class="row ">
                    <div class="custom-col-5">
						<?php /**
						 * Hook - power_magazine_action_site_branding.
						 *
						 * @hooked power_magazine_site_branding - 10
						 * 
						 */
						do_action( 'power_magazine_action_site_branding' );
						?>
                    </div>
                    <div class="custom-col-7">
						<?php /**
						 * Hook - power_magazine_action_header_advertisement.
						 *
						 * @hooked power_magazine_header_advertisement - 10
						 * 
						 */
						do_action( 'power_magazine_action_header_advertisement' );
						?>
                    </div>
                </div>
            </div>
        </div>

	<?php }
endif;
add_action( 'power_magazine_action_header', 'power_magazine_middle_header', 15 );


if ( ! function_exists( 'power_magazine_site_branding' ) ) :
	/**
	 * Site branding 
 	 *
	 * @since 1.0.0
	 */
	function power_magazine_site_branding() {
		?>
		<section class="site-branding">
	    	<?php $site_identity  = power_magazine_get_option( 'site_identity' );
	    	if ( in_array( $site_identity, array( 'logo-only', 'logo-text','logo-title' ) )  ) { ?>
	    		<div class="site-logo">
	    			<?php the_custom_logo(); ?> 
	    		</div>
			<?php } ?>

			<?php if ( in_array( $site_identity, array( 'title-text', 'title-only', 'logo-text','logo-title' ) ) ) : ?>
				<?php
				if( in_array( $site_identity, array( 'title-text', 'title-only','logo-title' ) )  ) {
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;
				} 
				if ( in_array( $site_identity, array( 'title-text', 'logo-text' ) ) ) {
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
					<?php
					endif; 
				}?>
			<?php endif; ?>
		</section><!-- .site-branding -->	
		<?php 
	}
endif;
add_action( 'power_magazine_action_site_branding', 'power_magazine_site_branding', 10 );

if ( ! function_exists( 'power_magazine_header_advertisement' ) ) :
	/**
	 * Site branding 
 	 *
	 * @since 1.0.0
	 */
	function power_magazine_header_advertisement() { 
		if ( is_active_sidebar( 'header-advertisement' ) ): ?>	
	        <div class="header-advertisement">
	            <?php dynamic_sidebar( 'header-advertisement' ); ?>
	        </div>		
		<?php  endif;
	}
endif;
add_action( 'power_magazine_action_header_advertisement', 'power_magazine_header_advertisement', 10 );

if ( ! function_exists( 'power_magazine_main_navigation' ) ) :
	/**
	 * Main navigation
 	 *
	 * @since 1.0.0
	 */
	function power_magazine_main_navigation() {	
	$enable_search  	= power_magazine_get_option( 'enable_search' );
    $enable_home_icon   = power_magazine_get_option( 'enable_home_icon' );
	?>

        <div id="navbar" class="navbar">        	
            <div class="container">
                <nav id="site-navigation" class="navigation main-navigation">
                    <?php if ( true == $enable_home_icon ): ?>
                        <div class="home-icon">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <i class="fa fa-home"> </i> </a>
                        </div>
                    <?php endif; ?>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'fallback_cb' => 'power_magazine_primary_navigation_fallback',
					) );
					?>
                </nav><!-- main-navigation ends here -->
            </div>            
            <?php if ( true == $enable_search ): ?>
	            <div class="search-section">
	                <a href="javascript:void(0)" class="search-toggle"><i class="fa fa-search" aria-hidden="true"></i></a>
	                <?php get_search_form(); ?>
	            </div><!-- .search-section -->
            <?php endif; ?>
        </div><!-- navbar ends here -->
	<?php 
	}
endif;
add_action( 'power_magazine_action_header', 'power_magazine_main_navigation', 20 );

if ( ! function_exists( 'power_magazine_footer_widget' ) ) :
	/**
	 * Footer Widget
 	 *
	 * @since 1.0.0
	 */
	function power_magazine_footer_widget() { 
		if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' )  || is_active_sidebar( 'footer-4' ) ) : ?>
	        <div class="footer-widget-holder">
	            <div class="container">
					<div class="row">
						<?php
						$column_count = 0;
						$class_coloumn =12;
						for ( $i = 1; $i <= 4; $i++ ) {
							if ( is_active_sidebar( 'footer-' . $i ) ) {
								$column_count++;
								$class_coloumn = 12/$column_count;
							}
						} ?>

						<?php $column_class = 'custom-col-' . absint( $class_coloumn );
						for ( $i = 1; $i <= 4 ; $i++ ) {
							if ( is_active_sidebar( 'footer-' . $i ) ) { ?>
								<div class="<?php echo esc_attr( $column_class ); ?>">
									<?php dynamic_sidebar( 'footer-' . $i ); ?>
								</div>
							<?php }
						} ?>
					</div>
	            </div>
	        </div>
		<?php endif;
	}
endif;
add_action( 'power_magazine_action_footer', 'power_magazine_footer_widget', 15 );

if ( ! function_exists( 'power_magazine_footer_copyright' ) ) :
	/**
	 * Footer Copyright
 	 *
	 * @since 1.0.0
	 */
	function power_magazine_footer_copyright() { ?>
        <div class="site-generator">
            <div class="container">
                <div class="row">
                    <div class="custom-col-6">
                        <div class="copy-right">
							<?php 
								$copyright_footer = power_magazine_get_option( 'copyright_text' ); 

								// Powered by content.
								$powered_by_text = sprintf( __( 'Theme of %s', 'power-magazine' ), '<a target="_blank" rel="designer" href="'.esc_url( 'https://theme404.com/' ).'">'. esc_html__( 'Theme404', 'power-magazine' ). '</a>' ); 
							?>				
							<?php echo wp_kses_post( $powered_by_text );?>&nbsp;
							<?php echo esc_html( $copyright_footer ); ?>
                        </div>
                    </div>
                    <div class="custom-col-6">
                        <div class="footer-menu">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'depth'          => 1,
								'fallback_cb'    => false,
							) );
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<?php 
	}
endif;
add_action( 'power_magazine_action_footer', 'power_magazine_footer_copyright', 20 );

if ( ! function_exists( 'power_magazine_footer_scroll' ) ) :
    /**
     * Footer Scroll to Top
     *
     * @since 1.0.0
     */
    function power_magazine_footer_scroll() {
    $enable_scroll_to_top = power_magazine_get_option( 'enable_scroll_to_top' ); 
        if ( true == $enable_scroll_to_top ): ?>
            <!-- footer ends here -->
            <div class="back-to-top">
                <a href="#masthead" title="<?php echo esc_attr__('Go to Top', 'power-magazine');?>" class="fa-angle-up"></a>
            </div>
        <?php endif; ?>
    <?php 
    }
endif;
add_action( 'power_magazine_action_scroll', 'power_magazine_footer_scroll', 10 );

