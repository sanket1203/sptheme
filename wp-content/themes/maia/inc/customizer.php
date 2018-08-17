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
	$wp_customize->remove_section('colors'); //remove default color section

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
	
	
	
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control4', array (
        'label' =>              __( 'Logo', 'sp_theme' ),
        'section'               => 'logo',
        'mime_type'             => 'image',
        'settings'              => 'logo',
        'description'           => __( 'Logo for your site', 'sp_theme' ),        
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
