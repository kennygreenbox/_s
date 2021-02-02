<?php
/**
 * hello_world functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hello_world
 */

if ( ! defined( 'hello_world_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'hello_world_VERSION', '1.0.0' );
}

if ( ! function_exists( 'hello_worldhello_worldetup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the afterhello_worldetup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hello_worldhello_worldetup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on hello_world, use a find and replace
		 * to change 'hello_world' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hello_world', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_themehello_worldupport( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_themehello_worldupport( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_themehello_worldupport( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'hello_world' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_themehello_worldupport(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_themehello_worldupport(
			'custom-background',
			apply_filters(
				'hello_world_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_themehello_worldupport( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_themehello_worldupport(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'afterhello_worldetup_theme', 'hello_worldhello_worldetup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hello_world_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hello_world_content_width', 640 );
}
add_action( 'afterhello_worldetup_theme', 'hello_world_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hello_world_widgets_init() {
	registerhello_worldidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'hello_world' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hello_world' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'hello_world_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hello_worldhello_worldcripts() {
	wp_enqueuehello_worldtyle( 'hello_world-style', gethello_worldtylesheet_uri(), array(), hello_world_VERSION );
	wphello_worldtyle_add_data( 'hello_world-style', 'rtl', 'replace' );

	wp_enqueuehello_worldcript( 'hello_world-navigation', get_template_directory_uri() . '/js/navigation.js', array(), hello_world_VERSION, true );

	if ( ishello_worldingular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueuehello_worldcript( 'comment-reply' );
	}
}
add_action( 'wp_enqueuehello_worldcripts', 'hello_worldhello_worldcripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
