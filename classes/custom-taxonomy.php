<?php
/* public Class
 *
 * @package CPT Filters
 * @since 1.0.0
 */

global $hellobaseregistercustomtaxonomy;
class hellobaseRegisterCustomTaxonomy {

    // Constuct
    public function __construct() { }

    /**
     * Register a custom post types.
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 * @package CPT Filters
 	 * @since 1.0.0
     */
    function hellobase_register_custom_taxonomy_callback() {

        # Add array item to create dynamic CPT's with general layout

		// Default array of arguments
		$args_array =array(
						'hierarchical'      => true,
						'show_ui'           => true,
						'show_admin_column' => true,
						'query_var'         => true,
					);

		$ct_dynamic = array(array('label' => '', 'post_type' => 'post', 'args' => $args_array));

        $ct_dynamic = apply_filters('hellobase_register_custom_taxonomy_args',$ct_dynamic);

		if(!empty( $ct_dynamic)){ // IF Custom Taxonomy array exist

        foreach( $ct_dynamic as $ct_item ){ // Foreach of Custom Taxoonomy

				if(!empty($ct_item["label"])){

			  // Add new taxonomy, make it hierarchical (like categories)
				$labels = array(
					'name'              => _x( $ct_item["label"].'s', 'taxonomy general name', 'textdomain' ),
					'singular_name'     => _x( $ct_item["label"], 'taxonomy singular name', 'textdomain' ),
					'search_items'      => __( 'Search '.$ct_item["label"].'s', 'textdomain' ),
					'all_items'         => __( 'All '.$ct_item['label'].'s', 'textdomain' ),
					'parent_item'       => __( 'Parent '.$ct_item['label'], 'textdomain' ),
					'parent_item_colon' => __( 'Parent '.$ct_item['label'].':', 'textdomain' ),
					'edit_item'         => __( 'Edit '.$ct_item['label'], 'textdomain' ),
					'update_item'       => __( 'Update '.$ct_item['label'], 'textdomain' ),
					'add_new_item'      => __( 'Add New '.$ct_item['label'], 'textdomain' ),
					'new_item_name'     => __( 'New '.$ct_item['label'].' Name', 'textdomain' ),
					'menu_name'         => __( $ct_item['label'], 'textdomain' ),
				);

				$args = array(
					'hierarchical'      => true,
					'labels'            => $labels,
					'show_ui'           => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite'           => array( 'slug' => strtolower($ct_item['label'])),
				);

				$args_array = array_merge($args, $ct_item['args']);

				// Register Custom Taxonomy
         		register_taxonomy( strtolower($ct_item['label']),$ct_item['post_type'], $args_array );

	     	   unset($labels);
		       unset($args_array);
				}
        	}
		}
        /* Regsiter CPT with extended Customization from here */
    }
	/*
	 * Add Custom Post type hooks
	 * @package CPT Filters
 	 * @since 1.0.0
     */
	public function add_hooks(){

		 // Add Custom post type hook
		 add_action( 'init', array( $this, 'hellobase_register_custom_taxonomy_callback' ) );

	}
}
$hellobaseregistercustomtaxonomy = new hellobaseRegisterCustomTaxonomy();
$hellobaseregistercustomtaxonomy -> add_hooks();
