<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'insighteye' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'insighteye' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'insighteye' ),
				'e' => esc_html__( 'Elementor', 'insighteye' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'insighteye' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'insighteye' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'insighteye' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'insighteye' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'insighteye' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_v1.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v1',
	    ),
		
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'insighteye' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		//Background Image
		array(
			'id'       => 'footer_bg_image_v1',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer BG Image', 'insighteye' ),
			'subtitle' => esc_html__( 'Insert Footer BG image', 'insighteye' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		//Coypright
		array(
			'id'      => 'copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'insighteye' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
