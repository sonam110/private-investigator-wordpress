<?php
return array(
	'title'      => esc_html__( 'Logo Setting', 'insighteye' ),
	'id'         => 'logo_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		//Favicon Style
		array(
			'id'       => 'image_favicon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Favicon', 'insighteye' ),
			'subtitle' => esc_html__( 'Insert site favicon image', 'insighteye' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/favicon.ico' ),
		),
		//Dark Logo Style
		array(
            'id' => 'dark_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Dark Logo', 'insighteye'),
            'default' => true,
        ),
		array(
			'id'       => 'dark_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Dark Logo Image', 'insighteye' ),
			'subtitle' => esc_html__( 'Insert site dark logo image', 'insighteye' ),
			'required' => array( 'dark_logo_show', '=', true ),
		),
		array(
			'id'       => 'dark_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Dark Logo Dimentions', 'insighteye' ),
			'subtitle' => esc_html__( 'Select Dark Logo Dimentions', 'insighteye' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'dark_logo_show', '=', true ),
		),
		//Light Logo Style
		array(
            'id' => 'light_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Light Logo', 'insighteye'),
            'default' => true,
        ),
		array(
			'id'       => 'light_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Light Logo Image', 'insighteye' ),
			'subtitle' => esc_html__( 'Insert site light logo image', 'insighteye' ),
			'required' => array( 'light_logo_show', '=', true ),
		),
		array(
			'id'       => 'light_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Light Logo Dimentions', 'insighteye' ),
			'subtitle' => esc_html__( 'Select Light Logo Dimentions', 'insighteye' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'light_logo_show', '=', true ),
		),
		//Mobile Logo Style
		array(
            'id' => 'mobile_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Logo', 'insighteye'),
            'default' => true,
        ),
		array(
			'id'       => 'mobile_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Mobile Logo Image', 'insighteye' ),
			'subtitle' => esc_html__( 'Insert site mobile logo image', 'insighteye' ),
			'required' => array( 'mobile_logo_show', '=', true ),
		),
		array(
			'id'       => 'mobile_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Mobile Logo Dimentions', 'insighteye' ),
			'subtitle' => esc_html__( 'Select Mobile Logo Dimentions', 'insighteye' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'mobile_logo_show', '=', true ),
		),
		//End Logo Settings
		array(
			'id'       => 'logo_settings_section_end',
			'type'     => 'section',
			'indent'      => false,
		),
	),
);
