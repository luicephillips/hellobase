<?php
/* public Class
 *
 * @package Hellobase
 * @since 1.0.0
 */

global $hellobasecf7;
class hellobaseCF7 {

    /*
     * @link: https://code.tutsplus.com/articles/optimizing-contact-form-7-for-better-performance--wp-31255
	 * @package Hellobase
	 * @since 1.0.0
     */
    public function __construct() {}

    /*
	 * Deregister Conact Form sctipt
	 * @package Hellobase
	 * @since 1.0.0
	 */
    public function hellobase_deregister_cf7_resources() {
        # Add list of page on which Contact Form 7 is used
        if ( ! is_page( array( 'contact-us', 'contact' ) ) ) {
            wp_deregister_style( 'contact-form-7' );
            wp_deregister_script( 'contact-form-7' );
        }
    }

	/*
	 * Add Hooks of Contact Form 7
	 * @package Hellobase
	 * @since 1.0.0
	 */
	public function add_hooks(){

		// Deregister Style and Scripts of Contact Form 7 plugin on rest of the pages except the pages on which it is used.
        add_action( 'wp_print_styles', array( $this, 'hellobase_deregister_cf7_resources' ), 100 );
        add_action( 'wp_print_scripts', array( $this, 'hellobase_deregister_cf7_resources' ), 100 );
	}

}
$hellobasecf7 = new hellobaseCF7();
$hellobasecf7 -> add_hooks;
