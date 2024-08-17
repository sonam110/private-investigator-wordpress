<?php

define( 'INSIGHTEYE_ROOT', get_template_directory() . '/' );

require_once get_template_directory() . '/includes/functions/functions.php';
include_once get_template_directory() . '/includes/classes/base.php';
include_once get_template_directory() . '/includes/classes/dotnotation.php';
include_once get_template_directory() . '/includes/classes/header-enqueue.php';
include_once get_template_directory() . '/includes/classes/options.php';
include_once get_template_directory() . '/includes/classes/ajax.php';
include_once get_template_directory() . '/includes/classes/common.php';
include_once get_template_directory() . '/includes/classes/bootstrap_walker.php';
include_once get_template_directory() . '/includes/library/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/includes/library/hook.php';

// Merlin demo import.
require_once get_template_directory() . '/demo-import/class-merlin.php';
require_once get_template_directory() . '/demo-import/merlin-config.php';
require_once get_template_directory() . '/demo-import/merlin-filters.php';

add_action( 'after_setup_theme', 'insighteye_wp_load', 5 );

function insighteye_wp_load() {

	defined( 'INSIGHTEYE_URL' ) or define( 'INSIGHTEYE_URL', get_template_directory_uri() . '/' );
	define(  'INSIGHTEYE_KEY','!@#insighteye');
	define(  'INSIGHTEYE_URI', get_template_directory_uri() . '/');

	if ( ! defined( 'INSIGHTEYE_NONCE' ) ) {
		define( 'INSIGHTEYE_NONCE', 'insighteye_wp_theme' );
	}

	( new \INSIGHTEYE\Includes\Classes\Base )->loadDefaults();
	( new \INSIGHTEYE\Includes\Classes\Ajax )->actions();

}