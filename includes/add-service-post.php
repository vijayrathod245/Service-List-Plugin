<?php

/* Service List Post */
//function service_list() {
  $labels = array(
    'name'               => _x( 'Services', 'post type general name' ),
    'singular_name'      => _x( 'Service', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Service' ),
    'edit_item'          => __( 'Edit Service' ),
    'new_item'           => __( 'New Service' ),
    'all_items'          => __( 'All Services' ),
    'view_item'          => __( 'View Service' ),
    'search_items'       => __( 'Search Services' ),
    'not_found'          => __( 'No services found' ),
    'not_found_in_trash' => __( 'No services found in the Trash' ), 
    'parent_item_colon'  => ’,
    'menu_name'          => 'Services'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our services and product specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'service', $args ); 
//}
//add_action( 'init', 'service_list' );

/*Service List Post End*/