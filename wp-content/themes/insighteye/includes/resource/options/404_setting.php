<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'insighteye' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'insighteye' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'insighteye' ),
				'e' => esc_html__( 'Elementor', 'insighteye' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'insighteye' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'insighteye' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),	
		array(
			'id'      => '404_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'insighteye' ),
			'default' => true,
		),
		array(
			'id'       => '404_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'insighteye' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'insighteye' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => '404_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'insighteye' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'insighteye' ),
			'default'  => array(
			    'url' => INSIGHTEYE_URI . 'assets/images/background/page-title.jpg',
		    ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => 'error_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( '404 Error Image', 'insighteye' ),
			'desc'     => esc_html__( 'Insert Error image', 'insighteye' ),
			'default'  => '',
		),
		array(
			'id'    => '404_page_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Page Heading', 'insighteye' ),
			'desc'  => esc_html__( 'Enter 404 section Page Heading that you want to show', 'insighteye' ),
		),
		array(
			'id'    => 'back_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'insighteye' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'insighteye' ),
			'default'  => true,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'insighteye' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'insighteye' ),
			'default'  => esc_html__( 'Back To Home', 'insighteye' ),
			'required' => array( 'back_home_btn', '=', true ),
		),
		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),
	),
);