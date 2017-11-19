<?php
/**
 * Brighttalk test funmctions
 *
 * @package btalk-testeriser
 *
 * @version 0.1.0 Pre-alpha
 */


if ( ! function_exists( 'btalk_setup' ) ) :

	function btalk_setup() {

		/*
		 * @todo: Lets setup something for managing adminbar and users
		 *
		 */
		if ( ! is_admin() ) {
//			add_filter('show_admin_bar', '__return_false');
		}

		load_theme_textdomain( 'btalk-testeriser', get_template_directory() . '/languages' );


		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video', 'audio' ) );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'btalk-testeriser' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'btalk_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 350,
			'width'       => 500,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Add custom images
		 */
		add_image_size('single-featured', '800', '200', true );
		add_image_size('lists-featured-thumb', '1200', '400', true );
		add_image_size('featured-sticky', '650', '400', true );

	}

endif;

add_action( 'after_setup_theme', 'btalk_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function btalk_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'btalk_content_width', 640 );
}
add_action( 'after_setup_theme', 'btalk_content_width', 0 );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function btalk_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Block 1 Logged-out', 'btalk-testeriser' ),
		'id'            => 'homepage-block-1-loggedout',
		'description'   => esc_html__( 'Add widgets here.', 'btalk-testeriser' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Block 2 Logged-out', 'btalk-testeriser' ),
		'id'            => 'homepage-block-2-loggedout',
		'description'   => esc_html__( 'Add widgets here.', 'btalk-testeriser' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Block Top Logged-in', 'btalk-testeriser' ),
		'id'            => 'homepage-block-top-loggedin',
		'description'   => esc_html__( 'Provides a region on homepage spanning the full width of homepage at the top. Block only visible if widgets added here.', 'btalk-testeriser' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Block 1 Logged-in', 'btalk-testeriser' ),
		'id'            => 'homepage-block-1-loggedin',
		'description'   => esc_html__( 'block 1 left empty will allow block 2 to span full width giving layout a columnar appearance.', 'btalk-testeriser' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Block 2 Logged-in', 'btalk-testeriser' ),
		'id'            => 'homepage-block-2-loggedin',
		'description'   => esc_html__( 'if both blocks 1 & 2 active layout of blocks will be side by side', 'btalk-testeriser' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	// Site sidebars
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'btalk-testeriser' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'btalk-testeriser' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Posts', 'btalk-testeriser' ),
		'id'            => 'sidebar-posts',
		'description'   => esc_html__( 'Add widgets here.', 'btalk-testeriser' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Pages', 'btalk-testeriser' ),
		'id'            => 'sidebar-pages',
		'description'   => esc_html__( 'Add widgets here.', 'btalk-testeriser' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Webinars', 'btalk-testeriser' ),
		'id'            => 'webinars',
		'description'   => esc_html__( 'Provides a widget area for webinar posts only.', 'btalk-testeriser' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	// footer widgets
	register_sidebar(
		array(
			'name' => __('First Footer Widget', 'btalk-testeriser'),
			'id' =>   'first-footer-widget-area',
			'description' => __('footer widget region', 'btalk-testeriser'),
			'before_widget' => '<div id="%1$s" class="widget first-foot-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>'
		)
	);
	register_sidebar(
		array(
			'name' => __('Second Footer Widget', 'btalk-testeriser'),
			'id' =>   'second-footer-widget-area',
			'description' => __('footer widget region', 'btalk-testeriser'),
			'before_widget' => '<div id="%1$s" class="widget first-foot-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>'
		)
	);
	register_sidebar(
		array(
			'name' => __('third Footer Widget', 'btalk-testeriser'),
			'id' =>   'third-footer-widget-area',
			'description' => __('footer widget region', 'btalk-testeriser'),
			'before_widget' => '<div id="%1$s" class="widget first-foot-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>'
		)
	);
}

add_action( 'widgets_init', 'btalk_widgets_init' );

/**
 * Enqueue styles.
 */
function btalk_styles() {

	$rtl = '';
	if ( is_rtl() ) {
		$rtl = '-rtl';
	}

	$ext = '.css';
	wp_enqueue_style( 'btalk-testeriser-style',       get_stylesheet_uri() );

	wp_enqueue_style( 'btalk-testeriser-core-style',  get_template_directory_uri()   . '/assets/css/core-styles'  . $rtl . $ext, array() );
	wp_enqueue_style( 'btalk-testeriser-layout',      get_template_directory_uri()   . '/assets/css/site-layout' . $rtl . $ext, array('btalk-testeriser-style') );

}
add_action( 'wp_enqueue_scripts', 'btalk_styles' );

/**
 * Remove inline WP adminbar styles.
 * We'll add our own that doesn't add margin to html element
 * upsetting layouts heights.
 */
function remove_adminbar_styles() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_adminbar_styles');

/**
 * Enqueue scripts.
 */
function btalk_scripts() {

	wp_enqueue_script( 'btalk-general-js', get_template_directory_uri() . '/assets/js/general-scripts.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'btalk_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Implement a Custom logo fcopy of WP core function.
 */
require get_template_directory() . '/includes/custom-logo.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Add custom classes to WP $classes for body element
 * Manage styles for layout positioning based on option settings
 *
 */
function btalk_body_classes( $classes ) {

if ( ! is_admin_bar_showing() ) {
	$classes[] = 'no-adminbar';
}

	$bp_is_active = false;

	if( function_exists( 'bp_is_active' ) ) :
		$bp_is_directory = bp_is_directory();
		$bp_is_active = is_buddypress();
	else:
		$bp_is_directory = false;
	endif;

	if ( is_active_sidebar( 'sidebar-posts' ) && is_single() ) {
		$classes[] = 'post-sbar-active';
	}

	if ( is_active_sidebar( 'sidebar-pages' )
		&& is_page() && ! bp_is_user()
			&& ! bp_is_group()
				&& ! bp_is_directory()
				 && ! bp_is_group_create()
				  && ! is_front_page()){
		$classes[] = 'page-sbar-active';
	}

	if( btalk_footer_widgets_active() ) {
		$classes[] = 'footer-widgets-active';
	}

	if ( is_admin_bar_showing() ) {
		$classes[] = 'adminbar-visible';
	}

	if ( !is_user_logged_in() ) {
		$classes[] = 'logged-out';
	}

	if( is_active_sidebar('sidebar-1') && ! is_singular() && ! is_front_page() ) {
		$classes[] = 'main-sidebar';
	}

	if ( is_singular() && ! $bp_is_active ) {
		$classes[] = 'wp-single';
	}

	// If static pages are set check for is_home() ! is_front_page()
	// to set a body tag for style convenience.
	if ( is_home() && ! is_front_page() ) {
		$classes[] = 'static-posts-home';
	}

	return $classes;
}
add_filter('body_class', 'btalk_body_classes', 15);



