<?php
/**
 * advweb2a1 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package advweb2a1
 */

if ( ! function_exists( 'advweb2a1_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function advweb2a1_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on advweb2a1, use a find and replace
	 * to change 'advweb2a1' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'advweb2a1', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'advweb2a1' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'advweb2a1_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'advweb2a1_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function advweb2a1_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'advweb2a1_content_width', 640 );
}
add_action( 'after_setup_theme', 'advweb2a1_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function advweb2a1_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'advweb2a1' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s cute-4-tablet">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'advweb2a1_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function advweb2a1_scripts() {
    //Main stylesheet
	wp_enqueue_style( 'advweb2a1-style', get_stylesheet_uri() );
    
    //Grid
    wp_enqueue_style('cutegrids', get_stylesheet_directory_uri()."/cutegrids.css");
    
    //Underscores scripts
	wp_enqueue_script( 'advweb2a1-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'advweb2a1-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
    
    //Google Maps
    wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), '3', true );
    
    //Smooth scroll
    wp_enqueue_script( 'smoothscroll', get_template_directory_uri().'/js/jquery.smooth-scroll.min.js', array('jquery'), '1.5.2', true );
    
    //ScrollMagic Scripts
    wp_register_script('scroll-magic', get_stylesheet_directory_uri()."/js/ScrollMagic.min.js", array("jquery"), "2.0.5", true);
    
    wp_register_script('gsap', get_stylesheet_directory_uri()."/js/plugins/animation.gsap.min.js", array("scroll-magic"), "2.0.5", true);

    wp_register_script('tweenmax', get_stylesheet_directory_uri()."/js/plugins/TweenMax.min.js", array("gsap"), "1.15.1", true);

//    wp_enqueue_script('scroll-magic-indicators', get_stylesheet_directory_uri()."/js/plugins/debug.addIndicators.min.js", array("scroll-magic"), "2.0.5", true);
    
    //Custom scripts
	wp_enqueue_script( 'scripts-init', get_template_directory_uri() . '/js/scripts.js', array('google-map', 'smoothscroll', 'scroll-magic', 'gsap', 'tweenmax', 'jquery'), '0.1', true );
    
    //Comments scripts
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'advweb2a1_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';