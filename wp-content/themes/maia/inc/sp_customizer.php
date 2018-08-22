<?php
function sptheme_custom_customizer($wp_customize){
	
		$wp_customize->add_section( 'logo', array (
			'title'                 => __( 'Logo', 'sp_theme' ),
			'panel'                 => 'logo',
		));
		 
		  // Logo Image
		$wp_customize->add_setting( 'logo', array (
			'default'               => get_template_directory_uri() . '/inc/images/default-logo.png',
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'esc_url_raw'
		));
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control4', array (
			'label' =>              __( 'Home Page Logo', 'sp_theme' ),
			'section'               => 'logo',
			'mime_type'             => 'image',
			'settings'              => 'logo',
			'description'           => __( 'Logo for your site', 'sp_theme' ),        
		)));
		
		$wp_customize->add_setting( 'logo_other_page', array (
			'default'               => get_template_directory_uri() . '/images/default-logo-black.png',
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'esc_url_raw'
		));
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_other_page', array (
			'label' =>              __( 'Other Page Logo', 'sp_theme' ),
			'section'               => 'logo',
			'mime_type'             => 'image',
			'settings'              => 'logo',
			'description'           => __( 'Logo for your site', 'sp_theme' ),        
		)));
		
		$wp_customize->add_section( 'top_heading_home', array (
			'title' => __( 'Custom Home Heading', 'sp_theme' ),
			'panel' => 'logo',
		 ) );
	 
	    // add section to manage header text
		$wp_customize->add_section('sptheme_service_section_settings', array(
			'title' => __('Custom Text Home','sp_theme'),
			'description' => '',
			'panel'  => 'logo',
		) );
	 
	 	$wp_customize->add_setting(
			'top_heading_home', array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sptheme_homepage_sanitize_text',
			'transport' => 'postMessage',
        ) );	
		$wp_customize->add_control( 
			'top_heading_home',array(
			'label'   => __('Title','sp_theme'),
			'section' => 'sptheme_service_section_settings',
			'type' => 'text',
		) );
		
		$wp_customize->add_setting('top_heading_home_sub', array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sptheme_homepage_sanitize_text',
			'transport' => 'postMessage',
        ) );
		
		$wp_customize->add_control('top_heading_home_sub',array(
			'label'   => __('Sub Text','sp_theme'),
			'section' => 'sptheme_service_section_settings',
			'type' => 'text',
		) );
		
		//Search setting option on/off		
		$wp_customize->add_section('search_option', array(
		  'title'          => 'Search Setting',
		  'priority' => 20,
		 ));
		 
		//adding setting for footer text area
		$wp_customize->add_setting('bool_search_setting', array(
		 'default'        => 'on_search',		//Default on search
		));

		$wp_customize->add_control('bool_search_setting', array(
		  'label'   => 'Search Option',
		  'section' => 'search_option',
		  'type'    => 'radio',
			  'choices'               => array(
				'on_search'    => __( 'Show', 'sp_theme' ),
				'off_search'    => __( 'Hide', 'sp_theme' )
			)
		));
		
		// Header Background
		$wp_customize->add_section( 'header_section' , array(
			'title'      => 'Header Setting',
			'priority'   => 30,
		) );
		
		// background image
		$wp_customize->add_setting('home_background', array(
			'transport'   => 'refresh',
			'sanitize_callback' => 'sptheme_sanitize_image',
		));		
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_background', array (
			'label' =>              __( 'Header Background', 'sp_theme' ),
			'section'               => 'header_section',
			'mime_type'             => 'image',
			'settings'              => 'home_background',
			'description'           => __( 'Header Image, If image not available then background color display', 'sp_theme' ),
		) ) );
		
		//background color
		$wp_customize->add_setting( 'header_background_color' , array(
			'default'     => '#312720',
			'transport'   => 'refresh'		
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
			'label'      => 'Header Background Color',
			'section'    => 'header_section',
			'settings'   => 'header_background_color',			
		) ) );
		
		//Footer Setting
		$wp_customize->add_section('footer_section',array(
			'title'		=> 'Footer Setting',
			'description' => __( 'Footer Copyright Text', 'sp_theme' ),
		));
		
		$wp_customize->add_setting('footer_copyright',array(
			'default'	=> date('Y').' SP-THEME, All Right Reserved.',
		));
		$wp_customize->add_control('footer_copyright',array(
			'label'   => __('Copyright Text','sp_theme'),
			'section' => 'footer_section',
			'type' => 'text',
		));
		
		// General setting
		$wp_customize->add_panel( 'sp_general_section', array (
			'title' => __( 'General Setting', 'sp_theme' ),
			'description' => __( 'set the logo image, site title, description and site icon favicon', 'sp_theme' ),
			'priority' => 40
		));
		
		//Footer color
		$wp_customize->add_section('sp_font_typography_section',array(
			'title'		=> 'Footer Text & Background Color',
			'panel'       => 'sp_general_section',
			'description' => __( 'Footer Text & Background color', 'sp_theme' ),			
		));
		
		// Footer heading color
		$wp_customize->add_setting('footer_font_color', array(
			'default' 		=> '#fff', 
			'capability'     => 'edit_theme_options',
        ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_font_color', array(
			'label'      => 'Footer Font Color',
			'section'    => 'sp_font_typography_section',
			'settings'   => 'footer_font_color',			
		) ) );
		
		// link color
		$wp_customize->add_setting('footer_link_color', array(
			'default' 		=> '#fff', 
			'capability'     => 'edit_theme_options',
        ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color', array(
			'label'      => 'Footer Link Color',
			'section'    => 'sp_font_typography_section',
			'settings'   => 'footer_link_color',			
		) ) );
		
		// Footer heading color
		$wp_customize->add_setting('footer_heading_color', array(
			'default' 		=> '#fff', 
			'capability'     => 'edit_theme_options',
        ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_heading_color', array(
			'label'      => 'Footer Heading Color',
			'section'    => 'sp_font_typography_section',
			'settings'   => 'footer_heading_color',			
		) ) );
		
		
		//Social media url box start
		$wp_customize->add_section('sp_social_url_section',array(
			'title'		=> 'Social Media Url',
			'panel'       => 'sp_general_section',
			'description' => __( 'Social Media URL', 'sp_theme' ),			
		));
		
		$wp_customize->add_setting('fb_social_media', array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sptheme_homepage_sanitize_text',
			'transport' => 'postMessage',
        ) );	
		$wp_customize->add_control('fb_social_media',array(
			'label'   => __('Facebook URL','sp_theme'),
			'section' => 'sp_social_url_section',
			'type' => 'text',
		) );
		
		$wp_customize->add_setting('twitter_social_media', array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sptheme_homepage_sanitize_text',
			'transport' => 'postMessage',
        ) );
		
		$wp_customize->add_control('twitter_social_media',array(
			'label'   => __('Twitter URL','sp_theme'),
			'section' => 'sp_social_url_section',
			'type' => 'text',
		) );
		
		$wp_customize->add_setting('instagram_social_media', array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sptheme_homepage_sanitize_text',
			'transport' => 'postMessage',
        ) );
		
		$wp_customize->add_control('instagram_social_media',array(
			'label'   => __('Instagram URL','sp_theme'),
			'section' => 'sp_social_url_section',
			'type' => 'text',
		) );
				
		$wp_customize->add_setting('linkedin_social_media', array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sptheme_homepage_sanitize_text',
			'transport' => 'postMessage',
        ) );
		
		$wp_customize->add_control('linkedin_social_media',array(
			'label'   => __('LinkedIn URL','sp_theme'),
			'section' => 'sp_social_url_section',
			'type' => 'text',
		) );
		
		$wp_customize->add_setting('pinterest_social_media', array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sptheme_homepage_sanitize_text',
			'transport' => 'postMessage',
        ) );
		
		$wp_customize->add_control('pinterest_social_media',array(
			'label'   => __('Pinterest URL','sp_theme'),
			'section' => 'sp_social_url_section',
			'type' => 'text',
		) );
		
		
		$wp_customize->add_setting('googleplus_social_media', array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sptheme_homepage_sanitize_text',
			'transport' => 'postMessage',
        ) );
		
		$wp_customize->add_control('googleplus_social_media',array(
			'label'   => __('Google+ URL','sp_theme'),
			'section' => 'sp_social_url_section',
			'type' => 'text',
		));
		
			
		
		
		function sptheme_homepage_sanitize_text( $input ) {
			return wp_kses_post( force_balance_tags( $input ) );	
		}
		
			
		function sptheme_sanitize_image( $image, $setting ) {
			/*
			 * Valid image file types.
			 * The array includes image mime types that are included in wp_get_mime_types()
			 */
			$mimes = array(
				'jpg|jpeg|jpe' => 'image/jpeg',
				'gif'          => 'image/gif',
				'png'          => 'image/png',
				'bmp'          => 'image/bmp',
				'tif|tiff'     => 'image/tiff',
				'ico'          => 'image/x-icon'
			);
			// Return an array with file extension and mime_type.
			$file = wp_check_filetype( $image, $mimes );
			// If $image has a valid mime_type, return it; otherwise, return the default.
			return ( $file['ext'] ? $image : $setting->default );
		}
	 
}
add_action( 'customize_register', 'sptheme_custom_customizer' );
?>
