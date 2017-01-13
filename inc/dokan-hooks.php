<?php 

// submit data to dokan process 
function save_booking_customized_data($post_id) {

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
}
add_action('dokan_new_product_added', 'save_booking_customized_data');
add_action('dokan_product_updated', 'save_booking_customized_data');