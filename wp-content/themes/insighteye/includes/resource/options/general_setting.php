<?php
$styles = [];
foreach(range(1, 28) as $val) {
    $styles[$val] = sprintf(esc_html__('Style %s', 'insighteye'), $val);
}

return  array(
    'title'      => esc_html__( 'General Setting', 'insighteye' ),
    'id'         => 'general_setting',
    'desc'       => '',
    'icon'       => 'el el-wrench',
    'fields'     => array(
        array(
            'id' => 'theme_preloader',
            'type' => 'switch',
            'title' => esc_html__('Enable Preloader', 'insighteye'),
            'default' => false,
        ),
		array(
			'id'      => 'preloader_text',
			'type'    => 'textarea',
			'title'   => __( 'Preloader Text', 'insighteye' ),
			'required' => array( 'theme_preloader', '=', true ),
		),
		array(
            'id' => 'theme_rtl',
            'type' => 'switch',
            'title' => esc_html__('Enable RTL', 'insighteye'),
            'default' => false,
        ),
    ),
);
