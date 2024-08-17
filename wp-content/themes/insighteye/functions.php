<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'insighteye_setup_theme' );
add_action( 'after_setup_theme', 'insighteye_load_default_hooks' );


function insighteye_setup_theme() {

	load_theme_textdomain( 'insighteye', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'align-wide' );
    
	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
	add_image_size( 'insighteye_410x451', 410, 451, true ); //insighteye_410x451 Team Grid
	add_image_size( 'insighteye_70x71', 70, 71, true ); //insighteye_70x71 Testimonil Carousel
	add_image_size( 'insighteye_410x280', 410, 280, true ); //insighteye_410x280 Service Grid
	add_image_size( 'insighteye_350x221', 350, 221, true ); //insighteye_350x221 blog Grid
	add_image_size( 'insighteye_1290x600', 1290, 600, true ); //insighteye_1290x600 single Project
	add_image_size( 'insighteye_610x600', 610, 600, true ); //insighteye_610x600 single Team
	add_image_size( 'insighteye_850x470', 850, 470, true ); //insighteye_850x470 single service
	add_image_size( 'insighteye_790x500', 790, 500, true ); //insighteye_790x500 single blog
	
	
	/*---------- Register image sizes ends ----------*/
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'insighteye' ),
		'onepage_menu' => esc_html__( 'OnePage Menu', 'insighteye' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'insighteye_admin_init', 2000000 );
}

