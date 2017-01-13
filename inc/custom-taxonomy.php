<?php 

// Product's Location Custom Post Type

if ( ! function_exists( 'escape_rooms_location_tax_func' ) ) {

// Register Custom Taxonomy
function escape_rooms_location_tax_func() {

	$labels = array(
		'name'                       => _x( 'Locations', 'Taxonomy General Name', 'escaperoom' ),
		'singular_name'              => _x( 'Locations', 'Taxonomy Singular Name', 'escaperoom' ),
		'menu_name'                  => __( 'Locations', 'escaperoom' ),
		'all_items'                  => __( 'Locations', 'escaperoom' ),
		'parent_item'                => __( 'Parent Location', 'escaperoom' ),
		'parent_item_colon'          => __( 'Parent Location:', 'escaperoom' ),
		'new_item_name'              => __( 'New Location Name', 'escaperoom' ),
		'add_new_item'               => __( 'Add New Location', 'escaperoom' ),
		'edit_item'                  => __( 'Edit Location', 'escaperoom' ),
		'update_item'                => __( 'Update Location', 'escaperoom' ),
		'view_item'                  => __( 'View Location', 'escaperoom' ),
		'separate_items_with_commas' => __( 'Separate locations with commas', 'escaperoom' ),
		'add_or_remove_items'        => __( 'Add or remove locations', 'escaperoom' ),
		'choose_from_most_used'      => __( 'Choose from the most used locations', 'escaperoom' ),
		'popular_items'              => __( 'Popular Locations', 'escaperoom' ),
		'search_items'               => __( 'Search Locations', 'escaperoom' ),
		'not_found'                  => __( 'Location Not Found', 'escaperoom' ),
		'no_terms'                   => __( 'No locations', 'escaperoom' ),
		'items_list'                 => __( 'Locations list', 'escaperoom' ),
		'items_list_navigation'      => __( 'Locations list navigation', 'escaperoom' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'esr_locations', array( 'product' ), $args );

}
add_action( 'init', 'escape_rooms_location_tax_func', 0 );

}