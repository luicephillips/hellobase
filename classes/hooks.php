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
	   * Remove Theme Customise page in admin panel
	   * Remove Appearnce -> Customizer
       * @package Hellobase
       * @since 1.0.0
	   */
	  public function remove_customerise_page_admin(){
		   global $submenu;
		 
   		   foreach($submenu['themes.php'] as $menu_index => $theme_menu){
        		if($theme_menu[0] == 'Customize')
        			unset($submenu['themes.php'][$menu_index]);
    			}
    	   
	  }
	  
	  /*
	   * Wordpress Hooks Function
	   * @package Hellobase
       * @since 1.0.0
	   */
	  public function add_hooks(){
		  	
			// Remove Customiser page from admin menu
			add_action('admin_menu', array($this, 'remove_customerise_page_admin'), 99);	  
	  }
	
}

$hellobaseregisterhooks = new hellobaseRegisterHooks;
$hellobaseregisterhooks -> add_hooks();
