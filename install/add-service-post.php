<?php

	$labels = array( 
        'name' => _x('Services List', 'post type general name'), 
        'singular_name' => _x('Service Item', 'post type singular name'), 
        'add_new' => _x('Add New', 'service item'), 
        'add_new_item' => __('Add New Service Item'), 
        'edit_item' => __('Edit Service Item'), 
        'new_item' => __('New Service Item'), 
        'view_item' => __('View Service Item'), 
        'search_items' => __('Search Service'), 
        'not_found' => __('Nothing found'), 
        'not_found_in_trash' => __('Nothing found in Trash'), 
        'parent_item_colon' => '' 
    );   

    $args = array( 
        'labels' => $labels, 
        'public' => true, 
        'publicly_queryable' => true, 
        'show_ui' => true, 
        'query_var' => true, 
        //'menu_icon' => get_stylesheet_directory_uri() . '/article16.png', 
        'rewrite' => array( 'slug' => 'service', 'with_front'=> false ), 
        'capability_type' => 'post', 
        'hierarchical' => true,
        'has_archive' => true,  
        'menu_position' => null, 
        'supports' => array('title','editor','thumbnail') 
    );   

    register_post_type( 'service' , $args ); 

    register_taxonomy( 'service', array('service'), array(
        'hierarchical' => true, 
        'label' => 'Service Categories', 
        'singular_label' => 'Service', 
        'rewrite' => array( 'slug' => 'service', 'with_front'=> false )
        )
    );

    register_taxonomy_for_object_type( 'service', 'service' ); // Better be safe than sorry