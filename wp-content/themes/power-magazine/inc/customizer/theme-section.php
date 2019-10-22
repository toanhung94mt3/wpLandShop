<?php
/**
 * Theme Customizer Options
 *
 * @package Power_Magazine
 */

$default = power_magazine_get_default_theme_options();

/****************  Add Pannel   ***********************/
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => esc_html__( 'Theme Options', 'power-magazine' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	)
);
/************************  Logo Width  ******************/
$wp_customize->add_setting('theme_options[logo_width]', 
	array(
	'default' 			=> $default['logo_width'],
	'priority'   		=> 10,
	'sanitize_callback' => 'power_magazine_sanitize_number_range'
	)
);
$wp_customize->add_control( new Power_Magazine_Slider_Control( $wp_customize,'theme_options[logo_width]',array(	
	'label' 	=> esc_html__('Logo Width', 'power-magazine'),
	'section' 	=> 'title_tagline',
	'settings'  => 'theme_options[logo_width]',
	'type' 		=> 'slider_control',
	'input_attrs' => array(
		'min' => 0, 
		'max' => 500, 
		'step' => 1, 
	),
) ) );
/************************  Site Identity  ******************/
$wp_customize->add_setting('theme_options[site_identity]', 
	array(
	'default' 			=> $default['site_identity'],
	'sanitize_callback' => 'power_magazine_sanitize_select'
	)
);
$wp_customize->add_control('theme_options[site_identity]', 
	array(		
	'label' 	=> esc_html__('Choose Option for Site Title', 'power-magazine'),
	'section' 	=> 'title_tagline',
	'settings'  => 'theme_options[site_identity]',
	'type' 		=> 'radio',
	'choices' 	=>  array(
			'logo-only' 	=> esc_html__('Logo Only', 'power-magazine'),
			'logo-title' 	=> esc_html__('Logo + Title', 'power-magazine'),
			'logo-text' 	=> esc_html__('Logo + Tagline', 'power-magazine'),
			'title-only' 	=> esc_html__('Title Only', 'power-magazine'),
			'title-text' 	=> esc_html__('Title + Tagline', 'power-magazine')
		)
	)
);
/**************************** Primary Color ******************************************/
$wp_customize->add_setting('theme_options[primary_color]', 
    array(
        'default'           => $default['primary_color'],        
        'sanitize_callback' => 'sanitize_hex_color'
    )
);
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'theme_options[primary_color]',
    array(
        'label'       => esc_html__( 'Primary Color', 'power-magazine' ),        
        'settings'    => 'theme_options[primary_color]',
        'section'     => 'colors',                                  
        )
    )
);

/****************  Header Setting Section starts ************/
$wp_customize->add_section('section_top_header', 
	array(    
	'title'       => esc_html__('Top Header Setting', 'power-magazine'),
	'panel'       => 'theme_option_panel'    
	)
);

