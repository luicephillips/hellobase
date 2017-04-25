<?php
/* public Hooks
 *
 * @package Hellobase
 * @since 1.0.0
 */

global $hellobaseadminhooks;
class hellobaseAdminHooks {

	  // Constuct
	  public function __construct() {  }

	  /*
	   * Remove Theme Customise page, Header and Background page in admin panel
	   * Remove Appearnce -> Customizer
       * @package Hellobase
       * @since 1.0.0
	   */
	  public function remove_customerise_page_admin(){

		   global $submenu; // Global Submenu Array

		   if(!empty($submenu['themes.php'])){
   		   		foreach($submenu['themes.php'] as $menu_index => $theme_menu){
        			if($theme_menu[0] == 'Customize' || $theme_menu[0] == 'Background' || $theme_menu[0] == 'Header'){
        				unset($submenu['themes.php'][$menu_index]);
					}
    			}
		   }
	  }

	  /*
	   * Add Admin Developer Page
       * @package Hellobase
       * @since 1.0.0
	   */
	 	public function add_admin_menu_page(){

		    // Add Theme Setting Pages
		 	 add_options_page( 'Theme Settings', 'Theme Settings', 'manage_options', 'theme-settings', array( $this,'theme_settings_page'));
	  	}

	   /*
	   * Add Admin Theme Settings Page
       * @package Hellobase
       * @since 1.0.0
	   */
	    public function theme_settings_page(){ ?>
        	 <div class="wrap">
	    		<h1>Theme Setting</h1>
	    		<form method="post" action="options.php">
	        	<?php  	settings_fields("developer_theme_settings");
	            		do_settings_sections("theme-settings");
	            		submit_button(); ?>
                </form>
			</div>
		<?php
		}

	   /**
	   * Register and Admin Theme Settings Page Fields
       * @package Hellobase
       * @since 1.0.0
	   */
	   function theme_settings_page_fields(){
            register_setting( 'developer_theme_settings', 'include_owl_carousel'  );
            add_settings_section( 'owl_carousel', 'Include Owl Carousel Slider','', 'theme-settings' );
            add_settings_field( 'include_owl_carousel_id', 'Include Owl Carousel', array( $this, 'checkbox_callback' ), 'theme-settings', 'owl_carousel' );
	   }


	   /**
        * Checkbox
		* @package Hellobase
        * @since 1.0.0
        */
		public function checkbox_callback(){
			$checked = 0;
                    $option = get_option( 'include_owl_carousel' );
					if(isset($option['owl-carousel']) && $option['owl-carousel'] == 1  ) {
                   						$checked = 'checked=checked';
					}
        	printf(
            	'<input type="checkbox" id="include_owl_carousel" name="include_owl_carousel[owl-carousel]" value="1"'. $checked . '  />');
    	}

	  /*
	   * Wordpress Hooks Function
	   * @package Hellobase
       * @since 1.0.0
	   */
	  public function add_hooks(){

			// Remove Customiser page from admin menu
			add_action('admin_menu', array($this, 'remove_customerise_page_admin'), 10);

			//Add Settings page from admin menu
			add_action('admin_menu', array($this, 'add_admin_menu_page'));

			// Add Theme Settings Page Fields
			add_action( 'admin_init', array( $this, 'theme_settings_page_fields' ) );

	  }

}

$hellobaseadminhooks = new hellobaseAdminHooks;
$hellobaseadminhooks -> add_hooks();
