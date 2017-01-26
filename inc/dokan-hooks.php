<?php 

// submit data to dokan process 
function save_booking_customized_data($post_id) {

    /* location taxonomy */
    if( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ) {
        $esr_locations    = intval( $_POST['esr_locations'] );
        if ( $esr_locations < 0 ) {
            $errors[] = __( 'Please select a location', 'dokan' );
        }
    } else {
        if( !isset( $_POST['esr_locations'] ) && empty( $_POST['esr_locations'] ) ) {
            $errors[] = __( 'Please select AT LEAST ONE location', 'dokan' );
        }
    }

	if( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ) {
	    wp_set_object_terms( $post_id, (int) $_POST['esr_locations'], 'esr_locations' );
	} else {
	    if( isset( $_POST['esr_locations'] ) && !empty( $_POST['esr_locations'] ) ) {
	        $cat_ids = array_map( 'intval', (array)$_POST['esr_locations'] );
	        wp_set_object_terms( $post_id, $cat_ids, 'esr_locations' );
	    }
	}


   /* lat lng */
    if( !isset( $_POST['location_lat'] ) && !isset( $_POST['location_long'] ) && empty( $_POST['location_lat'] ) && empty( $_POST['location_long'] ) ) {
        $errors[] = __( 'Latitude & Longititude required!!!', 'dokan' );
    } else {
        $location_lat = $_POST['location_lat'];
        $location_long = $_POST['location_long'];
        update_post_meta( $post_id, 'location_lat', esc_attr($location_lat) );
        update_post_meta( $post_id, 'location_long', esc_attr($location_long) );
    }

    /* number of person */
    if( !isset( $_POST['number_of_person'] ) && empty( $_POST['number_of_person'] ) ) {
        $errors[] = __( 'Number of person required !!', 'dokan' );
    } else {
        $number_of_person = $_POST['number_of_person'];
        update_post_meta( $post_id, 'number_of_person', esc_attr($number_of_person) );
    }

}
add_action('dokan_new_product_added', 'save_booking_customized_data');
add_action('dokan_product_updated', 'save_booking_customized_data');