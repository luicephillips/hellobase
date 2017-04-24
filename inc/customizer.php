<?php
/**
 * HelloBase Theme Customizer
 *
 * @package HelloBase
 * @since 1.0.0
 */

global $hellobasecustomizer;
class hellobaseCustomizer {


	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @package HelloBase
     * @since 1.0.0
	 */
	function hellobase_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 * @package HelloBase
 	 * @since 1.0.0
	 */
	function hellobase_customize_preview_js() {
		wp_enqueue_script( 'hellobase_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
	}

	/**
	 * Add Hooks Customizer
	 * @package HelloBase
 	 * @since 1.0.0
	 */
	function add_hooks(){
		add_action( 'customize_preview_init', array($this, 'hellobase_customize_preview_js' ));
		add_action( 'customize_register', array($this, 'hellobase_customize_register' ));

	}
}
$hellobasecustomizer = new hellobaseCustomizer();
$hellobasecustomizer -> add_hooks();
