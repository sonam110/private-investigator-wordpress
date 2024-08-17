<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'insighteye' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'insighteye' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'insighteye' ),
				'e' => esc_html__( 'Elementor', 'insighteye' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'insighteye' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'insighteye' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),

		//Header Settings
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'insighteye' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'insighteye' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style 1', 'insighteye' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style 2', 'insighteye' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v2.png',
			    ),
				'header_v3'  => array(
				    'alt' => esc_html__( 'Header Style 3', 'insighteye' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v3.png',
			    ),
				'header_v4'  => array(
				    'alt' => esc_html__( 'Header Style One Page', 'insighteye' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v4.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'insighteye' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		//Header Topbar
		array(
            'id' => 'show_header_topbar_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Top', 'insighteye'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
            'id' => 'show_header_email_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Email Address', 'insighteye'),
            'default' => false,
            'required' => array( 'show_header_topbar_v1', '=', true ),
        ),
		array(
			'id'      => 'header_email_v1',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'insighteye' ),
			'required' => array( 'show_header_email_v1', '=', true ),
		),	
		array(
            'id' => 'show_header_address_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Address', 'insighteye'),
            'default' => false,
            'required' => array( 'show_header_topbar_v1', '=', true ),
        ),
		array(
			'id'      => 'header_address_v1',
			'type'    => 'text',
			'title'   => __( 'Address', 'insighteye' ),
			'required' => array( 'show_header_address_v1', '=', true ),
		),
		array(
            'id' => 'show_header_login_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Login Info', 'insighteye'),
            'default' => false,
            'required' => array( 'show_header_topbar_v1', '=', true ),
        ),
		array(
			'id'      => 'login_title_v1',
			'type'    => 'text',
			'title'   => __( 'Login Title', 'insighteye' ),
			'required' => array( 'show_header_login_v1', '=', true ),
		),
		array(
			'id'      => 'login_link_v1',
			'type'    => 'text',
			'title'   => __( 'Login Link', 'insighteye' ),
			'required' => array( 'show_header_login_v1', '=', true ),
		),
		array(
            'id' => 'show_header_social_icon_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'insighteye'),
            'default' => false,
			'required' => array( 'show_header_topbar_v1', '=', true ),
        ),
		array(
			'id'      => 'header_social_icon_v1',
			'type'    => 'textarea',
			'title'   => __( 'Social Media', 'insighteye' ),
			'required' => array( 'show_header_social_icon_v1', '=', true ),
		),
		//Phone Info
		array(
            'id' => 'show_header_phone_no_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Phone Number', 'insighteye'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'phone_no_v1',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'insighteye' ),
			'required' => array( 'show_header_phone_no_v1', '=', true ),
		),	
		//Button Info
		array(
            'id' => 'show_button_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Button', 'insighteye'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'btn_title_v1',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'insighteye' ),
			'required' => array( 'show_button_v1', '=', true ),
		),
		array(
			'id'      => 'btn_link_v1',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'insighteye' ),
			'required' => array( 'show_button_v1', '=', true ),
		),
		
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'insighteye' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		//Header Topbar
		array(
            'id' => 'show_header_topbar_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Top', 'insighteye'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
            'id' => 'show_header_email_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Email Address', 'insighteye'),
            'default' => false,
            'required' => array( 'show_header_topbar_v2', '=', true ),
        ),
		array(
			'id'      => 'header_email_v2',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'insighteye' ),
			'required' => array( 'show_header_email_v2', '=', true ),
		),	
		array(
            'id' => 'show_header_address_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Address', 'insighteye'),
            'default' => false,
            'required' => array( 'show_header_topbar_v2', '=', true ),
        ),
		array(
			'id'      => 'header_address_v2',
			'type'    => 'text',
			'title'   => __( 'Address', 'insighteye' ),
			'required' => array( 'show_header_address_v2', '=', true ),
		),
		array(
            'id' => 'show_header_login_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Login Info', 'insighteye'),
            'default' => false,
            'required' => array( 'show_header_topbar_v2', '=', true ),
        ),
		array(
			'id'      => 'login_title_v2',
			'type'    => 'text',
			'title'   => __( 'Login Title', 'insighteye' ),
			'required' => array( 'show_header_login_v2', '=', true ),
		),
		array(
			'id'      => 'login_link_v2',
			'type'    => 'text',
			'title'   => __( 'Login Link', 'insighteye' ),
			'required' => array( 'show_header_login_v2', '=', true ),
		),
		array(
            'id' => 'show_header_social_icon_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'insighteye'),
            'default' => false,
			'required' => array( 'show_header_topbar_v2', '=', true ),
        ),
		array(
			'id'      => 'header_social_icon_v2',
			'type'    => 'textarea',
			'title'   => __( 'Social Media', 'insighteye' ),
			'required' => array( 'show_header_social_icon_v2', '=', true ),
		),
        //Button Info
		array(
            'id' => 'show_button_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Button', 'insighteye'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'btn_title_v2',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'insighteye' ),
			'required' => array( 'show_button_v2', '=', true ),
		),
		array(
			'id'      => 'btn_link_v2',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'insighteye' ),
			'required' => array( 'show_button_v2', '=', true ),
		),
		//Sticky Phone Info
		array(
            'id' => 'show_header_phone_no_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Phone Number', 'insighteye'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'phone_no_v2',
			'type'    => 'text',
			'title'   => __( 'Sticky Header Phone Number', 'insighteye' ),
			'required' => array( 'show_header_phone_no_v2', '=', true ),
		),	
        /***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Three Settings', 'insighteye' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		//Header Topbar
		array(
            'id' => 'show_header_topbar_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Top', 'insighteye'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
            'id' => 'show_header_email_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Email Address', 'insighteye'),
            'default' => false,
            'required' => array( 'show_header_topbar_v3', '=', true ),
        ),
		array(
			'id'      => 'header_email_v3',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'insighteye' ),
			'required' => array( 'show_header_email_v3', '=', true ),
		),	
		array(
            'id' => 'show_header_address_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Address', 'insighteye'),
            'default' => false,
            'required' => array( 'show_header_topbar_v3', '=', true ),
        ),
		array(
			'id'      => 'header_address_v3',
			'type'    => 'text',
			'title'   => __( 'Address', 'insighteye' ),
			'required' => array( 'show_header_address_v3', '=', true ),
		),
		array(
            'id' => 'show_header_login_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Login Info', 'insighteye'),
            'default' => false,
            'required' => array( 'show_header_topbar_v3', '=', true ),
        ),
		array(
			'id'      => 'login_title_v3',
			'type'    => 'text',
			'title'   => __( 'Login Title', 'insighteye' ),
			'required' => array( 'show_header_login_v3', '=', true ),
		),
		array(
			'id'      => 'login_link_v3',
			'type'    => 'text',
			'title'   => __( 'Login Link', 'insighteye' ),
			'required' => array( 'show_header_login_v3', '=', true ),
		),
		array(
            'id' => 'show_header_social_icon_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'insighteye'),
            'default' => false,
			'required' => array( 'show_header_topbar_v3', '=', true ),
        ),
		array(
			'id'      => 'header_social_icon_v3',
			'type'    => 'textarea',
			'title'   => __( 'Social Media', 'insighteye' ),
			'required' => array( 'show_header_social_icon_v3', '=', true ),
		),
		//Button Info
		array(
            'id' => 'show_button_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Button', 'insighteye'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
			'id'      => 'btn_title_v3',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'insighteye' ),
			'required' => array( 'show_button_v3', '=', true ),
		),
		array(
			'id'      => 'btn_link_v3',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'insighteye' ),
			'required' => array( 'show_button_v3', '=', true ),
		),
		/***********************************************************************
								Header Version 4 Start
		************************************************************************/
		array(
			'id'       => 'header_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style OnePage Settings', 'insighteye' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		//Header Topbar
		array(
            'id' => 'show_header_topbar_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Top', 'insighteye'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
            'id' => 'show_header_email_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Email Address', 'insighteye'),
            'default' => false,
            'required' => array( 'show_header_topbar_v4', '=', true ),
        ),
		array(
			'id'      => 'header_email_v4',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'insighteye' ),
			'required' => array( 'show_header_email_v4', '=', true ),
		),	
		array(
            'id' => 'show_header_address_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Address', 'insighteye'),
            'default' => false,
            'required' => array( 'show_header_topbar_v4', '=', true ),
        ),
		array(
			'id'      => 'header_address_v4',
			'type'    => 'text',
			'title'   => __( 'Address', 'insighteye' ),
			'required' => array( 'show_header_address_v4', '=', true ),
		),
		array(
            'id' => 'show_header_login_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Login Info', 'insighteye'),
            'default' => false,
            'required' => array( 'show_header_topbar_v4', '=', true ),
        ),
		array(
			'id'      => 'login_title_v4',
			'type'    => 'text',
			'title'   => __( 'Login Title', 'insighteye' ),
			'required' => array( 'show_header_login_v4', '=', true ),
		),
		array(
			'id'      => 'login_link_v4',
			'type'    => 'text',
			'title'   => __( 'Login Link', 'insighteye' ),
			'required' => array( 'show_header_login_v4', '=', true ),
		),
		array(
            'id' => 'show_header_social_icon_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'insighteye'),
            'default' => false,
			'required' => array( 'show_header_topbar_v4', '=', true ),
        ),
		array(
			'id'      => 'header_social_icon_v4',
			'type'    => 'textarea',
			'title'   => __( 'Social Media', 'insighteye' ),
			'required' => array( 'show_header_social_icon_v4', '=', true ),
		),
		//Phone Info
		array(
            'id' => 'show_header_phone_no_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Phone Number', 'insighteye'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
			'id'      => 'phone_no_v4',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'insighteye' ),
			'required' => array( 'show_header_phone_no_v4', '=', true ),
		),	
		//Button Info
		array(
            'id' => 'show_button_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Button', 'insighteye'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
			'id'      => 'btn_title_v4',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'insighteye' ),
			'required' => array( 'show_button_v4', '=', true ),
		),
		array(
			'id'      => 'btn_link_v4',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'insighteye' ),
			'required' => array( 'show_button_v4', '=', true ),
		),
		
		
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
