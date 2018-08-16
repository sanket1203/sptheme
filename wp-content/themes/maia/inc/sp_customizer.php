<?php
function sptheme_custom_customizer($wp_customize){
		$wp_customize->add_section( 'top_heading_home', array (
			'title' => __( 'Custom Home Heading', 'sp_theme' ),
			'panel' => 'logo',
		 ) );
	 
	 // add section to manage Services
		$wp_customize->add_section('sptheme_service_section_settings', array(
			'title' => __('Custom Text Home','financeup'),
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
			'label'   => __('Title','financeup'),
			'section' => 'sptheme_service_section_settings',
			'type' => 'text',
		) );
		
		$wp_customize->add_setting('top_heading_home_sub', array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sptheme_homepage_sanitize_text',
			'transport' => 'postMessage',
        ) );	
		$wp_customize->add_control('top_heading_home_sub',array(
			'label'   => __('Sub Text','financeup'),
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
		
		function sptheme_homepage_sanitize_text( $input ) {

			return wp_kses_post( force_balance_tags( $input ) );	
		}
	 
}
add_action( 'customize_register', 'sptheme_custom_customizer' );
?>
