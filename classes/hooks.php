<?php 
/* public Hooks
 *
 * @package Hellobase
 * @since 1.0.0
 */

global $hellobaseregisterhooks;
class hellobaseRegisterHooks {
	
	  // Constuct
	  public function __construct() { }


	  
	  /*
	   * Wordpress Hooks Function
	   * @package Hellobase
       * @since 1.0.0
	   */
	  public function add_hooks(){

	  }
	
}

$hellobaseregisterhooks = new hellobaseRegisterHooks;
$hellobaseregisterhooks -> add_hooks();
