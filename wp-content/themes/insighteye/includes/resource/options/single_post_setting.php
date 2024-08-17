<?php

return array(
	'title'      => esc_html__( 'Single Post Settings', 'insighteye' ),
	'id'         => 'single_post_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'single_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Single Post Source Type', 'insighteye' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'insighteye' ),
				'e' => esc_html__( 'Elementor', 'insighteye' ),
			),
			'default' => 'd',
		),
		
		array(
			'id'       => 'single_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Default', 'insighteye' ),
			'indent'   => true,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'single_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show post publish date on posts detail page', 'insighteye' ),
			'default' => true,
		),
		array(
			'id'      => 'single_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show author on posts detail page', 'insighteye' ),
			'default' => true,
		),
		array(
			'id'      => 'single_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Comments', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show number of comments on posts single page', 'insighteye' ),
			'default' => true,
		),
		//Social Sharing
		array(
			'id'      => 'facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Post Share', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Facebook', 'insighteye' ),
			'default' => false,
		),
		array(
			'id'      => 'twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Post Share', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Twitter', 'insighteye' ),
			'default' => false,
		),
		array(
			'id'      => 'linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Post Share', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Linkedin', 'insighteye' ),
			'default' => false,
		),
		array(
			'id'      => 'pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Post Share', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Pinterest', 'insighteye' ),
			'default' => false,
		),
		array(
			'id'      => 'reddit_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Reddit Post Share', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Reddit', 'insighteye' ),
			'default' => false,
		),
		array(
			'id'      => 'tumblr_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tumblr Post Share', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Tumblr', 'insighteye' ),
			'default' => false,
		),
		array(
			'id'      => 'digg_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Digg Post Share', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Digg', 'insighteye' ),
			'default' => false,
		),
		//Author Box
		array(
			'id'      => 'single_post_author_box',
			'type'    => 'switch',
			'title'   => esc_html__( 'Enable/Disable Author Box Info', 'insighteye' ),
			'desc'    => esc_html__( 'Enable to show Author Box Info', 'insighteye' ),
			'default' => false,
		),
		array(
			'id'    => 'single_post_author_social_share',
			'type'  => 'textarea',
			'title' => esc_html__( 'Author Social Profiles', 'insighteye' ),
			'desc'    => esc_html__( 'show author Social Media on posts detail page', 'insighteye' ),
			'required' => [ 'single_post_author_box', '=', true ],
		),
		
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);