/**
 * [insighteye_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function insighteye_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [insighteye_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function insighteye_widgets_init() {

	global $wp_registered_sidebars;
	$theme_options = get_theme_mod( 'insighteye' . '_options-mods' );
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'insighteye' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'insighteye' ),
		'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'insighteye'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'insighteye'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
		register_sidebar(array(
		  'name' => esc_html__( 'Service Widget', 'insighteye' ),
		  'id' => 'service-sidebar',
		  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'insighteye' ),
		  'before_widget'=>'<div id="%1$s" class="service-widget category-widget %2$s">',
		  'after_widget'=>'</div>',
		  'before_title' => '<h3>',
		  'after_title' => '</h3>'
		));
		register_sidebar(array(
		  'name' => esc_html__( 'Blog Listing', 'insighteye' ),
		  'id' => 'blog-sidebar',
		  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'insighteye' ),
		  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
		  'after_widget'=>'</div>',
		  'before_title' => '<div class="widget-title"><h3>',
		  'after_title' => '</h3></div>'
		));
	}
	if ( ! is_object( insighteye_WSH() ) ) {
		return;
	}

	$sidebars = insighteye_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( insighteye_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'insighteye_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function insighteye_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'insighteye' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'insighteye' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'insighteye' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'insighteye' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'insighteye' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'insighteye' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'insighteye' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'insighteye' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'insighteye' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'insighteye_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function insighteye_enqueue_scripts() {
	$options = insighteye_WSH()->option();
	
    //styles
    wp_enqueue_style( 'font-awesome-all', get_template_directory_uri() . '/assets/css/font-awesome-all.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/css/owl.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css' );
	wp_enqueue_style( 'insighteye-elpath', get_template_directory_uri() . '/assets/css/elpath.css' );	
	wp_enqueue_style( 'insighteye-color', get_template_directory_uri() . '/assets/css/color.css' );	
	wp_enqueue_style( 'insighteye-rtl', get_template_directory_uri() . '/assets/css/rtl.css' );
	wp_enqueue_style( 'insighteye-banner', get_template_directory_uri() . '/assets/css/module-css/banner.css' );
	wp_enqueue_style( 'insighteye-faq', get_template_directory_uri() . '/assets/css/module-css/feature.css' );
	wp_enqueue_style( 'insighteye-about', get_template_directory_uri() . '/assets/css/module-css/about.css' );		
	wp_enqueue_style( 'insighteye-service', get_template_directory_uri() . '/assets/css/module-css/service.css' );
	wp_enqueue_style( 'insighteye-chooseus', get_template_directory_uri() . '/assets/css/module-css/chooseus.css' );
	wp_enqueue_style( 'insighteye-video', get_template_directory_uri() . '/assets/css/module-css/video.css' );	
	wp_enqueue_style( 'insighteye-case', get_template_directory_uri() . '/assets/css/module-css/case.css' );
	wp_enqueue_style( 'insighteye-funfact', get_template_directory_uri() . '/assets/css/module-css/funfact.css');
	wp_enqueue_style( 'insighteye-team', get_template_directory_uri() . '/assets/css/module-css/team.css' );	
	wp_enqueue_style( 'insighteye-clients', get_template_directory_uri() . '/assets/css/module-css/clients.css' );
	wp_enqueue_style( 'insighteye-testimonial', get_template_directory_uri() . '/assets/css/module-css/testimonial.css' );
	wp_enqueue_style( 'insighteye-cta', get_template_directory_uri() . '/assets/css/module-css/cta.css');
	wp_enqueue_style( 'insighteye-feature', get_template_directory_uri() . '/assets/css/module-css/faq.css' );
	wp_enqueue_style( 'insighteye-news', get_template_directory_uri() . '/assets/css/module-css/news.css');
	wp_enqueue_style( 'insighteye-blog', get_template_directory_uri() . '/assets/css/module-css/blog.css' );	
	wp_enqueue_style( 'insighteye-case-details', get_template_directory_uri() . '/assets/css/module-css/case-details.css' );	
	wp_enqueue_style( 'insighteye-contact', get_template_directory_uri() . '/assets/css/module-css/contact.css' );
	wp_enqueue_style( 'insighteye-error', get_template_directory_uri() . '/assets/css/module-css/error.css');
	wp_enqueue_style( 'insighteye-page-title', get_template_directory_uri() . '/assets/css/module-css/page-title.css' );	
	wp_enqueue_style( 'insighteye-service-details', get_template_directory_uri() . '/assets/css/module-css/service-details.css' );	
	wp_enqueue_style( 'insighteye-team-details', get_template_directory_uri() . '/assets/css/module-css/team-details.css' );	
	wp_enqueue_style( 'insighteye-main', get_stylesheet_uri() );
	wp_enqueue_style( 'insighteye-main-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'insighteye-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'insighteye-tut', get_template_directory_uri() . '/assets/css/tut.css' );
	wp_enqueue_style( 'insighteye-gutenberg', get_template_directory_uri() . '/assets/css/gutenberg.css' );
	wp_enqueue_style( 'insighteye-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/assets/js/owl.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/assets/js/appear.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/isotope.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'flaticon', get_template_directory_uri().'/assets/js/flaticon.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'parallax-scroll', get_template_directory_uri().'/assets/js/parallax-scroll.js', array( 'jquery' ), '2.1.2', true );	
	wp_enqueue_script( 'bxslider', get_template_directory_uri().'/assets/js/bxslider.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'insighteye-main-script', get_template_directory_uri().'/assets/js/script.js', array(), false, true );
	
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'insighteye_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function insighteye_fonts_url() {
	
	$fonts_url = '';
	
		
		$font_families['Syne']      = 'Syne:400,500,600,700,800';
		$font_families['Poppins']      = 'Poppins:300,400,500,600,700,800,900';
		

		$font_families = apply_filters( 'INSIGHTEYE/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function insighteye_theme_styles() {
    wp_enqueue_style( 'insighteye-theme-fonts', insighteye_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'insighteye_theme_styles' );
add_action( 'admin_enqueue_scripts', 'insighteye_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) insighteye_set function

/**
 * [insighteye_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'insighteye_set' ) ) {
	function insighteye_set( $var, $key, $def = '' ) {

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}


//Contact Form 7 List
function get_contact_form_7_list()
{
	$contact_forms = array();
	$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
	if (!empty($cf7)) {
		foreach ($cf7 as $cform) {
			if (isset($cform)) {
				if (isset($cform->ID) && isset($cform->post_title)) {
					$contact_forms[$cform->ID] = $cform->post_title;
				}
			}
		}
	}
    return $contact_forms;
}

// 2) insighteye_add_editor_styles function

function insighteye_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'insighteye_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = insighteye_WSH()->option(); 
if( insighteye_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}

add_filter('doing_it_wrong_trigger_error', function () {return false;}, 10, 0);


//Related Products

function insighteye_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}