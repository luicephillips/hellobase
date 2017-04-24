<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package HelloBase
 * @since 1.0.0
 */

global $hellobaseextra;
class hellobaseExtra {

	/*
	 * Adds custom classes to the array of body classes.
 	 *
     * @param array $classes Classes for the body element.
     * @return array
	 * @package HelloBase
     * @since 1.0.0
	 */
	function hellobase_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}
		return $classes;
	}

	/**
 	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 * @package HelloBase
     * @since 1.0.0
 	 */
	function hellobase_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}

	/**
 	 * Add Hooks
	 * @package HelloBase
     * @since 1.0.0
 	 */
	function add_hooks(){
			add_filter( 'body_class', array($this, 'hellobase_body_classes' ));
			add_action( 'wp_head', array($this, 'hellobase_pingback_header' ));
	}
}

$hellobaseextra = new hellobaseExtra;
$hellobaseextra -> add_hooks();
