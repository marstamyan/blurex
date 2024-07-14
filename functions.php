<?php

/**
 * bluerex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bluerex
 */

if ( ! function_exists( 'bluerex_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bluerex_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bluerex, use a find and replace
		 * to change 'bluerex' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bluerex', get_template_directory() . '/languages' );

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
			'header-menu' => esc_html__( 'Header menu', 'bluerex' ),
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
		add_theme_support( 'custom-background', apply_filters( 'bluerex_custom_background_args', array(
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
			'height'      => 69,
			'width'       => 62,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'bluerex_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bluerex_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bluerex_content_width', 640 );
}

add_action( 'after_setup_theme', 'bluerex_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bluerex_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu', 'bluerex' ),
		'id'            => 'sidebar_footer_menu',
		'description'   => esc_html__( 'Add widgets here.', 'bluerex' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s col-6">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Images', 'bluerex' ),
		'id'            => 'sidebar-footer_images',
		'description'   => esc_html__( 'Add widgets here.', 'bluerex' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s col-12">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Categories Sidebar', 'bluerex' ),
		'id'            => 'categories-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'bluerex' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-widget widget-categories">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}

add_action( 'widgets_init', 'bluerex_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bluerex_scripts() {
	//WP main CSS
	wp_enqueue_style( 'bluerex-style', get_stylesheet_uri() );
	//Fonts
	wp_enqueue_style( "google-fonts", "https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Poppins:600&display=swap" );
	// Bootsrap
	wp_enqueue_style( 'bluerex-bootstrap.min.css', get_template_directory_uri() . '/assets/style/bootstrap.min.css' );
	//baguetteBox.min.css
	wp_enqueue_style( "baguetteBox.min.css", get_template_directory_uri() . '/assets/style/baguetteBox.min.css' );
	//Theme main CSS
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/style/style.css' );
	//Disable JQuery
	wp_deregister_script( 'jquery' );
	//Register Jquery
	wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', false, null, true );
	//Enable Jquery
	wp_enqueue_script( 'jquery' );
	//Poper JS
	wp_enqueue_script( 'Poper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), null, true );
	//Bootstrap JS
	wp_enqueue_script( 'Bootstrap-JS', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), null, true );
	//Poper JS
	wp_enqueue_script( 'baguetteBox', get_template_directory_uri() . '/assets/js/baguetteBox.min.js', array(), null, true );
	//Main JS
	wp_enqueue_script( 'Main-JS', get_template_directory_uri() . '/assets/js/script.js', array(), null, true );
	wp_enqueue_script( 'bluerex-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bluerex-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'bluerex_scripts' );

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

//custom codes
function blurex_acf_image( $name, $cat = null ) {
	if ( get_field( $name, $cat ) ) {
		return "style='background:url(" . get_field( $name, $cat ) . ") center no-repeat;
		
				background-size: cover;'";
	}

	return '';
}

add_action( "init", "bluerex_reviews_post_type" );

function bluerex_reviews_post_type() {
	register_post_type( "reviews", array(
		"labels"       => array(
			"name"          => "Отзывы",
			"singular_name" => "Отзыв",
			"add_new"       => __( "Добавить новый отзыв, bluerex" ),
			"add_new_item"  => __( "Новый отзыв, bluerex" ),
			"edit_item"     => __( "Редакторовать, bluerex" ),
			"new_item"      => __( "Новый отзыв, bluerex" ),
			"view_item"     => __( "Посмотреть, bluerex" ),
			"menu_name"     => "Отзывы клиентов",
			"all_items"     => "Все отзывы",
		),
		"public"       => true,
		"supports"     => array( "title", "editor", "thumbnail" ),
		"menu-icon"    => "dashicons-universal-access",
		"show_in_rest" => true,
	) );
}

add_filter( 'navigation_markup_template', 'blurex_my_navigation_template', 10, 2 );
function blurex_my_navigation_template( $template, $class ) {
	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

the_posts_pagination( array(
	'end_size' => 2,
) );

function my_cat_widget( $args ) {
	$exclude = "4,7";
	$args["exclude"] = $exclude;

	return $args;
}

add_filter( "widget_categories_args", "my_cat_widget" );

function exclude_category( $query ) {
	if ( $query->is_home ) {
		$query->set( 'category__not_in', array( 4, 7 ) );
	}

	return $query;
}

add_filter( 'pre_get_posts', 'exclude_category' );
