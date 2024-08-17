<?php

return array(

    'title'         => esc_html__( 'Mobile Sidebar Settings', 'insighteye' ),
    'id'            => 'mobile_setting',
    'desc'          => '',
    'icon'          => 'el el-font',
    'fields'        => array(
        array(
            'id' => 'show_mobile_info_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Contact Info', 'insighteye'),
            'default' => false,
        ),
		array(
			'id'      => 'mobile_info_title_v1',
			'type'    => 'text',
			'title'   => __( 'Info Title', 'insighteye' ),
			'required' => array( 'show_mobile_info_v1', '=', true ),
		),
		array(
			'id'      => 'mobile_address_v1',
			'type'    => 'text',
			'title'   => __( 'Address', 'insighteye' ),
			'required' => array( 'show_mobile_info_v1', '=', true ),
		),
		array(
			'id'      => 'mobile_phone_no_v1',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'insighteye' ),
			'required' => array( 'show_mobile_info_v1', '=', true ),
		),
		array(
			'id'      => 'mobile_email_address_v1',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'insighteye' ),
			'required' => array( 'show_mobile_info_v1', '=', true ),
		),
		array(
            'id' => 'show_mobile_social_icon_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'insighteye'),
            'default' => false,
        ),
		array(
			'id'      => 'mobile_header_social_icon_v1',
			'type'    => 'textarea',
			'title'   => __( 'Social Media', 'insighteye' ),
			'required' => array( 'show_mobile_social_icon_v1', '=', true ),
		),
    ),
);

