<?php
/**
 * Theme config file.
 *
 * @package INSIGHTEYE
 * @author  TemplatePath
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['insighteye_main_header'][] 	= array( 'insighteye_main_header_area', 99 );

$config['default']['insighteye_main_footer'][] 	= array( 'insighteye_main_footer_area', 99 );

$config['default']['insighteye_sidebar'][] 	    = array( 'insighteye_sidebar', 99 );

$config['default']['insighteye_banner'][] 	    = array( 'insighteye_banner', 99 );


return $config;
