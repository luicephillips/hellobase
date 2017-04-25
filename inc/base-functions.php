<?php 
/**
 * Theme setup.
 * @package Hellobase
 * @since 1.0.0
 */
 
 if ( ! function_exists( 'hellobase_setup' ) ) {
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hellobase_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on HelloBase, use a find and replace
	 * to change 'hellobase' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'hellobase', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'hellobase' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array('search-form','comment-form', 'comment-list', 'gallery','caption',) );

	add_theme_support( 'post-formats', array( 'gallery', 'image', 'video', ) );


	// Add user Role of Sub admin
	// This role has not permission to admin add plugin
	$captibilties = get_role('administrator');
	$captibilties -> capabilities['install_plugins'] = false ;
	add_role( 'subadmin', __('Sub Administrator' ),$captibilties -> capabilities);
}
 }
add_action( 'after_setup_theme', 'hellobase_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 * @package Hellobase
 * @since 1.0.0
 */
  if ( ! function_exists( 'hellobase_content_width' ) ) {
	function hellobase_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'hellobase_content_width', 640 );
	}
}
add_action( 'after_setup_theme', 'hellobase_content_width', 0 );


/**
 * Enqueue scripts and styles.
 * @package Hellobase
 * @since 1.0.0
 */
   if ( ! function_exists( 'hellobase_scripts' ) ) {

		function hellobase_scripts() {


		// Enqueue CSS Files
		$cssfiles = array(
			'general-style'      	=> '/css/general.css',
			'main-style'      	    => '/style.css',
			'responsive-style'      => '/css/responsive.css',
		);
		 $include_owl_carousel = get_option( 'include_owl_carousel' );

		foreach($cssfiles as $cssfilekey=>$cssfilevalue){
			wp_enqueue_style( $cssfilekey, get_template_directory_uri() . $cssfilevalue );
		}

		// Enqueue JS Files
		$jsfiles = array(

			'base-js'               => '/js/base.js',
			'general-js'	        => '/js/general.js',
		);
		if(isset($include_owl_carousel['owl-carousel']) && $include_owl_carousel['owl-carousel'] == 1){
			array_unshift($jsfiles,array('owl-carousel-js' => '/assets/js/owl.carousel.min.js'));
			$jsfiles = $jsfiles[0];
		}
		foreach($jsfiles as $jsfilekey=>$jsfilevalue){
			wp_enqueue_script( $jsfilekey, get_template_directory_uri() . $jsfilevalue , array( 'jquery' ), '', true );
		}
		wp_localize_script( 'general-js', 'myAjax_new', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
		wp_enqueue_script( 'general-js' );

		# If website doesnt have commenting functionality then we can remove this.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
}
add_action( 'wp_enqueue_scripts', 'hellobase_scripts' );

# Disable Admin Bar for all users
add_filter('show_admin_bar', '__return_false');



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if ( ! function_exists( 'hellobase_widgets_init' ) ) {
	function hellobase_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'hellobase' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hellobase' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 1', 'hellobase' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'hellobase' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 2', 'hellobase' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'hellobase' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 3', 'hellobase' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'hellobase' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 4', 'hellobase' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'hellobase' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'hellobase_widgets_init' );

/*
 * ACf Options Page
 * @package Hellobase
 * @since 1.0.0
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'empl-theme-options',
        'capability' => 'manage_options',
        'redirect' => true
    ));
    acf_add_options_sub_page(array(
       'title' => 'Header Options',
       'parent' => 'empl-theme-options',
      'capability' => 'manage_options'
   ));
   acf_add_options_sub_page(array(
       'title' => 'Footer Options',
       'parent' => 'empl-theme-options',
       'capability' => 'manage_options'
   ));
   acf_add_options_sub_page(array(
      'title' => 'User Guide',
      'parent' => 'empl-theme-options',
      'capability' => 'manage_options'
   ));
}


