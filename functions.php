<?php
/**
 * HelloBase functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package HelloBase
 */

 /*
  * Define Constants
  */

if( !defined( 'THEME_TEXTDOMAIN' ) ) {
	define( 'THEME_TEXTDOMAIN', 'hellobase' ); // Theme Name
}

/*

 * Add required Includes files.
 * Implement the Custom Header feature.(custom-header.php)
 * Custom template tags for this theme. (template-tags.php)
 * Custom functions that act independently of the theme templates.(extras.php)
 * Load TGMPA Activation compatibility file. (class-tgm-plugin-activation.php, tgmpa-activation.php)
 * Load Jetpack compatibility file. (jetpack.php)
 * Basic functions of theme (base-functions.php)
 * Load CPT compatibility file. (cpt.php)
 * Load Shortcodes compatibility file. (shortcodes.php)
 * Load Contact Form 7 compatibility file. (cf7.php)
 * Wordpress Hooks (hooks.php)
 */

$includes_files = array(
	 'inc/custom-header.php',
	 'inc/template-tags.php',
	 'inc/extras.php',
	 'inc/customizer.php',
	 'tgmpa/class-tgm-plugin-activation.php',
	 'inc/tgmpa-activation.php',
	 'inc/jetpack.php',
	 'inc/base-functions.php',
	 'classes/cpt.php',
	 'classes/shortcodes.php',
	 'classes/cf7.php',
     'classes/hooks.php',
     );
foreach($includes_files as $filename){
    require_once $filename ;
}


