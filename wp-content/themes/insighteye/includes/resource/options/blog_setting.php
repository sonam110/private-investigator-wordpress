<?php

return array(
	'title'  => esc_html__( 'Blog Page Settings', 'insighteye' ),
	'id'     => 'blog_setting',
	'desc'   => '',
	'icon'   => 'el el-indent-left',
	'fields' => array(
		array(
			'id'      => 'blog_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Blog Source Type', 'insighteye' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'insighteye' ),
				'e' => esc_html__( 'Elementor', 'insighteye' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'blog_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'insighteye' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'blog_source_type', '=', 'e' ],
		),

		array(
			'id'       => 'blog_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Blog Default', 'insighteye' ),
			'indent'   => true,
			'required' => [ 'blog_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'blog_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'insighteye' ),
			'default' => true,
		),
		array(
			'id'       => 'blog_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'insighteye' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'insighteye' ),
			'required' => array( 'blog_page_banner', '=', true ),
		),
		array(
			'id'       => 'blog_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'insighteye' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'insighteye' ),
			'default'  => array(
			    'url' => INSIGHTEYE_URI . 'assets/images/background/page-title.jpg',
		    ),
			'required' => array( 'blog_page_banner', '=', true ),
		),

		array(
			'id'       => 'blog_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout', 'insighteye' ),
			'subtitle' => esc_html__( 'Select main content and sidebar alignment.', 'insighteye' ),
			'options'  => array(

				'left'  => array(
					'alt' => esc_html__( '2 Column Left', 'insighteye' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cl.png',
				),
				'full'  => array(
					'alt' => esc_html__( '1 Column', 'insighteye' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/1col.png',
				),
				'right' => array(
					'alt' => esc_html__( '2 Column Right', 'insighteye' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cr.png',
				),
			),

			'default' => 'right',
		),

		array(
			'id'       => 'blog_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar', 'insighteye' ),
			'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'insighteye' ),
			'required' => array(
				array( 'blog_sidebar_layout', '=', array( 'left', 'right' ) ),
			),
			'options'  => insighteye_get_sidebars(),
		),
		array(
			'id'      => 'blog_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Post Comments', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show post comments on posts listing', 'insighteye' ),
			'default' => true,
		),

		array(
			'id'      => 'blog_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show author on posts listing', 'insighteye' ),
			'default' => true,
		),
		array(
			'id'      => 'blog_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Post Date', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show post data on posts listing', 'insighteye' ),
			'default' => true,
		),
		array(
			'id'       => 'blog_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'blog_source_type', '=', 'd' ],
		),
	),
);