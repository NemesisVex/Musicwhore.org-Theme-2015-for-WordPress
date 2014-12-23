<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 10/14/14
 * Time: 9:31 PM
 */

namespace VigilantMedia\WordPress\Themes\Musicwhore2015;

class Setup {

	public function __construct() {

	}

	public static function init() {
		add_filter( 'wp_page_menu_args', array( __CLASS__, 'wp_page_menu_args' ) );

		add_filter( 'wp_title', array( __CLASS__, 'wp_title' ), 10, 2 );

		add_action( 'after_setup_theme', array( __CLASS__, 'after_setup_theme' ) );

		add_action( 'widgets_init', array( __CLASS__, 'widgets_init' ) );

		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'wp_enqueue_scripts' ) );

		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'wp_enqueue_styles' ), 20 );

		add_action( 'mt_id_mapper_pattern_setup', array( __CLASS__, 'register_mt_id_patterns' ) );
	}

	public static function after_setup_theme() {
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );


	}

	public static function widgets_init() {
//	require get_template_directory() . '/inc/widgets.php';
//	register_widget( 'Musicwhore2014_Ephemera_Widget' );

		register_sidebar( array(
			'name'          => __( 'Primary Sidebar', WP_TEXT_DOMAIN ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Main sidebar that appears on the left.', WP_TEXT_DOMAIN ),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => __( 'Content Sidebar', WP_TEXT_DOMAIN ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Additional sidebar that appears on the right.', WP_TEXT_DOMAIN ),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => __( 'Footer Widget Area', WP_TEXT_DOMAIN ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Appears in the footer section of the site.', WP_TEXT_DOMAIN ),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );
	}

	public static function wp_enqueue_scripts() {
		wp_enqueue_script( 'bootstrap-js', '//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js', array( 'jquery' ) );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	public static function wp_enqueue_styles() {
		wp_enqueue_style( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css' );

		wp_enqueue_style( 'musicwhore2015-font-merriweather', '//fonts.googleapis.com/css?family=Merriweather&subset=latin,latin-ext' );
		wp_enqueue_style( 'musicwhore2015-font-merriweather-sans', '//fonts.googleapis.com/css?family=Merriweather+Sans&subset=latin,latin-ext' );
		wp_enqueue_style( 'musicwhore2015-font-lato', '//fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' );

		wp_enqueue_style( 'musicwhore2015-style', get_stylesheet_uri() );
		wp_enqueue_style( 'musicwhore2015-typography', get_stylesheet_directory_uri() . '/css/typography.css' );
		wp_enqueue_style( 'musicwhore2015-layout', get_stylesheet_directory_uri() . '/css/layout.css' );
	}

	public static function wp_page_menu_args( $args ) {
		$args['show_home'] = false;
		$args['container'] = false;
		$args['menu_class'] = 'nav navbar-nav';
		return $args;
	}

	public static function wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() ) {
			return $title;
		}

		// Add the site name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 ) {
			$title = "$title $sep " . sprintf( __( 'Page %s', WP_TEXT_DOMAIN ), max( $paged, $page ) );
		}

		return $title;
	}

	public static function register_mt_id_patterns() {
		if (function_exists('mt_id_mapper_register_pattern')) {
			mt_id_mapper_register_pattern( array('pattern' => "/^\/(mw\/|)entry\/([0-9]+)/", 'offset' => 2) );
			mt_id_mapper_register_pattern( array('pattern' => "/entry\.php\?entry_id=([0-9]+)/", 'offset' => 1) );
		}
	}
}