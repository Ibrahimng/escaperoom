<?php 


// single page product page-top seller overview
function show_seller_info_dokan() {
	if(is_singular('product')) {
		global $post;
		$author = get_user_by('id', $post->post_author);
		$store_info = dokan_get_store_info( $author->ID );

	    dokan_get_template_part('seller-overview', '', array(
	        'author' => $author,
	        'store_info' => $store_info,
	    ) );
	}
}

add_action('woocommerce_before_main_content', 'show_seller_info_dokan', 21, 0);


// remove Dokan default seller tab and edit update new ones 
function woo_remove_product_tabs( $tabs ) {
	$tabs['description']['title'] = __( 'Room Information' );
	$tabs['vidoes'] = array(
		'title' 	=> __( 'Room Videos', 'woocommerce' ),
		'callback' 	=> 'escape_room_videos'
	);
	unset($tabs['seller']);

	$tabs['description']['priority'] = 5;
	$tabs['vidoes']['priority'] = 10;
	$tabs['reviews']['priority'] = 15;	

    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function escape_room_videos() {
	echo '<h2> Product videos list </h2>';
}

// https://isabelcastillo.com/change-product-description-title-woocommerce
add_filter('woocommerce_product_description_heading',
'isa_product_description_heading');
 
function isa_product_description_heading() {
    return __('Room Information', 'woocommerce');
}