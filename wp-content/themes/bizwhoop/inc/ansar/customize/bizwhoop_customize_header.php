<?php
function bizwhoop_header_setting( $wp_customize ) {
/* Header Section */
	$wp_customize->add_panel( 'header_options', array(
		'priority' => 400,
		'capability' => 'edit_theme_options',
		'title' => __('Header Settings', 'bizwhoop'),
	) );
	
	$wp_customize->add_section( 'header_contact' , array(
		'title' => __('Header Top Bar Setting', 'bizwhoop'),
		'panel' => 'header_options',
   	) );
	
	$wp_customize->add_setting(
		'bizwhoop_topbar_enable', array(
        'default'        => 'true',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'bizwhoop_topbar_enable', array(
        'label'   => __('Hide/Show Topbar', 'bizwhoop'),
        'section' => 'header_contact',
        'type'    => 'radio',
        'choices'=>array('true'=>'On','false'=>'Off'),
    ) );

    $wp_customize->add_setting(
		'bizwhoop_head_info_one', array(
        'default' => __('<a><i class="fa fa-clock-o "></i>Open-Hours:10 am to 7pm</a>','bizwhoop'),
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'bizwhoop_header_info_sanitize_text',
    ) );
    $wp_customize->add_control( 'bizwhoop_head_info_one', array(
        'label' => __('Info one', 'bizwhoop'),
        'section' => 'header_contact',
        'type' => 'textarea',
    ) );
	
	$wp_customize->add_setting(
		'bizwhoop_head_info_two', array(
        'default' => __('<a href="mailto:info@themeansar.com" title="Mail Me"><i class="fa fa-envelope"></i> info@themeansar.com</a>','bizwhoop'),
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'bizwhoop_header_info_sanitize_text',
    ) );
    $wp_customize->add_control( 'bizwhoop_head_info_two', array(
        'label' => __('Info two', 'bizwhoop'),
        'section' => 'header_contact',
        'type' => 'textarea',
    ) );
	
	// add Header widget one Setting

    $wp_customize->add_section( 'header_widget_one' , array(
		'title' => __('Header Widget One Setting', 'bizwhoop'),
		'panel' => 'header_options',
		'priority'    => 600,
   	) );

   	$wp_customize->add_setting(
    	'bizwhoop_header_widget_one_icon', array(
        'default' => __('fa-map-marker','bizwhoop'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'bizwhoop_header_widget_one_icon', array(
        'label' => __('One Icon','bizwhoop'),
        'section' => 'header_widget_one',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'bizwhoop_header_widget_one_title', array(
        'default' => __('1240 Park Avenue','bizwhoop'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'bizwhoop_header_widget_one_title',array(
        'label'   => __('One Title','bizwhoop'),
        'section' => 'header_widget_one',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'bizwhoop_header_widget_one_description', array(
        'capability' => 'edit_theme_options',
        'default' => __('NYC, USA 256323','bizwhoop'),
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'bizwhoop_header_widget_one_description', array(
        'label' => __('One Description','bizwhoop'),
        'section' => 'header_widget_one',
        'type' => 'textarea',
    ) );

    // add Header widget Two Setting
    
    $wp_customize->add_section( 'header_widget_two' , array(
		'title' => __('Header Widget Two Setting', 'bizwhoop'),
		'panel' => 'header_options',
		'priority'    => 620,
   	) );

   	$wp_customize->add_setting(
    	'bizwhoop_header_widget_two_icon', array(
		'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'fa fa-clock-o',
    ) );  
    $wp_customize->add_control( 
        'bizwhoop_header_widget_two_icon', array(
        'label' => __('Two Icon','bizwhoop'),
        'section' => 'header_widget_two',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'bizwhoop_header_widget_two_title', array(
		'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default'=> __('7:30 AM - 7:30 PM','bizwhoop'),
    ) );  
    $wp_customize->add_control( 
        'bizwhoop_header_widget_two_title',array(
        'label'   => __('Two Title','bizwhoop'),
        'section' => 'header_widget_two',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'bizwhoop_header_widget_two_description', array(
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default'=> __('Monday to Saturday','bizwhoop'),
    ) );  
    $wp_customize->add_control( 
        'bizwhoop_header_widget_two_description', array(
        'label' => __('Two Description','bizwhoop'),
        'section' => 'header_widget_two',
        'type' => 'textarea',
    ) );

    // add Header widget Three Setting
    
    $wp_customize->add_section( 'header_widget_three' , array(
		'title' => __('Header Widget Three Setting', 'bizwhoop'),
		'panel' => 'header_options',
		'priority'    => 620,
   	) );

   	$wp_customize->add_setting(
    	'bizwhoop_header_widget_three_icon', array(
		'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'fa fa-phone',
        ) );  
    $wp_customize->add_control( 
        'bizwhoop_header_widget_three_icon', array(
        'label' => __('Three Icon','bizwhoop'),
        'section' => 'header_widget_three',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'bizwhoop_header_widget_three_title', array(
		'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => '+ (007) 548 58',
    ) );  
    $wp_customize->add_control( 
        'bizwhoop_header_widget_three_title',array(
        'label'   => __('Three Title','bizwhoop'),
        'section' => 'header_widget_three',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'bizwhoop_header_widget_three_description', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'info@themeansar.com',
    ) );  
    $wp_customize->add_control( 
        'bizwhoop_header_widget_three_description', array(
        'label' => __('Three Description','bizwhoop'),
        'section' => 'header_widget_three',
        'type' => 'textarea',
    ) );

    // add Header widget Three Setting
    
    $wp_customize->add_section( 'header_widget_four' , array(
        'title' => __('Header Widget Four Setting', 'bizwhoop'),
        'panel' => 'header_options',
        'priority'    => 620,
    ) );

    $wp_customize->add_setting(
        'bizwhoop_header_widget_four_label', array(
		'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => __('Get Quote','bizwhoop'),
    ) );  
    $wp_customize->add_control( 
        'bizwhoop_header_widget_four_label', array(
        'label' => __('Four Label','bizwhoop'),
        'section' => 'header_widget_four',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'bizwhoop_header_widget_four_link', array(
		'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );  
    $wp_customize->add_control( 
        'bizwhoop_header_widget_four_link',array(
        'label'   => __('Four Link','bizwhoop'),
        'section' => 'header_widget_four',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'bizwhoop_header_widget_four_target', array(
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'bizwhoop_header_sanitize_checkbox',
    ) );  
    $wp_customize->add_control( 
        'bizwhoop_header_widget_four_target', array(
        'label' => __('Open Link New window','bizwhoop'),
        'section' => 'header_widget_four',
        'type' => 'checkbox',
    ) );
	
	
	function bizwhoop_header_info_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

    }
	
	function bizwhoop_header_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	
	}
	add_action( 'customize_register', 'bizwhoop_header_setting' );
	?>