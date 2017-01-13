<?php 

// Product's Location Custom Post Type

if ( ! function_exists( 'escape_rooms_location_tax_func' ) ) {

// Register Custom Taxonomy
function escape_rooms_location_tax_func() {

	$labels = array(
		'name'                       => _x( 'Locations', 'Taxonomy General Name', 'esr' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'esr' ),
		'menu_name'                  => __( 'Location', 'esr' ),
		'all_items'                  => __( 'Locations', 'esr' ),
		'parent_item'                => __( 'Parent Location', 'esr' ),
		'parent_item_colon'          => __( 'Parent Location:', 'esr' ),
		'new_item_name'              => __( 'New Location Name', 'esr' ),
		'add_new_item'               => __( 'Add New Location', 'esr' ),
		'edit_item'                  => __( 'Edit Location', 'esr' ),
		'update_item'                => __( 'Update Location', 'esr' ),
		'view_item'                  => __( 'View Location', 'esr' ),
		'separate_items_with_commas' => __( 'Separate locations with commas', 'esr' ),
		'add_or_remove_items'        => __( 'Add or remove locations', 'esr' ),
		'choose_from_most_used'      => __( 'Choose from the most used locations', 'esr' ),
		'popular_items'              => __( 'Popular Locations', 'esr' ),
		'search_items'               => __( 'Search Locations', 'esr' ),
		'not_found'                  => __( 'Location Not Found', 'esr' ),
		'no_terms'                   => __( 'No locations', 'esr' ),
		'items_list'                 => __( 'Locations list', 'esr' ),
		'items_list_navigation'      => __( 'Locations list navigation', 'esr' ),
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