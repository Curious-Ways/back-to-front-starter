<?php
/**
 * Back to Front Starter functions and definitions
 *
 * @package Back to Front Starter
 */

/**
 * ACF Options page
 */

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page('Site Options');

}

/**
 * Custom Post Types
 */

require_once('inc/cpt.php');

/**
 * Taxonomies
 */

require_once('inc/tax.php');


if ( ! function_exists( 'back_to_front_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function back_to_front_starter_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'back_to_front_starter', get_template_directory() . '/languages' );

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

	// Custom image sizes
	add_image_size( '700h', 9999, 700 );
	add_image_size( '200h', 9999, 200 );
	add_image_size( '772sq', 772, 772, true );
	add_image_size( '772_portrait', 772, 1156, true );	
	add_image_size( '2400_landscape', 2400, 1290, true );	
	//add_image_size( 'custom-thumb', 540, 540, array( 'center', 'top' ) );
	//add_image_size( 'custom-large', 1045, 325, true );	


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'back_to_front_starter' ),
	) );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 200,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
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
	add_theme_support( 'custom-background', apply_filters( 'back_to_front_starter_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );	
}

endif; // back_to_front_starter_setup

add_action( 'after_setup_theme', 'back_to_front_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function back_to_front_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'back_to_front_starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'back_to_front_starter_content_width', 0 );

/**
 * Return early if Custom Logos are not available.
 *
 * @todo Remove after WP 4.7
 */
function back_to_front_starter_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function back_to_front_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'back_to_front_starter' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'back_to_front_starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function back_to_front_starter_scripts() {

  wp_register_style( 'back_to_front_starter--style', get_template_directory_uri() . '/assets/css/global.min.css', array(),'20120208','all' );
  wp_enqueue_style( 'back_to_front_starter--style' );

	wp_enqueue_script( 'back_to_front_starter-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'back_to_front_starter-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

  // Match Height
  // wp_enqueue_script( 'back_to_front_starter--matchHeight', get_template_directory_uri() . '/bower_components/matchHeight/jquery.matchHeight.js', array('jquery'), '20120200', true );

	// FitVids
  // wp_enqueue_script( 'back_to_front_starter--fitvids', get_template_directory_uri() . '/bower_components/FitVids/jquery.fitvids.js', array('jquery'), '20120200', true );

	// Picturefill
  // wp_enqueue_script( 'back_to_front_starter--picturefill', get_template_directory_uri() . '/bower_components/picturefill/dist/picturefill.min.js', array('jquery'), '20120200', true );

  // Modernizer
  wp_enqueue_script( 'back_to_front_starter--modernizer-js', get_template_directory_uri() . '/bower_components/modernizer/modernizr.js', array('jquery'), '20120200', true );

	// Global javascript 
  wp_enqueue_script( 'back_to_front_starter--global-js', get_template_directory_uri() . '/assets/js/scripts.min.js', array('jquery'), '20120200', true );  

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'back_to_front_starter_scripts' );

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


// Move Yoast to bottom

function yoasttobottom() {
	return 'low';
}

add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

// http://wordpress.stackexchange.com/questions/195087/remove-p-tags-from-images

function filter_ptags_on_images($content) {
    $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}
add_filter('acf_the_content', 'filter_ptags_on_images');
add_filter('the_content', 'filter_ptags_on_images');

// REMOVE WP EMOJI http://www.denisbouquet.com/remove-wordpress-emoji-code/

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );