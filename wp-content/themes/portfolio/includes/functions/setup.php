<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @package agathos_starter_theme
 */

if ( ! function_exists( 'theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function theme_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on agathos_starter_theme, use a find and replace
		 * to change 'agathos_starter_theme' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'ecs', get_template_directory() . '/languages' );

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
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		//add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'agathostechnology' ),
			'secondary' => __( 'Footer Menu', 'agathostechnology' ),
			'sidebar' => __( 'Sidebar Menu', 'agathostechnology' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

	    /*
		 * Adding Thumbnail basic support
		 */
	    add_theme_support( "post-thumbnails" );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'quote', 'link',
		) );

        function support_svg($mimes)
        {
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        }
        add_filter('upload_mimes', 'support_svg');
	}
endif; // theme_setup
add_action( 'after_setup_theme', 'theme_setup' );
