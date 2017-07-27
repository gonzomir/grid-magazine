<?php
/**
 * Grid Magazine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Grid_Magazine
 */

if ( ! function_exists( 'grid_mag_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function grid_mag_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Grid Magazine, use a find and replace
	 * to change 'grid-mag' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'grid-mag', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'grid-mag' ),
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
	add_theme_support( 'custom-background', apply_filters( 'grid_mag_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

  // Add new custom image size, so later you could call it in the theme.
  add_image_size( 'gridmag-image-large', 1680, 945, true ); // 16/9
  add_image_size( 'gridmag-image-big', 960, 540, true ); // 16/6
  add_image_size( 'gridmag-image-medium', 640, 360, true ); // 16/9
  add_image_size( 'gridmag-image-small', 360, 202, true ); // 16/9
  add_image_size( 'gridmag-image-tiny', 280, 158, true ); // 16/9

  add_image_size( 'gridmag-wide-large', 1680, 630, true ); // 16/6
  add_image_size( 'gridmag-wide-medium', 960, 360, true ); // 16/6
  add_image_size( 'gridmag-wide-small', 640, 240, true ); // 16/6
  add_image_size( 'gridmag-wide-tiny', 320, 120, true ); // 16/6

  add_image_size( 'gridmag-card-large', 1680, 1260, true ); // 4/3
  add_image_size( 'gridmag-card-medium', 960, 720, true ); // 4/3
  add_image_size( 'gridmag-card-small', 640, 480, true ); // 4/3
  add_image_size( 'gridmag-card-tiny', 320, 240, true ); // 4/3

}
endif;
add_action( 'after_setup_theme', 'grid_mag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function grid_mag_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'grid_mag_content_width', 640 );
}
add_action( 'after_setup_theme', 'grid_mag_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function grid_mag_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'grid-mag' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'grid-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'grid_mag_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function grid_mag_scripts() {

	wp_enqueue_style( 'grid-mag-font-fira-sans', get_template_directory_uri() . '/fonts/fira-sans/stylesheet.css' );

	wp_enqueue_style( 'grid-mag-style', get_stylesheet_uri() );

	wp_enqueue_script( 'grid-mag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'grid-mag-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'grid_mag_scripts' );

/**
 * Remove width and height attributes of images.
 */
function grid_mag_image_html( $html, $post_id, $post_image_id ) {
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}
add_filter( 'post_thumbnail_html', 'grid_mag_image_html', 999, 3 );


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
