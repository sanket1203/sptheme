<?php
/**
 * Sp_theme Theme Customizer
 *
 * @package Sp_theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function maia_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->remove_control('custom_logo'); //remove default logo section

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'maia_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'maia_customize_partial_blogdescription',
		) );
	}


    // *********************************************
    // ****************** General ******************
    // *********************************************
    
    $wp_customize->add_panel( 'logo', array (
        'title' => __( 'Logo, Title & Favicon', 'sp_theme' ),
        'description' => __( 'set the logo image, site title, description and site icon favicon', 'sp_theme' ),
        'priority' => 10
    ));
	
	
    
     $wp_customize->add_section( 'logo', array (
        'title'                 => __( 'Logo', 'sp_theme' ),
        'panel'                 => 'logo',
     ) );
	
	 $wp_customize->add_section( 'title_tagline', array (
        'title' => __( 'Site Title, Tagline & Favicon', 'sp_theme' ),
        'panel' => 'logo',
	 ) );
	 
	 
	 
	
	  // Logo Image
    $wp_customize->add_setting( 'logo', array (
        'default'               => get_template_directory_uri() . '/inc/images/default-logo.png',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'esc_url_raw'
    ) );
	
	 // Logo true/false
    $wp_customize->add_setting( 'logo_true', array (
        'default'               => 'on',
        'transport'             => 'postMessage',
        'sanitize_callback'     => 'sp_on_off_sanitize'
    ) );

    $wp_customize->add_control( 'logo_true', array(
        'type'                  => 'radio',
        'section'               => 'logo',
        'label'                 => __( 'Display Logo', 'sp_theme' ),
        'description'           => __( 'If you do not use a logo, the site title will be displayed', 'sp_theme' ),  
        'choices'               => array(
            'on'    => __( 'Show', 'sp_theme' ),
            'off'    => __( 'Hide', 'sp_theme' )
        )
    ) );
	
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control4', array (
        'label' =>              __( 'Logo', 'sp_theme' ),
        'section'               => 'logo',
        'mime_type'             => 'image',
        'settings'              => 'logo',
        'description'           => __( 'Image for your site', 'sp_theme' ),        
    ) ) );
	
		$wp_customize->add_section( 'header_section' , array(
			'title'      => 'Header Background',
			'priority'   => 30,
		) );
		
		$wp_customize->add_setting( 'header_background_color' , array(
			'default'     => '#43C6E4',
			'transport'   => 'refresh',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
			'label'        => 'Background Color',
			'section'    => 'header_section',
			'settings'   => 'header_background_color',
		) ) );
    
	
		$wp_customize->add_section( 'cd_colors' , array(
			'title'      => 'Colors test',
			'priority'   => 30,
		) );
		$wp_customize->add_setting( 'background_color' , array(
			'default'     => '#43C6E4',
			'transport'   => 'refresh',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
			'label'        => 'Background Color',
			'section'    => 'cd_colors',
			'settings'   => 'background_color',
		) ) );

}
add_action( 'customize_register', 'maia_customize_register' );

function sp_home_val_get($value){
	 return $value;
}
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function maia_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function maia_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function maia_customize_preview_js() {
	wp_enqueue_script( 'maia-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'maia_customize_preview_js' );

/*if user subscriber */
add_action('after_setup_theme', 'sp_remove_admin_bar'); 
function sp_remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}
