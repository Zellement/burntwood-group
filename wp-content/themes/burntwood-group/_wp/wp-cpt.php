<?php 

    /* ========================================================================================================================
        
    CPT - Location Pages
        
    ======================================================================================================================== */

    /* Hidden until needed

    // Register Custom Post Type
    function locations_post_type() {

        $labels = array(
            'name'                => _x( 'Locations', 'Post Type General Name', 'text_domain' ),
            'singular_name'       => _x( 'Location', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'           => __( 'Locations', 'text_domain' ),
            'name_admin_bar'      => __( 'Post Location', 'text_domain' ),
            'parent_item_colon'   => __( 'Parent Location:', 'text_domain' ),
            'all_items'           => __( 'All Locations', 'text_domain' ),
            'add_new_item'        => __( 'Add New Location', 'text_domain' ),
            'add_new'             => __( 'New Location', 'text_domain' ),
            'new_item'            => __( 'New Location', 'text_domain' ),
            'edit_item'           => __( 'Edit Location', 'text_domain' ),
            'update_item'         => __( 'Update Location', 'text_domain' ),
            'view_item'           => __( 'View Location', 'text_domain' ),
            'search_items'        => __( 'Search locations', 'text_domain' ),
            'not_found'           => __( 'No locations found', 'text_domain' ),
            'not_found_in_trash'  => __( 'No locations found in Trash', 'text_domain' ),
        );
        $rewrite = array(
            'slug'                => 'locations',
            'with_front'          => false,
            'pages'               => true,
            'feeds'               => true,
        );
        $args = array(
            'label'               => __( 'Location', 'text_domain' ),
            'description'         => __( 'Location pages', 'text_domain' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-location',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,      
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'rewrite'             => $rewrite,
            'capability_type'     => 'page',
        );
        register_post_type( 'locations', $args );

    }
    add_action( 'init', 'locations_post_type', 0 );

    */

?>