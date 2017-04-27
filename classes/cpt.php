<?php
/* public Class
 *
 * @package CPT Filters
 * @since 1.0.0
 */

global $hellobaseregistercpt;
class hellobaseRegisterCPT {

    // Constuct
    public function __construct() { }

    /**
     * Register a custom post types.
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 * @package CPT Filters
 	 * @since 1.0.0
     */
    function hellobase_register_custom_post_type_callback() {

        # Add array item to create dynamic CPT's with general layout

		// Default array of arguments
		$args_array = array( 'public'             => true,
                			 'publicly_queryable' => true,
                			 'show_ui'            => true,
                			 'show_in_menu'       => true,
                			 'query_var'          => true,
                			 'capability_type'    => 'post',
                			 'has_archive'        => true,
                			 'hierarchical'       => false,
                			 'menu_position'      => null,
							 'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ));

		$cpt_dynamic = array(array('label' => 'testimonial', 'args' => $args_array));

        $cpt_dynamic = apply_filters('hellobase_register_custom_post_type_args',$cpt_dynamic);

		if(!empty( $cpt_dynamic)){ // IF CPT array exist

        foreach( $cpt_dynamic as $cpt_item ){ // Foreach of CPT

			  $labels = array(
                'name'               => _x( $cpt_item['label'].'s', strtolower($cpt_item['label']), 'hellobase' ),
                'singular_name'      => _x( $cpt_item['label'], strtolower($cpt_item['label']), 'hellobase' ),
                'menu_name'          => _x( $cpt_item['label'].'s', strtolower($cpt_item['label']), 'hellobase' ),
                'name_admin_bar'     => _x( $cpt_item['label'], strtolower($cpt_item['label']), 'hellobase' ),
                'add_new'            => _x( 'Add New', strtolower($cpt_item['label']), 'hellobase' ),
                'add_new_item'       => __( 'Add New '.$cpt_item['label'] , 'hellobase' ),
                'new_item'           => __( 'New '.$cpt_item['label'] , 'hellobase' ),
                'edit_item'          => __( 'Edit '.$cpt_item['label'], 'hellobase' ),
                'view_item'          => __( 'View '.$cpt_item['label'], 'hellobase' ),
                'all_items'          => __( 'All '.$cpt_item['label'].'s', 'hellobase' ),
                'search_items'       => __( 'Search '.$cpt_item['label'].'s', 'hellobase' ),
                'parent_item_colon'  => __( 'Parent '.$cpt_item['label'].'s:', 'hellobase' ),
                'not_found'          => __( 'No '.strtolower($cpt_item['label']).'s found.', 'hellobase' ),
                'not_found_in_trash' => __( 'No '.strtolower($cpt_item['label']).'s found in Trash.', 'hellobase' )
            );

            $args = array(   'labels'             => $labels,
						     'public'             => true,
                			 'publicly_queryable' => true,
                			 'show_ui'            => true,
                			 'show_in_menu'       => true,
                			 'query_var'          => true,
                			 'capability_type'    => 'post',
                			 'has_archive'        => true,
                			 'hierarchical'       => false,
                			 'menu_position'      => null,
							 'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'));

			$args_array = array_merge($args, $cpt_item['args']);
            register_post_type( strtolower($cpt_item['label']), $args_array );
            unset($labels);
            unset($args);

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
		 add_action( 'init', array( $this, 'hellobase_register_custom_post_type_callback' ) );

	}
}
$hellobaseregistercpt = new hellobaseRegisterCPT();
$hellobaseregistercpt -> add_hooks();
