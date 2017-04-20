<?php 

global $hellobaseRegisterHooks; 
class hellobaseRegisterHooks {
	
	  public function __construct() {   
	  
	  }
	  public function remove_customerise_page_admin(){
		   global $submenu;
		 
   		   foreach($submenu['themes.php'] as $menu_index => $theme_menu){
        		if($theme_menu[0] == 'Customize')
        			unset($submenu['themes.php'][$menu_index]);
    			}
    	   
	  }
	  
	  public function add_hooks(){
		  	
			add_action('admin_menu', array($this, 'remove_customerise_page_admin'), 99);	  
	  }
	
}

$hellobaseRegisterHooks = new hellobaseRegisterHooks;
$hellobaseRegisterHooks -> add_hooks();