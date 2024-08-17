<?php

namespace INSIGHTEYE\Includes\Classes;


/**
 * Header and Enqueue class
 */
class Header_Enqueue {


	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue' ) );

		add_filter( 'wp_resource_hints', array( __CLASS__, 'resource_hints' ), 10, 2 );
	}

	/**
	 * Gets the arrays from method scripts and styles and process them to load.
	 * Styles are being loaded by default while scripts only enqueue and can be loaded where required.
	 *
	 * @return void This function returns nothing.
	 */
	public static function enqueue() {

		self::scripts();

		self::styles();

	}

	/**
	 * The major scripts loader to load all the scripts of the theme. Developer can hookup own scripts.
	 * All the scripts are being load in footer.
	 *
	 * @return array Returns the array of scripts to load
	 */
	public static function scripts() {
		$options = get_theme_mod( 'insighteye' . '_options-mods' );
		$ssl     = is_ssl() ? 'https' : 'http';

		$scripts = array(
		);

		$scripts = apply_filters( 'INSIGHTEYE/includes/classes/header_enqueue/scripts', $scripts );
		/**
		 * Enqueue the scripts
		 *
		 * @var array
		 */
		foreach ( $scripts as $name => $js ) {

			if ( strstr( $js, 'http' ) || strstr( $js, 'https' ) || strstr( $js, 'googleapis.com' ) ) {

				wp_register_script( "{$name}", $js, '', '', true );
			} else {
				wp_register_script( "{$name}", get_template_directory_uri() . '/' . $js, '', '', true );
			}
		}

		wp_enqueue_script( array(
		) );


		$header_data = array(
			'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
			'nonce'   => wp_create_nonce( INSIGHTEYE_NONCE ),
		);

		wp_localize_script( 'jquery', 'insighteye_data', $header_data );

		if ( insighteye_set( $options, 'footer_js' ) ) {

			wp_add_inline_script( 'jquery', insighteye_set( $options, 'footer_js' ) );
		}

	}

	/**
	 * The major styles loader to load all the styles of the theme. Developer can hookup own styles.
	 * All the styles are being load in head.
	 *
	 * @return array Returns the array of styles to load
	 */
	public static function styles() {
		$options     = insighteye_WSH()->option();
		$header_meta = get_post_meta( get_the_ID(), 'header_style_settings');
		$header_option = $options->get( 'header_style_settings' );
		$header = ( $header_meta ) ? $header_meta['0'] : $header_option;
		
		if ( $header == 'header_v1' ) {
		  $color_scheme =  'assets/css/color.css';
		} elseif ( $header == 'header_v2' ) {
			$color_scheme =  'assets/css/color-2.css';
		} elseif ( $header == 'header_v3' ) {
			$color_scheme =  'assets/css/color-3.css';
		} elseif ( $header == 'header_v4' ) {
			$color_scheme =  'assets/css/color-4.css';
		} elseif ( $header == 'header_v5' ) {
			$color_scheme =  'assets/css/color-5.css';
		} else {
			$color_scheme =  'assets/css/color.css';
		}
		$styles = array(
			//'google-fonts'      => self::fonts_url(),
		);
		

		$styles = apply_filters( 'INSIGHTEYE/includes/classes/header_enqueue/styles', $styles );

		/**
		 * Enqueue the styles
		 *
		 * @var array
		 */
		foreach ( $styles as $name => $style ) {

			if ( strstr( $style, 'http' ) || strstr( $style, 'https' ) || strstr( $style, 'fonts.googleapis' ) ) {
				wp_enqueue_style( "insighteye-{$name}", $style );
			} else {
				wp_enqueue_style( "insighteye-{$name}", get_template_directory_uri() . '/' . $style );
			}
		}
		$options      = insighteye_WSH()->option();
		$custom_style = '';

		wp_add_inline_style( 'color', $custom_style );

		$header_styles = self::header_styles(); 
		
		if ( $custom_font = $options->get('theme_custom_font') ) {
            $header_styles .= insighteye_custom_fonts_load( $custom_font );
        }

		wp_add_inline_style( 'insighteye-main-style', $header_styles );
	}

	/**
	 * Register custom fonts.
	 */
	public static function fonts_url() {
	}


	/**
	 * Add preconnect for Google Fonts.
	 *
	 * @since INSIGHTEYE 1.0
	 *
	 * @param array  $urls          URLs to print for resource hints.
	 * @param string $relation_type The relation type the URLs are printed.
	 *
	 * @return array $urls           URLs to print for resource hints.
	 */
	public static function resource_hints( $urls, $relation_type ) {
		if ( wp_style_is( 'insighteye-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		}

		return $urls;
	}

	/**
	 * header_styles
	 *
	 * @since INSIGHTEYE 1.0
	 *
	 * @param array $urls URLs to print for resource hints.
	 */
	public static function header_styles() {

		$data = \INSIGHTEYE\Includes\Classes\Common::instance()->data( 'blog' )->get();

		$options = insighteye_WSH()->option();

		$styles = '';
		if ( $options->get( 'footer_top_button' ) ) :
			$styles .= "#topcontrol {
				background: " . $options->get( 'button_bg' ) . " none repeat scroll 0 0 !important;
				opacity: 0.5;

				color: " . $options->get( 'button_color' ) . " !important;

			}";

		endif;

		$settings = get_theme_mod( 'insighteye' . '_options-mods' );

		if ( $custom_font = insighteye_set( $settings, 'theme_custom_font' ) ) {

			$styles .= apply_filters('insighteye_redux_custom_fonts_load', $custom_font );


		}

		return $styles;
	}


}