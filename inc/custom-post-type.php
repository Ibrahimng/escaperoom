<?php 

add_action( 'init', 'escaperoom_pages_tab_init' );

function escaperoom_pages_tab_init() {
	$labels = array(
		'name'               => _x( 'Custom Pages', 'Escaperoom Custom Pages', 'escaperoom' ),
		'singular_name'      => _x( 'Custom Page', 'Escaperoom Custom Page', 'escaperoom' ),
		'menu_name'          => _x( 'Custom Page', 'admin menu', 'escaperoom' ),
		'name_admin_bar'     => _x( 'Custom Page', 'add new on admin bar', 'escaperoom' ),
		'add_new'            => _x( 'Add New Custom Page', 'slider', 'escaperoom' ),
		'add_new_item'       => __( 'Add New Custom Page', 'escaperoom' ),
		'new_item'           => __( 'New Custom Page', 'escaperoom' ),
		'edit_item'          => __( 'Edit Custom Page', 'escaperoom' ),
		'view_item'          => __( 'View Custom Page', 'escaperoom' ),
		'all_items'          => __( 'All Custom Page', 'escaperoom' ),
		'search_items'       => __( 'Search Custom Pages', 'escaperoom' ),
		'parent_item_colon'  => __( 'Parent Custom Pages:', 'escaperoom' ),
		'not_found'          => __( 'No Custom Pages found.', 'escaperoom' ),
		'not_found_in_trash' => __( 'No Custom Pages found in Trash.', 'escaperoom' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Escaperoom Custom Page Section.', 'escaperoom' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'custom-pages' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'           => 'dashicons-slides',
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports' 			 => array(  'editor', 'thumbnail', 'title', 'excerpt' ),
	);

	register_post_type( 'esr_custom_pages', $args );
}
