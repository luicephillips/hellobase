<?php
class hellobaseRegisterCPT {

    public function __construct() {

        add_action( 'init', array( $this, 'hellobase_register_custom_post_type_callback' ) );

    }

    /**
     * Register a custom post types.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function hellobase_register_custom_post_type_callback() {

        # Add array item to create dynamic CPT's with general layout
        $cpt_dynamic = array( 'Testmonial' );

        foreach( $cpt_dynamic AS $cpt_item ){

            $labels = array(
                'name'               => _x( $cpt_item.'s', strtolower($cpt_item), 'hellobase' ),
                'singular_name'      => _x( $cpt_item, strtolower($cpt_item), 'hellobase' ),
                'menu_name'          => _x( $cpt_item.'s', strtolower($cpt_item), 'hellobase' ),
                'name_admin_bar'     => _x( $cpt_item, strtolower($cpt_item), 'hellobase' ),
                'add_new'            => _x( 'Add New', strtolower($cpt_item), 'hellobase' ),
                'add_new_item'       => __( 'Add New '.$cpt_item , 'hellobase' ),
                'new_item'           => __( 'New '.$cpt_item , 'hellobase' ),
                'edit_item'          => __( 'Edit '.$cpt_item , 'hellobase' ),
                'view_item'          => __( 'View '.$cpt_item , 'hellobase' ),
                'all_items'          => __( 'All '.$cpt_item.'s', 'hellobase' ),
                'search_items'       => __( 'Search '.$cpt_item.'s', 'hellobase' ),
                'parent_item_colon'  => __( 'Parent '.$cpt_item.'s:', 'hellobase' ),
                'not_found'          => __( 'No '.strtolower($cpt_item).'s found.', 'hellobase' ),
                'not_found_in_trash' => __( 'No '.strtolower($cpt_item).'s found in Trash.', 'hellobase' )
            );

            $args = array(
                'labels'             => $labels,
                'description'        => __( 'Description.', 'hellobase' ),
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => strtolower($cpt_item) ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
            );

            register_post_type( strtolower($cpt_item), $args );

            unset($labels);
            unset($args);

        }

        /* Regsiter CPT with extended Customization from here */
    }

}
new hellobaseRegisterCPT();