/********************* Enable Top Header Section ****************************/
$wp_customize->add_setting( 'theme_options[enable_top_header]',
    array(
        'default'           => $default['enable_top_header'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'power_magazine_sanitize_checkbox',        
    )
);
$wp_customize->add_control( 'theme_options[enable_top_header]',
    array(
        'label'    => esc_html__( 'Enable Top Header', 'power-magazine' ),
        'section'  => 'section_top_header',
        'type'     => 'checkbox',     
    )
);

/********************* Enable Current Date ****************************/
$wp_customize->add_setting( 'theme_options[enable_current_date]',
    array(
        'default'           => $default['enable_current_date'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'power_magazine_sanitize_checkbox',        
    )
);
$wp_customize->add_control( 'theme_options[enable_current_date]',
    array(
        'label'    => esc_html__( 'Enable Current Date', 'power-magazine' ),
        'section'  => 'section_top_header',
        'type'     => 'checkbox', 
        'active_callback'    => 'power_magazine_callback_top_header',     
    )
);

/************************  Top Header Right Part  ******************/
$wp_customize->add_setting('theme_options[top_header_right]', 
	array(
	'default' 			=> $default['top_header_right'],
	'sanitize_callback' => 'power_magazine_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[top_header_right]', 
	array(		
	'label' 	=> esc_html__('Top Right Header Option', 'power-magazine'),
	'section' 	=> 'section_top_header',
	'settings'  => 'theme_options[top_header_right]',
	'type' 		=> 'select',
    'active_callback'    => 'power_magazine_callback_top_header',  	
	'choices' 	=>  array(
			'none' 		    => esc_html__('&mdash; Select &mdash;', 'power-magazine'),
			'menu' 			=> esc_html__('Menu', 'power-magazine'),
			'address' 		=> esc_html__('Address', 'power-magazine'),
			'social_media' 	=> esc_html__('Social Icon', 'power-magazine'),
		)
	)
);

/************************  Top Header Left Part  ******************/
$wp_customize->add_setting('theme_options[top_header_left]', 
	array(
	'default' 			=> $default['top_header_left'],
	'sanitize_callback' => 'power_magazine_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[top_header_left]', 
	array(		
	'label' 	=> esc_html__('Top Left Header Option', 'power-magazine'),
	'section' 	=> 'section_top_header',
	'settings'  => 'theme_options[top_header_left]',
	'type' 		=> 'select',
	'active_callback'    => 'power_magazine_callback_top_header', 
	'choices' 	=>  array(
			'none' 		=> esc_html__('&mdash; Select &mdash;', 'power-magazine'),
			'menu' 			=> esc_html__('Menu', 'power-magazine'),
			'address' 		=> esc_html__('Address', 'power-magazine'),
			'social_media' 	=> esc_html__('Social Icon', 'power-magazine'),
		)
	)
);

/************************  Header Address  ******************/
$wp_customize->add_setting( 'theme_options[header_address]',
	array(
	'default'           => $default['header_address'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_textarea_field',	
	)
);
$wp_customize->add_control( 'theme_options[header_address]',
	array(
	'label'    => esc_html__( 'Header Address', 'power-magazine' ),
	'section'  => 'section_top_header',
	'type'     => 'text',
	'active_callback'    => 'power_magazine_header_address', 
	
	)
);

/************************  Top Header Phone Number  ******************/
$wp_customize->add_setting( 'theme_options[header_number]',
	array(
	'default'           => $default['header_number'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',	
	)
);
$wp_customize->add_control( 'theme_options[header_number]',
	array(
	'label'    => esc_html__( 'Phone Number', 'power-magazine' ),
	'section'  => 'section_top_header',
	'type'     => 'text',
	'active_callback'    => 'power_magazine_header_address', 
	
	)
);

/************************  Top Header Email  ******************/
$wp_customize->add_setting('theme_options[header_email]',  
	array(
	'default'           => $default['header_email'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_email',
	
	)
);

$wp_customize->add_control('theme_options[header_email]', 
	array(
	'label'       => esc_html__('Contact Email', 'power-magazine'),
	'section'     => 'section_top_header',   
	'settings'    => 'theme_options[header_email]',		
	'type'        => 'text',
	'active_callback'    => 'power_magazine_header_address', 
	)
);

/****************  Header Setting Section starts ************/
$wp_customize->add_section('section_header', 
	array(    
	'title'       => esc_html__('Header Setting', 'power-magazine'),
	'panel'       => 'theme_option_panel'    
	)
);
/********************* Enable Home Icon ****************************/
$wp_customize->add_setting( 'theme_options[enable_home_icon]',
    array(
        'default'           => $default['enable_home_icon'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'power_magazine_sanitize_checkbox',        
    )
);
$wp_customize->add_control( 'theme_options[enable_home_icon]',
    array(
        'label'    => esc_html__( 'Enable Home Icon', 'power-magazine' ),
        'section'  => 'section_header',
        'type'     => 'checkbox',    
    )
);

/********************* Enable Search ****************************/
$wp_customize->add_setting( 'theme_options[enable_search]',
    array(
        'default'           => $default['enable_search'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'power_magazine_sanitize_checkbox',        
    )
);
$wp_customize->add_control( 'theme_options[enable_search]',
    array(
        'label'    => esc_html__( 'Enable Search', 'power-magazine' ),
        'section'  => 'section_header',
        'type'     => 'checkbox',    
    )
);

/****************  Archive Setting Section starts ************/
$wp_customize->add_section('section_archive', 
	array(    
	'title'       => esc_html__('Blog Setting', 'power-magazine'),
	'panel'       => 'theme_option_panel'    
	)
);

/********************* Sidebar Layout  ****************************/
$wp_customize->add_setting('theme_options[sidebar_layout]', 
	array(
	'default' 			=> $default['sidebar_layout'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'power_magazine_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[sidebar_layout]', 
	array(		
	'label' 	=> esc_html__('Sidebar Layout Options', 'power-magazine'),
	'section' 	=> 'section_archive',
	'settings'  => 'theme_options[sidebar_layout]',
	'type' 		=> 'radio',
	'choices' 	=> array(		
		'right-sidebar' 	=> esc_html__('Right Sidebar', 'power-magazine'),							
		'left-sidebar' 		=> esc_html__('Left Sidebar', 'power-magazine'),
		'no-sidebar' 		=> esc_html__('No Sidebar', 'power-magazine'),		
		),	
	)
);

/********************* Enable Siticky Sidebar  ****************************/
$wp_customize->add_setting( 'theme_options[enable_sticky_sidebar]',
	array(
		'default'           => $default['enable_sticky_sidebar'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'power_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_sticky_sidebar]',
	array(
		'label'    => esc_html__( 'Enable Sticky Sidebar', 'power-magazine' ),
		'section'  => 'section_archive',
		'type'     => 'checkbox',		
	)
);

/********************* Enable Author  ****************************/
$wp_customize->add_setting( 'theme_options[enable_archive_author]',
	array(
		'default'           => $default['enable_archive_author'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'power_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_archive_author]',
	array(
		'label'    => esc_html__( 'Enable Author', 'power-magazine' ),
		'section'  => 'section_archive',
		'type'     => 'checkbox',		
	)
);


/********************* Enable Posted On  ****************************/
$wp_customize->add_setting( 'theme_options[enable_archive_posted_on]',
	array(
		'default'           => $default['enable_archive_posted_on'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'power_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_archive_posted_on]',
	array(
		'label'    => esc_html__( 'Enable Posted Date', 'power-magazine' ),
		'section'  => 'section_archive',
		'type'     => 'checkbox',		
	)
);

/********************* Enable Coment Count  ****************************/
$wp_customize->add_setting( 'theme_options[enable_archive_coment_count]',
	array(
		'default'           => $default['enable_archive_coment_count'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'power_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_archive_coment_count]',
	array(
		'label'    => esc_html__( 'Enable Comment Count', 'power-magazine' ),
		'section'  => 'section_archive',
		'type'     => 'checkbox',		
	)
);

/************************  Archive Layout  ******************/
$wp_customize->add_setting('theme_options[archive_layout]', 
	array(
	'default' 			=> $default['archive_layout'],
	'sanitize_callback' => 'power_magazine_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[archive_layout]',
	array(		
	'label' 	=> esc_html__('Blog Layout', 'power-magazine'),
	'section' 	=> 'section_archive',
	'settings'  => 'theme_options[archive_layout]',
	'type' 		=> 'radio',
	'choices' 	=>  array(
			'full-layout' 	=> esc_html__('Full Width', 'power-magazine'),
			'list-layout' 	=> esc_html__('List', 'power-magazine'),
		),
	)
);

/********************************** Pagaination Option *********************************/
$wp_customize->add_setting('theme_options[pagination_option]', 
	array(
	'default' 			=> $default['pagination_option'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'power_magazine_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[pagination_option]', 
	array(		
	'label' 	=> esc_html__('Pagination Options', 'power-magazine'),
	'section' 	=> 'section_archive',
	'settings'  => 'theme_options[pagination_option]',
	'type' 		=> 'radio',
	'choices' 	=> array(		
		'default' 		=> esc_html__('Default', 'power-magazine'),							
		'numeric' 		=> esc_html__('Numeric', 'power-magazine'),		
		),	
	)
);
/****************  General Setting Section starts ************/
$wp_customize->add_section('section_general', 
	array(    
	'title'       => esc_html__('General Setting', 'power-magazine'),
	'panel'       => 'theme_option_panel'    
	)
);
$wp_customize->add_setting('theme_options[site_layout]', 
	array(
	'default' 			=> $default['site_layout'],
	'sanitize_callback' => 'power_magazine_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[site_layout]',
	array(		
	'label' 	=> esc_html__('Site Layout', 'power-magazine'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[site_layout]',
	'type' 		=> 'radio',
	'choices' 	=>  array(
			'site-layout' 	=> esc_html__('Full Layout', 'power-magazine'),
			'boxed-layout' 	=> esc_html__('Boxed', 'power-magazine'),
		),
	)
);
/********************* Enable Author  ****************************/
$wp_customize->add_setting( 'theme_options[enable_author]',
	array(
		'default'           => $default['enable_author'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'power_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_author]',
	array(
		'label'    => esc_html__( 'Enable Author', 'power-magazine' ),
		'section'  => 'section_general',
		'type'     => 'checkbox',		
	)
);


/********************* Enable Posted On  ****************************/
$wp_customize->add_setting( 'theme_options[enable_posted_on]',
	array(
		'default'           => $default['enable_posted_on'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'power_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_posted_on]',
	array(
		'label'    => esc_html__( 'Enable Posted Date', 'power-magazine' ),
		'section'  => 'section_general',
		'type'     => 'checkbox',		
	)
);

/********************* Enable Coment Count  ****************************/
$wp_customize->add_setting( 'theme_options[enable_coment_count]',
	array(
		'default'           => $default['enable_coment_count'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'power_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_coment_count]',
	array(
		'label'    => esc_html__( 'Enable Comment Count', 'power-magazine' ),
		'section'  => 'section_general',
		'type'     => 'checkbox',		
	)
);
/****************  Single Setting Section starts ************/
$wp_customize->add_section('section_single', 
	array(    
	'title'       => esc_html__('Single Page/Post Setting', 'power-magazine'),
	'panel'       => 'theme_option_panel'    
	)
);

/****************  Footer Setting Section starts ************/
$wp_customize->add_section('section_footer', 
	array(    
	'title'       => esc_html__('Footer Setting', 'power-magazine'),
	'panel'       => 'theme_option_panel'    
	)
);
/********************* Enable Author Info  ****************************/
$wp_customize->add_setting( 'theme_options[enable_author_info]',
	array(
		'default'           => $default['enable_author_info'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'power_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_author_info]',
	array(
		'label'    => esc_html__( 'Enable Author Info', 'power-magazine' ),
		'section'  => 'section_single',
		'type'     => 'checkbox',		
	)
);

/********************* Enable Related Post  ****************************/
$wp_customize->add_setting( 'theme_options[enable_related_post]',
	array(
		'default'           => $default['enable_related_post'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'power_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_related_post]',
	array(
		'label'    => esc_html__( 'Enable Related Post', 'power-magazine' ),
		'section'  => 'section_single',
		'type'     => 'checkbox',		
	)
);

// Releated Post Title
$wp_customize->add_setting('theme_options[related_post_title]', 
	array(
	'default'           => $default['related_post_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[related_post_title]', 
	array(
	'label'       => esc_html__('Releated Post Title', 'power-magazine'),
	'section'     => 'section_single',   
	'settings'    => 'theme_options[related_post_title]',		
	'type'        => 'text',

	)
);
// Releated post Number.
$wp_customize->add_setting( 'theme_options[releated_post_number]',
	array(
		'default'           => $default['releated_post_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'power_magazine_sanitize_number_range',
		)
);
$wp_customize->add_control( 'theme_options[releated_post_number]',
	array(
		'label'       => esc_html__( 'No of Releated Post', 'power-magazine' ),
		'section'     => 'section_single',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 2, 'max' => 10, 'step' =>1 , 'style' => 'width: 115px;' ),
	)
);

/************************  Footer Copyright  ******************/
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_textarea_field',	
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => esc_html__( 'Footer Copyright', 'power-magazine' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	
	)
);
/********************* Enable Scroll To Top ****************************/
$wp_customize->add_setting( 'theme_options[enable_scroll_to_top]',
	array(
		'default'           => $default['enable_scroll_to_top'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'power_magazine_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_scroll_to_top]',
	array(
		'label'    => esc_html__( 'Enable Scroll to Top', 'power-magazine' ),
		'section'  => 'section_footer',
		'type'     => 'checkbox',		
	)
);